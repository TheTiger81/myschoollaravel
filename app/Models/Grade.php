<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Grade extends Model
{
    protected $table = 'grades';

    /**
     * Relazione uno a molti inversa con Student.
     */
    public function student()
    {
        return $this->belongsTo(Student::class);
    }

    /**
     * Relazione uno a molti inversa con Subject (materia).
     */
    public function subject()
    {
        return $this->belongsTo(Subject::class);
    }

    /**
     * Relazione uno a molti inversa con ClassRegister (registro di classe).
     */
    public function classRegister()
    {
        return $this->belongsTo(ClassRegister::class);
    }

    // Altri attributi come 'grade' e 'comments' sono gestiti normalmente tramite $fillable
}
