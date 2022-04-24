<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\Auth\LoginController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\QuestionController;


Route::middleware('auth:admin')->group(function () {
    //dashboard
    Route::get('dashboard', [AdminController::class, 'index'])->name('admin.dashboard');

    Route::resource('categories', CategoryController::class)->except('show');


    //question
    Route::resource('question', QuestionController::class);
});



Route::get('login', [LoginController::class, 'login'])->name('admin.login');
Route::post('login', [LoginController::class, 'postLogin'])->name('admin.postLogin');
