<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Avviso;

class AvvisoController extends Controller
{
    public function index()
{
    $avvisi = Avviso::all();
    return response()->json($avvisi);
}

    public function store(Request $request)
{
    $request->validate([
        'titolo' => 'required|string|max:255',
        'descrizione' => 'required|string',
        'data' => 'required|date',
        'autore' => 'required|string|max:255',
        'fonte' => 'nullable|string|max:255', // La fonte è opzionale
    ]);

    $avviso = Avviso::create($request->all());
    return response()->json($avviso, 201);
}
public function show($id)
{
    $avviso = Avviso::find($id);
    if ($avviso) {
        return response()->json($avviso);
    } else {
        return response()->json(['message' => 'Avviso non trovato'], 404);
    }
}
public function update(Request $request, $id)
{
    $avviso = Avviso::find($id);
    if ($avviso) {
        // Converti la data da ISO 8601 a formato MySQL
        $data = \Carbon\Carbon::parse($request->data)->format('Y-m-d H:i:s');
        
        // Aggiorna 'data' nella richiesta con il nuovo formato
        $request->merge(['data' => $data]);

        // Aggiorna l'avviso con i dati della richiesta
        $avviso->update($request->all());

        return response()->json($avviso);
    } else {
        return response()->json(['message' => 'Avviso non trovato'], 404);
    }
}
public function destroy($id)
{
    $avviso = Avviso::find($id);
    if ($avviso) {
        $avviso->delete();
        return response()->json(['message' => 'Avviso eliminato con successo']);
    } else {
        return response()->json(['message' => 'Avviso non trovato'], 404);
    }
}

}
