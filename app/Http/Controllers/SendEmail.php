<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\TestSendingEmail;

class SendEmail extends Controller
{
    public function index()
    {
        Mail::to('testemail@gmail.com')->send(new TestSendingEmail());
    }
}
