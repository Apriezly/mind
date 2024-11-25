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

        // $dokumen = Dokumen::table('dokumen')
        //             ->join('kategori', 'kategori_id.column', '=', 'judul.column')
        //             ->select('kategori_id.column', 'judul.column')
        //             ->get();
        $dokumen = Dokumen::with('kategori')->where('user_id', '=',  Auth::user()->id)->paginate();
        $kategori = Kategori::where('user_id', '=',  Auth::user()->id)->get();
        // $kategori = Kategori::where('user_id', '=',  Auth::user()->id)->take(8)->get();
        // $kategori = Kategori::all();
        return view('pengguna.index', compact('dokumen', 'kategori'));
        

    }

}
