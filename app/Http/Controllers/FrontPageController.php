<?php

namespace App\Http\Controllers;

use Stripe\Charge;
use Stripe\Stripe;
use App\Models\Car;
use App\Models\Page;
use App\Models\Role;
use App\Models\User;
use App\Models\Region;
use App\Models\Booking;
use App\Models\CBooking;
use App\Models\PhBooking;
use App\Mail\EmailOtpMail;
use App\Models\VehicleType;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Services\WalletService;
use App\Mail\ChBookingRequested;
use App\Mail\PhBookingConfirmed;
use App\Services\PaymentService;
use App\Models\InsuranceCoverage;
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

        switch ($booking_period) {
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


    public function home()
    {
        if (settings('enable_frontpage') != 'yes') {
            return redirect()->route('admin.dashboard');
        }

        return view('frontpage.home');
    }

    public function builder()
    {
        return view('frontpage.home');
    }
    public function token(Request $request)
    {
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

    public function manageBooking()
    {
        return view('frontpage.search_booking');
    }

    public function searchBooking(Request $request)
    {
        $email = $request->input('email');
        $reference = $request->input('reference');

        $booking = Booking::where('reference', $reference)->first();
        if (!$booking) {
            return redirect()->back()->withInput()->with('error', "Can't find any booking record with the provided reference number");
        }
        $user = User::find($booking->customer_id);
        if (!$user || $user?->email != $email) {
            return redirect()->back()->withInput()->with('error', 'Invalid booking email address');
        }

        return redirect()->route('booking', ['id' => $booking->id]);
    }

    public function booking($id)
    {
        $booking = Booking::findOrFail($id);

        if (!$booking->car) {
            return redirect()->back()->with('error', 'Invalid booking');
        }

        return view('frontpage.booking_detail', compact('booking'));
    }

    public function voucher($id)
    {
        $booking = Booking::findOrFail($id);
        return view('frontpage.booking_voucher', compact('booking'));
    }

    public function cancelBooking(Request $request, $id)
    {
        $booking = Booking::findOrFail($id);

        if ($booking->car->free_cancellation) {
            $diffNeeded = 24;
        } else {
            $diffNeeded = $booking->car->cancellation_policy;
        }

        $diff = Carbon::parse($booking->pick_up_date . ' ' . $booking->pick_up_time . ':00')->diffInHours(now());
        $fullRefund = $diff > $diffNeeded;

        if ($booking->car->cancellation_policy == 0) {
            $fullRefund = false;
        }

        if (!$booking->cancelled && $request->isMethod('post') && $fullRefund) {
            $booking->cancelled = 1;
            $booking->cancelled_by = 'customer';
            $booking->cancellation_reason = $request->input('cancel_comment', $request->input('cancel_reason'));
            $booking->save();

            $notificationService = new NotificationService();

            $admins = User::role('admin')->get();
            foreach ($admins as $admin) {
                $notificationService->notify('A Booking Cancellation Requested for booking (' . $booking->reference . ')', 'notification', 'Booking Cancellation Requested', $admin);
            }

            return redirect()->back()->with('success', 'Booking cancelled successfully');
        }

        return view('frontpage.booking_cancel', compact('booking'));
    }

    public function builder2()
    {
        return view('frontpage.builder');
    }
    public function list()
    {
        return view('frontpage.list_cars');
    }

    public function flight()
    {
        return view('frontpage.flight');
    }

    public function deal(Request $request)
    {
        $id = $request->get('car_id');
        $car = Car::findOrFail($id);

        Cache::remember('viewed_car-' . $car->id . '-' . str_replace('.', '', $request->ip()), 60 * 60, function () {
            return 1;
        });

        $booking_day = $request->get('booking_day');

        if (is_int($booking_day / 30)) {
            $divideBy = 30;
            $booking_period = 'month';
            $price = $car->monthly_rate;
        } elseif (is_int($booking_day / 7)) {
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
        $car->tax = 0; //$car->total0 * settings('tax',0.075);
        $car->total = $car->total0 + $car->tax;

        return view('frontpage.deal', compact('car'));
    }

    public function protectionOption(Request $request)
    {
        $id = $request->get('car_id');
        $car = Car::findOrFail($id);

        $booking_day = $request->get('booking_day');

        if (is_int($booking_day / 30)) {
            $divideBy = 30;
            $booking_period = 'month';
            $price = $car->monthly_rate;
        } elseif (is_int($booking_day / 7)) {
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
        $car->tax = 0; //$car->total0 * settings('tax',0.075);
        $car->total = $car->total0 + $car->tax;

        $extras = $request->get('extras');
        $extra_fee = 0;
        $extra_fee_list = [];
        foreach ($extras as $index => $extra) {
            if (!isset($car->extras[$index]) || $extra == 0) {
                continue;
            }

            if ($car->extras[$index]['interval'] == 'daily') {
                $amt = $car->extras[$index]['price'] * $extra * $booking_day * $divideBy;
            } elseif ($car->extras[$index]['interval'] == 'weekly') {
                $amt = $car->extras[$index]['price'] * $extra * $booking_day * $divideBy / 7;
            } elseif ($car->extras[$index]['interval'] == 'monthly') {
                $amt = $car->extras[$index]['price'] * $extra * $booking_day * $divideBy / 30;
            } else {
                $amt = $car->extras[$index]['price'] * $extra;
            }

            $extra_fee += $amt;
            $extra_fee_list[] = ['name' => $car->extras[$index]['title'], 'amount' => $amt];
        }

        $car->extra_fees = $extra_fee_list;
        $car->total += $extra_fee;

        if ($request->get('book_type') == 'with_full_protection') {
            $car->total += $car->insurance_fee;
        }

        return view('frontpage.protection_options', compact('car'));
    }

    public function checkout(Request $request)
    {
        $id = $request->get('car_id');
        $car = Car::findOrFail($id);

        if (auth()->check()) {
            $user = auth()->user();
        } else {
            $user = null;
        }

        $booking_day = $request->get('booking_day');

        if (is_int($booking_day / 30)) {
            $divideBy = 30;
            $booking_period = 'month';
            $price = $car->monthly_rate;
        } elseif (is_int($booking_day / 7)) {
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
        $car->tax = 0; //$car->total0 * settings('tax',0.075);
        $car->total = $car->total0 + $car->tax;

        $insurance_fee = 0;
        foreach ($car->insurance_coverage as $index => $coverage) {
            if ($request->get('insurance_id') == $index) {
                $policy = InsuranceCoverage::where('id', $coverage['policy_id'])->first();
                $insurance_fee = ($coverage['daily_price'] ? $coverage['daily_price'] : $policy->daily_rate) * $booking_day;
                break;
            }
        }
        $car->insurance_fee = $insurance_fee;

        $extras = $request->get('extras');
        $extra_fee = 0;
        $extra_fee_list = [];
        foreach ($extras as $index => $extra) {
            if (!isset($car->extras[$index]) || $extra == 0) {
                continue;
            }

            if ($car->extras[$index]['interval'] == 'daily') {
                $amt = $car->extras[$index]['price'] * $extra * $booking_day * $divideBy;
            } elseif ($car->extras[$index]['interval'] == 'weekly') {
                $amt = $car->extras[$index]['price'] * $extra * $booking_day * $divideBy / 7;
            } elseif ($car->extras[$index]['interval'] == 'monthly') {
                $amt = $car->extras[$index]['price'] * $extra * $booking_day * $divideBy / 30;
            } else {
                $amt = $car->extras[$index]['price'] * $extra;
            }

            $extra_fee += $amt;
            $extra_fee_list[] = ['name' => $car->extras[$index]['title'], 'amount' => $amt];
        }

        $car->extra_fees = $extra_fee_list;
        $car->total += $extra_fee;

        if ($request->get('book_type') == 'with_full_protection') {
            $car->total += $car->insurance_fee;
        }

        return view('frontpage.checkout', compact('car', 'user'));
    }

    public function select_payment_method($booking_id)
    {
        $booking = Booking::findOrFail($booking_id);
        return view('frontpage.select_payment_method', compact('booking'));
    }

    public function paymentProcess(Request $request, PaymentService $paymentService)
    {
        $payment_method = $request->get('payment_method');
        $booking_id = $request->get('booking_id');

        if (!in_array($payment_method, payment_methods())) {
            return redirect()->back()->with('error', 'Payment method not active');
        }
        $booking = Booking::findOrFail($booking_id);

        $request->session()->put('payment_type', 'booking_payment');
        $request->session()->put('booking_id', $booking->id);

        return $paymentService->process($payment_method);
    }

    public function search(Request $request)
    {
        return view('frontpage.list_cars');
        return $request->all();
    }

    public function page($slug)
    {
        $page = Page::where('path', $slug)->firstOrFail();
        $contents = $page->contents;
        return view('frontpage.page', compact('contents', 'page'));
    }

    public function privateHireList(Request $request)
    {
        $carTypes = VehicleType::where('is_active', 1)->get();
        $cars = Car::where('is_available', 1)
            ->where('private_hire', 1)
            ->when($request->get('car_types'), function ($query) use ($request) {
                $query->whereIn('type', $request->get('car_types'));
            })
            ->when($request->get('transmission'), function ($query) use ($request) {
                $query->whereIn('transmission', $request->get('transmission'));
            })
            ->when($request->get('fuel_type'), function($query) use ($request) {
                $query->whereIn('fuel_type', $request->get('fuel_type'));
            })
            ->when($request->get('renting_terms'), function ($query) use ($request) {
                foreach ($request->get('renting_terms') as $term) {
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
            ->when($request->get('sort_by', 'Recommended'), function ($query) use ($request) {
                switch($request->get('sort_by','Recommended')){
                    case 'Best rated':
                        $query->orderBy('created_at', 'ASC');
                        break;
                    case 'Recommended':
                        $query->orderBy('created_at', 'DESC');
                        break;
                    case 'Price (low to high)':
                        $query->orderBy('weekly_rate', 'ASC');
                        break;
                    case 'Price (high to low)':
                        $query->orderBy('weekly_rate', 'DESC');
                        break;
                }
            })
            ->get();

        return view('frontpage.private_hire.list', compact('carTypes', 'cars'));
    }

    public function privateHireListAlt(Request $request)
    {
        $carTypes = VehicleType::where('is_active', 1)->get();

        $cars = Car::where('is_available', 1)
            ->where('private_hire', 1)
            ->when($request->get('car_types'), function ($query) use ($request) {
                $query->whereIn('type', $request->get('car_types'));
            })
            ->when($request->get('transmission'), function ($query) use ($request) {
                $query->whereIn('gear', $request->get('transmission'));
            })
            ->when($request->get('fuel_types'), function($query) use ($request) {
                $query->whereIn('fuel_type', $request->get('fuel_types'));
            })
            ->when($request->get('renting_terms'), function ($query) use ($request) {
                foreach ($request->get('renting_terms') as $term) {
                    $query->orWhere($term, 1);
                }
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
            ->when($request->get('max_weekly_rent'), function ($query) use ($request) {
                $query->where('weekly_rate', '>=', $request->get('max_weekly_rent'));
            })
            ->when($request->get('sort_by', 'Recommended'), function ($query) use ($request) {
                switch($request->get('sort_by','Recommended')){
                    case 'Best rated':
                        $query->orderBy('created_at', 'ASC');
                        break;
                    case 'Recommended':
                        $query->orderBy('created_at', 'DESC');
                        break;
                    case 'Price (low to high)':
                        $query->orderBy('weekly_rate', 'ASC');
                        break;
                    case 'Price (high to low)':
                        $query->orderBy('weekly_rate', 'DESC');
                        break;
                }
            })
            ->get();

        return view('frontpage.private_hire.list2', compact('carTypes', 'cars'));
    }

    public function privateHireSingle($id)
    {
        $car = Car::where('is_available', 1)
            ->where('private_hire', 1)
            ->where('id', $id)
            ->firstOrFail();

        return view('frontpage.private_hire.single', compact('car'));
    }

    public function privateHireExtras(Request $request, $id)
    {
        $car = Car::where('is_available', 1)
            ->where('private_hire', 1)
            ->where('id', $id)
            ->firstOrFail();

        $query = $request->all();
        return view('frontpage.private_hire.extras', compact('query', 'car'));
    }

    public function privateHireCheckout(Request $request, $id)
    {
        $car = Car::where('is_available', 1)
            ->where('private_hire', 1)
            ->where('id', $id)
            ->firstOrFail();

        $query = $request->all();
        $query['start_date'] = \Carbon\Carbon::parse($query['start_date']);
        $query['end_date'] = \Carbon\Carbon::parse($query['start_date']);

        switch ($query['hire_option']) {
            case 'rent_to_buy':
                $deposit = $car->rent_to_buy_deposit_amount ?? 0;
                $excess = $car->rent_to_buy_excess_mileage_rate ?? 0;
                $query['end_date']->addMonths($query['term']);
                $period = 'week';
                $term = $query['term'];
                $rate = $car->rent_to_buy_price_per_cycle;
                $cycle = $car->rent_to_buy_billing_cycle ?? 'weekly';

                $calcTerm = $term;

                if ($cycle == 'weekly') {
                    $calcTerm = $term;
                } else if ($cycle == 'monthly') {
                    $calcTerm = $term * 4.34524;
                } else if ($cycle == 'quarterly') {
                    $calcTerm = $term * 13.0357;
                }

                $currPricingData = [
                    'deposit' => $deposit,
                    'rate' => $rate,
                    'cycle' => $cycle,
                    'balloon_payment' => $car->rent_to_buy_balloon_payment ?? 0,
                    'payment_break_weeks_year' => $car->rent_to_buy_payment_break_weeks_year ?? 0,
                    'mileage_allowance_per_cycle' => $car->rent_to_buy_mileage_allowance_per_cycle ?? 0,
                    'excess_mileage_rate' => $car->rent_to_buy_excess_mileage_rate ?? 0,
                    'insurance_included' => $car->rent_to_buy_insurance_included ?? 0,
                    'maintenance_included' => $car->rent_to_buy_maintenance_included ?? 0,
                    'ev_incentive_included' => $car->rent_to_buy_ev_incentive_included ?? 0,
                    'ownership_transfer_notes' => $car->rent_to_buy_ownership_transfer_notes ?? '',
                ];

                break;

            case 'long_term':
                $long_term_term_prices = $car->long_term_prices[$query['term']];
                $deposit = $car->long_term_default_deposit ?? 0;
                $excess = $long_term_term_prices['excess_rate'] ?? 0;
                $term = str_replace('m', '', $query['term']);
                $query['end_date']->addMonths($term);
                $period = 'month';
                $cycle = $car->long_term_billing_cycle ?? 'weekly';
                $rate = $car->long_term_prices[$query['term']][$query['insurance'] == 'w' ? 'price_w_ins' : 'price_wo_ins'];

                $calcTerm = $term;

                if ($cycle == 'weekly') {
                    $calcTerm = $term * 4.34524;
                } else if ($cycle == 'monthly') {
                    $calcTerm = $term;
                } else if ($cycle == 'quarterly') {
                    $calcTerm = $term / 3;
                }

                $currPricingData = [
                    'deposit' => $deposit,
                    'rate' => $rate,
                    'cycle' => $cycle,
                    'maintenance_included' => $long_term_term_prices['maintenance_included'] ?? 0,
                    'maintenance_type' => $long_term_term_prices['maintenance_type'] ?? '',
                    'maintenance_price' => $long_term_term_prices['maintenance_price'] ?? 0,
                    'mileage' => $long_term_term_prices['mileage'] ?? 0,
                    'excess_rate' => $long_term_term_prices['excess_rate'] ?? 0,
                    'excess_liability' => $car->long_term_excess_liability ?? 0,
                    'vehicle_swap_allowed' => $car->long_term_vehicle_swap_allowed ?? 0,
                    'early_termination_rules' => $car->long_term_early_termination_rules ?? '',
                ];

                break;
            case 'short_term':
                $deposit = $car->short_term_deposit;
                $excess = $car->short_term_excess_liability;
                $term = $query['term'];
                $query['end_date']->addWeeks($query['term']);
                $period = 'week';
                $cycle = $car->short_term_pricing_cadence ?? 'weekly';
                if ($query['insurance'] == 'w') {
                    $rate = $car->short_term_weekly_price_w_ins;
                } else {
                    $rate = $car->short_term_weekly_price_wo_ins;
                }

                $calcTerm = $term;

                $currPricingData = [
                    'deposit' => $deposit,
                    'rate' => $rate,
                    'cycle' => $cycle,
                    'maintenance_included' => $car->short_term_maintenance_included ?? 0,
                    'excess_liability' => $car->short_term_excess_liability ?? 0,
                    'early_return_fee' => $car->short_term_early_return_fee ?? 0,
                    'notice_period_to_return' => $car->short_term_notice_period_to_return,
                ];

                break;
        }

        $extrasPrice = 0;


        $daysPerCycle = match ($cycle) {
            'weekly' => 7,
            'monthly' => 30,
            'quaterly' => 90,
        };

        $extras = $query['extras'] ?? [];

        foreach ($extras as $index => $quantity) {
            if (isset($car->extras[$index])) {
                $extra = $car->extras[$index];
                $extra['quantity'] = $quantity;
                $extras[] = $extra;

                if ($extra['interval'] == 'daily') {
                    $extrasPrice += ($extra['price'] * $daysPerCycle * $quantity);
                } else if ($extra['interval'] == 'weekly') {
                    $extrasPrice += ($extra['price'] * $daysPerCycle * $quantity) / 7;
                } else { // one time
                    $extrasPrice += $extra['price'] * $quantity;
                }
            }
        }

        $extrasPrice = round($extrasPrice, 2);

        if ($request->method() == 'POST') {
            return $this->phBookingProcessor([
                'user_id' => Auth::id(),
                'car_id' => $car->id,
                'term' => $query['hire_option'],
                'insurance' => $query['insurance'],
                'term_count' => $term,
                'term_period' => $period,
                'start_date' => $query['start_date'],
                'expected_end_date' => $query['end_date'],
                'extras' => $extras,
                'curr_pricing_data' => $currPricingData,
                'deposit_paid' => $deposit,
                'rate_paid' => $rate,
                'extras_paid' => $extrasPrice,
                'total_paid' => $deposit + $rate + $extrasPrice,
            ], $query['payment_token']);
        }

        return view('frontpage.private_hire.checkout', compact('query', 'car', 'deposit', 'excess', 'period', 'rate', 'extrasPrice', 'cycle', 'term'));
    }

    protected function phBookingProcessor($data, $paymentToken)
    {
        if (!Auth::check()) {
            return response()->json([
                'status' => 0,
                'message' => 'User not logged in',
            ]);
        }

        if (!isset($data['term']) || !in_array($data['term'], ['rent_to_buy', 'long_term', 'short_term'])) {
            return response()->json([
                'status' => 0,
                'message' => 'Invalid hire option',
            ]);
        }

        $rules = [
            'term' => 'required',
            'insurance' => 'required',
            'start_date' => 'required',
        ];

        $validator = Validator::make($data, $rules);

        if ($validator->fails()) {
            return response()->json([
                'status' => 0,
                'message' => $validator->errors()->first(),
            ]);
        }

        $data['id'] = Str::uuid();

        $booking = PhBooking::create($data);
        Stripe::setApiKey(env('STRIPE_SECRET_KEY'));

        try {
            $charge = Charge::create([
                'amount' => $data['total_paid'] * 100,
                'currency' => settings('currency_code', 'USD'),
                'source' => $paymentToken,
                'description' => 'Order ' . $booking->booking_id,
                'metadata' => [
                    'booking_id' => $booking->booking_id,
                    'user_id' => $booking->user_id ? $booking->user_id : '',
                ],
            ]);

            $booking->update([
                'pg_tx_id' => $charge->id,
                'pg_status' => 'Paid',
                'paid_at' => now(),
            ]);

            Mail::to($booking->user->email)->send(new PhBookingConfirmed($booking));

            return response()->json([
                'status' => true,
                'message' => 'Payment method has been successfully charged.',
                'redirect_url' => url('/'),
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => false,
                'message' => $e->getMessage(),
                'csrf_token' => csrf_token(),
            ]);
        }
    }

    public function lastStageAuth(Request $request)
    {
        if ($request->get('type') == 'login') {
            $rules = [
                'email' => 'required|email|exists:users,email',
                'password' => 'required',
            ];
        } else if ($request->get('type') == 'register') {
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
        } else if ($request->get('type') == 'verify_otp') {
            $rules = [
                'email' => 'required|email|exists:users,email',
                'otp' => 'required',
            ];
        }

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return response()->json([
                'status' => 0,
                'message' => $validator->errors()->first(),
            ]);
        }

        if ($request->get('type') == 'login') {
            if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
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
        } else if ($request->get('type') == 'register') {
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
        } else if ($request->get('type') == 'verify_otp') {
            if (session()->has('verify_otp')) {
                $otpData = session()->get('verify_otp');

                if ($otpData['otp'] != $request->otp || $otpData['email'] != $request->email) {
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

    public function addressGet()
    {
        if (!Auth::check()) {
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

    public function chauffeurSearch()
    {
        $pickupLocations = Region::where('is_active', 1)->orderBy('name', 'asc')->get();
        return view('frontpage.chauffeur.search', compact('pickupLocations'));
    }

    public function chauffeurList(Request $request)
    {
        $query = $request->all();
        $cars = Car::where('is_available', 1)
            ->where('chauffeur', 1)
            ->when($request->filled('type'), function ($q) use ($request) {
                $q->where('type', $request->get('type'));
            })
            ->paginate(10);
            
        $carTypes = VehicleType::where('is_active', 1)->get();
        return view('frontpage.chauffeur.list', compact('query', 'cars', 'carTypes'));
    }

    public function chauffeurSingle(Request $request, $id)
    {
        $query = $request->all();

        $car = Car::where('is_available', 1)
            ->where('id', $id)
            ->firstOrFail();

        return view('frontpage.chauffeur.single', compact('query','car'));
    }

    public function chauffeurExtras(Request $request, $id)
    {
        $query = $request->all();

        $car = Car::where('is_available', 1)
            ->where('id', $id)
            ->firstOrFail();

        return view('frontpage.chauffeur.extras', compact('query','car'));
    }

    public function chauffeurDetails(Request $request, $id)
    {
        $query = $request->all();

        $car = Car::where('is_available', 1)
            ->where('id', $id)
            ->firstOrFail();

        if($request->isMethod('post')){
            $user = Auth::user();

            $carPrice = 0;
            $tripTypeExtra = [];

            if($request->get('trip_type') == 'airport'){
                $tripTypeExtra['Direction'] = $request->get('dir');
                $tripTypeExtra['Flight'] = $request->get('flight');
                $tripTypeExtra['Terminal'] = $request->get('terminal');

                $carPrice += $car->airport_transfer_rate;
            } else if($request->get('trip_type') == 'hourly'){
                $tripTypeExtra['City'] = $request->get('city');
                $tripTypeExtra['Duration'] = $request->get('duration');

                $carPrice += $car->hourly_rate * $request->get('duration', 1);
            } else if($request->get('trip_type') == 'p2p'){
                $tripTypeExtra['Trip'] = $request->get('dir');
                $carPrice += $car->p2p_rate;
            } else if($request->get('trip_type') == 'event'){
                $tripTypeExtra['Type'] = $request->get('type');
                $tripTypeExtra['Start Time'] = $request->get('startTime');
                $tripTypeExtra['End Time'] = $request->get('endTime');
                
                $carPrice += $car->event_hire_rate;
            } else if($request->get('trip_type') == 'long'){
                $tripTypeExtra['Notes'] = $request->get('notes');
                $carPrice += $car->long_transfer_rate;
            }        

            $addons = [];
            $addonPrice = 0;

            foreach($request->get('extras') as $index => $addonIndex){
                if($car->chauffer_addons[$addonIndex] && $request->get('extras_count')[$addonIndex] > 0){
                    $addons[] = [
                        'name' => $car->chauffer_addons[$addonIndex]['name'],
                        'price' => $car->chauffer_addons[$addonIndex]['price'],
                        'count' => $request->get('extras_count')[$addonIndex]
                    ];

                    $addonPrice += ($car->chauffer_addons[$addonIndex]['price'] * $request->get('extras_count')[$addonIndex]);
                }
            }

            $snapshot = [];
            $snapshot['features1'] = $car->chauffer_features1;
            $snapshot['features2'] = $car->chauffer_features2;
            $snapshot['chauffer_terms'] = $car->chauffer_terms;

            $totalPrice = $carPrice + $addonPrice;

            $booking = CBooking::create([
                'id' => Str::uuid(),
                'car_id' => $id,
                'user_id' => $user->id,
                'trip_type' => $request->input('trip_type'),
                'trip_type_extra' => $tripTypeExtra,
                'pickup_location' => $request->input('pickup'),
                'dropoff_location' => $request->input('dropoff'),
                'stops' => $request->input('stops', []),
                'pickup_date' => $request->input('date'),
                'pickup_time' => $request->input('time'),
                'passengers' => $request->input('passengers'),
                'full_name' => $request->input('full_name'),
                'phone_no' => $request->input('phone'),
                'email_addr' => $request->input('email'),
                'company_name' => $request->input('company'),
                'special_reqs' => $request->input('special_requests'),
                'addons' => $addons,
                'car_snapshot' => $snapshot,
                'trip_amount' => $carPrice,
                'addons_total' => $addonPrice,
                'total_amount' => $totalPrice,
                'status' => 'pending',
                'pg_status' => 'pending',
                'pg_tx_id' => null,
            ]);

            return redirect()->route('frontpage.chauffeur.payment', $booking->id);
        }

        return view('frontpage.chauffeur.details', compact('query','car'));
    }

    public function chauffeurPayment(Request $request, $id){
        $booking = CBooking::where('id', $id)->firstOrFail();

        if($request->isMethod('post')){
            if(!isset($request->payment_token) || empty($request->payment_token)){
                return response()->json([
                    'status' => false,
                    'message' => 'Invalid charge method.'
                ]);
            }

            Stripe::setApiKey(env('STRIPE_SECRET_KEY'));

            try {
                $charge = Charge::create([
                    'amount' => $booking->total_amount * 100,
                    'currency' => settings('currency_code', 'USD'),
                    'source' => $request->payment_token,
                    'description' => 'Order ' . $booking->id,
                    'metadata' => [
                        'booking_id' => $booking->id,
                        'user_id' => $booking->user_id ? $booking->user_id : '',
                    ],
                ]);

                $booking->update([
                    'pg_tx_id' => $charge->id,
                    'pg_status' => 'Paid',
                    'paid_at' => now(),
                ]);

                Mail::to($booking->email_addr)->send(new ChBookingRequested($booking));
                Mail::to(settings('contact_email'))->send(new ChBookingRequested($booking));

                return response()->json([
                    'status' => true,
                    'message' => 'Booking amount has been successfully paid.',
                    'redirect_url' => route('frontpage.chauffeur.confirmation', $booking->id)
                ]);
            } catch (\Exception $e) {
                return response()->json([
                    'status' => false,
                    'message' => $e->getMessage()
                ]);
            }
        }

        $car = Car::where('id', $booking->car_id)->first();
        return view('frontpage.chauffeur.payment', compact('booking', 'car'));
    }

    public function chauffeurBookingConfirmed(Request $request, $id){
        $cBooking = CBooking::where('id', $id)->where('pg_status', 'Paid')->first();

        if(!$cBooking){
            return redirect()->route('frontpage.chauffeur.search')->with('error', 'Booking not found.');
        }

        $car = Car::where('id', $cBooking->car_id)->first();

        return view('frontpage.chauffeur.confirmed', compact('cBooking', 'car'));
    }
}
