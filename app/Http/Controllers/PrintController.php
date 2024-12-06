<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use PDF;
use App\Models\Dokumen;


class PrintController extends Controller
{
    public function print_show(){
        // $dokumen = Dokumen::findOrFail($id);
 
    	// $pdf = PDF::loadview('show_pdf',['dokumen'=>$dokumen]);
    	// return $pdf->stream('Data-mind.pdf');
    }
}
