<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\StockController;
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

Route::get('/test', function() {
    return view('layouts.app');
});

Route::get('/admins/users',[UserController::class, 'index'])
->name('users.index');
Route::get('/admins/users/{id}',[UserController::class, 'show'])
->name('users.show');
Route::delete('/admins/users/{id}',[UserController::class, 'destroy'])
->name('users.destroy');

Route::get('/admins/stocks',[StockController::class, 'index'])
->name('stocks.index');
Route::get('/admins/stocks/{id}',[StockController::class, 'show'])
->name('stocks.show');
Route::delete('/admins/stocks/{id}',[StockController::class, 'destroy'])
->name('stocks.destroy');
