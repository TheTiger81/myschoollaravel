<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GuardianParent extends Model
{
    // Specifica il nome della tabella se non segue la convenzione standard di Laravel
    protected $table = 'parents';

    // Fillable per i campi assegnabili in massa
    protected $fillable = [
        'user_id', 'name', 'surname', 'email', 'date_of_birth', 'address', 'city', 
        'province', 'postal_code', 'phone_number', 'home_phone'
    ];

    /**
     * Relazione uno a molti con Student.
     */
    public function students()
    {
        return $this->hasMany(Student::class, 'parent_id');
    }

    /**
     * Relazione uno a uno con User per il login e la gestione dei ruoli.
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    // Qui puoi aggiungere altre relazioni, come quella con le comunicazioni
    // ...
}
