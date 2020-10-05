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

Route::get('/dashboard/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/dashboard/users', [App\Http\Controllers\HomeController::class, 'index'])->name('users');

// 記帳
Route::get('/dashboard/bookkeep', [App\Http\Controllers\BookkeepController::class, 'index'])->name('bookkeep');
Route::post('/dashboard/bookkeep', [App\Http\Controllers\BookkeepController::class, 'store'])->name('bookkeep.store');

// 歷史紀錄
Route::get('/dashboard/depositLog', [App\Http\Controllers\DepositLogController::class, 'index'])->name('depositLog');
//餘額排行榜
Route::get('/dashboard/ranking', [App\Http\Controllers\RankingController::class, 'index'])->name('ranking');
