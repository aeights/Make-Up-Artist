<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\LandingController;
use App\Http\Controllers\ServicesController;
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

Route::get('/', function () {
    return view('landing');
});

Route::get('logout',function () {
    Auth::logout();
    return redirect('/');
})->name('logout')->middleware('auth');


Route::controller(LandingController::class)->group(function () {
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

Route::middleware(['auth','role:admin'])->group(function () {
    Route::controller(AdminController::class)->group(function () {
        Route::get('dashboard/admin','index')->name('dashboard.admin');
        Route::get('dashboard/setting/{menu}/empty','noData')->name('dashboard.empty');
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
        Route::get('dashboard/appointments','index')->name('setting.appointments');
        Route::get('dashboard/appointment/add','create')->name('appointment.add');
        Route::post('dashboard/appointment/add','store')->name('appointment.store');
        Route::post('dashboard/appointment/edit','edit')->name('appointment.edit');
        Route::post('dashboard/appointment/update','update')->name('appointment.update');
        Route::get('dashboard/appointment/delete/{id}','delete')->name('appointment.delete');
        
        Route::get('dashboard/appointments/history','history')->name('appointment.history');
        Route::post('dashboard/appointments/detail','detail')->name('appointment.detail');

        Route::get('dashboard/appointments/empty','empty')->name('appointments.empty');
    });
});

Route::middleware(['auth','role:customer'])->group(function () {
    Route::controller(AdminController::class)->group(function () {
        Route::get('dashboard/customer','index')->name('dashboard.customer');
    });

});