<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;
// use Laravolt\Avatar\Facade as Avatar;
// use Intervention\Image\ImageManager;
// use Intervention\Image\Drivers\Gd\Driver;

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
            'image'           => 'image|mimes:jpeg,jpg,png|max:10240',
            'name'            => 'required',
            'email'           => 'required|email',
            'nomor'           => 'required|numeric|digits_between:11,15',
            'password_lama'   => 'required_with:password_baru|min:6',
            'password_baru'   => 'nullable|min:6',
        ], [
            'image.image' => "Harus berupa gambar.",
            'image.mimes:jpeg,jpg,png' => "Format gambar harus JPEG, JPG, atau PNG",
            'image.max:10240' => "Ukuran gambar tidak boleh melebihi 10240 megabita",
            'name.required' => "Nama harus diisi.",
            'email.required' => "Email harus diisi.",
            'nomor.required' => "Nomor harus diisi.",
            'nomor.numeric' => "Nomor harus berupa angka.",
            'nomor.digits_between:11,15' => "Jumlah nomor adalah 11 sampai 15 angka.",
            'password_baru.min:6' => "Jumlah minimal sandi adalah 6 karakter.",
            'password_lama.required_with' => "Sandi lama harus diisi.",
            'password_lama.min:6' => "Jumlah minimal sandi adalah 6 karakter.",
        ]);

        $user = User::findOrFail($id);

        if ($request->hasFile('image')){

            $image = $request->file('image');
            $image->storeAs('public/user', $image->hashName());

            Storage::disk('local')->delete('public/user/'.$user->image);

            $user->update([
                'image'      => $image->hashName(),
                'name'       => ucwords($request->name),
                'email'      => $request->email,
                'nomor'      => $request->nomor,
                'password'   => Hash::make($request->password_baru),
            ]);

        } else {
            $user->update([
                'name'       => ucwords($request->name),
                'email'      => $request->email,
                'nomor'      => $request->nomor,
                'password'   => Hash::make($request->password_baru),
            ]);
        }

        if (!Hash::check($request->password_lama, $user->password)) {
            return back()->withErrors(['password_lama' => 'Password lama tidak sesuai.']);
        }else{
            return redirect()->intended('/beranda')->with(['success' => 'Profil berhasil diubah!']);
        }
        
       
    }
    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
