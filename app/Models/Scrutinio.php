<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Scrutinio extends Model
{
    protected $table = 'scrutini';

    public function classe()
    {
        return $this->belongsTo(Classe::class, 'classe_id');
    }

    public function annoScolastico()
    {
        return $this->belongsTo(AnnoScolastico::class, 'anno_scolastico_id');
    }

    public function dettagli()
    {
        return $this->hasMany(DettaglioScrutinio::class, 'scrutinio_id');
    }
}

