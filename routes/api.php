<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ParentsController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\CommunicationController;
use App\Http\Controllers\CanteenController;
use App\Http\Controllers\ClassesController;
use App\Http\Controllers\SectionController;
use App\Http\Controllers\GradesController;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\ClassRegisterController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ContactFormController;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Qui vengono registrate le rotte API per l'applicazione. Queste
| rotte sono caricate dal RouteServiceProvider e tutte avranno
| il gruppo middleware "api" assegnato. Crea qualcosa di grandioso!
|
*/

Route::post('/contact', [ContactFormController::class, 'store']);

// Rotta per ottenere l'utente autenticato
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Rotta per la registrazione
Route::post('/register', [RegistrationController::class, 'register']);

// Rotte per l'autenticazione
Route::post('/login', [AuthController::class, 'login']);
Route::middleware('auth:sanctum')->get('/get-user-role', [UserController::class, 'getUserRole']);
Route::middleware('auth:sanctum')->post('/logout', [AuthController::class, 'logout']);

    // Rotte per gli Admin
Route::middleware(['auth:sanctum', 'role:admin'])->group(function () {
    Route::get('/admin/users', [AdminController::class, 'listUsers']);
    Route::post('/admin/users', [AdminController::class, 'createUser']);
    Route::put('/admin/users/{user}', [AdminController::class, 'updateUser']);
    Route::delete('/admin/users/{user}', [AdminController::class, 'deleteUser']);
});

// Rotte protette per le risorse
Route::middleware('auth:sanctum')->group(function () {
    // Gestione genitori
    Route::apiResource('/parents', ParentsController::class);

    // Gestione studenti
    Route::apiResource('/students', StudentController::class);

    // Gestione insegnanti
    Route::apiResource('/teachers', TeacherController::class);

    // Gestione comunicazioni
    Route::apiResource('/communications', CommunicationController::class);

    // Gestione mensa
    Route::apiResource('/canteen', CanteenController::class);

    // Gestione classi
    Route::apiResource('/classes', ClassesController::class);

    // Gestione sezioni
    Route::apiResource('/sections', SectionController::class);

    // Gestione voti
    Route::apiResource('/grades', GradesController::class);

    // Gestione materie
    Route::apiResource('/subjects', SubjectController::class);

    // Gestione registro di classe
    Route::apiResource('/class_registers', ClassRegisterController::class);

    // ... qui puoi aggiungere altre rotte API in base alle necessità
});

