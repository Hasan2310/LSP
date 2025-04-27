<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\MaskapaiController;
use App\Http\Controllers\TransaksiController;

Route::get('/', function () {
    return view('home');
});

Route::get('/dashboard', function () {
    return view('dashboard.dashboard');
});
Route::resource('users', UserController::class);
Route::resource('maskapais', MaskapaiController::class);
Route::resource('transaksis', TransaksiController::class);

Route::resource('login', LoginController::class);
Route::resource('register', RegisterController::class);
Route::post('/logout', function () {
    Auth::logout();
    return redirect()->route('login.index');
})->name('logout');


