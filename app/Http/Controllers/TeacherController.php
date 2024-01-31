<?php

namespace App\Http\Controllers;

use App\Models\Teacher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TeacherController extends Controller
{
    /**
     * Visualizza un elenco di tutti gli insegnanti.
     */
    public function index()
    {
        $teachers = Teacher::all();
        return response()->json($teachers);
    }

    /**
     * Salva un nuovo insegnante nel database.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:255',
            'surname' => 'required|max:255',
            // ... altre regole di validazione
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        $teacher = Teacher::create($validator->validated());
        return response()->json($teacher, 201);
    }

    /**
     * Mostra i dettagli di un singolo insegnante.
     */
    public function show($id)
    {
        $teacher = Teacher::find($id);

        if (!$teacher) {
            return response()->json(['message' => 'Insegnante non trovato'], 404);
        }

        return response()->json($teacher);
    }

    /**
     * Aggiorna le informazioni di un insegnante esistente.
     */
    public function update(Request $request, $id)
    {
        $teacher = Teacher::find($id);

        if (!$teacher) {
            return response()->json(['message' => 'Insegnante non trovato'], 404);
        }

        $validator = Validator::make($request->all(), [
            'name' => 'required|max:255',
            // ... altre regole di validazione
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        $teacher->update($validator->validated());
        return response()->json($teacher);
    }

    /**
     * Elimina un insegnante dal database.
     */
    public function destroy($id)
    {
        $teacher = Teacher::find($id);

        if (!$teacher) {
            return response()->json(['message' => 'Insegnante non trovato'], 404);
        }

        $teacher->delete();
        return response()->json(['message' => 'Insegnante eliminato con successo']);
    }

    // Qui puoi aggiungere altri metodi necessari per la tua applicazione.
}
