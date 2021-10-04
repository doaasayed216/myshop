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
use App\Http\Controllers\SessionsController;
use App\Http\Controllers\ShoppingSessionController;
use App\Http\Controllers\UserController;
use App\Jobs\ReconcileAccount;
use App\Models\Category;
use App\Models\User;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Str;
use Laravel\Socialite\Facades\Socialite;

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
    return view('welcome', [
        'categories' => Category::all()
    ]);
})->middleware(['auth', 'verified']);

//Route::get('/', function () {
//    $user = User::first();
//    ReconcileAccount::dispatch($user);
//
//   return 'Finished';
//});


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


Route::middleware(['auth'])->group(function () {
    Route::post('/logout', [SessionsController::class, 'logout']);
    Route::get('/categories/{category}', [CategoryController::class, 'show']);
    Route::get('/cart', [CartController::class, 'create']);
    Route::post('/cart/add/{product}', [CartController::class, 'store']);
    Route::delete('/cart/remove/{product}', [CartController::class, 'delete']);
    Route::get('/address', [AddressController::class, 'create']);
    Route::post('/address/save', [AddressController::class, 'store']);
    Route::get('/payment', [PaymentController::class, 'create']);
    Route::post('/payment/save', [PaymentController::class, 'store'])->name('payment_save');
    Route::get('/success', [OrderController::class, 'create']);
    Route::post('/place/order', [OrderController::class, 'store']);
    Route::delete('/addresses/{address}', [AddressController::class, 'destroy']);
    Route::get('/addresses/{address}/edit', [AddressController::class, 'edit']);
    Route::patch('/addresses/{address}', [AddressController::class, 'update']);
    Route::post('/select/shipping', [ShoppingSessionController::class, 'storeShipping']);
    Route::post('/select/address', [ShoppingSessionController::class, 'storeAddress']);
    Route::view('/my-orders', 'my-orders');
    Route::delete('/orders/{order}', [OrderController::class, 'destroy']);
    Route::get('/product/{product}', [ProductController::class, 'show']);
    Route::post('/add/review', [ReviewController::class, 'store']);

    Route::as('verification.')->group(function () {
        Route::get('/email/verify', [EmailController::class,'index'])->name('notice');
        Route::get('/email/verify/{id}/{hash}', [EmailController::class,'send'])
            ->middleware('signed')->name('verify');
        Route::post('/email/verification-notification', [EmailController::class,'resend'])
            ->middleware('throttle:6,1')->name('send');
    });

    Route::middleware(['admin', 'verified'])->group(function () {
        Route::prefix('/admin')->group(function (){
            Route::get('', function (){ return view('admin.dashboard');});
            Route::get('/product/create', [ProductController::class, 'create']);
            Route::get('/products', [ProductController::class, 'index']);
            Route::get('/user/create', [UserController::class, 'create']);
            Route::get('/users', [UserController::class, 'index']);
            Route::get('/category/create', [CategoryController::class, 'create']);
            Route::get('/categories', [CategoryController::class, 'index']);
            Route::get('/orders', [OrderController::class, 'index']);
            Route::post('/user/create', [UserController::class, 'store']);
            Route::post('/product/create', [ProductController::class, 'store']);
            Route::post('/category/create', [CategoryController::class, 'store']);
            Route::get('/{category}/sub-category', [CategoryController::class,'add']);
            Route::post('/{category}/sub-category', [CategoryController::class, 'storeChild']);
            Route::get('/categories/{category}/edit', [CategoryController::class, 'edit']);
            Route::patch('/categories/{category}', [CategoryController::class, 'update']);
            Route::delete('/categories/{category}', [CategoryController::class, 'destroy']);
            Route::get('/users/{user}/edit', [UserController::class, 'edit']);
            Route::patch('/users/{user}', [UserController::class, 'update']);
            Route::delete('/users/{user}', [UserController::class, 'destroy']);
            Route::get('/products/{product}/edit', [ProductController::class, 'edit']);
            Route::patch('/products/{product}', [ProductController::class, 'update']);
            Route::delete('/products/{product}', [ProductController::class, 'destroy']);
            Route::patch('/orders/{order}', [OrderController::class, 'update']);


        });
    });
});

