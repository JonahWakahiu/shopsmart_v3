<?php

use App\Http\Controllers\Customer\CartController;
use App\Http\Controllers\Customer\CheckoutController;
use App\Http\Controllers\Customer\HomepageController;
use App\Http\Controllers\Customer\OrdersController;
use App\Http\Controllers\Customer\ProductsController;
use App\Http\Controllers\Customer\ProfileController;
use App\Http\Controllers\Customer\ReviewController;
use GuzzleHttp\Middleware;
use Illuminate\Support\Facades\Route;

Route::controller(ProductsController::class)->group(function () {
    Route::get('products/list', 'productList')->name('products.list');
    Route::get('listing/{product}', 'listing')->name('product.listing');
    Route::get('listing/{product}/edit', 'editVariation')->name('product.listing.edit');
});


Route::middleware('auth')->group(function () {
    Route::controller(CartController::class)->prefix('cart')->name('cart.')->group(function () {
        Route::get('', 'index')->name('index');
        Route::get('items', 'items')->name('items');
        Route::post('', 'store')->name('store');
        Route::put('', 'update')->name('update');
        Route::delete('', 'destroyItem')->name('destroy.item');
        Route::delete('/items', 'clear')->name('clear.items');
    });

    Route::controller(CheckoutController::class)->name('checkout.')->prefix('checkout')->group(function () {
        Route::post('', 'checkout')->name('session');
        Route::get('success', 'success')->name('success');
        Route::get('cancel', 'cancel')->name('cancel');
    });

    Route::controller(OrdersController::class)->prefix('orders')->name('orders.')->group(function () {
        Route::get('', 'index')->name('index');
    });

    Route::controller(ReviewController::class)->prefix('reviews')->name('reviews.')->group(function () {
        Route::get('', 'index')->name('index');
        Route::get('/items', 'items')->name('items');
        Route::post('', 'store')->name('store');
    });

    Route::controller(ProfileController::class)->group(function () {
        Route::get('profile', 'index')->name('profile.index');

        Route::prefix('account')->name('account.')->group(function () {
            Route::get('', 'account')->name('index');
        });
    });
});
