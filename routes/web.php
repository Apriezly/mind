<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PenggunaController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\LayoutsController;
use App\Http\Controllers\KalenderController;
use App\Http\Controllers\PengingatController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\BantuanController;
// use App\Http\Controllers\PrintController;
use App\Http\Controllers\NotifikasiController;
use App\Mail\TestSendingEmail;
// use App\Http\Controllers\SendEmail;
use Illuminate\Support\Facades\Mail;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\DokumenController;
use App\Http\Controllers\ProfilController;
use Illuminate\Http\Request;
use Illuminate\Auth\Events\PasswordReset;



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

Route::get('/lupa-sandi', [LoginController::class, 'lupa_sandi'])->name('lupa_sandi');
Route::post('/kirim-email', [LoginController::class, 'kirim_email'])->name('kirim_email');


// Route::get('/forgot-password', function() {
//     return view('auth.forgot-password');
// })->middleware('guest')->name('password.request');

// Route::post('/kirim-email', function(Request $request){
//     $request->validate(['email' => 'required|email']);

//     $status = Password::sendResetLink( //untuk mengirim link ke email
//         $request->only('email')
//     );

//     return $status === Password::RESET_LINK_SENT
//             ? back()->with(['status' => __($status)])
//             : back()->withErrors(['email' => __($status)]);

// })->middleware('guest')->name('kirim_email');

Route::get('/reset-password/{token}', function ($token) {
    return view('auth.reset-password', ['token' => $token]);
})->middleware('guest')->name('password.reset');

Route::post('/reset-password', function (Request $request){
    $request->validate([
        'token'             => 'required',
        'email'             => 'required|email',
        'password'          => 'required|min:6',
        'ulangi_password'   => 'required_with:password|same:password|min:6'
    ]);

    $status = Password::reset(
        $request->only('email', 'password', 'token'),

        function ($user, $password) {
            $user->forceFill([
                'password' => Hash::make($password)

            ])->setRememberToken(Str::random(60));

            $user->save();

            event(new PasswordReset($user));
        }
    );

    return $status === Password::PASSWORD_RESET
            ? redirect()->route('login')->with(['status' => __($status)])
            : back()->withErrors(['email' => __($status)]);
    
})->middleware('guest')->name('password.update');



Route::group(['middleware' => ['auth']], function(){
    Route::get('/beranda', [PenggunaController::class, 'index']);
    Route::resource('/data', \App\Http\Controllers\DokumenController::class);
    // Route::get('/show-download', [PrintController::class, 'print_show']);
    Route::resource('/pengingat', \App\Http\Controllers\PengingatController::class);
    Route::resource('/kategori', \App\Http\Controllers\KategoriController::class);
    Route::resource('/profil', \App\Http\Controllers\ProfilController::class);
    Route::get('/kalender', [KalenderController::class, 'index']);
    Route::get('/laporan', [LaporanController::class, 'index']);
    Route::get('/bantuan', [BantuanController::class, 'index']);
    Route::get('/notifikasi', [NotifikasiController::class, 'index']);
    Route::get('/lihatnotifikasi', [NotifikasiController::class, 'show']);
    Route::get('/pengguna', [PenggunaController::class, 'search'])->name('dokumen.search');
});


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
Route::get('/send-email', function(){
    Mail::to('sitiawwalinaauliawati@gmail.com')
    ->send(new TestSendingEmail());
});
//log-viewers
Route::get('log-viewers', [\Rap2hpoutre\LaravelLogViewer\LogViewerController::class, 'index']);







