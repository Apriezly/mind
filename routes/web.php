<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\RedirectController;
use App\Http\Controllers\PenggunaController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\LayoutsController;
use App\Http\Controllers\KalenderController;
use App\Http\Controllers\PengingatController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\BantuanController;
use App\Http\Controllers\NotifikasiController;
use App\Http\Controllers\SendEmail;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\DokumenController;


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

Route::get('/', [LoginController::class, 'index'])->name('awal');

//nyoba login baru
Route::get('/login', [LoginController::class, 'login'])->name('login');
Route::post('/login-proses', [LoginController::class, 'login_proses'])->name('login-proses');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/register', [LoginController::class, 'register'])->name('register');
Route::post('/register-proses', [LoginController::class, 'register_proses'])->name('register-proses');

// Route::get('/beranda-p', [PenggunaController::class, 'index']);

Route::group(['middleware' => ['auth']], function(){
    Route::get('/beranda', [PenggunaController::class, 'index']);
    Route::get('/kalender', [KalenderController::class, 'index']);
    Route::get('/pengingat', [PengingatController::class, 'index']);
    Route::get('/laporan', [LaporanController::class, 'index']);
    Route::get('/bantuan', [BantuanController::class, 'index']);
    Route::get('/notifikasi', [NotifikasiController::class, 'index']);
    Route::get('/profil', [PenggunaController::class, 'profil']);
});

Route::get('/kategori', [KategoriController::class, 'index'])->name('index');
Route::get('/tambahdata', [DokumenController::class, 'create'])->name('create');
Route::get('/tambahkategori', [KategoriController::class, 'create'])->name('create');
Route::get('/editdata', [DokumenController::class, 'edit'])->name('edit');
Route::get('/editpengingat', [PengingatController::class, 'edit'])->name('edit');
Route::get('/editkategori', [KategoriController::class, 'edit'])->name('edit');


//  jika user belum login
// Route::group(['middleware' => 'guest'], function() {
//     Route::get('/', [AuthController::class, 'login'])->name('login');
//     Route::post('/', [AuthController::class, 'dologin']);
// });

// untuk admin dan pengguna
// Route::group(['middleware' => ['auth', 'checkrole:1,2']], function() {
//     Route::post('/logout', [AuthController::class, 'logout']);
//     Route::get('/redirect', [RedirectController::class, 'cek']);
// });

// untuk pengguna
// Route::group(['middleware' => ['auth', 'checkrole:1']], function() {
//     Route::get('/beranda-p', [PenggunaController::class, 'index']);
// });

// // untuk admin
// Route::group(['middleware' => ['auth', 'checkrole:2']], function() {
//     Route::get('/beranda-a', [AdminController::class, 'index']);
// });



Route::get('/test', [LayoutsController::class, 'index']);
Route::get('/send-email', [SendEmail::class, 'index']);






