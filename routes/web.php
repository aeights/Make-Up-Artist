<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\LandingController;
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

    });
    
    Route::controller(AboutController::class)->group(function () {
        Route::get('dashboard/setting/about','index')->name('setting.about');
        Route::get('dashboard/about/add','create')->name('about.add');
        Route::post('dashboard/about/add','store')->name('about.store');
        Route::get('dashboard/about/edit','edit')->name('about.edit');
        Route::post('dashboard/about/edit','update')->name('about.update');
        Route::post('dashboard/about/delete','delete')->name('about.delete');

        Route::get('dashboard/setting/services','index')->name('setting.services');
    });
});

Route::middleware(['auth','role:customer'])->group(function () {
    Route::controller(AdminController::class)->group(function () {
        Route::get('dashboard/customer','index')->name('dashboard.customer');
    });

});