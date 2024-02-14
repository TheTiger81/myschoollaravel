<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    /**
     * Crea un nuovo utente nel sistema.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        // Validazione dei dati in input
        $validator = Validator::make($request->all(), [
            'nome' => 'required|string|max:255',
            'cognome' => 'nullable|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8',
            // Aggiungi qui altre validazioni se necessario
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        // Creazione dell'utente
        $user = User::create([
            'name' => $request->input('nome'), // Assumi che 'name' sia il campo usato per il nome completo o il nome utente
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password')),
        ]);

        // Assumendo che ogni utente debba essere assegnato a un ruolo di base (es. 'utente')
        $user->assignRole('utente');

        return response()->json([
            'message' => 'Utente creato con successo.',
            'user' => $user,
        ], 201);
    }

    public function destroy($id)
    {
        $user = Auth::user();

        if ($user->hasPermissionTo('delete')) {
            // Logica per eliminare l'utente
            return response()->json(['message' => 'Utente eliminato con successo.']);
        } else {
            return response()->json(['message' => 'Non autorizzato.'], 403);
        }
    }
}
