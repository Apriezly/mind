<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
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
            'nomor'           => 'required|numeric|min:11',
            'password_baru'        => 'required|min:6',
        ]);

        $user = User::findOrFail($id);

        if ($request->hasFile('image')){

            $image = $request->file('image');
            $image->storeAs('public/user', $image->hashName());

            // $imgManager = new ImageManager(new Driver());
            
            // $thumbImage = $imgManager->read('public/user/'.$image);

            // $thumbImage->cover(100, 100);

            // $thumbImage->save(public_path('public/user/thumnails/'.$image));

            // Storage::delete('public/user/'.$user->image);
            // Storage::delete('public/user/thumnails/'.$user->image);

            Storage::disk('local')->delete('public/user/'.$user->image);

            $user->update([
                'image'      => $image->hashName(),
                'name'       => $request->name,
                'email'      => $request->email,
                'nomor'      => $request->nomor,
                'password'   => bcrypt($request->password_baru),
                'ulangi_password'    => $request->password_baru
            ]);

            // Avatar::create($request->name)->save(storage_path(path: 'app/public/avatar-' . $user->id . '.png'));
       
        } else {
            $user->update([
                'name'       => $request->name,
                'email'      => $request->email,
                'nomor'      => $request->nomor,
                'password'   => bcrypt($request->password_baru),
                'ulangi_password'    => $request->password_baru
            ]);
        }

        return redirect()->intended('/beranda')->with(['success' => 'Profil berhasil diubah!']);
       
    }
    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
