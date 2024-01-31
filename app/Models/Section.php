<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Section extends Model
{
    protected $table = 'sections';

    /**
     * Relazione uno a molti con Class.
     */
    public function classes()
    {
        return $this->hasMany(Classes::class);
    }

    // Altre potenziali relazioni possono essere aggiunte qui
}

