<?php

use App\Http\Controllers\Frontend\OrderController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\frontend\CartController;
use App\Http\Controllers\Frontend\CheckoutController;
use App\Http\Controllers\Frontend\ProductController;
use App\Http\Controllers\Frontend\HomepageController;
use App\Http\Controllers\Frontend\ProfileController as FrontendProfileController;

// Failsafe
// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');


//Failsafe
// Route::middleware('guest')->group(function () {

//     Route::get('/', [HomepageController::class, 'index']);

// });


// Route::middleware('auth')->group(function () {

//     Route::get('/index', [HomepageController::class, 'index'])
//         ->name('front.index');

//     Route::get('/product/{code}', [ProductController::class, 'index'])
//         ->name('front-product.index');

// });


// Route::prefix('admin/front')->middleware('auth:admin')->group(function () {

//     Route::get('/index', [HomepageController::class, 'index'])
//         ->name('admin-front.index');

//     Route::get('/product/{code}', [ProductController::class, 'index'])
//         ->name('admin-front-product.index');

// });

Route::get('/', [HomepageController::class, 'index'])
    ->name('front.index');

Route::get('/product/cart-view', [CartController::class, 'create_view'])
    ->name('front-product.cart-view');

Route::get('/product/{code}', [ProductController::class, 'index'])
    ->name('front-product.index');

    Route::get('/categories/{slug?}', [ProductController::class, 'all_index'])
    ->name('front-product.all-index');

Route::post('/cart/add', [CartController::class, 'addCart'])
    ->name('cart.add');;

Route::get('/cart/load', [CartController::class, 'loadCart'])
    ->name('cart.load');

Route::post('/cart/remove', [CartController::class, 'removeCart'])
    ->name('cart.remove');

Route::post('/cart/update', [CartController::class, 'updateCart'])
    ->name('cart.update');

// Customer Profile Controller
Route::prefix('/customer')->middleware('auth')->group(function () {
    Route::get('profile',  [FrontendProfileController::class, 'create'])
        ->name('customer.profile');

    Route::post('address-add', [FrontendProfileController::class, 'addAddress'])
        ->name('customer.add-address');

    Route::post('address-remove', [FrontendProfileController::class, 'removeAddress'])
        ->name('customer.remove-address');

    Route::post('order-cancel', [FrontendProfileController::class, 'cancelOrder'])
        ->name('customer.cancel-order');

    Route::get('order/{id}', [OrderController::class, 'create'])
        ->name('customer.view-order');

    Route::get('edit-order/{id}', [OrderController::class, 'edit'])
        ->name('customer.edit-order');

    Route::post('update-order', [OrderController::class, 'update'])
        ->name('customer.update-order');

    Route::post('address-update', [FrontendProfileController::class, 'updateAddress'])
        ->name('customer.update-address');
});


// Checkout Controller
Route::prefix('/checkout')->middleware('auth')->group(function () {
    Route::get('index',   [CheckoutController::class, 'create'])
        ->name('checkout.index');

    Route::post('place-order', [CheckoutController::class, 'placeOrder'])
        ->name('checkout.place-order');
});


// Route::get('/index', function () {
//     return view('frontend.index');
// })->name('front.index')->middleware(['auth:web, auth:admin']);

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/admin.php';
require __DIR__.'/auth.php';
