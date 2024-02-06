<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Contatto extends Model
{
    // Specifica esplicitamente il nome della tabella
    protected $table = 'contatti';

    // Definisci i campi assegnabili in massa
    protected $fillable = ['nome', 'cognome', 'telefono', 'email', 'messaggio', 'gestito'];
}

