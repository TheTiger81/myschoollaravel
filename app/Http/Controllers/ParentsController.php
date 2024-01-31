<?php

namespace App\Http\Controllers;

use App\Models\GuardianParent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ParentsController extends Controller
{
    /**
     * Mostra un elenco di tutti i genitori.
     */
    public function index()
    {
        $parents = Parent::all();
        return response()->json($parents);
    }

    /**
     * Salva un nuovo genitore nel database.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            // Regole di validazione
            'name' => 'required',
            'email' => 'required|email|unique:parents',
            // ... altre regole di validazione
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        $parent = Parent::create($validator->validated());
        return response()->json($parent, 201);
    }

    /**
     * Mostra i dettagli di un singolo genitore.
     */
    public function show($id)
    {
        $parent = Parent::find($id);

        if (!$parent) {
            return response()->json(['message' => 'Genitore non trovato'], 404);
        }

        return response()->json($parent);
    }

    /**
     * Aggiorna le informazioni di un genitore esistente.
     */
    public function update(Request $request, $id)
    {
        $parent = Parent::find($id);

        if (!$parent) {
            return response()->json(['message' => 'Genitore non trovato'], 404);
        }

        $validator = Validator::make($request->all(), [
            // Regole di validazione
            'name' => 'required',
            // ... altre regole di validazione
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        $parent->update($validator->validated());
        return response()->json($parent);
    }

    /**
     * Elimina un genitore dal database.
     */
    public function destroy($id)
    {
        $parent = Parent::find($id);

        if (!$parent) {
            return response()->json(['message' => 'Genitore non trovato'], 404);
        }

        $parent->delete();
        return response()->json(['message' => 'Genitore eliminato con successo']);
    }

    // Qui puoi aggiungere altri metodi utili per la tua applicazione.
}
