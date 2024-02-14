<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AnnoScolastico extends Model
{
    protected $table = 'anni_scolastici';
    
    public function classi()
    {
        return $this->hasMany(Classe::class);
    }

    public function voti()
    {
        return $this->hasMany(Voto::class);
    }

    public function assenze()
    {
        return $this->hasMany(Assenza::class);
    }

    public function scrutini()
    {
        return $this->hasMany(Scrutinio::class);
    }

    public function pagelle()
    {
        return $this->hasMany(Pagella::class);
    }

    public function attivita()
    {
        return $this->hasMany(Attivita::class);
    }

    public function foto()
    {
        return $this->hasMany(Foto::class);
    }
}
