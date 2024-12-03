<?php

namespace App\Http\Controllers;

use App\Models\Dokumen;
use App\Models\Kategori;
use Illuminate\View\View;
use App\Models\Set;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class DokumenController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $dokumen = Dokumen::where('user_id', '=',  Auth::user()->id)->orderBy('expiration_date', 'asc')->get();
        return view('dokumen.index', compact('dokumen'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): Response
    {
        $set = Set::get()->pluck('nama', 'id');
        $kategori = Kategori::where('user_id', '=',  Auth::user()->id)->orderBy('judul', 'asc')->get()->pluck('judul', 'id');
        return response(view('dokumen.create', ['kategori' => $kategori, 'set' => $set]));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $this->validate($request, [
            'kegiatan'          => 'required',
            'deskripsi'         => 'required',
            'expiration_date'   => 'required',
            'kategori_id'       => 'required',
            'image'             => 'image|mimes:jpeg,jpg,png|max:10240',
        ]);

        if ($request->hasFile('image')){

            $image = $request->file('image');
            $image->storeAs('public/dokumen', $image->hashName());

            Dokumen::create([
                'user_id'           => Auth::user()->id,
                'kegiatan'          => $request->kegiatan,
                'deskripsi'         => $request->deskripsi,
                'expiration_date'   => $request->expiration_date,
                'kategori_id'       => $request->kategori_id,
                'image'             => $image->hashName(),  
                'imageasli'         => $request->file('image')->getClientOriginalName(),
            ]);
       
        } else {
            Dokumen::create([
                'user_id'           => Auth::user()->id,
                'kegiatan'          => $request->kegiatan,
                'deskripsi'         => $request->deskripsi,
                'expiration_date'   => $request->expiration_date,
                'kategori_id'       => $request->kategori_id,
            ]);
        }
        

        return redirect()->route('data.index')->with(['success' => 'Data berhasil disimpan!']);
    }

    

    /**
     * Display the specified resource.
     */
    public function show(string $id): View
    {
        $dokumen = Dokumen::findOrFail($id);
        return view('dokumen.show', compact('dokumen'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id): View
    {
        $dokumen = Dokumen::findOrFail($id);
        $kategori = Kategori::where('user_id', '=',  Auth::user()->id)->orderBy('judul', 'asc')->get()->pluck('judul', 'id');
        return view('dokumen.edit', compact('dokumen', 'kategori'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id): RedirectResponse
    {
        $this->validate($request, [
            'kegiatan'          => 'required',
            'deskripsi'         => 'required',
            'expiration_date'   => 'required',
            'kategori_id'       => 'required',
            'image'             => 'image|mimes:jpeg,jpg,png|max:10240',
        ]);

        $dokumen = Dokumen::findOrFail($id);

        if ($request->hasFile('image')){

            $image = $request->file('image');
            $image->storeAs('public/dokumen', $image->hashName());
            
            Storage::disk('local')->delete('public/dokumen/'. $dokumen->image);

            $dokumen->update([
                'user_id'           => Auth::user()->id,
                'kegiatan'          => $request->kegiatan,
                'deskripsi'         => $request->deskripsi,
                'expiration_date'   => $request->expiration_date,
                'kategori_id'       => $request->kategori_id,
                'image'             => $image->hashName(),
                'imageasli'         => $request->file('image')->getClientOriginalName(),
            ]);
       
        } else {
            $dokumen->update([
                'user_id'           => Auth::user()->id,
                'kegiatan'          => $request->kegiatan,
                'deskripsi'         => $request->deskripsi,
                'expiration_date'   => $request->expiration_date,
                'kategori_id'       => $request->kategori_id
            ]);
        }

        return redirect()->route('data.index')->with(['success' => 'Data berhasil diubah!']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id): RedirectResponse
    {
        $dokumen = Dokumen::findOrFail($id);

        Storage::disk('local')->delete('public/dokumen/'. $dokumen->image);

        $dokumen->delete();

        return redirect()->route('data.index')->with(['success' => 'Data berhasil dihapus!']);
    }
}
