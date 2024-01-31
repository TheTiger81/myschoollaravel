<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Classes extends Model
{
    protected $table = 'classes';

    /**
     * Relazione uno a molti con Section.
     */
    public function section()
    {
        return $this->belongsTo(Section::class);
    }

    /**
     * Relazione uno a molti con ClassRegister.
     */
    public function classRegisters()
    {
        return $this->hasMany(ClassRegister::class);
    }

    // Altre relazioni possono essere aggiunte qui, come con gli studenti e gli insegnanti
}

