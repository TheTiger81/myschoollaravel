<?php

namespace App\Http\Controllers;

use App\Models\Immagine;
use Illuminate\Http\Request;

class ImmagineController extends Controller
{
    public function index()
    {
        $immagini = Immagine::all();
        return response()->json($immagini);
    }

    public function store(Request $request)
    {
        $request->validate([
            'immagine' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
    
        $imageName = time().'.'.$request->immagine->extension();  
        $request->immagine->move(public_path('images'), $imageName);
    
        $immagine = new Immagine;
        $immagine->percorso = '/images/'.$imageName;
        $immagine->save();
    
        return response()->json(['success'=>'Immagine caricata con successo.', 'path' => $immagine->percorso]);
    }

    public function show($id)
    {
        $immagine = Immagine::find($id);
        if (!$immagine) {
            return response()->json(['message' => 'Immagine non trovata'], 404);
        }

        return response()->json($immagine);
    }

    public function update(Request $request, $id)
    {
        $immagine = Immagine::find($id);
        if (!$immagine) {
            return response()->json(['message' => 'Immagine non trovata'], 404);
        }

        $validatedData = $request->validate([
            'url' => 'required|url',
            'titolo' => 'nullable|string',
            'descrizione' => 'nullable|string',
        ]);

        $immagine->update($validatedData);
        return response()->json($immagine);
    }

    public function destroy($id)
    {
        $immagine = Immagine::find($id);
        if (!$immagine) {
            return response()->json(['message' => 'Immagine non trovata'], 404);
        }

        $immagine->delete();
        return response()->json(['message' => 'Immagine eliminata con successo']);
    }
}
