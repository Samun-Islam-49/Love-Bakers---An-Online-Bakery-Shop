<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\PageController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\SettingsController;
use App\Http\Controllers\Admin\SubCategoryController;

Route::prefix('admin')->group(function () {

    // Routes for registration and login (open to everyone)
    Route::get('register', [AuthController::class, 'create_register'])
        ->name('admin.register');
    Route::post('register', [AuthController::class, 'store_register']);

    Route::get('login', [AuthController::class, 'create_login'])
        ->name('admin.login');
    Route::post('login', [AuthController::class, 'store_login']);

    // Authenticated admin routes
    Route::middleware('auth:admin')->group(function () {

        Route::post('logout', [AdminController::class, 'logout'])
            ->name('admin.logout');

        Route::post('update_password', [AdminController::class, 'update_password'])
            ->name('admin.update_password');

        Route::get('change_password', [AdminController::class, 'change_password'])
            ->name('admin.change_password');

        Route::get('dashboard', [AdminController::class, 'index'])
            ->name('admin.dashboard');

    });
});

// Category Routes
Route::prefix('admin/category')->middleware('auth:admin')->group(function () {

    Route::get('/', [CategoryController::class, 'index'])
        ->name('category.index');

    Route::post('store', [CategoryController::class, 'store'])
        ->name('category.store');

    Route::get('delete/{id}', [CategoryController::class, 'delete'])
        ->name('category.delete');

    Route::get('fetch/{id}', [CategoryController::class, 'fetch']);

    Route::put('update', [CategoryController::class, 'update'])
        ->name('category.update');
});

// Sub-category routes
Route::prefix('admin/subcategory')->middleware('auth:admin')->group(function () {

    Route::get('/', [SubCategoryController::class, 'index'])
        ->name('subcategory.index');

    Route::post('store', [SubCategoryController::class, 'store'])
        ->name('subcategory.store');

    Route::get('delete/{id}', [SubCategoryController::class, 'delete'])
        ->name('subcategory.delete');

    Route::get('fetch/{id}', [SubCategoryController::class, 'fetch']);

    Route::put('update', [SubCategoryController::class, 'update'])
        ->name('subcategory.update');
});

// Seo routes
Route::prefix('admin/seo')->middleware('auth:admin')->group(function () {

    Route::get('create', [SettingsController::class, 'create_seo'])
        ->name('seo.create');

    Route::post('update/{id}', [SettingsController::class, 'update_seo'])
        ->name('seo.update');
});

// Smtp routes
Route::prefix('admin/smtp')->middleware('auth:admin')->group(function () {

    Route::get('create', [SettingsController::class, 'create_smtp'])
        ->name('smtp.create');

    Route::post('update/{id}', [SettingsController::class, 'update_smtp'])
        ->name('smtp.update');
});

// Dynamic Pages routes
Route::prefix('admin/page')->middleware('auth:admin')->group(function () {

    Route::get('index', [PageController::class, 'index'])
        ->name('page.index');

    Route::get('create', [PageController::class, 'create'])
        ->name('page.create');

    Route::post('store', [PageController::class, 'store'])
        ->name('page.store');

    Route::get('delete/{id}', [PageController::class, 'delete'])
        ->name('page.delete');

    Route::get('edit/{id}', [PageController::class, 'edit'])
        ->name('page.edit');

    Route::post('update', [PageController::class, 'update'])
        ->name('page.update');
});

// Settings routes
Route::prefix('admin/settings')->middleware('auth:admin')->group(function () {

    Route::get('index', [SettingsController::class, 'setting_view'])
        ->name('settings.index');

    Route::post('update/{id}', [SettingsController::class, 'setting_update'])
        ->name('settings.update');
});


// Product routes
Route::prefix('admin/products')->middleware('auth:admin')->group(function () {

    Route::get('create',  [ProductController::class, 'create'])
        ->name('product.create');

    Route::post('store',  [ProductController::class, 'store'])
        ->name('product.store');

    Route::get('index',  [ProductController::class, 'index'])
        ->name('product.index');

    Route::get('fetch-subcat/{id}', [ProductController::class, 'getSubcategories'])
        ->name('product.getSubcategories');

    Route::get('edit/fetch-subcat/{id}', [ProductController::class, 'getSubcategories'])
        ->name('product.getSubcategories');

    Route::post('get-product-code',  [ProductController::class, 'getProductCode'])
        ->name('product.getProductCode');

    Route::post('toggle-status', [ProductController::class, 'toggleStatus'])
        ->name('product.toggleStatus');

    Route::delete('{id}', [ProductController::class, 'delete'])
        ->name('product.delete');

    Route::get('edit/{id}',  [ProductController::class, 'edit'])
        ->name('product.edit');

    Route::post('update',   [ProductController::class, 'update'])
        ->name('product.update');


});


// Orders routes
Route::prefix('admin/orders')->middleware('auth:admin')->group(function () {

    Route::get('', [OrderController::class, 'index'])
        ->name('order.index');

     Route::post('toggle-status', [OrderController::class, 'toggleStatus'])
        ->name('order.toggleStatus');

    Route::delete('{id}', [OrderController::class, 'delete'])
        ->name('order.delete');

    Route::get('{id}', [OrderController::class, 'view'])
        ->name('order.view-order');

    Route::get('edit-order/{id}', [OrderController::class, 'edit'])
        ->name('order.edit-order');

    Route::post('update-order', [OrderController::class, 'update'])
        ->name('order.update-order');
});
