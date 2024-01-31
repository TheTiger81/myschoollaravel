<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ClassRegister extends Model
{
    protected $table = 'class_registers';

    /**
     * Relazione uno a molti inversa con Classes.
     */
    public function classes()
    {
        return $this->belongsTo(Classes::class, 'classes_id');
    }

    /**
     * Relazione uno a molti inversa con Section.
     */
    public function section()
    {
        return $this->belongsTo(Section::class, 'section_id');
    }

    /**
     * Relazione uno a molti inversa con Teacher.
     */
    public function teacher()
    {
        return $this->belongsTo(Teacher::class, 'teacher_id');
    }

    /**
     * Relazione molti a molti con Student.
     */
    public function students()
    {
        return $this->belongsToMany(Student::class, 'class_register_student')
                    ->withPivot(['presence', 'daily_notes']);
    }

    /**
     * Relazione uno a molti con Subject (materia).
     */
    public function subjects()
    {
        return $this->belongsTo(Subject::class, 'subject_id');
    }

    // Altre possibili relazioni possono essere aggiunte qui
}
