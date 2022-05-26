<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Admin\UserController as AdminUser;
use App\Http\Controllers\Admin\StockController as AdminStock;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\FormController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\SaleController;


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


//KONTA
Route::post('home/{id}/post' , [HomeController::class, 'post'])->name('home.post');
Route::get('home/{id}/confirm' , [HomeController::class, 'confirm'])->name('home.confirm');
Route::patch('home/{id}' , [HomeController::class, 'update'])->name('home.update');
Route::resource('home' , HomeController::class);

//はしもとここから
Route::get('/test', function() {
    return view('sales.test');
});
// Route::get('/sales', [SaleController::class, 'index'])->name('sales.index');
Route::group(['middleware' => ['auth']], function() {
    //Route::resource('sales', SaleController::class);
    Route::get('/sales/create', [SaleController::class, 'create'])->name('sales.create');
    Route::get('/sales/confirm', [SaleController::class, 'confirm'])->name('sales.confirm');
    Route::get('/sales/{stock}/edit', [SaleController::class, 'edit'])->name('sales.edit');
    Route::get('/sales/{stock}/confirm', [SaleController::class, 'editConfirm'])->name('sales.editConfirm');
    Route::get('/sales/{stock}/cart', [SaleController::class, 'cart'])->name('sales.cart');
    Route::post('/sales', [SaleController::class, 'store'])->name('sales.store');
    Route::post('/sales/post', [SaleController::class, 'post'])->name('sales.post');
    Route::patch('/sales/{stock}', [SaleController::class, 'update'])->name('sales.update');
    Route::post('/sales/{stock}/post', [SaleController::class, 'editPost'])->name('sales.editPost');
    Route::post('/sales/{stock}/buy', [SaleController::class, 'buy'])->name('sales.buy');
});
Route::get('/sales/{stock}', [SaleController::class, 'show'])->name('sales.show');
//ここまで

//山﨑 //変更点 5/25
Route::group(['middleware' => ['auth']], function(){
    Route::get('/', [HomeController::class, 'index']);
    Route::get('/home', [HomeController::class, 'index'])->name('home');
    Route::get('/sales', [SaleController::class, 'index'])->name('sales.index');
    //処理が重くなる（サーバーが動き続ける）
    //URLはregister_confだが、homeと一緒
    Route::get('/register_conf', [HomeController::class, 'index']);
});
Route::post('/register_conf', [AuthController::class, 'delivery'])->name('register_conf');

//IKEGAWA
Route::get('/admins/users',[AdminUser::class, 'index'])
->name('users.index');
Route::get('/admins/users/{id}',[AdminUser::class, 'show'])
->name('users.show');
Route::delete('/admins/users/{id}',[AdminUser::class, 'destroy'])
->name('users.destroy');

Route::get('/admins/stocks',[AdminStock::class, 'index'])
->name('stocks.index');
Route::get('/admins/stocks/{id}',[AdminStock::class, 'show'])
->name('stocks.show');
Route::delete('/admins/stocks/{id}',[AdminStock::class, 'destroy'])
->name('stocks.destroy');

