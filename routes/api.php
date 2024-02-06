<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ContattoController;
use App\Http\Controllers\VisitController;


// Login
Route::post('/login', [AuthController::class, 'login']);

// Modulo Contatto
Route::post('/contatti', [ContattoController::class, 'store']);

// Ottiene i dati dell'utente autenticato
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
// Dati della dashboard
Route::middleware('auth:sanctum')->get('/dashboard', [DashboardController::class, 'index']);

// Elimina un utente (permesso 'delete')
Route::middleware(['auth:sanctum', 'permission:delete'])->delete('/user/{id}', [UserController::class, 'destroy']);

// Route per ottenere tutti i contatti/messaggi
Route::middleware('auth:sanctum')->get('/contatti', [ContattoController::class, 'index']);

// Route per ottenere il conteggio dei messaggi non gestiti
Route::middleware('auth:sanctum')->get('/contatti/count-non-gestiti', [ContattoController::class, 'countNonGestiti']);

// Route per ottenere i dettagli dei contatti/messaggi non gestiti
Route::middleware('auth:sanctum')->get('/contatti/dettagli-non-gestiti', [ContattoController::class, 'dettagliNonGestiti']);

// Route per marcare un messaggio come letto
Route::middleware('auth:sanctum')->put('/contatti/{id}/marcare-come-letto', [ContattoController::class, 'marcareComeLetto']);


// Modifica i dati ricevuti nel modulo (permesso 'edit')
Route::middleware(['auth:sanctum', 'permission:edit'])->put('/module-data/{id}', [ModuleDataController::class, 'update']);

// Crea o modifica altri utenti (permesso 'owner')
Route::middleware(['auth:sanctum', 'permission:owner'])->post('/user', [UserController::class, 'store']);
Route::middleware(['auth:sanctum', 'permission:owner'])->put('/user/{id}', [UserController::class, 'update']);

// Ottiene i permessi e i ruoli dell'utente autenticato
Route::middleware('auth:sanctum')->get('/user-permissions', function (Request $request) {
    $user = $request->user();
    $permissions = $user->permissions()->get(); // Assicurati che questo metodo restituisca i permessi corretti
    $roles = $user->getRoleNames(); // Ottiene i nomi dei ruoli

    return response()->json(['permissions' => $permissions, 'roles' => $roles]);
});

Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth:sanctum');

