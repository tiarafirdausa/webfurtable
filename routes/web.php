<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\CatalogController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\produkController;

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
Route::get('/', [CatalogController::class, 'home']); 

Route::get('/product', function () {
    return view('catalog.product');
});

Route::get('/tentang', [CatalogController::class, 'tentang']);

Route::get('/detail/{barang}', [CatalogController::class, 'detail']);

//login
Route::get('/login', [AdminController::class, 'index'])->name('login');
Route::post('/login', [AdminController::class, 'login'])->name('login');

//dashboard


//logout
Route::post('/logout', [AdminController::class, 'postLogout']);

// barang
Route::resource('dashboard/barangs', BarangController::class)->middleware('auth');

// barang2
Route::get('/product', [produkController::class,'index']);


Route::middleware('auth:admins')->group(function(){
    // Tulis routemu di sini.
    Route::get('/admin', function () {
        return view('login.index');
    });

    Route::resource('dashboard/barangs', BarangController::class);
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('home');

});


//hubungi kami
Route::get('/hubungi', function () {
    return view('catalog.hubungi');
});

//FAQs
Route::get('/FAQ', function () {
    return view('catalog.faq');
});

