<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Bcrypt;
// use Illuminate\Http\RedirectResponse;
// use Illuminate\Support\Facades\Storage;

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
            'email'     => 'required',
            'password'  => 'required',
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
            'email'     => 'required|email|unique:users,email',
            'nomor'     => 'required|numeric|min:11',
            'password'  => 'required|min:6',
            'ulangi_password' => 'required_with:password|same:password|min:6'
        ]);

        $data['name']       = $request->name;
        $data['email']      = $request->email;
        $data['nomor']      = $request->nomor;
        $data['password']   = bcrypt($request->password);
        $data['ulangi_password']    = $request->ulangi_password;

        User::create($data);

        $login = [
            'email'     => $request->email,            
            'password'  => $request->password,
        ];

        if(Auth::attempt($login)){
            // Session::put('name', $data->name);
            return redirect()->intended('/login')->with('success', 'Login dulu yaaa ^.^');
        }else{
            return redirect()->intended('/register')->with('failed', 'Ups! Ada yang salah nih kayaknya 0-0');
        }
    }
}
