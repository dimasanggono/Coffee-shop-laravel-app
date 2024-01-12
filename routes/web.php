<?php

use App\Http\Controllers\Admin\CategoriesController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\TransactionsController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/cart', [CartController::class, 'index'])->name('cart');
Route::post('/add-to-cart/{id}', [CartController::class, 'add'])->name('cart.add');
Route::post('cart/update-quantity', [CartController::class, 'updateQuantity']);
Route::delete('/delete-cart/{id}', [CartController::class, 'destroy'])->name('cart.delete');



Route::post('/checkout', [CheckoutController::class, 'process'])->name('checkout');
Route::post('/checkout-callback', [CheckoutController::class, 'callback'])->name('midtrans-callback');


Route::get('/success', [CartController::class, 'success'])->name('success');

Route::prefix('admin')
    ->middleware('auth', 'admin')
    ->group(function () {
        Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
        Route::get('/generate-pdf/{id}', [DashboardController::class, 'generatePDF'])->name('generate.pdf');
        Route::get('/report-daily', [DashboardController::class, 'reportDaily'])->name('report.pdf');
        Route::resource('categories', CategoriesController::class);
        Route::resource('product', ProductController::class);
        Route::resource('user', UserController::class);
        Route::resource('transactions', TransactionsController::class);
    });

Auth::routes();
