<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\SellInController;
use App\Http\Controllers\ProfilUserController;

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
Auth::routes([
    'login' => false,
]);
// Route::get('/', function () {
//     return view('welcome');
// });

//  Route Registrasi
Route::get('/', [LoginController::class, 'login_page'])->name('login_page');
Route::post('/login_user', [LoginController::class, 'login'])->name('login_user');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
Route::get('/halaman_register', [LoginController::class, 'tampilRegister'])->name('halaman.register');
Route::post('/register_user', [LoginController::class, 'regis'])->name('register_user');

// Route::get('/', [DashboardController::class, 'index'])->name('index');
Route::group(['middleware' => ['auth','CekRole:user']], function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/dashboard/{item}', [DashboardController::class, 'detail_summary'])->name('detail.summary');
    Route::get('/sell_in', [SellInController::class, 'sell_in'])->name('sell_in');
    // Route::get('/getsell_in', [SellInController::class, 'getsell_in'])->name('getsell_in');
    Route::get('/sell_in/{item}', [SellInController::class, 'detail'])->name('detail.sell_in');
    Route::get('/sell_in/detail/{item}', [SellInController::class, 'detail_item'])->name('detail.item.sell_in');
    Route::get('/upload', [SellInController::class, 'upload'])->name('upload');
    Route::post('/uploadFile', [SellInController::class, 'uploadFile'])->name('upload.file');
    Route::post('/uploadFilequeue', [SellInController::class, 'uploadFilequeue'])->name('upload.filequeue');
    Route::post('/load', [SellInController::class, 'load'])->name('upload.load');
    Route::post('/import', [SellInController::class, 'import'])->name('import');
    Route::get('/download', [SellInController::class, 'download'])->name('download.file');
    Route::get('/download_month', [SellInController::class, 'download_month'])->name('download.month');
    Route::get('/download_daily', [SellInController::class, 'download_daily'])->name('download.daily');
    Route::get('/profile', [ProfilUserController::class, 'profile'])->name('profile');
    Route::post('/profile/{item}', [ProfilUserController::class, 'profile_update'])->name('update.profile');
    Route::get('/filter', [DashboardController::class, 'filter'])->name('filter');
    Route::get('/datadash', [DashboardController::class, 'datadash'])->name('datadash');
    Route::get('/datasp0k', [DashboardController::class, 'datasp0k'])->name('datasp0k');
    Route::get('/datasp3gb', [DashboardController::class, 'datasp3gb'])->name('datasp3gb');
    Route::get('/datasp9gb', [DashboardController::class, 'datasp9gb'])->name('datasp9gb');
    Route::get('/dataspreg', [DashboardController::class, 'dataspreg'])->name('dataspreg');
    Route::get('/dataspori', [DashboardController::class, 'dataspori'])->name('dataspori');
});
Auth::routes();

Route::group(['middleware' => ['auth','CekRole:admin']], function () {
    Route::get('/halaman_tambah', [AdminController::class, 'halaman_tambah'])->name('halaman.tambah');
    Route::post('/tambah_user', [AdminController::class, 'tambah_user'])->name('tambah.user');
    Route::get('/all_user', [AdminController::class, 'all_user'])->name('all.user');
    Route::get('/edit_user/{id}', [AdminController::class, 'edit_user'])->name('edit.user');
    Route::post('/update_user/{id}', [AdminController::class, 'update_user'])->name('update.user');
    Route::get('/konfirmasi', [AdminController::class, 'konfirmasi'])->name('konfirmasi');
    Route::get('/konfirmasi/{id}', [AdminController::class, 'terima'])->name('update.konfirmasi');
    Route::get('/hapus/{item}', [AdminController::class, 'destroy'])->name('konfirmasi.hapus');
  

});
// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
