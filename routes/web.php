<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\RedirectController;
use App\Http\Controllers\PenggunaController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\LayoutsController;
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


//  jika user belum login
Route::group(['middleware' => 'guest'], function() {
    Route::get('/', [AuthController::class, 'login'])->name('login');
    Route::post('/', [AuthController::class, 'dologin']);

});

// untuk admin dan pengguna
Route::group(['middleware' => ['auth', 'checkrole:1,2']], function() {
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::get('/redirect', [RedirectController::class, 'cek']);
});

// untuk pengguna
Route::group(['middleware' => ['auth', 'checkrole:1']], function() {
    Route::get('/pengguna', [PenggunaController::class, 'index']);
});

// untuk admin
Route::group(['middleware' => ['auth', 'checkrole:2']], function() {
    Route::get('/admin', [AdminController::class, 'index']);
});

Route::get('/test', [LayoutsController::class, 'index']);

// Route ::get('/all', 'AllController@index');


// Route::get('/',[LoginController::class, 'mind'])->name('mind');

// Route::get('dashboard',[DashboardController::class, 'index'])->name('dashboard.index'); //menampilkan halaman dashboard

// Route::get('dashboard/kategori/create',[KategoriController::class, 'create'])->name('kategori.create'); //tambah kategori
// Route::post('dashboard',[KategoriController::class, 'new'])->name('kategori.new'); //form tambah kategori
// Route::get('dashboard/kategori/{judul}',[KategoriController::class, 'edit'])->name('kategori.edit'); //lihat kategori yang dipilih
// Route::get('dashboard/kategori/{judul}',[KategoriController::class, 'tampil'])->name('kategori.tampil'); //lihat kategori yang dipilih

// Route::get('dashboard/kategori/{judul}/tambah',[DashboardController::class, 'tambah'])->name('dokumen.tambah'); //tambah data
// Route::post('dashboard/kategori/{judul}/{id_dokumen}/show',[DashboardController::class, 'show'])->name('dokumen.show');//tampilkan dokumen
// Route::get('dashboard/kategori/{judul}/{id_dokumen}/edit',[DashboardController::class, 'edit'])->name('dokumen.edit');//edit dokumen
// Route::put('dashboard/kategori/{judul}/{id_dokumen}/show',[DashboardController::class, 'show'])->name('dokumen.show');//tampilkan dokumen
// Route::get('dashboard',[DashboardController::class, 'index'])->name('dashboard.index');
// Route::get('dashboard',[DashboardController::class, 'index'])->name('dashboard.index');
// Route::get('dashboard',[DashboardController::class, 'index'])->name('dashboard.index');
// Route::get('dashboard',[DashboardController::class, 'index'])->name('dashboard.index');

// Route::get('/', function () {
//     return view('welcome');
// });

//contohnya ini
// Route::get('products', [ProductController::class, 'index'])->name('products.index'); //membuat alamat situs
// Route::get('products/create', [ProductController::class, 'create'])->name('products.create'); //GET, menampilkan form tambah product
// Route::post('products', [ProductController::class, 'store'])->name('products.store'); //POST, menghandle ketika form tambah product disubmit
// Route::get('products/{id}/edit', [ProductController::class, 'edit'])->name('products.edit');
// Route::put('products/{id}', [ProductController::class, 'update'])->name('products.update');
// Route::delete('products/{id}', [ProductController::class, 'destroy'])->name('products.destroy');
