<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pagella extends Model
{
    protected $table = 'pagelle';

    public function scrutinio()
    {
        return $this->belongsTo(Scrutinio::class, 'scrutinio_id');
    }

    public function studente()
    {
        return $this->belongsTo(Studente::class, 'studente_id');
    }

    public function annoScolastico()
    {
        return $this->belongsTo(AnnoScolastico::class, 'anno_scolastico_id');
    }
}
