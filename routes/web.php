<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\CatalogController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('login.index');
});

Route::get('/home', function () {
    return view('catalog.home');
});

// Route::get('/tentang', function () {
//     return view('catalog.tentang');
// });

Route::get('/product', function () {
    return view('catalog.product');
});

Route::get('/tentang', [CatalogController::class, 'tentang']);

//login
Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate']);

//dashboard
Route::get('/dashboard', [DashboardController::class, 'index'])->middleware('auth');

//logout
Route::post('/logout', [LoginController::class, 'logout']);

// barang
Route::resource('dashboard/barangs', BarangController::class)->middleware('auth');
