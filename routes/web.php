<?php

use App\Models\tradingPool;
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
        ->with('tradingPools', tradingPool::all())
        ->with('tradingPoolsCount', tradingPool::count())
        ->with('tradingPoolsUsersCount', \App\Models\tradingPoolUser::count());
});

Route::get('/trading-pool/{id}', function ($id) {
    return view('poc/tradingpool')
        ->with('tradingPool', tradingPool::findOrFail($id));
});

Route::get('/cards', function () {
    return view('poc/cards');
});
