<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use App\Models\Role;

class UserSeeder extends Seeder
{
    public function run()
    {
        // Crea l'utente
        $user = User::create([
            'name' => 'admin',
            'email' => 'gardenhousesrl@virgilio.it', // Cambia con il tuo indirizzo email desiderato
            'password' => Hash::make('garden@@'), // Sostituisci 'password' con una password sicura
        ]);

        // Assicurati che il ruolo esista, altrimenti crealo
        $role = Role::firstOrCreate(['name' => 'admin']);

        // Assegna il ruolo all'utente
        $user->assignRole($role);
    }
}
