<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Avviso extends Model
{
       /**
     * Il nome della tabella associata al modello.
     *
     * @var string
     */
    protected $table = 'avvisi';
    
    protected $fillable = ['titolo', 'descrizione', 'data', 'autore', 'fonte'];
}