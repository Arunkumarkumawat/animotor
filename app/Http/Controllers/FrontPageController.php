<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Car;
use App\Models\Page;
use App\Models\User;
use App\Services\PaymentService;
use App\Services\WalletService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Laravel\Sanctum\PersonalAccessToken;

class FrontPageController extends Controller
{


//    public function __construct()
//    {
////        if (env('disable_front', false)) {
//            return redirect('/admin/dashboard');
////        }
//    }

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
        $car->tax = $car->total0 * settings('tax',0.075);
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
        $car->tax = $car->total0 * settings('tax',0.075);
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
            if(!isset($car->extras[$index])){
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
        $car->tax = $car->total0 * settings('tax',0.075);
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
            if(!isset($car->extras[$index])){
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
}
