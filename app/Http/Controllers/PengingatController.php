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
use Illuminate\Support\Facades\Storage;

class PengingatController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        //foreach = mengawali loop

        $dokumen = Dokumen::with('pengingat')->where('user_id', '=',  Auth::user()->id)->orderBy('expiration_date', 'asc')->get();
        foreach ($dokumen as $item => $data) {
            $data->arr_set = Pengingat::with('set')->where('document_id',  $data->id )->get()->toArray();
        }
        $pengingat = Pengingat::with('set')->get();
        $set = Set::get();
        
        return view('pengingat.index', compact('dokumen', 'pengingat', 'set'));
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
    public function destroy($id): RedirectResponse
    {
        $dokumen = Dokumen::findOrFail($id);
        $pengingat = Pengingat::where('document_id', '=', $dokumen->id);
        $relasi = Relasi::where('document_id', '=', $dokumen->id);

        Storage::disk('local')->delete('public/dokumen/'. $dokumen->image);

        $dokumen->delete();

        $pengingat->delete();

        $relasi->delete();

        return redirect()->route('pengingat.index')->with(['success' => 'Data berhasil dihapus!']);
    }
}
