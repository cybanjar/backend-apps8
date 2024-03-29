<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\UserController;
use App\Http\Controllers\API\FoodController;
use App\Http\Controllers\EmployeController;
use App\Http\Controllers\PostingController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });


Route::middleware('auth:sanctum')->group(function () {
    Route::get('user', [UserController::class, 'fetch']);
    Route::post('user', [UserController::class, 'updateProfile']);
    Route::post('user/photo', [UserController::class, 'updatePhoto']);
    Route::post('logout', [UserController::class, 'logout']);

    // Route::post('checkout', [TransactionController::class, 'checkout']);

    // Route::get('transaction', [TransactionController::class, 'all']);
    // Route::post('transaction/{id}', [TransactionController::class, 'update']);
    
    Route::post('posting', [PostingController::class, 'store']);
    Route::get('posting', [PostingController::class, 'index']);
    Route::get('posting/{id}', [PostingController::class, 'show']);
    Route::put('posting/{id}', [PostingController::class, 'update']);
    Route::delete('posting/{id}', [PostingController::class, 'destroy']);
    // Route::post('posting', [PostingController::class, 'updateProfile']);
    // Route::post('posting', [PostingController::class, 'updatePhoto']);
    Route::get('/posting/searchLocation/{keyword}', [PostingController::class, 'searchLocation']);
    Route::get('/posting/searchCategory/{keyword}', [PostingController::class, 'searchCategory']);
});

Route::post('login', [UserController::class, 'login']);
Route::post('register', [UserController::class, 'register']);

Route::get('emp', [EmployeController::class, 'index']);

// Route::get('food', [FoodController::class, 'all']);
// Route::post('midtrans/callback', [MidtransController::class, 'callback']);
