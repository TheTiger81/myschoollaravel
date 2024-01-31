<?php

namespace App\Http\Controllers;

use App\Models\Communication;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CommunicationController extends Controller
{
    /**
     * Visualizza un elenco di tutte le comunicazioni.
     */
    public function index()
    {
        $communications = Communication::all();
        return response()->json($communications);
    }

    /**
     * Salva una nuova comunicazione nel database.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|max:255',
            'body' => 'required',
            'sender_id' => 'required|integer',
            'receiver_id' => 'required|integer',
            // ... altre regole di validazione
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        $communication = Communication::create($validator->validated());
        return response()->json($communication, 201);
    }

    /**
     * Mostra i dettagli di una singola comunicazione.
     */
    public function show($id)
    {
        $communication = Communication::find($id);

        if (!$communication) {
            return response()->json(['message' => 'Comunicazione non trovata'], 404);
        }

        return response()->json($communication);
    }

    /**
     * Aggiorna le informazioni di una comunicazione esistente.
     */
    public function update(Request $request, $id)
    {
        $communication = Communication::find($id);

        if (!$communication) {
            return response()->json(['message' => 'Comunicazione non trovata'], 404);
        }

        $validator = Validator::make($request->all(), [
            'title' => 'required|max:255',
            // ... altre regole di validazione
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        $communication->update($validator->validated());
        return response()->json($communication);
    }

    /**
     * Elimina una comunicazione dal database.
     */
    public function destroy($id)
    {
        $communication = Communication::find($id);

        if (!$communication) {
            return response()->json(['message' => 'Comunicazione non trovata'], 404);
        }

        $communication->delete();
        return response()->json(['message' => 'Comunicazione eliminata con successo']);
    }

    // Altri metodi specifici potrebbero essere aggiunti qui per gestire diversi tipi di comunicazioni.
}
