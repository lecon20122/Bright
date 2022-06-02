<?php

use App\Http\Controllers\AnswerController;
use App\Http\Controllers\Auth\UpdateUserController;
use App\Http\Controllers\DoctorController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\ReservationTimeController;
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
    Route::get('answers/{category}', [AnswerController::class, 'storeAnswers'])->name('store-test-question');
});

// Doctor // Shadow teacher registration
Route::get('join-us', [DoctorController::class, 'doctorRegistrationPage'])->name('doctorRegistrationPage');

//Specialties
Route::get('specialists/{category}', [DoctorController::class, 'getDoctorsByCategory'])->name('get-doctor-by-category');
Route::get('clinic/{category}', [DoctorController::class, 'takeClinicTest'])->name('clinic-test');

Route::post('reserve/{reservationTime}/{user}/{doctor}', [ReservationController::class, 'reserveAppointment'])->name('reserve-appointment');
Route::post('reserve/{reservation}', [ReservationController::class, 'toggleApprovalForReservation'])->name('reserve-approve');
Route::get('reservations', [ReservationController::class, 'getReservations'])->name('reservations');
Route::get('schedule', [ReservationTimeController::class, 'viewSchedule'])->name('schedule');
Route::post('schedule', [ReservationTimeController::class, 'updateReservationTime'])->name('schedule.update');
Route::get('schedule/create', [ReservationTimeController::class, 'createSchedule'])->name('schedule.create');
Route::post('schedule/store', [ReservationTimeController::class, 'storeScheduleTime'])->name('schedule.store');
