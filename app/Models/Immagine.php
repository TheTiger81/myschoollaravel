<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Immagine extends Model
{
    protected $table = 'immagini'; // Opzionale se il nome della tabella segue le convenzioni di Laravel

    // Laravel di default utilizza le colonne `created_at` e `updated_at`. Se la tua tabella le include, non è necessario specificarle qui.
    // Se la tua tabella non le utilizza, puoi disabilitarle con:
    // public $timestamps = false;

    // Specifica quali attributi possono essere assegnati in massa
    protected $fillable = [
        'percorso',
        'descrizione',
        // Aggiungi altri campi assegnabili in massa se necessario
    ];

    // Se hai campi che non sono stringhe o numeri (ad esempio, date o campi JSON) puoi specificare i loro tipi qui
    // protected $casts = [
    //     'nome_campo' => 'tipo',
    // ];

    // Relazioni con altri modelli, se presenti, possono essere definite qui
    // Esempio:
    // public function relazione() {
    //     return $this->belongsTo(AltroModello::class);
    // }
}
