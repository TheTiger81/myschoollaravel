<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    protected $table = 'teachers';

    protected $fillable = [
        'user_id', 'name', 'surname', 'email', 'date_of_birth', 'address', 
        'city', 'province', 'postal_code', 'phone_number', 'home_phone'
    ];

    /**
     * Relazione molti a molti con Class.
     */
    public function classes()
    {
        return $this->belongsToMany(Classes::class, 'teacher_class');
    }

    /**
     * Relazione molti a molti con Section.
     */
    public function sections()
    {
        return $this->belongsToMany(Section::class, 'teacher_section');
    }

    /**
     * Relazione molti a molti con Subject.
     */
    public function subjects()
    {
        return $this->belongsToMany(Subject::class, 'teacher_subject');
    }

    /**
     * Relazione uno a molti con ClassRegister.
     */
    public function classRegisters()
    {
        return $this->hasMany(ClassRegister::class, 'teacher_id');
    }

    /**
     * Relazione uno a molti con Grade.
     */
    public function grades()
    {
        return $this->hasMany(Grade::class, 'teacher_id');
    }

    // Altre relazioni come comunicazioni, ecc.
}
