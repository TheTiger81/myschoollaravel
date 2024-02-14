<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Evento extends Model
{
    use HasFactory;

    // Definisci il nome della tabella se non segue la convenzione standard di Laravel
    protected $table = 'eventi';

    // Abilita l'assegnazione in massa per i campi della tua tabella
    protected $fillable = [
        'titolo',
        'descrizione',
        'inizio',
        'fine'
    ];

    // Se hai date nel tuo modello, Laravel può automaticamente convertirle in istanze Carbon
    protected $dates = [
        'inizio',
        'fine',
        'created_at',
        'updated_at'
    ];
}

