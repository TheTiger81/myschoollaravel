<?php

namespace App\Http\Controllers;

use App\Models\Text; 
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class TextController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $texts = Text::all();
        return response()->json($texts);
    }
    
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $text = new Text();
        $text->title = $request->title;
        $text->description = $request->description;
        
        // Assegna uno slug preimpostato in base al titolo o ad altro criterio
        switch ($request->title) {
            case 'Chi Siamo':
                $text->slug = 'chi-siamo';
                break;
            case 'La Scuola':
                $text->slug = 'la-scuola';
                break;
            case 'Gazzettino':
                $text->slug = 'gazzettino';
                break;
            case 'Trinity':
                $text->slug = 'trinity';
                break;
            case 'Modulo Contatto':
                $text->slug = 'modulo-contatto';
                break;
            // Aggiungi altri casi qui
            default:
                // Puoi decidere di assegnare uno slug di default o generarlo dinamicamente
                $text->slug = \Illuminate\Support\Str::slug($request->title);
                break;
        }
        
        $text->save();
        return response()->json($text, 201);
    }
    
    
    

    /**
     * Display the specified resource.
     */
    public function show($slug)
    {
        $text = Text::where('slug', $slug)->firstOrFail();
        return response()->json($text);
    }
    
    

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $text = Text::findOrFail($id);
        $text->title = $request->title;
        $text->description = $request->description;
        
        // Assegna uno slug preimpostato in base al titolo o ad altro criterio
        switch ($request->title) {
            case 'Chi Siamo':
                $text->slug = 'chi-siamo';
                break;
            case 'La Scuola':
                $text->slug = 'la-scuola';
                break;
            case 'Gazzettino':
                $text->slug = 'gazzettino';
                break;
            case 'Trinity':
                $text->slug = 'trinity';
                break;
            case 'Modulo Contatto':
                $text->slug = 'modulo-contatto';
                break;
            // Aggiungi altri casi qui
            default:
                // Puoi decidere di assegnare uno slug di default o generarlo dinamicamente
                $text->slug = \Illuminate\Support\Str::slug($request->title);
                break;
        }
        
        $text->save();
    
        return response()->json($text, 200);
    }
    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $text = Text::findOrFail($id);
        $text->delete();
    
        return response()->json(['message' => 'Testo cancellato con successo']);
    }
    
}
