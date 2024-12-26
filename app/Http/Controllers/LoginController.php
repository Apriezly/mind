<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Kategori;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Bcrypt;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Mail;
use App\Mail\EmailRegister;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class LoginController extends Controller
{
    public function index(){
        return view('auth.index');
    }
    
    public function login(){
        return view('auth.login');
    }

    public function login_proses(Request $request){

        $request->validate([
            'email'     => 'required|email',
            'password'  => 'required',
        ], [
            'email.required' => "Email harus diisi.",
            'password.required' => "Password harus diisi.",
        ]);

        $data = [
            'email'     => $request->email,
            'password'  => $request->password,
        ];

        // dd($data);die;

        if(Auth::attempt($data)){
            return redirect()->intended('/beranda');
        }else{
            return redirect()->intended('/login')->with('error', 'Email atau Password Salah');
        }
    }
    

    public function logout(){
        Auth::logout();
        return redirect()->route('login')->with('success', 'Berhasil Logout');
    }

    public function register(){
        return view('auth.register');
    }

    public function register_proses(Request $request){
        $request->validate([
            'name'      => 'required',
            'email'     => 'required|email|unique:user,email',
            'nomor'     => 'required|numeric|digits_between:11,15',
            'password'  => 'required|min:6',
            'ulangi_password' => 'required_with:password|same:password|min:6'
        ], [
            'name.required' => 'Nama harus diisi.',
            'email.required' => "Email harus diisi.",
            'email.unique' => "Email sudah digunakan.",
            'nomor.required' => "Nomor harus diisi.",
            'nomor.numeric' => "Nomor harus berupa angka.",
            'nomor.digits_between:11,15' => "Jumlah nomor adalah 11 sampai 15 angka.",
            'password.required' => "Password harus diisi.",
            'password.min:6' => "Jumlah minimal sandi adalah 6 karakter.",
            'ulangi_password.required_with' => "Jika input sandi memiliki data, maka input ulangi sandi wajib diisi.",
            'ulangi_password.same' => "Sandi harus sama.",
            'ulangi_password.min:6' => "Jumlah minimal sandi adalah 6 karakter.",
        ]);

        $user = User::create([
            'name'       => ucwords($request->name),
            'email'      => $request->email,
            'nomor'      => $request->nomor,
            'password'   => bcrypt($request->password),
        ]);

        $kategori = [
            [
                'judul'          => 'sekolah',
                'image'          => 'sekolah.svg',
    
            ],
            [
                'judul'          => 'bisnis',
                'image'          => 'bisnis.svg',
    
            ],
            [
                'judul'          => 'keluarga',
                'image'          => 'keluarga.svg',
    
            ],
            [
                'judul'          => 'pribadi',
                'image'          => 'pribadi.svg',
    
            ],
        ];

        foreach ($kategori as $data) {
            $image = $data['image'];
            $imageHash = uniqid() . '.' .pathinfo($image, PATHINFO_EXTENSION);
            if (!Storage::exists('public/kategori')){
                Storage::makeDirectory('public/kategori');
            }
            $lokasiAwal = public_path('element/' . $image);
            $tujuan =  storage_path('app/public/kategori/' .$imageHash);
            
            if (file_exists($lokasiAwal)) {
                copy($lokasiAwal, $tujuan); 
            }else{
                continue;
            }


            Kategori::create([
                'user_id' => $user->id,
                'judul' => ucwords($data['judul']),
                'image' => $imageHash,
            ]);
        }
        

        $login = [
            'email'     => $request->email,            
            'password'  => $request->password,
        ];

        if(Auth::attempt($login)){
            Mail::to($request->email)->send(new EmailRegister($request->all()));
            
            return redirect()->intended('/login')->with('success', 'Login dulu yaaa ^.^');
        }else{
            return redirect()->intended('/register')->with('error', 'Ups! Ada yang salah nih kayaknya 0-0');
        }
    }

    public function lupa_sandi(){
        return view('auth.forgot-password');
    }

    public function kirim_email(Request $request){
        $request->validate(['email' => 'required|email']);

        $status = Password::sendResetLink( //untuk mengirim link ke email
            $request->only('email')
        );

        return $status === Password::RESET_LINK_SENT
                ? back()->with(['status' => __($status)])
                : back()->withErrors(['email' => __($status)]);
    }

    public function reset_password($token){
        return view('auth.reset-password', ['token' => $token]);
    }
    
    public function update_password(Request $request){
        $request->validate([
            'token'             => 'required',
            'email'             => 'required|email',
            'password'          => 'required|min:6',
            'ulangi_password'   => 'required_with:password|same:password|min:6'
        ]);
    
        $status = Password::reset(
            $request->only('email', 'password', 'ulangi_password', 'token'),
    
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
    }
}
