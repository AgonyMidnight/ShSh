<?php

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


Route::get('/', function () {
    return redirect('/Notes');
});
Route::resource('/Notes', \App\Http\Controllers\NotesController::class);
Route::resource('/New', \App\Http\Controllers\CategoryController::class);
Route::resource('/Change', \App\Http\Controllers\CategoryController::class);
Route::view('login', 'login')->name('login');
Route::post('login', [\App\Http\Controllers\UserController::class, "EnterUser"])->name('Auth');
Route::view('register', 'register')->name('register');
Route::post('register', [\App\Http\Controllers\UserController::class, "Registration"])->name('Reg');
Route::get('Out',[\App\Http\Controllers\UserController::class, "OutUser"])->name('Out');
Route::get('/email/verify', function () {
    return view('verify-email');
})->middleware(['auth'])->name('verification.notice');

