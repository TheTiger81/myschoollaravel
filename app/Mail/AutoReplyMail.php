<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class AutoReplyMail extends Mailable
{
    use Queueable, SerializesModels;

    public $data; // Variabile per contenere i dati inviati dal modulo

    public function __construct($data)
    {
        $this->data = $data; // Assegna i dati ricevuti dal modulo
    }

    public function build()
    {
        return $this->from('gardenhousesrl@virgilio.it') // Imposta il mittente
                    ->subject('Garden House Istituto Paritario') // Imposta il soggetto dell'email
                    ->view('emails.autoreply') // Imposta la vista Blade per il corpo dell'email
                    ->with('data', $this->data); // Passa i dati alla vista
    }
}
