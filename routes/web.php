<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\TransferController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\AdminDashboardController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::get('/transfer', [TransferController::class, 'index'])
    ->middleware(['auth'])
    ->name('transfer');

Route::post('/transfer', [TransferController::class, 'store'])
    ->middleware(['auth'])
    ->name('transfer.store');

Route::get('/transactions', [TransactionController::class, 'index'])
    ->middleware(['auth'])
    ->name('transactions');

Route::get('/admin/dashboard', [AdminDashboardController::class, 'index'])
    ->middleware(['auth', 'admin'])
    ->name('admin.dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
