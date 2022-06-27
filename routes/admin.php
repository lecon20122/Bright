<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\Auth\AdminAuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\AnswerController;
use App\Http\Controllers\doctorController;
use App\Http\Controllers\ShadowTeacherController;
use App\Http\Controllers\CenterController;
use Illuminate\Support\Facades\Route;


Route::middleware('auth:admin')->group(function () {
    //dashboard
    Route::get('dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
    Route::get('logout', [AdminAuthController::class, 'logout'])->name('admin.logout');
    Route::resource('categories', CategoryController::class)->except(['show', 'update', 'destroy']);

    Route::post('categories/{id}/update', [CategoryController::class, 'update'])->name('categories.update');
    Route::get('categories/{id}/delete', [CategoryController::class, 'destroy'])->name('categories.destroy');
    //question
    Route::resource('question', QuestionController::class)->except(['show', 'update', 'destroy']);
    Route::get('question/{id}/delete', [QuestionController::class, 'destroy'])->name('questions.destroy');
    Route::post('question/{id}/update', [QuestionController::class, 'update'])->name('questions.update');
    Route::resource('answer', AnswerController::class);
    //doctor
    Route::get('doctors', [doctorController::class, 'index'])->name('doctor.index');
    Route::post('doctors/{doctor}/approve', [doctorController::class, 'toggleApprovalForDoctor'])->name('doctor.approve');
    Route::post('doctors/{doctor}', [doctorController::class, 'attachDoctorToCategory'])->name('doctor.attach');
    Route::get('doctors/{doctor}/attach', [doctorController::class, 'attachDoctorToCategoryView'])->name('doctor.attach.view');

    //shadow teacher
    Route::get('shadowteachers', [shadowteacherController::class, 'index'])->name('shadowteacher.index');
    Route::post('shadowteachers/{shadowteacher}/approve', [ShadowTeacherController::class, 'toggleApprovalForShadowTeacher'])->name('shadow-teacher.approve');
    Route::post('shadowteachers/{shadowteacher}', [ShadowTeacherController::class, 'attachShadowTeacherToCategory'])->name('shadowteacher.attach');
    Route::get('shadowteachers/{shadowteacher}/attach', [ShadowTeacherController::class, 'attachShadowTeacherToCategoryView'])->name('shadowteacher.attach.view');


    //center
    Route::get('centers', [CenterController::class, 'index'])->name('center.index');
    Route::post('centers/{center}/approve', [CenterController::class, 'toggleApprovalForCenter'])->name('center.approve');
    Route::post('centers/{center}', [CenterController::class, 'attachCenterToCategory'])->name('center.attach');
    Route::get('centers/{center}/attach', [CenterController::class, 'attachCenterToCategoryView'])->name('center.attach.view');
});



Route::get('login', [AdminAuthController::class, 'login'])->name('admin.login');
Route::post('login', [AdminAuthController::class, 'postLogin'])->name('admin.postLogin');
