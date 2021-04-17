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

/**
 * Front app views
**/
Route::get('/', function () {
    return view('frontapp');
});

Route::get( '/{reactRoutes?}', function(){
    return view( 'frontapp' );
} )->where('reactRoutes', 'login|trading-pool.*\/.*');

Route::get('/static', function () {
    return view('static');
});

Route::post('/user/profile-picture', [\App\Http\Controllers\UserController::class, 'upload'])->name('upload/user/profile-picture');

Route::prefix('admin')->middleware(['auth'])->group(function () {
    Route::get('/', function () {
        return view('admin/index')
            ->with('tradingPools', tradingPool::latest()->take(10)->get())
            ->with('tradingPoolsCount', tradingPool::count())
            ->with('tradingPoolsUsersCount', \App\Models\tradingPoolUser::count());
    })->name('dashboard');

    Route::get('/logger', function () {
        return view('admin/logger');
    });

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

Route::get('/admin/login', function () {
    return view('admin/login');
});
