<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Auth;

class RegistrationController extends Controller
{
    public function register(Request $request)
    {
        // Validazione dei dati in arrivo
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:255',
            'surname' => 'required|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
            'date_of_birth' => 'required|date',
            'address' => 'required|max:255',
            'city' => 'required|max:255',
            'province' => 'required|max:255',
            'postal_code' => 'required|max:10',
            'phone_number' => 'required|max:20',
            'home_phone' => 'nullable|max:20',
            'role' => 'required|in:genitore,insegnante,studente', // Aggiunto campo per il ruolo
            // Aggiungi qui altre validazioni se necessario
        ]);

        // Controlla se la validazione fallisce
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        // Gestione delle eccezioni
        try {
            // Estrazione dei dati validati
            $validated = $validator->validated();

            // Creazione dell'utente
            $user = User::create([
                'name' => $validated['name'],
                'surname' => $validated['surname'],
                'email' => $validated['email'],
                'password' => Hash::make($validated['password']),
                'date_of_birth' => $validated['date_of_birth'],
                'address' => $validated['address'],
                'city' => $validated['city'],
                'province' => $validated['province'],
                'postal_code' => $validated['postal_code'],
                'phone_number' => $validated['phone_number'],
                'home_phone' => $validated['home_phone'],
            ]);

            // Assegnazione del ruolo in base al campo 'role'
            $roleName = $validated['role'];
            if ($role = Role::findByName($roleName)) {
                $user->assignRole($role);
            }

            // Autenticazione dell'utente dopo la registrazione
            Auth::login($user);

            // Restituzione di una risposta positiva
            return response()->json(['message' => 'Utente registrato e autenticato con successo!'], 200);
        } catch (\Exception $e) {
            // In caso di eccezione, restituire una risposta di errore
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
}

