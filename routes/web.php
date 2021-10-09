<?php

use App\Http\Controllers\AddressController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\EmailController;
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


Route::view('/', 'welcome', [
    'categories' => Category::all(),
    'products' => Product::filter(request(['search', 'category', 'price']))->orderByDesc('created_at')->paginate(20)
]);

Route::get('/products/{product}', [ProductController::class, 'show']);


Route::middleware(['guest'])->group(function () {
    Route::get('register', [RegisterController::class, 'create']);
    Route::get('login', [SessionsController::class, 'create'])->name('login');
    Route::post('register', [RegisterController::class, 'store']);
    Route::post('login', [SessionsController::class, 'authenticate']);

    Route::as('password.')->group(function () {
        Route::get('forgot-password', [PasswordController::class,'index'])->name('request');
        Route::post('forgot-password', [PasswordController::class,'send'])->name('email');
        Route::get('reset-password/{token}', [PasswordController::class,'create'])->name('reset');
        Route::post('reset-password', [PasswordController::class,'reset'])->name('update');
    });
});

Route::middleware(['auth', 'prevent-back-history'])->group(function () {

    Route::as('verification.')->group(function () {
        Route::get('/email/verify', [EmailController::class, 'index'])->name('notice');
        Route::get('/email/verify/{id}/{hash}', [EmailController::class, 'send'])
            ->middleware('signed')->name('verify');
        Route::post('/email/verification-notification', [EmailController::class, 'resend'])
            ->middleware('throttle:6,1')->name('send');
    });

    Route::middleware(['verified'])->group(function () {
        Route::resource('/reviews', ReviewController::class)->only('store' , 'destroy');
        Route::resource('/addresses', AddressController::class);
        Route::resource('/payment', PaymentController::class)->only('create', 'store');
        Route::resource('/order', OrderController::class);
        Route::post('/logout', [SessionsController::class, 'logout']);
        Route::get('/cart', [CartController::class, 'index']);
        Route::post('/cart/{product}', [CartController::class, 'store']);
        Route::delete('/cart/{product}', [CartController::class, 'destroy']);
        Route::post('/select/shipping', [ShoppingSessionController::class, 'storeShipping']);
        Route::post('/select/address', [ShoppingSessionController::class, 'storeAddress']);
        Route::view('/my-orders', 'my-orders');

        Route::middleware(['admin'])->group(function () {
            Route::prefix('/admin')->group(function () {
                Route::view('', 'admin.dashboard');
                Route::resources([
                    'roles' => RoleController::class,
                    'users' => UserController::class,
                    'categories' => CategoryController::class,
                    'products' => ProductController::class,
                    'orders' => OrderController::class
                ]);
            });
        });
    });
});
