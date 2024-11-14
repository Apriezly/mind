<?php

namespace App\Http\Controllers;

use App\Models\Dokumen;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
class PengingatController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $dokumen = Dokumen::latest()->paginate(5);

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
        $dokumen = Dokumen::findOrFail($id);
        return view('pengingat.edit', compact('dokumen'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id): RedirectResponse
    {
        $this->validate($request, [
            // 'set'               => 'required',
            'ulangi'            => 'required',
            'waktu'             => 'required',
            'tipe'              => 'required',
        ]);

        $dokumen = Dokumen::findOrFail($id);

        $dokumen->update([
            // 'set'               => $request->set,
            'ulangi'            => $request->ulangi,
            'waktu'             => $request->waktu,
            'tipe'              => $request->tipe
        ]);

        return redirect()->route('pengingat.index')->with(['success' => 'Pengingat berhasil diatur!']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
