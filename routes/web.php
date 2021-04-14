<?php

use App\Models\tradingPool;
use Illuminate\Support\Facades\Route;
use Laravel\Fortify\Fortify;

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
    return view('welcome');
});

Route::prefix('admin')->middleware(['auth'])->group(function () {
    Route::get('/', function () {
        return view('admin/index')
            ->with('tradingPools', tradingPool::latest()->take(10)->get())
            ->with('tradingPoolsCount', tradingPool::count())
            ->with('tradingPoolsUsersCount', \App\Models\tradingPoolUser::count());
    })->name('dashboard');

    Route::get('/trading-pools/', function () {
        return view('admin/tradingpool/list')
            ->with('tradingPools', tradingPool::all());
    });

    Route::get('/trading-pool/{id}', function ($id) {
        return view('admin/tradingpool/view-one')
            ->with('tradingPool', tradingPool::findOrFail($id));
    });

    Route::get('/account', function () {
        return view('admin/account');
    });
});



Fortify::loginView(function () {
    return view('admin/login');
});;

Fortify::registerView(function () {
    return view('admin/register');
});;

Route::fallback(function () {
    return view('welcome');
});
