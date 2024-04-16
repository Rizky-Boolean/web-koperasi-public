<?php

use App\Http\Controllers\APIAuthController;
use App\Http\Controllers\APIProductController;
use App\Http\Controllers\APITransactionController;
use App\Http\Controllers\APIUserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::get('/home/{user_id}', [APITransactionController::class, 'getHome']);
Route::get('/transactions/cashs', [APITransactionController::class, 'getCashs']);
Route::get('/transactions/cashs/by-user/{user_id}', [APITransactionController::class, 'getCashsbyUser']);
Route::get('/transactions/cashs/{cashId}', [APITransactionController::class, 'showCash']);
Route::get('/transactions/credits', [APITransactionController::class, 'getCredits']);
Route::get('/transactions/credits/credit/{transactionId}', [APITransactionController::class, 'showCreditById']);
Route::get('/transactions/credits/by-user/{user_id}', [APITransactionController::class, 'getCreditsbyUser']);
Route::get('/transactions/credits/{userId}', [APITransactionController::class, 'showCredit']);
Route::post('/transactions/store', [APITransactionController::class, 'store']);

Route::post('/login', [APIAuthController::class, 'login']);

Route::put('/profile/change-password/{id}', [APIUserController::class, 'changePassword']);

Route::get('/profile/{id}', [APIUserController::class, 'profile']);

Route::put('/profile/{id}', [APIUserController::class, 'editProfile']);

Route::get('/get-user/{buyerId}', [APIUserController::class, 'getUserViaBarcode']);

Route::get('/products', [APIProductController::class, 'index']);

Route::get('/get-products', [APIProductController::class, 'show']);


