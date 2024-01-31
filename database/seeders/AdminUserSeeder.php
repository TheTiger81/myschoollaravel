<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class AdminUserSeeder extends Seeder
{
    public function run()
    {
        // Assicurati che il ruolo 'admin' esista
        $adminRole = Role::firstOrCreate(['name' => 'admin']);

        // Crea l'utente admin
        $adminUser = User::create([
            'name' => 'Admin', // Nome dell'admin
            'surname' => 'User', // Cognome dell'admin
            'email' => 'admin@example.com', // Email dell'admin
            'password' => Hash::make('password'), // Password, usa una password sicura
            'date_of_birth' => '1980-01-01', // Data di nascita dell'admin
            'address' => '123 Admin Street', // Indirizzo dell'admin
            'city' => 'Admin City', // Città dell'admin
            'province' => 'Admin Province', // Provincia dell'admin
            'postal_code' => '12345', // CAP dell'admin
            'phone_number' => '1234567890', // Numero di telefono dell'admin
            'home_phone' => '0987654321', // Numero di telefono fisso dell'admin (facoltativo)
            // Aggiungi qui altri campi se necessari
        ]);

        // Assegna il ruolo 'admin' all'utente
        $adminUser->assignRole($adminRole);
    }
}
