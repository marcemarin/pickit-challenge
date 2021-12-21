<?php

use App\Http\Controllers\CarController;
use App\Http\Controllers\CarServiceController;
use App\Http\Controllers\OwnerController;
use App\Http\Controllers\TransactionController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('cars/{car}/services', CarServiceController::class);

Route::apiResource('cars', CarController::class);

Route::apiResource('owners', OwnerController::class);

Route::apiResource('transactions', TransactionController::class);
