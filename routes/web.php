<?php

use App\Actions\Fortify\UpdateUserPassword;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\AppSettingsController;
use App\Http\Controllers\ExcutiveCommitteeMeetingController;
use App\Http\Controllers\Guest\GuestController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\PaymentMethodInputController;
use App\Http\Controllers\RecreationEventController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [GuestController::class, 'index']);

//Route::middleware([
//    'auth:sanctum',
//    config('jetstream.auth_session'),
//    'verified'
//])->group(function () {
//    Route::get('/dashboard', function () {
//        return view('dashboard');
//    })->name('dashboard');
//});
Route::prefix('/admin')->as('admin.')->middleware(['auth:sanctum', 'verified'])->group(function () {
    // dashboard rout
    Route::get('/dashboard', [AdminController::class, 'index'])->name('dashboard');
    // profile routs
    Route::prefix('/profile')->group(function () {
        Route::get('/', [AdminController::class, 'profile'])->name('profile');
        Route::post('/', [AdminController::class, 'profileUpdate']);
        Route::post('/info', [AdminController::class, 'profileInfoUpdate'])->name('profile-info');
        Route::post('/password-update', [UpdateUserPassword::class, 'updateAdminPassword'])->name('password-update');
    });

    //settings
    Route::prefix('/settings')->as('settings.')->group(function (){
        //general
        Route::get('/', [AppSettingsController::class, 'index'])->name('index');
        Route::post('/', [AppSettingsController::class, 'storeGeneralSettings']);
        //smtp
        Route::get('/smtp', [AppSettingsController::class, 'smtpIndex'])->name('smtp');
        Route::post('/smtp', [AppSettingsController::class, 'storeSmtpSettings']);
        //api
        Route::get('/api', [AppSettingsController::class, 'apiIndex'])->name('api');
        Route::post('/api', [AppSettingsController::class, 'storeApiSettings']);
        //sms
        Route::get('/sms', [AppSettingsController::class, 'smsIndex'])->name('sms');
        Route::post('/sms', [AppSettingsController::class, 'storeSmsSettings']);
        //social media link
        Route::get('/social-media-link', [AppSettingsController::class, 'socialMediaLinkIndex'])->name('social-media-link');
        Route::post('/social-media-link', [AppSettingsController::class, 'storeSocialMediaLink']);
        //contact
        Route::post('/company-contact', [AppSettingsController::class, 'storeContact'])->name('company-contact');
        //order
        Route::get('/order', [AppSettingsController::class, 'orderIndex'])->name('order-index');
        Route::get('/order-country/{country}', [AppSettingsController::class, 'orderCountryDeactivate'])->name('order-country-delete');
        Route::get('/order-state/{state}', [AppSettingsController::class, 'orderStateDeactivate'])->name('order-state-delete');
        Route::get('/order-police-station/{thana}', [AppSettingsController::class, 'orderThanaDeactivate'])->name('order-police-station-delete');
        //payment
        Route::prefix('/payment')->as('payment.')->group(function (){
            Route::get('/', [AppSettingsController::class, 'paymentIndex'])->name('index');
            Route::get('/method/{payment}', [PaymentMethodInputController::class, 'getMethodForm'])->name('method');
            Route::post('/store/{payment}', [PaymentMethodInputController::class, 'storePayment'])->name('store');
        });
        //menu
        Route::prefix('menu')->as('menu.')->group(function (){
            Route::resource('/', MenuController::class, ['only' => ['index', 'create', 'store']]);
        });

    });

    //contact message
    Route::prefix('/contact-message')->as('contact-message.')->group(function (){
        Route::get('/', [AdminController::class, 'contactMessageIndex'])->name('index');
    });

    // programs
    Route::resource('/recreation',RecreationEventController::class);
    // executive meeting
    Route::resource('/executive-meeting',ExcutiveCommitteeMeetingController::class);
});
