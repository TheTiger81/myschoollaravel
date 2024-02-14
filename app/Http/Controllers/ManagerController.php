<?php

namespace App\Http\Controllers;

use App\Models\Manager;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;

class ManagerController extends Controller
{
    public function create(Request $request)
    {
        // Validazione dei dati in input
        $validatedData = $request->validate([
            'nome' => 'required|string|max:255',
            'cognome' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8',
            'data_di_nascita' => 'required|date',
            'nato_a' => 'required|string|max:255',
            'residente' => 'required|string|max:255', // Aggiornato da 'residenza' a 'residente'
            'indirizzo' => 'required|string|max:255',
            'cap' => 'required|numeric', // Aggiornato per validare come numerico
            'provincia' => 'required|string|max:255',
            'codice_fiscale' => 'required|string|max:16',
            'telefono' => 'nullable|string|max:20',
            'cellulare' => 'required|string|max:20',
        ]);

        // Creazione dell'utente associato al manager
        $user = User::create([
            'name' => $validatedData['nome'] . ' ' . $validatedData['cognome'], // Aggiornato per includere nome e cognome
            'email' => $validatedData['email'],
            'password' => Hash::make($validatedData['password']),
        ]);

        // Assicurati che il ruolo 'manager' esista prima di assegnarlo
        if (!$user->hasRole('manager')) {
            $user->assignRole('manager');
        }

        // Creazione del manager con i dati validati e l'ID dell'utente
        $manager = new Manager();
        $manager->fill($validatedData);
        $manager->user_id = $user->id;
        $manager->save();

        return response()->json([
            'message' => 'Manager creato con successo',
            'manager' => $manager
        ], 201);
    }
}



