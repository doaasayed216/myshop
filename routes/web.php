<?php

use App\Http\Controllers\AddressController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\VerificationController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\OrderInfoController;
use App\Http\Controllers\PasswordController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\SessionsController;
use App\Http\Controllers\ShoppingSessionController;
use App\Http\Controllers\UserController;
use App\Jobs\ReconcileAccount;
use App\Models\Category;
use App\Models\Product;
use App\Models\Role;
use App\Models\User;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Str;
use Laravel\Socialite\Facades\Socialite;

Route::get('/', [HomeController::class, 'index']);
Route::get('/products/{product}', [ProductController::class, 'show']);



Route::middleware(['guest'])->group(function () {
    Route::get('/register', [RegisterController::class, 'create']);
    Route::post('/register', [RegisterController::class, 'store']);
    Route::get('/login', [SessionsController::class, 'create'])->name('login');
    Route::post('/login', [SessionsController::class, 'authenticate']);
});

Route::middleware(['auth', 'prevent-back-history'])->group(function () {
    Route::resource('/reviews', ReviewController::class)->only('store' , 'destroy');
    Route::resource('/addresses', AddressController::class);
    Route::resource('/payment', PaymentController::class)->only('create', 'store');
    Route::resource('/order', OrderController::class);
    Route::get('/cart', [CartController::class, 'index']);
    Route::post('/cart/{product}', [CartController::class, 'store']);
    Route::delete('/cart/{product}', [CartController::class, 'destroy']);
    Route::post('/select/shipping', [ShoppingSessionController::class, 'storeShipping']);
    Route::post('/select/address', [ShoppingSessionController::class, 'storeAddress']);
    Route::view('/my-orders', 'my-orders');
    Route::post('/logout', [SessionsController::class, 'logout']);

    Route::middleware(['admin'])->group(function () {
        Route::prefix('/admin')->group(function () {
            Route::view('', 'admin.dashboard');
            Route::resource('roles', RoleController::class)->middleware('can:manage,App\Models\Role');
            Route::resource('users', UserController::class)->middleware('can:manage,App\Models\User');
            Route::resource('categories', CategoryController::class)->middleware('can:manage,App\Models\Category');
            Route::resource('products', ProductController::class);
            Route::resource('orders', OrderController::class);
        });
    });
});
