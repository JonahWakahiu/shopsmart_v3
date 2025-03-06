<?php

use App\Http\Controllers\Backend\CustomersController;
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
});

require __DIR__ . '/auth.php';
