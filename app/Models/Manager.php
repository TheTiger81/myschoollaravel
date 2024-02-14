<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Manager extends Model
{
    use HasFactory;

    // Specifica il nome della tabella se non segue la convenzione di Laravel
    protected $table = 'manager';

    // Abilita l'assegnazione di massa per i campi specificati
    protected $fillable = [
        'user_id',
        'nome',
        'cognome',
        'email',
        'data_di_nascita',
        'nato_a',
        'residente',
        'indirizzo',
        'cap',
        'provincia',
        'codice_fiscale',
        'telefono',
        'cellulare',
    ];

    /**
     * Definisce la relazione con il model User, assumendo che esista un model User
     * e che ogni manager sia associato a un utente specifico.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Qui puoi aggiungere altri metodi del modello, come scope query o relazioni con altri modelli
}