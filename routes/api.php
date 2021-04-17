<?php

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

Route::middleware('auth:sanctum')->get('/users/{user}', function (Request $request) {
    return $request->user();
});

Route::get('trading-pools',[\App\Http\Controllers\Api\TradingPoolApiController::class, 'index']);
Route::get('trading-pool/{id}',[\App\Http\Controllers\Api\TradingPoolApiController::class, 'fetchOne']);
