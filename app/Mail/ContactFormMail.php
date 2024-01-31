<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class ContactFormMail extends Mailable
{
    use Queueable, SerializesModels;

    public $data; // Variabile per contenere i dati del modulo di contatto

    /**
     * Creare una nuova istanza del messaggio.
     * @param array $data Dati del modulo di contatto
     */
    public function __construct($data)
    {
        $this->data = $data; // Assegna i dati del modulo alla variabile
    }

    /**
     * Ottieni la busta del messaggio.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Nuovo Messaggio dal Modulo di Contatto', // Soggetto dell'email
        );
    }

    /**
     * Ottieni la definizione del contenuto del messaggio.
     */
    public function content(): Content
    {
        return new Content(
            view: 'emails.contact', // Vista Blade da utilizzare per l'email
            with: ['data' => $this->data], // Passa i dati del modulo alla vista
        );
    }

    /**
     * Ottieni gli allegati per il messaggio.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return []; // Qui puoi aggiungere allegati se necessario
    }
}
