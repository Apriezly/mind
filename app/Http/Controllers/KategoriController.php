<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class KategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $kategori = Dokumen::latest()->paginate(5);
        return view('kategori.index', compact('kategori'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('kategori.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $this->validate($request, [
            'judul'             => 'required',
            'image'             => 'required|image|mimes:jpeg,jpg,png|max:2048',
        ]);

        $image = $request->file('image');
        $image->storeAs('public/kategori', $image->hashName());

        Kategori::create([
                'judul'          => $request->judul,
                'image'          => $image->hashName()
        ]);

        return redirect()->intended('/beranda')->with(['success' => 'Kategori berhasil dibuat!']);
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
        $kategori = Kategori::findOrFail($id);
        return view('kategori.edit', compact('kategori'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id): RedirectResponse
    {
        $this->validate($request, [
            'judul'          => 'required',
            'image'          => 'required|image|mimes:jpeg,jpg,png|max:2048',
        ]);

        $kategori = Kategori::findOrFail($id);

        if ($request->hasFile('image')){

            $image = $request->file('image');
            $image->storeAs('public/kategori', $image->hashName());
            
            Storage::delete('public/kategori/'.$kategori->image);

            $kategori->update([
                'judul'          => $request->kegiatan,
                'image'          => $image->hashName()
            ]);
       
        } else {
            $kategori->update([
                'judul'          => $request->kegiatan,
            ]);
        }

        return redirect()->route('kategori.index')->with(['success' => 'Kategori berhasil diubah!']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
