<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;

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

// Route::get('/', [DashboardController::class, 'index'])->name('index');
Route::get('/sell_in', [DashboardController::class, 'sell_in'])->name('sell_in');
Route::get('/sell_in/{item}', [DashboardController::class, 'detail'])->name('detail.sell_in');
Route::get('/sell_in/detail/{item}', [DashboardController::class, 'detail_item'])->name('detail.item.sell_in');
Route::get('/upload', [DashboardController::class, 'upload'])->name('upload');
Route::post('/uploadFile', [DashboardController::class, 'uploadFile'])->name('upload.file');