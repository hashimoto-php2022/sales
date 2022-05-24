<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\StockController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AuthController;

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

//はしもとここから
Route::get('/stocks', [StockController::class, 'index'])->name('stocks.index');
Route::group(['middleware' => ['auth']], function() {
    Route::get('/stocks/create', [StockController::class, 'create'])->name('stocks.create');
    Route::get('/stocks/confirm', [StockController::class, 'confirm'])->name('stocks.confirm');
    Route::get('/stocks/{stock}/edit', [StockController::class, 'edit'])->name('stocks.edit');
    Route::get('/stocks/{stock}/confirm', [StockController::class, 'editConfirm'])->name('stocks.editConfirm');
    Route::get('/stocks/{stock}/cart', [StockController::class, 'cart'])->name('stocks.cart');
    //Route::resource('stocks', StockController::class);
    Route::post('/stocks', [StockController::class, 'store'])->name('stocks.store');
    Route::post('/stocks/post', [StockController::class, 'post'])->name('stocks.post');
    Route::patch('/stocks/{stock}', [StockController::class, 'update'])->name('stocks.update');
    Route::post('/stocks/{stock}/post', [StockController::class, 'editPost'])->name('stocks.editPost');
    Route::post('/stocks/{stock}/buy', [StockController::class, 'buy'])->name('stocks.buy');
});

Route::get('/stocks/{stock}', [StockController::class, 'show'])->name('stocks.show');
//ここまで

// Route::post('/register_conf', function() { return view('auth.register_conf'); })->name('register_conf');
Route::post('/register_conf', [AuthController::class, 'delivery'])->name('register_conf');
