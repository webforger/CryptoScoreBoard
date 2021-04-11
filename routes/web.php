<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('poc/index')
        ->with('tradingPools', \App\Models\tradingPool::all());
});

Route::get('/trading-pool/{id}', function ($id) {
    return view('poc/tradingpool')
        ->with('tradingPool', \App\Models\tradingPool::findOrFail($id));
});

Route::get('/cards', function () {
    return view('poc/cards');
});
