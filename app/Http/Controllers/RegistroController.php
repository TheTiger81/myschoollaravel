<?php

namespace App\Http\Controllers;

use App\Models\Classe;
use App\Models\Materia;
use App\Models\AnnoScolastico;
use Illuminate\Http\Request;

class RegistroController extends Controller
{
    public function creaRegistro(Request $request)
    {
        $validated = $request->validate([
            'nome_classe' => 'required|string',
            'anno' => 'required|string', // es. "2023/2024"
        ]);

        // Trova o crea l'anno scolastico basato sull'input
        $annoScolastico = AnnoScolastico::firstOrCreate(['anno' => $validated['anno']]);

        // Crea la classe, associandola all'anno scolastico
        $classe = Classe::firstOrCreate([
            'nome' => $validated['nome_classe'],
            'anno_scolastico_id' => $annoScolastico->id,
        ]);

        // Elenco delle materie da creare
        $nomiMaterie = [
            'Italiano',
            'Inglese',
            'Storia',
            'Geografia',
            'Matematica',
            'Scienze',
            'Musica',
            'Arte e immagine'
        ];

        foreach ($nomiMaterie as $nomeMateria) {
            $materia = Materia::firstOrCreate(['nome' => $nomeMateria]);
            // Assumi l'esistenza del metodo materie() nel modello Classe per gestire la relazione molti-a-molti
            $classe->materie()->syncWithoutDetaching([$materia->id]);
        }

        return response()->json([
            'success' => true,
            'message' => 'Registro per la classe ' . $validated['nome_classe'] . ' creato con successo.',
            'classe' => $classe->load('materie'), // Carica le materie associate per la risposta
        ]);
    }
}
