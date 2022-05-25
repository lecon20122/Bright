<?php

use App\Http\Controllers\Auth\UpdateUserController;
use App\Http\Controllers\DoctorController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\UserSettingController;

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

Route::get('/', [HomeController::class, 'index'])->name('home');

Auth::routes();



//Routes Need Authentication
Route::middleware('auth')->group(function () {
    Route::get('user-profile', [UpdateUserController::class, 'index'])->name('updateUser');
    Route::post('user-profile/{user}/update', [UpdateUserController::class, 'update'])->name('postUpdateUser');
    Route::get('user-profile/appointments', [UserSettingController::class, 'index'])->name('appointment');
});

// Doctor // Shadow teacher registration
Route::get('join-us', [DoctorController::class, 'doctorRegistrationPage'])->name('doctorRegistrationPage');

//Specialties
Route::get('specialists/{category}', [DoctorController::class, 'getDoctorsByCategory'])->name('get-doctor-by-category');

Route::post('reserve/{reservationTime}/{user}', [ReservationController::class, 'reserveAppointment'])->name('reserve-appointment');
