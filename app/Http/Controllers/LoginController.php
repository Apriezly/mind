<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Bcrypt;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Mail;
use App\Mail\EmailRegister;


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
            return redirect()->intended('/login')->with('failed', 'Email atau Password Salah');
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

        $data['name']       = $request->name;
        $data['email']      = $request->email;
        $data['nomor']      = $request->nomor;
        $data['password']   = bcrypt($request->password);

        User::create($data);

        $login = [
            'email'     => $request->email,            
            'password'  => $request->password,
        ];

        if(Auth::attempt($login)){
            // Session::put('name', $data->name);
            Mail::to(Auth::user()->email)->send(new EmailRegister($request->all()));
            return redirect()->intended('/login')->with('success', 'Login dulu yaaa ^.^');
        }else{
            return redirect()->intended('/register')->with('failed', 'Ups! Ada yang salah nih kayaknya 0-0');
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
    
}
