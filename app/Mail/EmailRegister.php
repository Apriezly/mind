<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class EmailRegister extends Mailable
{
    use Queueable, SerializesModels;

    public $data; //properti untuk menyimpan data

    /**
     * Create a new message instance.
     */
    public function __construct($data)
    {
        $this->data = $data; //menyimpan data ke properti
    }

    /**
     * Get the message envelope.
     */
    // public function envelope(): Envelope
    // {
    //     return new Envelope(
    //         subject: 'Akun Berhasil Terdaftar',
    //     );
    // }

    /**
     * Get the message content definition.
     */
    // public function content(): Content
    // {
    //     return new Content(
    //         view: 'emails.email-register',
    //     );
    // }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    // public function attachments(): array
    // {
    //     return [];
    // }

    public function build(){
        return $this->view('emails.email-register')
        ->subject('Akun Berhasil Terdaftar🎉')
        ->with('data', $this->data); //kirim data ke view
    }
}
