<?php

namespace App\Livewire;

use App\Models\Car;
use App\Models\Role;
use App\Models\User;
use App\Models\Booking;
use App\Models\Country;
use Livewire\Component;
use App\Mail\EmailOtpMail;
use App\Models\InsuranceCoverage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class Checkout extends Component
{
    public $id = null;

    public $first_name;
    public $last_name;
    public $phone;
    public $country;
    public $city;
    public $address;
    public $zipcode;

    public array $billing = [];
    
    public string $is_business_booking = 'no';
    
    public $email;
    public $password;
    public $otp;
    public $booking_type;

    public $countries;
    public $car;
    public $booking_day;

    public $reference;
    public $pick_up_date;
    public $pick_up_time;
    public $drop_off_date;
    public $drop_off_time;
    public $pick_location;
    public $drop_off_location;
    public $region_id;
    public $car_id;
    public $params;

    public function checkout(){
        $validated = $this->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'address' => 'required',
            'country' => 'required',
            'city' => 'required',
            'zipcode' => 'required',
            'phone' => 'required',
            'billing.first_name' => 'required',
            'billing.last_name' => 'required',
            'billing.address' => 'required',
            'billing.country' => 'required',
            'billing.city' => 'required',
            'billing.phone' => 'required',
            'billing.zipcode' => 'required',
        ]);

        if(!auth()->check()){
            $this->validate([
                'password' => 'required',
                'email' => 'required',
                'phone' => 'required',
            ]);

            $user = User::where('email', $this->email)->first();

            if($user){
                if(session()->has('verify_otp')){
                    if(session()->get('verify_otp') != $user->email_otp){
                        $this->js("NioApp.Toast('Invalid OTP', 'error', { position: 'top-right' });");
                    } else {
                        $user->email_otp = null;
                        $user->email_otp_expires_at = null;
                        $user->email_verified_at = now();
                        $user->save();
                        session()->forget('verify_otp');

                        Auth::login($user);

                        $this->js("NioApp.Toast('User successfully logged in', 'success', { position: 'top-right' });");
                    }
                } else {
                    $this->sendOtp($user);
                    return;
                }
            } else {
                $user = User::create([
                    'first_name' => $validated['first_name'],
                    'last_name' => $validated['last_name'],
                    'address' => $validated['address'],
                    'country' => $validated['country'],
                    'city' => $validated['city'],
                    'phone' => $validated['phone'],
                    'email' => $this->email,
                    'password' => Hash::make($this->password),
                ]);

                $role = Role::where('name', 'rider')->first();
                $user->addRole($role);
                $this->sendOtp($user);
                return;
            }            
        } else {
            $user = auth()->user();

            $user->update([
                'first_name' => $validated['first_name'],
                'last_name' => $validated['last_name'],
                'address' => $validated['address'],
                'country' => $validated['country'],
                'city' => $validated['city'],
                'phone' => $validated['phone'],
                'zipcode' => $validated['zipcode'],
            ]);
        }

        ////////////////////////////////////////////////////////////////////
        $params = $this->params;
        
        $booking_day = $params['booking_day'];

        if(is_int($booking_day / 30)){
            $booking_period = 'month';
            $days_count = 30;   
            $price = $this->car->monthly_rate;  
        }elseif(is_int($booking_day / 7)){
            $booking_period = 'week';
            $days_count = 7;
            $price = $this->car->weekly_rate;
        }else{
            $booking_period = 'day';
            $days_count = 1;
            $price = $this->car->daily_rate;
        }

        $total0 = $price * $booking_day / $days_count;
        $tax = 0;
        $total = $total0 + $tax;

        $extras = [];
        $extra_fee = 0;
        foreach($params['extras'] ?? [] as $index => $extra){
            if(!isset($this->car->extras[$index]) || $extra == 0){
                continue;
            }
            if($this->car->extras[$index]['interval'] == 'daily'){
                $extra_fee0 = $this->car->extras[$index]['price'] * $extra * $booking_day * $days_count;
            }elseif($this->car->extras[$index]['interval'] == 'weekly'){
                $extra_fee0 = $this->car->extras[$index]['price'] * $extra * $booking_day * $days_count / 7;
            }elseif($this->car->extras[$index]['interval'] == 'monthly'){
                $extra_fee0 = $this->car->extras[$index]['price'] * $extra * $booking_day * $days_count / 30;
            }else{
                $extra_fee0 = $this->car->extras[$index]['price'] * $extra;
            }

            $extra_fee += $extra_fee0;

            $extras[] = [
                'title' => $this->car->extras[$index]['title'],
                'price' => $this->car->extras[$index]['price'],
                'quantity' => $extra,
                'interval' => $this->car->extras[$index]['interval'],
                'paid' => $extra_fee0,
            ];
        }
        
        $total += $extra_fee;
        
        $insurance_fee = 0;
        foreach ($this->car->insurance_coverage as $index => $coverage) {
            if(isset($params['insurance_id']) && $params['insurance_id'] == $index){
                $policy = InsuranceCoverage::where('id', $coverage['policy_id'])->first();
                $insurance_fee = ($coverage['daily_price'] ? $coverage['daily_price'] : $policy->daily_rate) * $booking_day;
                break;
            }
        }

        if(isset($params['book_type']) && $params['book_type'] == 'with_full_protection'){
            $total += $insurance_fee;
        }

        //////////////////////////////////////////////////////////

        $data['customer_id'] = $user->id;
        $data['region_id'] = $this->car->region_id;
        $data['car_id'] = $this->car->id;

        $data['fee'] =  $total0;
        $data['tax'] =  $tax;
        $data['extras'] =  $extras;
        $data['insurance_fee'] =  $insurance_fee;
        $data['grand_total'] =  $total;
        $data['booking_period'] = ($booking_day/$days_count) . ' ' . $booking_period;
        
        $data['reference'] = getUniqueReferenceCode();
        $data['booking_number'] = getUniqueBookingNumber();
        $data['payment_status'] = 'unpaid';
        $data['payment_method'] = 'cash';
        $data['pick_up_date'] = $this->pick_up_date;
        $data['booking_type'] = $params['book_type'];
        $data['pick_up_time'] = $this->pick_up_time;
        $data['drop_off_date'] = $this->drop_off_date;
        $data['drop_off_time'] = $this->drop_off_time;
        $data['pick_location'] = $this->pick_location;
        $data['drop_off_location'] = $this->drop_off_location;
        $data['company_id'] = $this->car->company_id;
        $data['billing_details'] = [
            'first_name' => $this->billing['first_name'],
            'last_name' => $this->billing['last_name'],
            'address' => $this->billing['address'],
            'country' => $this->billing['country'],
            'city' => $this->billing['city'],
            'phone' => $this->billing['phone'],
            'zipcode' => $this->billing['zipcode'],
        ];

        $booking = Booking::create($data);

        if($booking){
            $this->car->save();
        }

        return redirect()->route('booking_successful', ['id' => $booking->id])->with('success','Booking successfully submitted, please proceed to payment');
    }

    public function sendOtp($user){
        $user->email_otp = rand(100000, 999999);
        $user->email_otp_expires_at = now()->addMinutes(10);
        $user->save();

        session()->put('verify_otp', $user->email_otp);
        Mail::to($this->email)->send(new EmailOtpMail($user->email_otp));
        $this->js("NioApp.Toast('OTP sent successfully', 'success', { position: 'top-right' });");
    }
    
    public function mount(){
        session()->forget('verify_otp');

        if(auth()->check()){
            $user = auth()->user();
            $this->fill([
                'first_name' => $user->first_name,
                'last_name' => $user->last_name,
                'address' => $user->address,
                'country' => $user->country,
                'city' => $user->city,
                'phone' => $user->phone,
                'email' => $user->email,
                'id' => $user->id,
            ]);
        }
        $this->countries = Country::all();
        $this->country = $this->countries?->first()?->name;
        $this->car = Car::findOrFail(request()->query('car_id'));
        $this->booking_day = request()->query('booking_day');
        $this->pick_up_date = request()->query('pick_up_date');
        $this->pick_up_time = request()->query('pick_up_time');
        $this->drop_off_date = request()->query('drop_off_date');
        $this->drop_off_time = request()->query('drop_off_time');
        $this->pick_location = request()->query('pick_up_location');
        $this->drop_off_location = request()->query('drop_off_location');
        $this->region_id = $this?->car?->region_id;
        $this->booking_type = request()->query('book_type');
        $this->params = request()->query();
    }

    public function render()
    {
        if(auth()->check()){
            $user = auth()->user();
        }else{
            $user = null;
        }

        return view('livewire.checkout', compact('user'));
    }

    public function updateCountryValue($value){
        $this->country = $value;
    }

    public function updateBillingCountryValue($value){
        $this->billing['country'] = $value;
    }
}
