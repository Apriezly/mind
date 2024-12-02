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
        $dokumen = Dokumen::where('user_id', '=',  Auth::user()->id)->orderBy('expiration_date', 'asc')->get();
        return view('pengingat.index', compact('dokumen'));
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
        $set = Set::get()->pluck('nama', 'id');
        $dokumen = Dokumen::findOrFail($id);
        return view('pengingat.edit', compact('dokumen', 'set'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id): RedirectResponse
    {
        $this->validate($request, [
            'waktu'             => 'required',
            // 'set'               => 'required', 'array',
            'tipe'              => 'required', 
        ]);

        $dokumen = Dokumen::findOrFail($id);

        // if ($dokumen->has('waktu', 'tipe')){

            $dokumen->update([
                'waktu'     => $request->waktu,
                'tipe'      => $request->tipe,
            ]);

            // Pengingat::create([
            //     'set'       => $request->set,
            // ]);

            // $document->pengingat()->sync('set');

            // Relasi::create([
            //     'document_id' => $request->dokumen->id,
            //     'pengingat_id' => $request->pengingat->id,
            // ]);

        // } else {
        //     Dokumen::create([
        //         'waktu'     => $request->waktu,
        //         'tipe'      => $request->tipe,
        //     ]);

        //     Pengingat::create([
        //         'set'       => $dokumen->pengingat()->sync('set'),
        //     ]);

        //     Relasi::update([
        //         'document_id' => $request->dokumen->id,
        //         'pengingat_id' => $request->pengingat->id,
        //     ]);
        // }


        return redirect()->route('pengingat.index')->with(['success' => 'Pengingat berhasil diatur']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $pengingat = Dokumen::findOrFail($id);

        $pengingat->delete();

        return redirect()->route('pengingat.index')->with(['success' => 'Data berhasil dihapus!']);
    }
}
