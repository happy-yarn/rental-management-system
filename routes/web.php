<?php

use App\Http\Controllers\ApartmentController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Auth\MyAccountController;
use App\Http\Controllers\ComplainController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\MaintenanceController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', fn () => view('pages.index'));

Route::name('login')->group(function () {
    Route::get('login', [LoginController::class, 'show']);
    Route::post('login', [LoginController::class, 'store']);
});

Route::middleware('auth')->group(function () {
    Route::get('dashboard', [DashboardController::class, 'show'])->name('home');

    // auth logout
    Route::post('logout', LogoutController::class)->name('logout');

    // auth my account
    Route::get('my-account', [MyAccountController::class, 'show'])->name('account');

    // pages
    Route::prefix('users')->name('users.')->group(function () {
        Route::get('/', [UserController::class, 'index'])->name('index');
    });

    Route::prefix('apartments')->name('apartments.')->group(function () {
        Route::get('/', [ApartmentController::class, 'index'])->name('index');
    });

    Route::prefix('maintenance')->name('maintenance.')->group(function () {
        Route::get('/', [MaintenanceController::class, 'index'])->name('index');
    });

    Route::prefix('complains')->name('complains.')->group(function () {
        Route::get('/', [ComplainController::class, 'index'])->name('index');
    });

    Route::prefix('invoices')->name('invoices.')->group(function () {
        Route::get('/', [InvoiceController::class, 'index'])->name('index');
    });
});
