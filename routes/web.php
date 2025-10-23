<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use Spatie\FlareClient\View;

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
    return view('dashboard');
});

Route::get('/home-2', function () {
    return view('home-2');
});

// Rute untuk menampilkan form (dari add-product.html)
Route::get('/products/create', [ProductController::class, 'create'])->name('products.create');

// Rute untuk MENYIMPAN data dari form
Route::post('/products', [ProductController::class, 'store'])->name('products.store');

// Rute untuk menampilkan daftar barang (dari product-list.html)
Route::get('/products', [ProductController::class, 'index'])->name('products.index');
