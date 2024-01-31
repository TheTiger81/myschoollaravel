<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $table = 'students';

    protected $fillable = [
        'user_id', 'name', 'surname', 'email', 'date_of_birth', 'address', 
        'city', 'province', 'postal_code', 'phone_number', 'home_phone', 
        'class_id', 'section_id', 'class_register_id'
    ];

    /**
     * Relazione uno a molti inversa con Parent.
     */
    public function parent()
    {
        return $this->belongsTo(Parent::class, 'parent_id');
    }

    /**
     * Relazione uno a uno con Class.
     */
    public function classes()
    {
        return $this->belongsTo(Classes::class, 'classes_id');
    }

    /**
     * Relazione uno a uno con Section.
     */
    public function section()
    {
        return $this->belongsTo(Section::class, 'section_id');
    }

    /**
     * Relazione uno a molti con Grade.
     */
    public function grades()
    {
        return $this->hasMany(Grade::class, 'student_id');
    }

    /**
     * Relazione uno a molti con ClassRegister.
     */
    public function classRegisters()
    {
        return $this->belongsToMany(ClassRegister::class, 'class_register_student')
                    ->withPivot(['presence', 'daily_notes']);
    }

    // Altre relazioni come comunicazioni, materie, ecc.
}
