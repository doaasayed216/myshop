<?php

use App\Http\Controllers\EmailController;
use App\Http\Controllers\PasswordController;
use App\Http\Controllers\UserController;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Str;

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
    return view('welcome');
})->middleware(['auth', 'verified']);


Route::middleware(['guest'])->group(function () {
    Route::get('register', [UserController::class, 'createRegister']);
    Route::get('login', [UserController::class, 'createLogin'])->name('login');
    Route::post('register', [UserController::class, 'store']);
    Route::post('login', [UserController::class, 'authenticate']);

    Route::as('password.')->group(function () {
        Route::get('forgot-password', [PasswordController::class,'index'])->name('request');
        Route::post('forgot-password', [PasswordController::class,'send'])->name('email');
        Route::get('reset-password/{token}', [PasswordController::class,'create'])->name('reset');
        Route::post('reset-password', [PasswordController::class,'reset'])->name('update');
    });
});


Route::middleware(['auth'])->group(function () {
    Route::post('logout', [UserController::class, 'logout']);

    Route::as('verification.')->group(function () {
        Route::get('/email/verify', [EmailController::class,'index'])->name('notice');
        Route::get('/email/verify/{id}/{hash}', [EmailController::class,'send'])
            ->middleware('signed')->name('verify');
        Route::post('/email/verification-notification', [EmailController::class,'resend'])
            ->middleware('throttle:6,1')->name('send');
    });
});

