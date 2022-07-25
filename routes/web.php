<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\LoginController;

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

// Route::get('/', function () {
//     return view('welcome');
// });

//  Route Registrasi
Route::get('/', [LoginController::class, 'login_page'])->name('login_page');
Route::post('/login_user', [LoginController::class, 'login'])->name('login_user');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
Route::get('/halaman_register', [LoginController::class, 'tampilRegister'])->name('halaman.register');
Route::post('/register_user', [LoginController::class, 'regis'])->name('register_user');

// Route Menu User
// Route::get('/', [DashboardController::class, 'index'])->name('index');
Route::group(['middleware' => ['auth','CekRole:user']], function () {
    Route::get('/sell_in', [DashboardController::class, 'sell_in'])->name('sell_in');
    Route::get('/sell_in/{item}', [DashboardController::class, 'detail'])->name('detail.sell_in');
    Route::get('/sell_in/detail/{item}', [DashboardController::class, 'detail_item'])->name('detail.item.sell_in');
    Route::get('/upload', [DashboardController::class, 'upload'])->name('upload');
    Route::post('/uploadFile', [DashboardController::class, 'uploadFile'])->name('upload.file');
});
Auth::routes();

Route::group(['middleware' => ['auth','CekRole:admin']], function () {
    Route::get('/halaman_tambah', [AdminController::class, 'halaman_tambah'])->name('halaman.tambah');
    Route::post('/tambah_user', [AdminController::class, 'tambah_user'])->name('tambah.user');
});
// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');