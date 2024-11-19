<?php

namespace App\Http\Controllers;

use App\Models\Dokumen;
use App\Models\Kategori;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class PenggunaController extends Controller
{
    public function index() {

        // $dokumen = Dokumen::table('dokumen')
        //             ->join('kategori', 'kategori_id.column', '=', 'judul.column')
        //             ->select('kategori_id.column', 'judul.column')
        //             ->get();
        $dokumen = Dokumen::with('kategori')->paginate();
        return view('pengguna.index', compact('dokumen'));
        

    }

}
