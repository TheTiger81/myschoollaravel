<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Canteen extends Model
{
    protected $table = 'canteen';

    public function student()
    {
        return $this->belongsTo(Student::class);
    }

    // Qui puoi aggiungere altri metodi utili per la gestione dei dati della mensa
}
