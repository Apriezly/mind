<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PenggunaController extends Controller
{
    public function index() {
        $user = Auth::user()->name;
        return view('pengguna.index');
    }

    public function profil() {
        return view('pengguna.profil');
    }
}
