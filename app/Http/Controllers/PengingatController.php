<?php

namespace App\Http\Controllers;

use App\Models\Dokumen;
use App\Models\Relasi;
use App\Models\Set;
use App\Models\Pengingat;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
class PengingatController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $dokumen = Dokumen::join('pengingat', 'dokumen.id', '=', 'pengingat.document_id')
        // ->join('set', 'pengingat.set_id', '=', 'set.id')
        // ->where('user_id', '=',  Auth::user()->id)
        // ->orderBy('expiration_date', 'asc')->get();
        // $pengingat = Pengingat::get();
        // $set = Set::get();
        // return view('pengingat.index', compact('dokumen', 'pengingat', 'set'));

        $dokumen = Dokumen::with('pengingat')->where('user_id', '=',  Auth::user()->id)->orderBy('expiration_date', 'asc')->get();
        $pengingat = Pengingat::get();
        // $set = Set::get();
        // foreach ($dokumen as $data){
        //     $relasi = Relasi::get();
        //     $relasi->document_id = $data->id;
        //     $relasi->set_id = $set->id;
        // }
        return view('pengingat.index', compact('dokumen', 'pengingat'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id): View
    {
       
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id): RedirectResponse
    {
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        
    }
}
