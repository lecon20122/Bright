<?php

use App\Http\Controllers\categoriescontroller;
use App\Http\Controllers\DoctorController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

Route::get('/', function () {
    return view('website');
});

Auth::routes();

Route::get('/welcome', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::resource('doctor' , DoctorController::class);

Route::get('/', [App\Http\Controllers\slideshowController::class, 'slideshow'])->name('slideshow');

//categories
Route::get('categories', [App\Http\Controllers\categoriesController::class, 'index'])->name('categories.index');
//create
Route::get('create', [App\Http\Controllers\categoriesController::class, 'create'])->name('create');
Route::post('store', [App\Http\Controllers\categoriesController::class, 'store'])->name('store');
//update
Route::get('edit/{id}', [App\Http\Controllers\categoriesController::class, 'edit'])->name('edit');
Route::post('update/{id}', [App\Http\Controllers\categoriesController::class, 'update'])->name('update');

//delete
Route::get('delete/{id}', [App\Http\Controllers\categoriesController::class, 'delete'])->name('delete');

