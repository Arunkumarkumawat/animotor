<?php

use App\Models\User;
use App\Models\Booking;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FrontPageController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Payment\StripeController;
use App\Http\Controllers\Payment\PaymentController;
use App\Http\Controllers\Payment\PaystackPaymentController;
use App\Http\Controllers\Auth\CompanyRegistrationController;
use App\Http\Controllers\Payment\FlutterwavePaymentController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('test-email', function () {
    return view('front_page.booking_voucher', [
        'booking' => Booking::latest()->first()
    ]);
})->name('test-email');

Route::get('test-store', function(){
   Artisan::call('view:clear'); 
});

Auth::routes();
Route::match(['get', 'post'], '/register/verify', [RegisterController::class, 'verify'])->name('register.verify');
Route::post('/register/resend', [RegisterController::class, 'resend'])->name('register.resend');

Route::get('/company-signup', [CompanyRegistrationController::class, 'signup'])->name('company.signup');
Route::post('/company-signup', [CompanyRegistrationController::class, 'store'])->name('company.store');

Route::group(['middleware' => ['auto_login']], function () {
    Route::get('/', [FrontPageController::class, 'home']);
    Route::post('/send_quote', [FrontPageController::class, 'sendQuote'])->name('send_quote');
    Route::get('/token', [FrontPageController::class, 'token']);
    Route::get('/manage/booking', [FrontPageController::class, 'manageBooking'])->name('manage_booking');
    Route::post('/search/booking', [FrontPageController::class, 'searchBooking'])->name('search_booking');
    Route::get('/builder', [FrontPageController::class, 'builder']);
    Route::get('/booking/{id}', [FrontPageController::class, 'booking'])->name('booking');
    Route::get('/booking_successful/{id}', [FrontPageController::class, 'booking'])->name('booking_successful');
    Route::get('/voucher/{id}', [FrontPageController::class, 'voucher'])->name('voucher');
    Route::get('/builder2', [FrontPageController::class, 'builder2']);
    Route::get('/list', [FrontPageController::class, 'list']);
    Route::get('/flight', [FrontPageController::class, 'flight']);
    Route::get('/deal', [FrontPageController::class, 'deal'])->name('deal');
    Route::get('/protection_option', [FrontPageController::class, 'protectionOption'])->name('protection');
    Route::get('/booking/select_payment/{id}', [FrontPageController::class, 'select_payment_method'])->name('select_payment');
    Route::get('/payment/process', [FrontPageController::class, 'paymentProcess'])->name('payment.process');
    Route::get('/checkout', [FrontPageController::class, 'checkout'])->name('checkout');
});

Route::get('/search', [FrontPageController::class, 'search'])->name('search');


Route::group(['middleware' => ['auto_login_required']], function () {
    Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');
    Route::group(['prefix' => 'customer'], function () {
        Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');
        Route::get('/bookings', [DashboardController::class, 'bookings'])->name('bookings');
        Route::get('/booking/view/{id}', [DashboardController::class, 'bookingView'])->name('booking.view');
        Route::match(['get', 'post'], '/booking/cancel/{id}', [FrontPageController::class, 'cancelBooking'])->name('booking.cancel');
        Route::get('/return', [DashboardController::class, 'return'])->name('return');
        Route::get('/profile', [DashboardController::class, 'profile'])->name('profile');
        Route::get('/edit/profile', [DashboardController::class, 'editProfile'])->name('edit.profile');
        Route::get('/notifications', [DashboardController::class, 'notifications'])->name('notifications');
        Route::get('/transactions', [DashboardController::class, 'transactions'])->name('transactions');
        Route::get('/top_up', [DashboardController::class, 'topUp'])->name('top_up');

        Route::post('/payment', [PaymentController::class, 'payment_initialize'])->name('payment.init');
    });
});


Route::get('/home', function () {
    return redirect()->route('dashboard');
});

Route::post ('/last-stage-auth', [FrontPageController::class, 'lastStageAuth'])->name('last-stage-auth');
Route::get('/address-get', [FrontPageController::class, 'addressGet'])->name('address.get');

Route::get('/private-hire-list', [FrontPageController::class, 'privateHireList'])->name('private_hire_list');
Route::get('/private-hire-list-alt', [FrontPageController::class, 'privateHireListAlt'])->name('private_hire_list_alt');
Route::get('/private-hire-single/{id}', [FrontPageController::class, 'privateHireSingle'])->name('private_hire_single');
Route::get('/private-hire-extras/{id}', [FrontPageController::class, 'privateHireExtras'])->name('private_hire_extras');
Route::match(['get','post'], '/private-hire-checkout/{id}', [FrontPageController::class, 'privateHireCheckout'])->name('private_hire_checkout');

Route::get('/chauffeur/search', [FrontPageController::class, 'chauffeurSearch'])->name('frontpage.chauffeur.search');
Route::get('/chauffeur/list', [FrontPageController::class, 'chauffeurList'])->name('frontpage.chauffeur.list');
Route::get('/chauffeur/single/{id}', [FrontPageController::class, 'chauffeurSingle'])->name('frontpage.chauffeur.single');
Route::get('/chauffeur/extras/{id}', [FrontPageController::class, 'chauffeurExtras'])->name('frontpage.chauffeur.extras');
Route::match(['get','post'], '/chauffeur/details/{id}', [FrontPageController::class, 'chauffeurDetails'])->name('frontpage.chauffeur.details');
Route::match(['get','post'], 'chauffeur/payment/{id}', [FrontPageController::class, 'chauffeurPayment'])->name('frontpage.chauffeur.payment');
Route::get('/chauffeur/confirmation/{id}', [FrontPageController::class, 'chauffeurBookingConfirmed'])->name('frontpage.chauffeur.confirmation');

Route::get('test/email', function () {
    return view('emails.account_notify');
});

Route::get('/{slug}', [FrontPageController::class, 'page'])->name('page.show');

//Route::get('/make/admin', [App\Http\Controllers\HomeController::class, 'makeAdmin']);

include 'admin.php';
include 'addons.php';


//
//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['prefix' => 'filemanager', 'middleware' => ['web', 'auth']], function () {
    \UniSharp\LaravelFilemanager\Lfm::routes();
});


Route::group(['prefix' => 'payment'], function () {
    Route::any('/{gateway}/pay', [PaymentController::class, 'payment_initialize']);

    Route::any('/success', [PaymentController::class, 'paymentDone'])->name('payment.success');

    Route::any('/failed', [PaymentController::class, 'paymentFailed'])->name('payment.failed');
});


Route::any('/paystack/callback', [PaystackPaymentController::class, 'callback']);
Route::any('/flutterwave/payment/callback', [FlutterwavePaymentController::class, 'callback']);

Route::post('/monify/webhook', [UserController::class, 'webhook'])->name('monify.webhook');


//Stipe Start
Route::controller(StripeController::class)->group(function () {
    Route::get('stripe', 'stripe');
    Route::post('/stripe/create-checkout-session', 'create_checkout_session')->name('stripe.get_token');
    Route::any('/stripe/payment/callback', 'callback')->name('stripe.callback');
    Route::get('/stripe/success', 'success')->name('stripe.success');
    Route::get('/stripe/cancel', 'cancel')->name('stripe.cancel');
});
//Stripe END