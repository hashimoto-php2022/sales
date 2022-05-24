<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\FormController;
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

//Route::get('/form/input', function(){return view('input');});
//Route::get('/form/confirm', function(){return view('confirm');});

// Route::post('/register_conf', function() { return view('auth.register_conf'); })->name('register_conf');
//Route::post('/register_conf', [AuthController::class, 'delivery'])->name('register_conf');
//Route::get('/home', [HomeController::class, 'index'])->name('home');
//Route::get('/form/confirm' , [FormController::class, 'inputconfirm'])->name('inputconfirm');
//Route::get('home/confirm', 'HomeController@edit')->middleware('auth');
Route::post('home/{id}/post' , [HomeController::class, 'post'])->name('home.post');
Route::get('home/{id}/confirm' , [HomeController::class, 'confirm'])->name('home.confirm');
Route::patch('home/{id}' , [HomeController::class, 'update'])->name('home.update');
Route::resource('home' , HomeController::class);

