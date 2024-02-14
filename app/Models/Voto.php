<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Voto extends Model
{
    protected $table = 'voti';

    public function studente()
    {
        return $this->belongsTo(Studente::class, 'studente_id');
    }

    public function materia()
    {
        return $this->belongsTo(Materia::class, 'materia_id');
    }

    public function annoScolastico()
    {
        return $this->belongsTo(AnnoScolastico::class, 'anno_scolastico_id');
    }
}