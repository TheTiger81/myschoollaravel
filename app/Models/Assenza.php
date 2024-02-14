<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Assenza extends Model
{
    protected $table = 'assenze';

    public function studente()
    {
        return $this->belongsTo(Studente::class, 'studente_id');
    }

    public function annoScolastico()
    {
        return $this->belongsTo(AnnoScolastico::class, 'anno_scolastico_id');
    }
}
