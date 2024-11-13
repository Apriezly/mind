<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NotifikasiController extends Controller
{
    public function index() {
        return view('notifikasi.index');
    }

    public function show() {
        return view('notifikasi.show');
    }
}
