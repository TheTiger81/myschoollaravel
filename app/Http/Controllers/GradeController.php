<?php

namespace App\Http\Controllers;

use App\Models\Grade;
use Illuminate\Http\Request;

class GradeController extends Controller
{
    public function index()
    {
        // Restituisce tutti i voti
    }

    public function store(Request $request)
    {
        // Crea un nuovo voto
    }

    public function show($id)
    {
        // Visualizza un singolo voto
    }

    public function update(Request $request, $id)
    {
        // Aggiorna un voto esistente
    }

    public function destroy($id)
    {
        // Elimina un voto
    }

    // Altri metodi specifici per la gestione dei voti
}

