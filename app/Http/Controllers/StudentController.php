<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class StudentController extends Controller
{
    /**
     * Visualizza un elenco di tutti gli studenti.
     */
    public function index()
    {
        $students = Student::all();
        return response()->json($students);
    }

    /**
     * Salva un nuovo studente nel database.
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

        $student = Student::create($validator->validated());
        return response()->json($student, 201);
    }

    /**
     * Mostra i dettagli di un singolo studente.
     */
    public function show($id)
    {
        $student = Student::find($id);

        if (!$student) {
            return response()->json(['message' => 'Studente non trovato'], 404);
        }

        return response()->json($student);
    }

    /**
     * Aggiorna le informazioni di uno studente esistente.
     */
    public function update(Request $request, $id)
    {
        $student = Student::find($id);

        if (!$student) {
            return response()->json(['message' => 'Studente non trovato'], 404);
        }

        $validator = Validator::make($request->all(), [
            'name' => 'required|max:255',
            // ... altre regole di validazione
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        $student->update($validator->validated());
        return response()->json($student);
    }

    /**
     * Elimina uno studente dal database.
     */
    public function destroy($id)
    {
        $student = Student::find($id);

        if (!$student) {
            return response()->json(['message' => 'Studente non trovato'], 404);
        }

        $student->delete();
        return response()->json(['message' => 'Studente eliminato con successo']);
    }

    // Qui puoi aggiungere altri metodi necessari per la tua applicazione.
}
