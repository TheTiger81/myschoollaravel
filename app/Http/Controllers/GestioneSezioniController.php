<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GestioneSezioniController extends Controller
{
    public function index(Request $request)
    {
        // Logica per recuperare le sezioni del sito che possono essere gestite/modificate
        $sezioni = [
            // Esempio di dati delle sezioni
            ['id' => 1, 'name' => 'Header', 'description' => 'Gestisci l\'header del sito'],
            ['id' => 2, 'name' => 'Menù', 'description' => 'Gestisci il menù del sito'],
            ['id' => 3, 'name' => 'Offerta Formativa', 'description' => 'Gestisci L offerta Fomrativa'],
        ];

        return response()->json($sezioni);
    }
}
