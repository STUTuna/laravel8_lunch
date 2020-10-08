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
    return view('welcome');
});

Route::get('/admin', function () {
    return view('adminlte.auth.login');
});

Auth::routes();

Route::prefix('dashboard')->group(function () {
    Route::get('users', function () {
        // Matches The "/admin/users" URL
    });
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

    Route::get('/users', [App\Http\Controllers\UserController::class, 'index'])->name('users');

// 記帳
    Route::get('/bookkeep', [App\Http\Controllers\BookkeepController::class, 'index'])->name('bookkeep');
    Route::post('/bookkeep', [App\Http\Controllers\BookkeepController::class, 'store'])->name('bookkeep.store');

// 歷史紀錄
    Route::get('/depositLog', [App\Http\Controllers\DepositLogController::class, 'index'])->name('depositLog');
//餘額排行榜
    Route::get('/ranking', [App\Http\Controllers\RankingController::class, 'index'])->name('ranking');
//工作設備表
    Route::get('/device', [App\Http\Controllers\DeviceController::class, 'index'])->name('device');
});

