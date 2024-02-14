<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens; // Importa il trait HasApiTokens
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class User extends Authenticatable
{
    use HasApiTokens, Notifiable, HasRoles, HasFactory; // Aggiungi HasFactory se necessario per la generazione di factory

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name', // Assumi che tu voglia includere il nome dell'utente
        'email',
        'password',
        // Aggiungi qui altri campi che desideri rendere assegnabili in massa
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password', // Nasconde la password quando si serializza il modello, per motivi di sicurezza
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    // Qui puoi aggiungere altri metodi e proprietà necessari per il tuo User model
}

