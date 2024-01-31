<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AdminController extends Controller
{
    /**
     * Metodo per elencare tutti gli utenti.
     *
     * @return \Illuminate\Http\JsonResponse
     */


    public function dashboard()
    {
        // Qui puoi recuperare tutti i dati necessari per la dashboard
        // Ad esempio, numero di utenti, statistiche, ecc.

        $userCount = User::count(); // Conta il numero totale di utenti
        // Altre statistiche o dati...

        // Restituisce i dati in formato JSON
        return response()->json([
            'userCount' => $userCount,
        // Altri dati...
        ]);
    }

    public function listUsers()
    {
        $users = User::all(); // Recupera tutti gli utenti
        return response()->json($users); // Restituisce gli utenti in formato JSON
    }

    /**
     * Metodo per creare un nuovo utente.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function createUser(Request $request)
    {
        // Validazione dei dati in ingresso
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);

        // Gestisce gli errori di validazione
        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        // Crea un nuovo utente con i dati forniti
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password), // Hash della password
        ]);

        // Assegna il ruolo specificato nella richiesta all'utente
        $role = $request->input('role'); // Prende il ruolo dalla richiesta
        if ($role && Role::where('name', $role)->exists()) {
            $user->assignRole($role);
        } else {
        // Gestisci il caso in cui il ruolo non esiste o non è specificato
        }

        // Restituisce la conferma della creazione
        return response()->json(['message' => 'Utente creato con successo', 'user' => $user]);
    }

    /**
     * Metodo per aggiornare un utente esistente.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\JsonResponse
     */
    public function updateUser(Request $request, User $user)
    {
        // Validazione dei dati in ingresso
        $validator = Validator::make($request->all(), [
            'name' => 'string|max:255',
            'email' => 'string|email|unique:users,email,' . $user->id,
            'password' => 'string|min:6|confirmed',
        ]);

        // Gestisce gli errori di validazione
        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        // Aggiorna i dati dell'utente
        $user->update($request->only(['name', 'email', 'password'])); // Aggiorna i dati forniti

        // Aggiorna il ruolo dell'utente, se specificato
        if ($request->has('role') && Role::where('name', $request->role)->exists()) {
        $user->syncRoles($request->role);

        } else {
        // Gestisci il caso in cui il ruolo non esiste o non è specificato
        }

        // Restituisce la conferma dell'aggiornamento
        return response()->json(['message' => 'Utente aggiornato con successo', 'user' => $user]);
    }

    /**
     * Metodo per eliminare un utente.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\JsonResponse
     */
    public function deleteUser(User $user)
    {
        $user->delete(); // Elimina l'utente
        return response()->json(['message' => 'Utente eliminato con successo']); // Conferma dell'eliminazione
    }

    // Qui puoi aggiungere altri metodi per gestire altre funzioni amministrative
}