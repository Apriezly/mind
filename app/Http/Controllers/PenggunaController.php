<?php

namespace App\Http\Controllers;

use App\Models\Dokumen;
use App\Models\Kategori;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class PenggunaController extends Controller
{
    public function index() {
        $dokumen = Dokumen::with('kategori')->where('user_id', '=',  Auth::user()->id)->orderBy('expiration_date', 'asc')->get();
        $kategori = Kategori::where('user_id', '=',  Auth::user()->id)->get();
        return view('pengguna.index', compact('dokumen', 'kategori'));
        

    }

}
