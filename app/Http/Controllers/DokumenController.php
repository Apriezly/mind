<?php

namespace App\Http\Controllers;

use App\Models\Dokumen;
use App\Models\Kategori;
use Illuminate\View\View;
use App\Models\Set;
use App\Models\Relasi;
use App\Models\Pengingat;
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
        
        $string = $request->set;
        $setArray = explode(',', $string);

        $this->validate($request, [
            'kegiatan'          => 'required',
            'deskripsi'         => 'required',
            'expiration_date'   => 'required',
            'image'             => 'image|mimes:jpeg,jpg,png|max:10240',
        ], [
            'image.image' => "Harus berupa gambar.",
            'image.mimes:jpeg,jpg,png' => "Format gambar harus JPEG, JPG, atau PNG",
            'image.max:10240' => "Ukuran gambar tidak boleh melebihi 10240 megabita",
            'kegiatan.required' => "Kegiatan harus diisi.",
            'deskripsi.required' => "Deskripsi harus diisi.",
            'expiration_date.required' => "Tanggal pelaksanaan harus diisi.",
        ]);

        if ($request->hasFile('image')){

            $image = $request->file('image');
            $image->storeAs('public/dokumen', $image->hashName());

            $dokumen = Dokumen::create([
                'user_id'           => Auth::user()->id,
                'kegiatan'          => $request->kegiatan,
                'deskripsi'         => $request->deskripsi,
                'expiration_date'   => $request->expiration_date,
                'kategori_id'       => $request->kategori_id,
                'image'             => $image->hashName(),  
                'imageasli'         => $request->file('image')->getClientOriginalName(),
                'tipe'              => $request->tipe,
            ]);

            foreach ($setArray as $item => $value) {
                $data2 = array(
                    'document_id' => $dokumen->id,
                    'set_id' => $setArray[$item],
                    'set_custom' => $request->set_custom,
                );
                Pengingat::create($data2);
            }

        } else {
            $dokumen = Dokumen::create([
                'user_id'           => Auth::user()->id,
                'kegiatan'          => $request->kegiatan,  
                'deskripsi'         => $request->deskripsi,
                'expiration_date'   => $request->expiration_date,
                'kategori_id'       => $request->kategori_id,
                'tipe'              => $request->tipe,
            ]);

            foreach ($setArray as $item => $value) {
                $data2 = array(
                    'document_id' => $dokumen->id,
                    'set_id' => $setArray[$item],
                    'set_custom' => $request->set_custom,
                );
                Pengingat::create($data2);
            }

            // dd($request);die;
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
        $set = Set::get()->pluck('nama', 'id');
        $pengingat = Pengingat::where('document_id', '=', $dokumen->id);
        return view('dokumen.edit', compact('dokumen', 'kategori', 'set', 'pengingat'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id): RedirectResponse
    {

        $string = $request->set;
        $setArray = explode(',', $string);
        
        $this->validate($request, [
            'kegiatan'          => 'required',
            'deskripsi'         => 'required',
            'expiration_date'   => 'required',
            'image'             => 'image|mimes:jpeg,jpg,png|max:10240',
        ], [
            'image.image' => "Harus berupa gambar.",
            'image.mimes:jpeg,jpg,png' => "Format gambar harus JPEG, JPG, atau PNG",
            'image.max:10240' => "Ukuran gambar tidak boleh melebihi 10240 megabita",
            'kegiatan.required' => "Kegiatan harus diisi.",
            'deskripsi.required' => "Deskripsi harus diisi.",
            'expiration_date.required' => "Tanggal pelaksanaan harus diisi.",
        ]);

        $dokumen = Dokumen::findOrFail($id);
        $pengingat = Pengingat::where('document_id', '=', $dokumen->id);

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
                'tipe'              => $request->tipe,
            ]);

            foreach ($setArray as $item => $value) {
                $data2 = array(
                    'document_id'   => $dokumen->id,
                    'set_id'        => $setArray[$item],
                    'set_custom'    => $request->set_custom,
                );
                $pengingat->update($data2);
            }
       
        } else {
            $dokumen->update([
                'user_id'           => Auth::user()->id,
                'kegiatan'          => $request->kegiatan,
                'deskripsi'         => $request->deskripsi,
                'expiration_date'   => $request->expiration_date,
                'kategori_id'       => $request->kategori_id,
                'tipe'              => $request->tipe,
            ]);

            foreach ($setArray as $item => $value) {
                $data2 = array(
                    'document_id'   => $dokumen->id,
                    'set_id'        => $setArray[$item],
                    'set_custom'    => $request->set_custom,
                );
                $pengingat->update($data2);
            }
        }

        return redirect()->route('data.index')->with(['success' => 'Data berhasil diubah!']);
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

        return redirect()->route('data.index')->with(['success' => 'Data berhasil dihapus!']);
    }
}
