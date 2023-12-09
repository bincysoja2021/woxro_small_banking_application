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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/get_home', [App\Http\Controllers\HomeController::class, 'get_home'])->name('get_home');
Route::get('/Deposit', [App\Http\Controllers\DepositController::class, 'index'])->name('Deposit');

Route::post('/amount_store', [App\Http\Controllers\DepositController::class, 'store'])->name('amount_store');

Route::get('/withdraw', [App\Http\Controllers\withdrawController::class, 'index'])->name('withdraw');

Route::post('/withdraw_store', [App\Http\Controllers\withdrawController::class, 'store'])->name('withdraw_store');


Route::get('/Transfer', [App\Http\Controllers\TransferController::class, 'index'])->name('Transfer');

Route::post('/tranfer_store', [App\Http\Controllers\TransferController::class, 'store'])->name('tranfer_store');

Route::get('/Statement', [App\Http\Controllers\TransferController::class, 'Statement_index'])->name('Statement');
