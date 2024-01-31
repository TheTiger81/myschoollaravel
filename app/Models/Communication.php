<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Communication extends Model
{
    protected $table = 'communications';

    /**
     * Relazione uno a molti inversa con User.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Altre relazioni specifiche per il tipo di comunicazione possono essere aggiunte qui
}

