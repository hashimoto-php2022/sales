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

Route::get('/', function () {
    return view('auth.login');
});

//Route::get('/form/input', function(){return view('input');});
//Route::get('/form/confirm', function(){return view('confirm');});

// Route::post('/register_conf', function() { return view('auth.register_conf'); })->name('register_conf');
//Route::post('/register_conf', [AuthController::class, 'delivery'])->name('register_conf');
//Route::get('/home', [HomeController::class, 'index'])->name('home');
//Route::get('/form/confirm' , [FormController::class, 'inputconfirm'])->name('inputconfirm');
//Route::get('home/confirm', 'HomeController@edit')->middleware('auth');
Route::post('homes/{id}/post' , [HomeController::class, 'post'])->name('homes.post');
Route::get('homes/{id}/confirm' , [HomeController::class, 'confirm'])->name('homes.confirm');
Route::patch('homes/{id}' , [HomeController::class, 'update'])->name('homes.update');
Route::resource('homes' , HomeController::class);
//はしもとここから
Route::get('/test', function() {
    return view('sales.test');
});
Route::get('/sales', [SaleController::class, 'index'])->name('sales.index');
Route::group(['middleware' => ['auth']], function() {
    Route::get('/sales/create', [SaleController::class, 'create'])->name('sales.create');
    Route::get('/sales/confirm', [SaleController::class, 'confirm'])->name('sales.confirm');
    Route::get('/sales/{stock}/edit', [SaleController::class, 'edit'])->name('sales.edit');
    Route::get('/sales/{stock}/confirm', [SaleController::class, 'editConfirm'])->name('sales.editConfirm');
    Route::get('/sales/{stock}/cart', [SaleController::class, 'cart'])->name('sales.cart');
    //Route::resource('sales', SaleController::class);
    Route::post('/sales', [SaleController::class, 'store'])->name('sales.store');
    Route::post('/sales/post', [SaleController::class, 'post'])->name('sales.post');
    Route::patch('/sales/{stock}', [SaleController::class, 'update'])->name('sales.update');
    Route::post('/sales/{stock}/post', [SaleController::class, 'editPost'])->name('sales.editPost');
    Route::post('/sales/{stock}/buy', [SaleController::class, 'buy'])->name('sales.buy');
});
Route::get('/sales/{stock}', [SaleController::class, 'show'])->name('sales.show');


// Route::get('/stocks', [StockController::class, 'index'])->name('stocks.index');
// Route::group(['middleware' => ['auth']], function() {
//     Route::get('/stocks/create', [StockController::class, 'create'])->name('stocks.create');
//     Route::get('/stocks/confirm', [StockController::class, 'confirm'])->name('stocks.confirm');
//     Route::get('/stocks/{stock}/edit', [StockController::class, 'edit'])->name('stocks.edit');
//     Route::get('/stocks/{stock}/confirm', [StockController::class, 'editConfirm'])->name('stocks.editConfirm');
//     Route::get('/stocks/{stock}/cart', [StockController::class, 'cart'])->name('stocks.cart');
//     //Route::resource('stocks', StockController::class);
//     Route::post('/stocks', [StockController::class, 'store'])->name('stocks.store');
//     Route::post('/stocks/post', [StockController::class, 'post'])->name('stocks.post');
//     Route::patch('/stocks/{stock}', [StockController::class, 'update'])->name('stocks.update');
//     Route::post('/stocks/{stock}/post', [StockController::class, 'editPost'])->name('stocks.editPost');
//     Route::post('/stocks/{stock}/buy', [StockController::class, 'buy'])->name('stocks.buy');
// });

// Route::get('/stocks/{stock}', [StockController::class, 'show'])->name('stocks.show');
//ここまで


Route::group(['middleware' => ['auth']], function(){
    Route::get('/home', [HomeController::class, 'index'])->name('homes');
    //処理が重くなる（サーバーが動き続ける）
    //Route::get('/register_conf', [AuthController::class, 'delivery'])->name('register_conf');
    //URLはregister_confだが、homeと一緒
    Route::get('/register_conf', [HomeController::class, 'index'])->name('homes');
});

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

Route::post('/register_conf', [AuthController::class, 'delivery'])->name('register_conf');
Route::resource('stocks', StockController::class);

//Route::get('/stocks', [StockController::class, 'index']);
//Route::resource('stocks', StockController::class);

// Route::post('/register_conf', function() { return view('auth.register_conf'); })->name('register_conf');

Route::post('/register_conf', [AuthController::class, 'delivery'])->name('register_conf');
Route::get('/homes', [HomeController::class, 'index'])->name('homes');

