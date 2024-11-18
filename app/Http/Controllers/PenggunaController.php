<?php

namespace App\Http\Controllers;

use App\Models\Dokumen;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class PenggunaController extends Controller
{
    public function index() {
        $dokumen = Dokumen::latest()->paginate(5);
        return view('pengguna.index', compact('dokumen'));
    }

}
