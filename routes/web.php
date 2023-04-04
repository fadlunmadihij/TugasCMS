<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\ProdukController;
// use App\Http\Controllers\prController;

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
    return view('home');
});

Route::middleware(['auth'])->group(function(){
Route::get('/kategori',[kategoriController::class, 'index']);
Route::get('/kategori/create',[kategoriController::class, 'create']);
Route::post('/kategori/store',[kategoriController::class, 'store']);
Route::get('/kategori/{id}/edit',[kategoriController::class, 'edit']);
Route::put('/kategori/{id}',[kategoriController::class, 'update']);
Route::get('/kategori/{id}',[kategoriController::class, 'destroy']);

Route::get('/produk',[produkController::class, 'index']);
Route::get('/produk/create',[produkController::class, 'create']);
Route::post('/produk/store',[produkController::class, 'store']);
Route::get('/produk/{id}/edit',[produkController::class, 'edit']);
Route::put('/produk/{id}',[produkController::class, 'update']);
Route::get('/produk/{id}',[produkController::class, 'destroy']);
});
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
