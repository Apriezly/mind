<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\TestSendingEmail;
use App\Models\User;
use Illuminate\Support\Facades\Auth;


class SendEmail extends Controller
{
    public function index()
    {
        Mail::to(Auth::user()->email)->send(new TestSendingEmail());
    }
}
