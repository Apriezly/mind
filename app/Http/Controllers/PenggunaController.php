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

        // $dokumen = Dokumen::latest()->paginate(5);
        // $kategori = Kategori::orderBy('judul', 'asc')->get()->pluck('judul', 'id');
        $dokumen = Dokumen::all();
        // $kategori = Kategori::all();
        return view('pengguna.index', compact('dokumen'));
    }

}
