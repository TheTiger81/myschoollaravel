<?php

namespace App\Http\Controllers;

use App\Models\Classes;
use Illuminate\Http\Request;

class ClassesController extends Controller
{
    public function index()
    {
        // Restituisce tutte le classi
        $classes = Classes::all();
        return response()->json($classes);
    }

    public function store(Request $request)
    {
        // Crea una nuova classe
        $validatedData = $request->validate([
            // Qui le validazioni per i campi della classe
        ]);

        $class = Classes::create($validatedData);
        return response()->json($class, 201);
    }

    public function show($id)
    {
        // Visualizza una singola classe
        $class = Classes::findOrFail($id);
        return response()->json($class);
    }

    public function update(Request $request, $id)
    {
        // Aggiorna una classe esistente
        $class = Classes::findOrFail($id);
        $validatedData = $request->validate([
            // Qui le validazioni per i campi della classe
        ]);

        $class->update($validatedData);
        return response()->json($class);
    }

    public function destroy($id)
    {
        // Elimina una classe
        $class = Classes::findOrFail($id);
        $class->delete();
        return response()->json(null, 204);
    }

    // Qui puoi inserire metodi aggiuntivi specifici per la gestione delle classi
}
