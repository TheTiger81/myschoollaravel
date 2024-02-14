<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Studente extends Model
{
    protected $table = 'studenti'; 
    
    public function classi()
    {
        return $this->belongsToMany(Classe::class, 'classe_studente', 'studente_id', 'classe_id');
    }

    public function voti()
    {
        return $this->hasMany(Voto::class, 'studente_id');
    }

    public function assenze()
    {
        return $this->hasMany(Assenza::class, 'studente_id');
    }

    public function genitore()
    {
        return $this->belongsTo(Genitore::class, 'genitore_id');
    }
}
