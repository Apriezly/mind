<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Http;

class SendController extends Controller
{
    public function send_wa(){
        $response =
        Http::post('https://graph.facebook.com/v15.0/12345678910/messages', [
            'messaging_product' => 'whatsapp',
            'recipient_type' => 'individual',
            'to' => 'whatsapp:+6281234567890',
            'type' => 'template',
            'template' => [
                'name' => 'hello_world',
                'languange' => ['code' => 'id_ID'],
            ]
            ]);
    }

    public function send_email(){
        Mail::send('emails.reminder', ['user' => $user, 'document' => $document],
        function($message) use ($user) {
            $message->to($user->email, $user->name)
                    ->subject('Pengingat Dokumen Anda akan Kadaluarsa');
        });
    }
}
