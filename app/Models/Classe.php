<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Classe extends Model
{
    protected $table = 'classi';

    public function annoScolastico()
    {
        return $this->belongsTo(AnnoScolastico::class, 'anno_scolastico_id');
    }

    public function studenti()
    {
        return $this->belongsToMany(Studente::class, 'classe_studente', 'classe_id', 'studente_id');
    }

    public function attivita()
    {
        return $this->hasMany(Attivita::class, 'classe_id');
    }

    // Altre relazioni se necessario...
}

