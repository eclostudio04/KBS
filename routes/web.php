<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DonaturController;
use App\Http\Controllers\FundraiserController;
use App\Http\Controllers\FundraisingController;
use App\Http\Controllers\FundraisingWithdrawalController;
use App\Http\Controllers\FundraisingPhaseController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // prefix admin
    Route::prefix('admin')->name('admin.')->group(function () {

        // prefix link category
        Route::resource('categories', CategoryController::class)
            ->middleware('role:owner');

        // prefix donatur
        Route::resource('donaturs', DonaturController::class)
            ->middleware('role:owner');

        // prefix fandraiser
        Route::resource('fundraisers', FundraiserController::class)
            ->middleware('role:owner')->except('index');

        Route::get('fundraisers', [FundraiserController::class, 'index'])
            ->name('fundraisers.index');

        // prefix fundraisingwithdrawal
        Route::resource('fundraising_withdrawals', FundraisingWithdrawalController::class)
            ->middleware('role:owner|fundraiser');

        Route::post('/fundraisingwithdrawals/request/{fundraising}', [FundraisingWithdrawalController::class, 'store'])
            ->middleware('role:fundraiser')
            ->name('fundraisingwithdrawals.store');

        // prefix fundraisingphase
        Route::resource('fundraisingphase', FundraisingPhaseController::class)
            ->middleware('role:owner|fundraiser');

        Route::post('/fundraisingphase/request/{fundraising}', [FundraisingPhaseController::class, 'store'])
            ->middleware('role:fundraiser')
            ->name('fundraisiphase.store');

        // prefix fundraising
        Route::resource('fundraisings', FundraisingController::class)
            ->middleware('role:owner|fundraiser');

        Route::post('/fundraisings/active/{fundraising}', [FundraisingController::class, 'active_fundraising'])
            ->middleware('role:owner')
            ->name('fundraisings.active_fundraising');


        // link route tambahan
        Route::post('/fundraiser/apply', [DashboardController::class, 'apply_fundraiser'])
            ->name('fundraiser.apply');

        Route::get('/my-withdrawals', [DashboardController::class, 'my-withdrawals'])
            ->name('my-withdrawals');

        Route::get('/my-withdrawals/details/{fundraisingwithdrawal}', [DashboardController::class, 'my-withdrawals'])
            ->name('my-withdrawals.details');
    });
});

require __DIR__ . '/auth.php';
