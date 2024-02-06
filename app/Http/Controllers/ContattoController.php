<?php

namespace App\Http\Controllers;

use App\Models\Contatto;
use Illuminate\Http\Request;

class ContattoController extends Controller
{
    public function store(Request $request)
    {
        // Validazione dei dati ricevuti dalla richiesta
        $validatedData = $request->validate([
            'nome' => 'required|max:255',
            'cognome' => 'required|max:255',
            'telefono' => 'nullable|max:255',
            'email' => 'required|email|max:255',
            'messaggio' => 'required',
        ]);

        // Creazione del nuovo contatto nel database con i dati validati
        $contatto = Contatto::create($validatedData);
        
        // Ritorno di una risposta JSON con il contatto appena creato e un codice di stato 201
        return response()->json($contatto, 201);
    }

    public function countNonGestiti()
    {
        $count = Contatto::where('gestito', false)->count(); // Conta i contatti non gestiti

        return response()->json(['nuoveRichieste' => $count]);
    }

    public function dettagliNonGestiti()
{
    // Recupera tutti i contatti non gestiti
    $contattiNonGestiti = Contatto::where('gestito', false)->get();

    // Restituisce i contatti non gestiti in formato JSON
    return response()->json($contattiNonGestiti);
}


    public function index()
    {
        $contatti = Contatto::all();
        return response()->json($contatti);
    }

    public function marcareComeLetto($contattoId)
    {
        $contatto = Contatto::find($contattoId);

        if (!$contatto) {
            return response()->json(['message' => 'Contatto non trovato'], 404);
        }

        // Aggiorna il campo 'gestito' o equivalente per segnare il messaggio come letto
        $contatto->gestito = true;
        $contatto->save();

        return response()->json(['message' => 'Contatto marcato come letto con successo']);
}

}

