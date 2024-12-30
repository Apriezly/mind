<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Dokumen;
use Illuminate\Support\Facades\Auth;

class KalenderController extends Controller
{
    public function index(){
        $dokumen = Dokumen::where('user_id', Auth::user()->id)
            ->get(['id', 'kegiatan as title', 'expiration_date as start']);
        return view('kalender.index', compact('dokumen'));
    }
}
