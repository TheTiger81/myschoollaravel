<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ContactForm extends Model
{
    // Abilita l'assegnazione di massa per i campi specificati
    protected $fillable = ['nome', 'cognome', 'email', 'telefono', 'messaggio'];

    // Se preferisci proteggere campi specifici, puoi usare $guarded al posto di $fillable
    // protected $guarded = [];
}
