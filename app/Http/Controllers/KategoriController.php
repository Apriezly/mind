<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class KategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       
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

        // $kategori = Kategori::count();
        // $kategori = Kategori::select("SELECT count(*) FROM kategori WHERE user_id = Auth::user()->id");
        // $kategori = Kategori::select("SELECT * FROM kategori");
        // $kategori = Kategori::all();

        // $kategori = Kategori::where('user_id', '=',  Auth::user()->id)->count();

        $ktg = Kategori::where('user_id', '=', Auth::user()->id)->get();
        $kategori = $ktg->count();

        $this->validate($request, [
            'judul'             => 'required',
            'image'             => 'image|mimes:jpeg,jpg,png,svg|max:10240',
        ]);

        if ($kategori < 8){

            if ($request->hasFile('image')){

                $image = $request->file('image');
                $image->storeAs('public/kategori', $image->hashName());
    
                Kategori::create([
                    'user_id'        => Auth::user()->id,
                    'judul'          => $request->judul,
                    'image'          => $image->hashName()
                ]);
           
            } else {
                Kategori::create([
                    'user_id'        => Auth::user()->id,
                    'judul'          => $request->judul,
                ]);
            }
            return redirect()->intended('/beranda')->with(['success' => 'Kategori berhasil dibuat!']);

        }else{
            return redirect()->back()->with('failed', 'error');   
        }
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
            'image'          => 'image|mimes:jpeg,jpg,png,svg|max:10240',
        ]);

        $kategori = Kategori::findOrFail($id);

        if ($request->hasFile('image')){

            $image = $request->file('image');
            $image->storeAs('public/kategori', $image->hashName());
            
            Storage::disk('local')->delete('public/kategori/'. $kategori->image);

            $kategori->update([
                'user_id'        => Auth::user()->id,
                'judul'          => $request->judul,
                'image'          => $image->hashName()
            ]);
       
        } else {
            $kategori->update([
                'user_id'        => Auth::user()->id,
                'judul'          => $request->judul,
            ]);
        }

        return redirect()->intended('/beranda')->with(['success' => 'Kategori berhasil diubah!']);
    }

    /**
     * Remove the specified resource from storage.
     */
    
    public function destroy($id): RedirectResponse
    {
        $kategori = Kategori::findOrFail($id);

        Storage::disk('local')->delete('public/kategori/'. $kategori->image);

        $kategori->delete();

        return redirect()->intended('/beranda')->with(['success' => 'Data berhasil dihapus!']);
    }
}
