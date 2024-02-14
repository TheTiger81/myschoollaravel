<?php

namespace App\Http\Controllers;

use App\Models\Evento;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class EventoController extends Controller
{
    public function index()
    {
        $eventi = Evento::where('inizio', '>=', now())->get();
        return response()->json($eventi);
    }

    public function store(Request $request)
    {
        // Validazione dei dati in arrivo
        $validated = $request->validate([
            'titolo' => 'required|string|max:255',
            'descrizione' => 'nullable|string',
            'inizio' => 'required|date',
            'fine' => 'required|date|after_or_equal:inizio',
        ]);

        // Creazione dell'evento nel database
        $evento = Evento::create($validated);
        return response()->json($evento, 201);
    }

    public function show(Evento $evento)
    {
        return response()->json($evento);
    }

    public function update(Request $request, $id)
{
    $evento = Evento::find($id);
    if (!$evento) {
        return response()->json(['message' => 'Evento non trovato'], 404);
    }

    $evento->titolo = $request->titolo;
    $evento->descrizione = $request->descrizione;
    $evento->inizio = $request->inizio;
    $evento->fine = $request->fine;
    $evento->save();

    return response()->json($evento);
}


public function destroy($evento)
{
    $evento = Evento::findOrFail($evento);
    $evento->delete();

    return response()->json(['message' => 'Evento eliminato con successo'], 200);
}

}
