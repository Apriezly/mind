<?php

namespace App\Http\Controllers;

use App\Models\Dokumen;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class LaporanController extends Controller
{
    public function index()
    {
        $Dokumen = Dokumen::where('user_id', '=',  Auth::user()->id)->orderBy('expiration_date', 'asc')->get();
        $dokumenData = $Dokumen->map(function($item) {
            return [
                'label' => $item->kegiatan . ' - ' . $item->deskripsi, // Gabungkan kegiatan dan deskripsi sebagai label
                'value' => $item->kategori_id, // Anda bisa mengganti kategori_id dengan kolom lain yang sesuai
            ];
            $dokumenPerBulan = Dokumen::select(
                DB::raw('EXTRACT(MONTH FROM created_at) as bulan'), // Ambil bulan dari created_at
                DB::raw('COUNT(*) as total')                       // Hitung jumlah dokumen per bulan
            )
            ->groupBy(DB::raw('EXTRACT(MONTH FROM created_at)'))    // Kelompokkan berdasarkan bulan
            ->orderBy(DB::raw('EXTRACT(MONTH FROM created_at)'))    // Urutkan berdasarkan bulan
            ->get();
            
            // Format data menjadi array untuk dikirim ke view
            $data = $dokumenPerBulan->map(function($item) {
                return [
                    'bulan' => Carbon::create()->month($item->bulan)->translatedFormat('F'), // Nama bulan
                    'total' => $item->total
               
              ];
        });
    });
        
        return view('laporan.index', ['Dokumen' => $Dokumen ]);
    }
}
      

 // // Ambil data bulan berdasarkan tahun tertentu
    // $bulanData = Dokumen::select(DB::raw('EXTRACT(MONTH FROM created_at) as bulan'))
    //     // Filter berdasarkan tahun
    //     ->groupBy(DB::raw('EXTRACT(MONTH FROM created_at)'))
    //     ->orderBy(DB::raw('EXTRACT(MONTH FROM created_at)'))
    //     ->pluck('bulan')
    //     ->toArray();

   

   
   

        // $annualIncomeData =  Dokumen::select(DB::raw('EXTRACT(YEAR FROM created_at)as year'))
        // ->groupBy(DB::raw('EXTRACT(YEAR FROM created_at)'))
        // ->orderBy(DB::raw('EXTRACT(YEAR FROM created_at)'))
        // ->pluck('year');
        // ->toArray();

        // $years = range(2023,2024);

        // $annualIncome = [];
        // foreach ($years as $year){
        //     $annualIncome[] = $annualIncomeData[$year] ?? 0;
        //  }