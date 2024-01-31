<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    protected $table = 'subjects';

    /**
     * Relazione molti a molti con Teacher.
     */
    public function teachers()
    {
        return $this->belongsToMany(Teacher::class);
    }

    // Altre potenziali relazioni possono essere aggiunte qui
}
