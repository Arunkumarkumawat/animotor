<?php

namespace App\Livewire;

use App\Models\Booking;
use App\Models\Car;
use App\Models\Country;
use App\Models\Role;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Checkout extends Component
{
    public $first_name;
    public $last_name;
    public $id = null;
    public $address;
    public $country;
    public $city;
    public string $is_business_booking = 'no';
    public $phone;
    public $email;
    public $password;
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
            'phone' => 'required|unique:users,phone,'.$this->id,
        ]);

        if(!auth()->check()){
            $this->validate([
                'password' => 'required',
                'email' => 'required|unique:users',
                'phone' => 'required|unique:users',
            ]);

            $validated['password'] = $this->password;
            $validated['email'] = $this->email;

            $user = User::create($validated);
            $role = Role::where('name', 'rider')->first();
            $user->addRole($role);

            Auth::login($user);
        }else{
            $user = auth()->user();
            $user->update($validated);
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
        $tax = $total0 * settings('tax',0.075);
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
            } else {
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
        foreach($this->car->insurance_coverage as $index => $coverage){
            if($params['insurance_id'] == $index){
                $insurance_fee = $coverage['daily_price'] * $booking_day;
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

        $booking = Booking::create($data);

        if($booking){
            $this->car->save();
        }

        return redirect()->route('booking_successful', ['id' => $booking->id])->with('success','Booking successfully submitted, please proceed to payment');
    }

    public function mount(){
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
}
