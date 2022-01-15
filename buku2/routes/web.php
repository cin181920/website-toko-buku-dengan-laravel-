<?php

use App\Models\Genre;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BukuController;
use App\Http\Controllers\BayarController;
use App\Http\Controllers\ChartController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\HistoryTransaksi;
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\UserPageController;
use App\Http\Controllers\AdminHomeController;
use App\Http\Controllers\InsertBukuController;
use App\Http\Controllers\UpdateBukuController;
use App\Http\Controllers\InsertGenreController;
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

Route::get('/ubahpassword', function () {
    return view('ubahpassword');
});

Route::get('/profil', function () {
    return view('profil');
});

Route::get('/historytransaksi', function () {
    return view('historytransaksi');
});

Route::get('/detail3', function () {
    return view('detail3');
});
// Route::get('/detail2', function () {
//     return view('detail2');
// });

Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/detail2/{id}',[App\Http\Controllers\HomeController::class, 'detail']);
Route::get('admin/home', [App\Http\Controllers\AdminHomeController::class, 'adminhome'])->name('admin.home')->middleware('is_admin');

Route::get('/admin-home',[AdminHomeController::class,'index']);
Route::get('/detail/{id}',[AdminHomeController::class,'detail']);

Route::get('/',[BukuController::class,'index']);
Route::get('/detail/{id}',[BukuController::class,'detail']);

Route::get('/insertbuku',[InsertBukuController::class,'index']);
Route::post('/insertbuku',[InsertBukuController::class,'store']);
Route::get('/detail/{id}',[InsertBukuController::class,'detail']);
Route::get('insertbuku/{id}', [BukuController::class, 'destroy']);

Route::get('/insertgenre',[InsertGenreController::class,'index']);
Route::post('/insertgenre',[InsertGenreController::class,'store']);
Route::get('/detailgenre/{id}',[InsertGenreController::class,'detail']);
Route::get('insertgenre/{id}', [InsertGenreController::class, 'destroy']);

Route::get('/userpage',[UserPageController::class,'show']);
Route::get('userpage/{id}', [UserPageController::class, 'destroy']);

Route::get('/order',[OrderController::class,'index']);
Route::post('/order',[OrderController::class,'store']);
Route::get('cart/{id}', [OrderController::class, 'destroy']);


Route::get('/cart',[ChartController::class,'index']);


Route::get('/bayar',[BayarController::class,'index']);
Route::post('/bayar',[BayarController::class,'store']);


Route::get('/historytransaksi',[HistoryTransaksi::class,'index']);
