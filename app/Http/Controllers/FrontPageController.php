<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Models\Page;
use App\Models\Role;
use App\Models\User;
use App\Models\Region;
use App\Models\Booking;
use App\Mail\EmailOtpMail;
use App\Models\VehicleType;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Services\WalletService;
use App\Services\PaymentService;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\Services\NotificationService;
use Illuminate\Support\Facades\Cache;
use Laravel\Sanctum\PersonalAccessToken;
use Illuminate\Support\Facades\Validator;

class FrontPageController extends Controller
{
    public function sendQuote(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'car_id' => 'required|exists:cars,id',
        ]);

        $car = Car::findOrFail($request->car_id);

        $email = $request->email;
        $days = $request->days ?? 1;
        $booking_period = $request->booking_period ?? 'daily';
        $price = $car->daily_rate ?? $car->price_per_day;

        switch($booking_period){
            case 'daily':
                $booking_period_f = 'day';
                $price = $car->price_per_day;
                break;
            case 'weekly':
                $booking_period_f = 'week';
                $price = $car->weekly_rate;
                break;
            case 'monthly':
                $booking_period_f = 'month';
                $price = $car->monthly_rate;
                break;
        }
        $site_name = settings('site_name');

        $data['title'] = "Your Car Quote from $site_name";
        $data['name'] = $email;

        $data['message'] = "
            <h2>Your Car Quote</h2>
            <p>Thank you for requesting a quote for the {$car->title}.</p>

            <div style='margin: 20px 0; padding: 15px; border: 1px solid #eee;'>
                <h3>{$car->title} or similar car</h3>
                <table style='width: 100%;'>
                    <tr>
                        <td style='width: 50%; vertical-align: top;'>
                            <p><strong>Make:</strong> {$car->make}</p>
                            <p><strong>Model:</strong> {$car->model}</p>
                            <p><strong>Type:</strong> {$car->type}</p>
                            <p><strong>Seats:</strong> {$car->seats}</p>
                        </td>
                        <td style='width: 50%; vertical-align: top;'>
                            <p><strong>Gear:</strong> {$car->gear}</p>
                            <p><strong>Price per day:</strong> " . amt($price) . "</p>
                            <p><strong>Total for {$days} {$booking_period_f}(s):</strong> " . amt($price * $days) . "</p>
                        </td>
                    </tr>
                </table>
            </div>

            <p>We hope this quote meets your requirements. If you have any questions or would like to proceed with booking, please visit our website or contact our customer service team.</p>

            <p>Thank you for choosing $site_name!</p>
        ";

        Mail::to($email)->send(new \App\Mail\SendMessage($data));

        return redirect()->back()->with('success', 'Quote has been sent to your email address.');
    }


    public function home(){
        if(settings('enable_frontpage') != 'yes'){
            return redirect()->route('admin.dashboard');
        }
        $page = Page::where('path','/')->firstOrFail();
        $contents = $page->contents;
//        if(strlen($contents) < 300){
//            return view('frontpage.builder', compact('contents','page'));
//        }
        return view('frontpage.page', compact('contents','page'));
    }

    public function builder(){
        return view('frontpage.home');
    }
  public function token(Request $request){
      if ($request->has('token')) {
          $token = $request->input('token');

          $tk = PersonalAccessToken::findToken($token);

          if ($tk) {
                $user = $tk->tokenable()->first();
              auth()->login($user);
          }
          return $user;
      }
      return 'not found';
    }

    public function manageBooking(){
        return view('frontpage.search_booking');
    }

    public function searchBooking(Request $request){
        $email = $request->input('email');
        $reference = $request->input('reference');

        $booking = Booking::where('reference',$reference)->first();
        if(!$booking){
            return redirect()->back()->withInput()->with('error',"Can't find any booking record with the provided reference number");
        }
        $user = User::find($booking->customer_id);
        if(!$user || $user?->email != $email){
            return redirect()->back()->withInput()->with('error','Invalid booking email address');
        }

        return redirect()->route('booking',['id' => $booking->id]);

    }

    public function booking($id){
        $booking = Booking::findOrFail($id);

        if(!$booking->car){
            return redirect()->back()->with('error','Invalid booking');
        }

        return view('frontpage.booking_detail', compact('booking'));
    }

    public function voucher($id){
        $booking = Booking::findOrFail($id);
        return view('frontpage.booking_voucher', compact('booking'));
    }

    public function cancelBooking(Request $request, $id){
        $booking = Booking::findOrFail($id);

        if($booking->car->free_cancellation){
            $diffNeeded = 24;
        } else {
            $diffNeeded = $booking->car->cancellation_policy;
        }

        $diff = Carbon::parse($booking->pick_up_date . ' ' . $booking->pick_up_time . ':00')->diffInHours(now());
        $fullRefund = $diff > $diffNeeded;

        if($booking->car->cancellation_policy == 0){
            $fullRefund = false;
        }

        if(!$booking->cancelled && $request->isMethod('post') && $fullRefund){
            $booking->cancelled = 1;
            $booking->cancelled_by = 'customer';
            $booking->cancellation_reason = $request->input('cancel_comment', $request->input('cancel_reason'));
            $booking->save();

            $notificationService = new NotificationService();

            $admins = User::role('admin')->get();
            foreach($admins as $admin){
                $notificationService->notify('A Booking Cancellation Requested for booking ('.$booking->reference.')','notification','Booking Cancellation Requested', $admin);
            }

            return redirect()->back()->with('success','Booking cancelled successfully');
        }

        return view('frontpage.booking_cancel', compact('booking'));
    }

    public function builder2(){
        return view('frontpage.builder');
    }
    public function list(){
        return view('frontpage.list_cars');
    }

    public function flight(){
        return view('frontpage.flight');
    }

    public function deal(Request $request){
        $id = $request->get('car_id');
        $car = Car::findOrFail($id);

        Cache::remember('viewed_car-' . $car->id . '-' . str_replace('.', '', $request->ip()), 60 * 60, function() {
            return 1;
        });

        $booking_day = $request->get('booking_day');

        if(is_int($booking_day / 30)){
            $divideBy = 30;
            $booking_period = 'month';
            $price = $car->monthly_rate;
        } elseif(is_int($booking_day / 7)){
            $divideBy = 7;
            $booking_period = 'week';
            $price = $car->weekly_rate;
        } else {
            $divideBy = 1;
            $booking_period = 'day';
            $price = $car->daily_rate;
        }

        $car->booking_day = $booking_day / $divideBy;
        $car->booking_period = $booking_period;
        $car->price = $price;
        $car->total0 = $price * $car->booking_day;
        $car->tax = 0;//$car->total0 * settings('tax',0.075);
        $car->total = $car->total0 + $car->tax;

        $insurance_fee = 0;
        foreach($car->insurance_coverage as $coverage){
            $insurance_fee += $coverage['daily_price'] * $booking_day;
        }
        $car->insurance_fee = $insurance_fee;

        return view('frontpage.deal', compact('car'));
    }

    public function protectionOption(Request $request){
        $id = $request->get('car_id');
        $car = Car::findOrFail($id);

        $booking_day = $request->get('booking_day');

        if(is_int($booking_day / 30)){
            $divideBy = 30;
            $booking_period = 'month';
            $price = $car->monthly_rate;
        } elseif(is_int($booking_day / 7)){
            $divideBy = 7;
            $booking_period = 'week';
            $price = $car->weekly_rate;
        } else {
            $divideBy = 1;
            $booking_period = 'day';
            $price = $car->daily_rate;
        }

        $car->booking_day = $booking_day / $divideBy;
        $car->booking_period = $booking_period;
        $car->price = $price;
        $car->total0 = $price * $car->booking_day;
        $car->tax = 0;//$car->total0 * settings('tax',0.075);
        $car->total = $car->total0 + $car->tax;

        $insurance_fee = 0;
        foreach($car->insurance_coverage as $index => $coverage){
            if($request->get('insurance_id') == $index){
                $insurance_fee = $coverage['daily_price'] * $booking_day;
                break;
            }
        }
        $car->insurance_fee = $insurance_fee;

        $extras = $request->get('extras');
        $extra_fee = 0;
        $extra_fee_list = [];
        foreach($extras as $index => $extra){
            if(!isset($car->extras[$index]) || $extra == 0){
                continue;
            }

            if($car->extras[$index]['interval'] == 'daily'){
                $amt = $car->extras[$index]['price'] * $extra * $booking_day * $divideBy;
            }elseif($car->extras[$index]['interval'] == 'weekly'){
                $amt = $car->extras[$index]['price'] * $extra * $booking_day * $divideBy / 7;
            }elseif($car->extras[$index]['interval'] == 'monthly'){
                $amt = $car->extras[$index]['price'] * $extra * $booking_day * $divideBy / 30;
            } else {
                $amt = $car->extras[$index]['price'] * $extra;
            }

            $extra_fee += $amt;
            $extra_fee_list[] = ['name' => $car->extras[$index]['title'], 'amount' => $amt];
        }

        $car->extra_fees = $extra_fee_list;
        $car->total += $extra_fee;

        if($request->get('book_type') == 'with_full_protection'){
            $car->total += $car->insurance_fee;
        }

        return view('frontpage.protection_options', compact('car'));
    }

    public function checkout(Request $request){
        $id = $request->get('car_id');
        $car = Car::findOrFail($id);
        
        if(auth()->check()){
            $user = auth()->user();
        }else{
            $user = null;
        }
        
        $booking_day = $request->get('booking_day');

        if(is_int($booking_day / 30)){
            $divideBy = 30;
            $booking_period = 'month';
            $price = $car->monthly_rate;
        } elseif(is_int($booking_day / 7)){
            $divideBy = 7;
            $booking_period = 'week';
            $price = $car->weekly_rate;
        } else {
            $divideBy = 1;
            $booking_period = 'day';
            $price = $car->daily_rate;
        }

        $car->booking_day = $booking_day / $divideBy;
        $car->booking_period = $booking_period;
        $car->price = $price;
        $car->total0 = $price * $car->booking_day;
        $car->tax = 0;//$car->total0 * settings('tax',0.075);
        $car->total = $car->total0 + $car->tax;

        $insurance_fee = 0;
        foreach($car->insurance_coverage as $index => $coverage){
            if($request->get('insurance_id') == $index){
                $insurance_fee = $coverage['daily_price'] * $booking_day;
                break;
            }
        }
        $car->insurance_fee = $insurance_fee;

        $extras = $request->get('extras');
        $extra_fee = 0;
        $extra_fee_list = [];
        foreach($extras as $index => $extra){
            if(!isset($car->extras[$index]) || $extra == 0){
                continue;
            }

            if($car->extras[$index]['interval'] == 'daily'){
                $amt = $car->extras[$index]['price'] * $extra * $booking_day * $divideBy;
            }elseif($car->extras[$index]['interval'] == 'weekly'){
                $amt = $car->extras[$index]['price'] * $extra * $booking_day * $divideBy / 7;
            }elseif($car->extras[$index]['interval'] == 'monthly'){
                $amt = $car->extras[$index]['price'] * $extra * $booking_day * $divideBy / 30;
            } else {
                $amt = $car->extras[$index]['price'] * $extra;
            }

            $extra_fee += $amt;
            $extra_fee_list[] = ['name' => $car->extras[$index]['title'], 'amount' => $amt];
        }

        $car->extra_fees = $extra_fee_list;
        $car->total += $extra_fee;
        
        if($request->get('book_type') == 'with_full_protection'){
            $car->total += $car->insurance_fee;
        }

        return view('frontpage.checkout', compact('car','user'));
    }

    public function select_payment_method($booking_id){
        $booking = Booking::findOrFail($booking_id);
        return view('frontpage.select_payment_method', compact('booking'));
    }

    public function paymentProcess(Request $request, PaymentService $paymentService){
        $payment_method = $request->get('payment_method');
        $booking_id = $request->get('booking_id');

        if(!in_array($payment_method, payment_methods())){
            return redirect()->back()->with('error', 'Payment method not active');
        }
        $booking = Booking::findOrFail($booking_id);

        $request->session()->put('payment_type', 'booking_payment');
        $request->session()->put('booking_id', $booking->id);

        return $paymentService->process($payment_method);
    }

    public function search(Request $request){
        return view('frontpage.list_cars');
        return $request->all();
    }

    public function page($slug){
        $page = Page::where('path',$slug)->firstOrFail();
        $contents = $page->contents;
        return view('frontpage.page', compact('contents','page'));
    }

    public function privateHireList(Request $request){
        $carTypes = VehicleType::where('is_active', 1)->get();
        $cars = Car::where('is_available', 1)
            ->where('private_hire', 1)
            ->when($request->get('car_types'), function ($query) use ($request) {
                $query->whereIn('type', $request->get('car_types'));
            })
            ->when($request->get('renting_terms'), function ($query) use ($request) {
                foreach($request->get('renting_terms') as $term){
                    $query->orWhere($term, 1);
                }
            })
            ->when($request->get('max_weekly_rent'), function ($query) use ($request) {
                $query->where('weekly_rate', '>=', $request->get('max_weekly_rent'));
            })
            ->when($request->get('councils'), function ($query) use ($request) {
                $query->whereIn('licensing_authority', $request->get('councils'));
            })
            ->when($request->get('features'), function ($query) use ($request) {
                $featuresToSearch = $request->get('features');
                $query->where(function ($query) use ($featuresToSearch) {
                    foreach ($featuresToSearch as $feature) {
                        $query->where($feature, 1);
                    }
                });
            })
            ->when($request->get('order'), function ($query) use ($request) {
                $query->orderBy($request->get('order'), $request->get('order_dir', 'asc'));
            })
            ->get();
        
        return view('frontpage.private_hire.list', compact('carTypes', 'cars'));
    }

    public function privateHireSingle($id){
        $car = Car::where('is_available', 1)
            ->where('private_hire', 1)
            ->where('id', $id)
            ->firstOrFail();

        return view('frontpage.private_hire.single', compact('car'));
    }

    public function privateHireExtras(Request $request, $id){
        $car = Car::where('is_available', 1)
            ->where('private_hire', 1)
            ->where('id', $id)
            ->firstOrFail();

        $query = $request->all();
        return view('frontpage.private_hire.extras', compact('query', 'car'));
    }

    public function privateHireCheckout(Request $request, $id){
        $car = Car::where('is_available', 1)
            ->where('private_hire', 1)
            ->where('id', $id)
            ->firstOrFail();

        $query = $request->all();
        $query['start_date'] = \Carbon\Carbon::parse($query['start_date']);
        $query['end_date'] = \Carbon\Carbon::parse($query['start_date']);

        switch($query['hire_option']){
            case 'rent_to_buy':
                $deposit = $car->rent_to_buy_deposit_amount ?? 0;
                $excess = $car->rent_to_buy_excess_mileage_rate ?? 0;
                $query['end_date']->addMonths($query['term']);
                $period = 'month';
                $term = $query['term'];
                $rate = $car->rent_to_buy_price_per_cycle;
                $cycle = $car->rent_to_buy_billing_cycle;
                break;

            case 'long_term':
                $deposit = $car->long_term_default_deposit ?? 0;
                $excess = $car->long_term_prices[$query['term']]['excess_rate'] ?? 0;
                $term = str_replace('m', '', $query['term']);
                $query['end_date']->addMonths($term);
                $period = 'month';
                $cycle = $car->long_term_billing_cycle;
                $rate = $car->long_term_prices[$query['term']][
                    $query['insurance'] == 'w' ? 'weekly_price_w_ins' : 'weekly_price_wo_ins'
                ];

                break;
            case 'short_term':
                $deposit = $car->short_term_deposit;
                $excess = $car->short_term_excess_liability;
                $term = $query['term'];
                $query['end_date']->addWeeks($query['term']);
                $period = 'week';
                $cycle = $car->short_term_pricing_cadence;
                if($query['insurance'] == 'w'){
                    $rate = $car->short_term_weekly_price_w_ins;
                } else {
                    $rate = $car->short_term_weekly_price_wo_ins;
                }

                break;
        }

        $query['end_date'] = $query['end_date'];

        if($request->method() == 'POST'){
            
        }

        return view('frontpage.private_hire.checkout', compact('query', 'car', 'deposit', 'excess', 'period', 'rate', 'cycle', 'term'));
    }

    public function lastStageAuth(Request $request){
        if($request->get('type') == 'login'){
            $rules = [
                'email' => 'required|email|exists:users,email',
                'password' => 'required',
            ];
        } else if($request->get('type') == 'register') {
            $rules = [
                'first_name' => 'required',
                'last_name' => 'required',
                'email' => 'required|email|unique:users,email',
                'phone' => 'required',
                'password' => 'required|min:6|confirmed',
                'address' => 'required',
                'zip' => 'required',
                'city' => 'required',
                'country' => 'required',
            ];
        } else if($request->get('type') == 'verify_otp') {
            $rules = [
                'email' => 'required|email|exists:users,email',
                'otp' => 'required',
            ];
        }

        $validator = Validator::make($request->all(), $rules);

        if($validator->fails()){
            return response()->json([
                'status' => 0,
                'message' => $validator->errors()->first(),
            ]);
        }

        if($request->get('type') == 'login'){
            if(Auth::attempt(['email' => $request->email, 'password' => $request->password])){
                return response()->json([
                    'status' => 1,
                    'message' => 'User successfully logged in',
                ]);
            } else {
                return response()->json([
                    'status' => 0,
                    'message' => 'Invalid credentials',
                ]);
            }
        } else if($request->get('type') == 'register') {
            $otp = rand(100000, 999999);

            $user = User::create([
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'email' => $request->email,
                'phone' => $request->phone,
                'password' => Hash::make($request->password),
                'address' => $request->address,
                'postcode' => $request->zip,
                'city' => $request->city,
                'country' => $request->country,
                'email_otp' => $otp,
                'email_otp_expires_at' => now()->addMinutes(10),
            ]);

            $role = Role::where('name', 'rider')->first();
            $user->addRole($role);

            session()->put('verify_otp', [
                'email' => $user->email,
                'otp' => $otp,
            ]);

            Mail::to($user->email)->send(new EmailOtpMail($otp));

            return response()->json([
                'status' => 1,
                'verify' => true,
                'email' => $user->email,
                'message' => 'An OTP has been sent to your email address',
            ]);
        } else if($request->get('type') == 'verify_otp') {
            if(session()->has('verify_otp')){
                $otpData = session()->get('verify_otp');

                if($otpData['otp'] != $request->otp || $otpData['email'] != $request->email){
                    return response()->json([
                        'status' => 0,
                        'message' => 'Invalid OTP',
                    ]);
                } else {
                    $user = User::where('email', $otpData['email'])->first();
                    $user->email_otp = null;
                    $user->email_otp_expires_at = null;
                    $user->email_verified_at = now();
                    $user->save();

                    session()->forget('verify_otp');

                    Auth::login($user);

                    return response()->json([
                        'status' => 1,
                        'message' => 'User successfully logged in',
                    ]);
                }
            } else {
                return response()->json([
                    'status' => 0,
                    'message' => 'Please register first.',
                ]);
            }
        }
    }

    public function addressGet(){
        if(!Auth::check()){
            return response()->json([
                'status' => 0,
                'message' => 'User not authenticated',
            ]);
        }
        
        $user = Auth::user();

        $address = [
            'status' => 1,
            'name' => $user->first_name . ' ' . $user->last_name,
            'address' => $user->address,
            'city' => $user->city,
            'zip' => $user->postcode,
            'country' => $user->country,
        ];

        return response()->json($address);
    }

    public function chauffeurSearch(){
        $pickupLocations = Region::where('is_active', 1)->orderBy('name', 'asc')->get();
        return view('frontpage.chauffeur.search', compact('pickupLocations'));
    }

    public function chauffeurList(Request $request){
        $query = $request->all();
        $cars = Car::where('is_available', 1)->whereNotNull('driver->name')
            ->when($request->has('type'), function($q) use ($request) {
                $q->where('type', $request->get('type'));
            })
            ->paginate(10);
        $carTypes = VehicleType::where('is_active', 1)->get();
        return view('frontpage.chauffeur.list', compact('query', 'cars', 'carTypes'));
    }

    public function chauffeurSingle($id){
        return view('frontpage.chauffeur.single');
    }

    public function chauffeurExtras($id){
        return view('frontpage.chauffeur.extras');
    }

    public function chauffeurCheckout($id){
        return view('frontpage.chauffeur.checkout');
    }
}
