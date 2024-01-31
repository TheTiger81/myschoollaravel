<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function getUserRole(Request $request)
    {
        $user = $request->user();

        // Assumi che l'utente abbia un solo ruolo per semplificare
        $role = $user->roles->first();

        return response()->json(['role' => $role ? $role->name : null]);
    }
}
