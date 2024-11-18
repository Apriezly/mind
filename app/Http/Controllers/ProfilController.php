<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProfilController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index() {
        // $user = User::findOrFail($id);
        return view('pengguna.profil');
       
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
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id): RedirectResponse
    {
        $this->validate($request, [
            'image'           => 'image|mimes:jpeg,jpg,png|max:2048',
            'name'            => 'required',
            'email'           => 'required|email|unique:user,email',
            'nomor'           => 'required|numeric|min:11',
            'password'        => 'required|min:6',
            'ulangi_password' => 'required_with:password|same:password|min:6'
            
        ]);

        $user = User::findOrFail($id);

        if ($request->hasFile('image')){

            $image = $request->file('image');
            $image->storeAs('public/profil', $image->hashName());
            
            Storage::delete('public/profil/'.$profil->image);

            $user->update([
                'image'      => $image->hashName(),
                'name'       => $request->name,
                'email'      => $request->email,
                'nomor'      => $request->nomor,
                'password'   => bcrypt($request->password),
                'ulangi_password'    => $request->ulangi_password
            ]);
       
        } else {
            $user->update([
                'name'       => $request->name,
                'email'      => $request->email,
                'nomor'      => $request->nomor,
                'password'   => bcrypt($request->password),
                'ulangi_password'    => $request->ulangi_password
            ]);
        }

        return redirect()->route('pengguna.index')->with(['success' => 'Profil berhasil diubah!']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
