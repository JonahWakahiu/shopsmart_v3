<?php

use App\Http\Controllers\Backend\AttributesController;
use App\Http\Controllers\Backend\AttributeValuesController;
use App\Http\Controllers\Backend\CategoriesController;
use App\Http\Controllers\Backend\CustomersController;
use App\Http\Controllers\Backend\OrdersController;
use App\Http\Controllers\Backend\PermissionsController;
use App\Http\Controllers\Backend\ProductsController;
use App\Http\Controllers\Backend\ReviewsController;
use App\Http\Controllers\Backend\RolesController;
use App\Http\Controllers\Backend\TransactionsController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('frontend.homepage');
})->name('home');

Route::get('/test', function () {
    return view('frontend.checkout-success');
});


Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::view('/dashboard', 'backend.dashboard')->middleware('verified')->name('dashboard');

    Route::controller(ProfileController::class)->prefix('profile')->name('profile.')->group(function () {
        Route::get('/', 'edit')->name('edit');
        Route::patch('/', 'update')->name('update');
        Route::delete('/', 'destroy')->name('destroy');
    });

    Route::get('customers/list', [CustomersController::class, 'list'])->name('customers.list');
    Route::resource('customers', CustomersController::class);


    Route::get('categories/list', [CategoriesController::class, 'list'])->name('categories.list');
    Route::resource('categories', CategoriesController::class);

    Route::get('products/list', [ProductsController::class, 'list'])->name('products.list');
    Route::resource('products', ProductsController::class);

    Route::get('orders/list', [OrdersController::class, 'list'])->name('orders.list');
    Route::resource('orders', OrdersController::class);

    Route::get('transactions/list', [TransactionsController::class, 'list'])->name('transactions.list');
    Route::resource('transactions', TransactionsController::class);

    Route::get('reviews/list', [ReviewsController::class, 'list'])->name('reviews.list');
    Route::resource('reviews', ReviewsController::class);

    Route::get('roles/list', [RolesController::class, 'list'])->name('roles.list');
    Route::resource('roles', RolesController::class);

    Route::get('permissions/list', [PermissionsController::class, 'list'])->name('permissions.list');
    Route::resource('permissions', PermissionsController::class);


    Route::get('attributes/list', [AttributesController::class, 'list'])->name('attributes.list');
    Route::resource('attributes', AttributesController::class);


    Route::get('attributes.values/list', [AttributeValuesController::class, 'list'])->name('attributes.values.list');
    Route::resource('attributes.values', AttributeValuesController::class);
});

require __DIR__ . '/auth.php';
