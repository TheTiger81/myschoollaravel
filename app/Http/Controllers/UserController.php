<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
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
