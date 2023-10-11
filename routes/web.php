<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\UpdateAccountController;
use App\Http\Controllers\CustomerAppointmentController;
use App\Http\Controllers\LandingController;
use App\Http\Controllers\PaymentMethodController;
use App\Http\Controllers\ServicesController;
use App\Http\Controllers\TestimonialController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('landing');
// });

Route::get('logout',function () {
    Auth::logout();
    return redirect('/');
})->name('logout')->middleware('auth');


Route::controller(LandingController::class)->group(function () {
    Route::get('/','index')->name('/');
    Route::get('about-us','about')->name('about');
    Route::get('services','services')->name('service');
    Route::get('dashboard','dashboard')->name('dashboard');
});

Route::middleware('guest')->group(function () {
    Route::controller(LoginController::class)->group(function () {
        Route::get('login','index')->name('login');
        Route::post('login','login')->name('login');
    });
    
    Route::controller(RegisterController::class)->group(function () {
        Route::get('register','index')->name('register');
        Route::post('register','register')->name('register');
    });
});

Route::middleware('auth')->group(function () {
    Route::controller(UpdateAccountController::class)->group(function () {
        Route::get('profile','index')->name('profile');
        Route::get('profile/edit','edit')->name('profile.edit');
        Route::post('profile/update','update')->name('profile.update');
    });
});

Route::middleware(['auth','role:admin'])->group(function () {
    Route::controller(AdminController::class)->group(function () {
        Route::get('dashboard/admin','index')->name('dashboard.admin');
        Route::get('dashboard/setting/{menu}/empty','noData')->name('dashboard.empty');

        Route::get('dashboard/testimonials','testimonial')->name('testimonials');
    });
    
    Route::controller(AboutController::class)->group(function () {
        Route::get('dashboard/setting/about','index')->name('setting.about');
        Route::get('dashboard/about/add','create')->name('about.add');
        Route::post('dashboard/about/add','store')->name('about.store');
        Route::post('dashboard/about/edit','edit')->name('about.edit');
        Route::post('dashboard/about/update','update')->name('about.update');
        Route::get('dashboard/about/delete/{id}','delete')->name('about.delete');
    });

    Route::controller(ServicesController::class)->group(function () {
        Route::get('dashboard/setting/services','index')->name('setting.services');
        Route::get('dashboard/service/add','create')->name('service.add');
        Route::post('dashboard/service/add','store')->name('service.store');
        Route::post('dashboard/service/edit','edit')->name('service.edit');
        Route::post('dashboard/service/update','update')->name('service.update');
        Route::get('dashboard/service/delete/{id}','delete')->name('service.delete');
    });

    Route::controller(AppointmentController::class)->group(function () {
        Route::get('dashboard/appointments','index')->name('list.appointments');
        
        Route::get('dashboard/appointment/add','create')->name('appointment.add');
        Route::post('dashboard/appointment/add','store')->name('appointment.store');

        Route::post('dashboard/appointment/edit','edit')->name('appointment.edit');
        Route::post('dashboard/appointment/update','update')->name('appointment.update');
        
        Route::get('dashboard/appointment/delete/{id}','delete')->name('appointment.delete');
        
        Route::get('dashboard/appointments/history','history')->name('appointment.history');
        Route::post('dashboard/appointments/detail','detail')->name('appointment.detail');

        Route::get('dashboard/appointments/empty','empty')->name('appointments.empty');
    });

    Route::controller(PaymentMethodController::class)->group(function () {
        Route::get('dashboard/payments','index')->name('list.payments');
        
        Route::get('dashboard/payment/add','create')->name('payment.add');
        Route::post('dashboard/payment/add','store')->name('payment.store');

        Route::get('dashboard/payment/edit/{id}','edit')->name('payment.edit');
        Route::post('dashboard/payment/update','update')->name('payment.update');

        Route::get('dashboard/payment/delete/{id}','delete')->name('payment.delete');
        
        Route::get('dashboard/payments/history','history')->name('payment.history');
        Route::post('dashboard/payments/detail','detail')->name('payment.detail');

        Route::get('dashboard/payments/empty','empty')->name('payments.empty');
    });
});

Route::middleware(['auth','role:customer'])->group(function () {
    Route::controller(AdminController::class)->group(function () {
        Route::get('dashboard/customer','index')->name('dashboard.customer');
    });

    Route::controller(CustomerAppointmentController::class)->group(function () {
        Route::get('dashboard/customer/appointments','index')->name('cust.list.appointments');

        Route::get('dashboard/customer/appointment/add','create')->name('cust.appointment.add');
        Route::post('dashboard/customer/appointment/add','store')->name('cust.appointment.store');

        Route::post('dashboard/customer/appointment/edit','edit')->name('cust.appointment.edit');
        Route::post('dashboard/customer/appointment/update','update')->name('cust.appointment.update');

        Route::get('dashboard/customer/appointment/delete/{id}','delete')->name('cust.appointment.delete');
        
        Route::get('dashboard/customer/appointments/history','history')->name('cust.appointment.history');
        Route::post('dashboard/customer/appointments/detail','detail')->name('cust.appointment.detail');

        Route::get('dashboard/customer/appointments/empty','empty')->name('cust.appointments.empty');

        Route::get('dashboard/customer/payment/{id}','payment')->name('cust.payment');
        Route::post('dashboard/customer/payment','paymentStore')->name('cust.payment.store');
    });

    Route::controller(TestimonialController::class)->group(function () {
        Route::get('dashboard/customer/testimonials','index')->name('cust.list.testimonials');

        Route::get('dashboard/customer/testimonial/add','create')->name('cust.add.testimonial');
        Route::post('dashboard/customer/testimonial/store','store')->name('cust.store.testimonial');

        Route::get('dashboard/customer/testimonial/edit','edit')->name('cust.edit.testimonial');
        Route::post('dashboard/customer/testimonial/update','update')->name('cust.update.testimonial');
    });
});