<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Attivita extends Model
{
    protected $table = 'attivita';

    public function classe()
    {
        return $this->belongsTo(Classe::class, 'classe_id');
    }

    public function annoScolastico()
    {
        return $this->belongsTo(AnnoScolastico::class, 'anno_scolastico_id');
    }
}

