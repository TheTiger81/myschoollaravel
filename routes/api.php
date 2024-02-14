<?php
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ContattoController;
use App\Http\Controllers\EmailSettingsController;
use App\Http\Controllers\AnnunciController;
use App\Http\Controllers\ManagerController;
use App\Http\Controllers\AvvisoController;
use App\Http\Controllers\ImmagineController;
use App\Http\Controllers\EventoController;
use App\Http\Controllers\TextController;

Route::post('/login', [AuthController::class, 'login']);
Route::post('/contatti', [ContattoController::class, 'store']);
Route::post('/email-settings', [EmailSettingsController::class, 'update']);
Route::get('/annunci', [AnnunciController::class, 'index']);
Route::get('/annunci/{annuncio}', [AnnunciController::class, 'show']);
Route::get('/avvisi', [AvvisoController::class, 'index']);
Route::get('/immagini', [ImmagineController::class, 'index']);
Route::get('/immagini/{id}', [ImmagineController::class, 'show']);
Route::get('/eventi', [EventoController::class, 'index']);
Route::get('/eventi/{id}', [EventoController::class, 'show']);
Route::get('/texts', [TextController::class, 'index']);
Route::get('/texts/{id}', [TextController::class, 'show']);
Route::get('/texts/{slug}', [TextController::class, 'show']);


Route::middleware('auth:sanctum')->group(function () {
    Route::get('/user', function (Request $request) {
        return $request->user();});
    Route::get('/dashboard', [DashboardController::class, 'index']);
    Route::get('/contatti', [ContattoController::class, 'index']);
    Route::get('/contatti/count-non-gestiti', [ContattoController::class, 'countNonGestiti']);
    Route::get('/contatti/dettagli-non-gestiti', [ContattoController::class, 'dettagliNonGestiti']);
    Route::put('/contatti/{id}/marcare-come-letto', [ContattoController::class, 'marcareComeLetto']);
    Route::post('/contatti/{id}/risposta', [ContattoController::class, 'inviaRisposta']);
    Route::delete('/contatti/{id}', [ContattoController::class,'destroy']);
    Route::get('/notifiche', [NotificheController::class, 'index']);
    Route::post('/manager/create', [ManagerController::class, 'create']);
    Route::get('/dashboard/gestione-sezioni', [GestioneSezioniController::class, 'index']);
    Route::apiResource('/avvisi', AvvisoController::class)->except(['index']);
    Route::get('/avvisi/{avviso}', [AvvisoController::class, 'show']);
    Route::put('/avvisi/{avviso}', [AvvisoController::class, 'update']);
    Route::delete('/avvisi/{avviso}', [AvvisoController::class, 'destroy']);
    Route::post('/immagini', [ImmagineController::class, 'store']);
    Route::put('/immagini/{id}', [ImmagineController::class, 'update']);
    Route::delete('/immagini/{id}', [ImmagineController::class, 'destroy']);
    Route::apiResource('eventi', EventoController::class)->except(['index']);
    Route::get('/eventi/{evento}', [EventoController::class, 'show']);
    Route::put('/eventi/{evento}', [EventoController::class, 'update']);
    Route::delete('/eventi/{evento}', [EventoController::class, 'destroy']);
    Route::apiResource('/texts', TextController::class); 
    Route::post('/texts', [TextController::class, 'store']); 
    Route::put('/texts/{id}', [TextController::class, 'update']);
    Route::delete('/texts/{id}', [TextController::class, 'destroy']);

    Route::post('/logout', [AuthController::class, 'logout']);
    Route::get('/user-permissions', function (Request $request) {
        $user = $request->user();
        $permissions = $user->permissions()->get();
        $roles = $user->getRoleNames();
        return response()->json(['permissions' => $permissions, 'roles' => $roles]);
    });
});
Route::middleware(['auth:sanctum', 'permission:delete'])->group(function () {
    Route::delete('/user/{id}', [UserController::class, 'destroy']);
});
Route::middleware(['auth:sanctum', 'permission:edit'])->group(function () {
    Route::put('/module-data/{id}', [ModuleDataController::class, 'update']);
});
Route::middleware(['auth:sanctum', 'permission:owner'])->group(function () {
    Route::post('/user', [UserController::class, 'store']);
    Route::put('/user/{id}', [UserController::class, 'update']);
});


