<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LayoutsController extends Controller
{
    public function index() : View 
    {
        $user = User::all();
        return view('layouts.main', compact('user'));
    }
}
