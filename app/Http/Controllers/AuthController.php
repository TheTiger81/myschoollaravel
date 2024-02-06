<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            $token = $user->createToken('API Token')->plainTextToken;

            return response()->json([
                'access_token' => $token,
                'token_type' => 'Bearer',
            ]);
        }
    
        return response()->json(['message' => 'Hai inserito le credenziali sbagliate..'], 401);
    }

    public function logout(Request $request)
    {
        // Prendiamo l'utente autenticato
        $user = Auth::user();

        // Revoca tutti i token dell'utente per disconnettersi
        $user->tokens()->each(function($token, $key) {
            $token->delete();
        });

        return response()->json(['message' => 'Logout effettuato con successo.']);
    }
}

