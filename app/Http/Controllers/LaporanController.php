<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\Models\Dokumen;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class LaporanController extends Controller
{
    public function index(Request $request)
{
    // Mengambil input tahun dari request
    $tahun = $request->input('tahun');

    // Ambil data berdasarkan tahun yang dipilih
    $Dokumen = DB::table('dokumen')
        ->where('user_id', '=', Auth::user()->id)
        ->select(DB::raw('EXTRACT(YEAR FROM expiration_date) as tahun, EXTRACT(MONTH FROM expiration_date) as bulan, COUNT(*) as jumlah'))
        ->when($tahun, function ($query, $tahun) {
            // Filter data berdasarkan tahun jika ada input tahun
            return $query->whereRaw('EXTRACT(YEAR FROM expiration_date) = ?', [$tahun]);
        })
        ->groupBy(DB::raw('EXTRACT(YEAR FROM expiration_date)'), 'bulan')
        ->orderBy('tahun')
        ->orderBy('bulan')
        ->get();

    return view('laporan.index', compact('Dokumen'));
}



}

 
      

 
   

   
   

        