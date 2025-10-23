<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AssetController;
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

Route::get('/asset/create', [AssetController::class, 'create'])->name('asset.create');

Route::post('/asset', [assetController::class, 'store'])->name('asset.store');

Route::get('/asset', [AssetController::class, 'index'])->name('asset.index');
