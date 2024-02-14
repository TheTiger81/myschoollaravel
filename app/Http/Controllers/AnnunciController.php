<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Annuncio; // Importa il modello Annuncio

class AnnunciController extends Controller
{
    /**
     * Visualizza un elenco di tutti gli annunci.
     */
    public function index()
    {
        $annunci = Annuncio::all();
        return response()->json($annunci);
    }

    /**
     * Salva un nuovo annuncio nel database.
     */
    public function store(Request $request)
    {
        $request->validate([
            'titolo' => 'required|string|max:255',
            'descrizione' => 'required|string',
            // Aggiungi altre regole di validazione secondo necessità
        ]);

        $annuncio = new Annuncio($request->all());
        $annuncio->save();

        return response()->json($annuncio, 201); // Ritorna l'annuncio creato con stato HTTP 201
    }

    /**
     * Visualizza un singolo annuncio.
     */
    public function show(Annuncio $annuncio)
    {
        return response()->json($annuncio);
    }

    /**
     * Aggiorna un annuncio esistente.
     */
    public function update(Request $request, Annuncio $annuncio)
    {
        $request->validate([
            'titolo' => 'required|string|max:255',
            'descrizione' => 'required|string',
            // Aggiungi altre regole di validazione secondo necessità
        ]);

        $annuncio->update($request->all());

        return response()->json($annuncio);
    }

    /**
     * Elimina un annuncio.
     */
    public function destroy(Annuncio $annuncio)
    {
        $annuncio->delete();

        return response()->json(null, 204); // Nessun contenuto da ritornare
    }
}
