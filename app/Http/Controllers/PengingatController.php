<?php

namespace App\Http\Controllers;

use App\Models\Dokumen;
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
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
