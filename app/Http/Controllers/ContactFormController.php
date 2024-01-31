<?php

namespace App\Http\Controllers;

use App\Mail\ContactFormMail;
use App\Mail\AutoReplyMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Models\ContactForm; // Assumi di avere un modello ContactForm

class ContactFormController extends Controller
{
    /**
     * Gestisce l'invio del modulo di contatto.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validazione dei dati del modulo
        $validatedData = $request->validate([
            'nome' => 'required|max:255',
            'cognome' => 'required|max:255',
            'email' => 'required|email',
            'messaggio' => 'required',
            'telefono' => 'nullable'
        ]);

        // Salvataggio dei dati nel database
        ContactForm::create($validatedData);

        // Invio dell'email all'amministratore del sito
        Mail::to('gardenhousesrl@virgilio.it')->send(new ContactFormMail($validatedData));

        // Invio dell'email di risposta automatica al mittente
        Mail::to($validatedData['email'])->send(new AutoReplyMail($validatedData));

        // Risposta JSON di successo
        return response()->json(['message' => 'Modulo inviato con successo!'], 200);
    }
}


