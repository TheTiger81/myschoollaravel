<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Genitore extends Model
{
    public function studenti()
    {
        return $this->hasMany(Studente::class, 'genitore_id');
    }
}
