<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CashController;
use App\Http\Controllers\CreditController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AccountController;
use App\Models\User;
use App\Models\Product;
use App\Models\Transaction;

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



Route::get('/', [AuthController::class, 'index'])->name('login')->middleware('guest');


Route::post('/', [AuthController::class, 'login'])->middleware('guest');


Route::delete('/logout', [AuthController::class, 'logout'])->middleware('auth');




Route::get('/admin', function () {

    $startDate = now()->startOfMonth();
    $endDate = now()->endOfMonth();

    return view('layouts.dashboard.index', [
        'title' => 'Dashboard - Koperasi MINDA',
        'userCount' => count(User::all()),
        'productCount' => count(Product::all()),
        'transactionCount' => count(Transaction::whereBetween('created_at', [$startDate, $endDate])->get()),
        'creditPrice' => Transaction::where('is_buyed', false)->sum('price_transaction_total'),
        'cashPrice' => Transaction::where('is_buyed', true)->sum('price_transaction_total'),
    ]);
})->middleware('auth');


Route::get('/admin/users/print', [UserController::class, 'print'])->middleware('auth');
Route::get('/admin/users/{user}/print', [UserController::class, 'print_single'])->middleware('auth');

Route::put('/admin/users/{user}/reset-password', [UserController::class, 'reset_password'])->middleware('auth');

Route::resource('/admin/users', UserController::class)->middleware('auth');




Route::resource('/admin/products', ProductController::class)->middleware('auth');




Route::resource('/admin/transactions/cash', CashController::class)->middleware('auth');



Route::resource('/admin/transactions/credit', CreditController::class)->middleware('auth');




Route::get('/admin/reports/print', [TransactionController::class, 'print'])->middleware('auth');

Route::resource('/admin/reports', TransactionController::class)->middleware('auth');



Route::resource('/admin/profile', AccountController::class)->middleware('auth');




Route::get('/admin/change-password', function () {
    return view('layouts.profile.change-password', [
        'title' => 'Ganti Password - Koperasi MINDA'
    ]);
})->middleware('auth');

Route::put('/admin/change-password', [AccountController::class, 'action_change_password'])->middleware('auth');
