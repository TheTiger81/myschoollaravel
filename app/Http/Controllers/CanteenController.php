<?php

namespace App\Http\Controllers;

use App\Models\Canteen;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CanteenController extends Controller
{
    /**
     * Visualizza l'elenco dei menu della mensa.
     */
    public function index()
    {
        $menus = Canteen::all();
        return response()->json($menus);
    }

    /**
     * Salva un nuovo menu della mensa nel database.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'date' => 'required|date',
            'meal' => 'required|max:255',
            // ... altre regole di validazione
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        $menu = Canteen::create($validator->validated());
        return response()->json($menu, 201);
    }

    /**
     * Mostra i dettagli di un singolo menu della mensa.
     */
    public function show($id)
    {
        $menu = Canteen::find($id);

        if (!$menu) {
            return response()->json(['message' => 'Menu non trovato'], 404);
        }

        return response()->json($menu);
    }

    /**
     * Aggiorna le informazioni di un menu della mensa esistente.
     */
    public function update(Request $request, $id)
    {
        $menu = Canteen::find($id);

        if (!$menu) {
            return response()->json(['message' => 'Menu non trovato'], 404);
        }

        $validator = Validator::make($request->all(), [
            'date' => 'required|date',
            'meal' => 'required|max:255',
            // ... altre regole di validazione
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        $menu->update($validator->validated());
        return response()->json($menu);
    }

    /**
     * Elimina un menu della mensa dal database.
     */
    public function destroy($id)
    {
        $menu = Canteen::find($id);

        if (!$menu) {
            return response()->json(['message' => 'Menu non trovato'], 404);
        }

        $menu->delete();
        return response()->json(['message' => 'Menu eliminato con successo']);
    }

    // Altri metodi specifici possono essere aggiunti qui, ad esempio per gestire ordini o feedback sulla mensa.
}

