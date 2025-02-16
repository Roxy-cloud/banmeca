<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BenefactorController;
use App\Http\Controllers\DonacionController;
use App\Http\Controllers\MedicamentoController;
use App\Http\Controllers\EquipoMedicoController;
use App\Http\Controllers\BeneficiarioController;
use App\Http\Controllers\Auth\LoginController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/
Route::get('/', function () {
    return view('/login');
});

// Rutas de autenticación
Route::post('/login', [LoginController::class, 'login'])->name('login');

// Rutas protegidas por autenticación (Sanctum)
Route::middleware('auth:sanctum')->group(function () {
    // Obtener información del usuario autenticado
    Route::get('/user', function (Request $request) {
        return $request->user();
    });

    // Rutas para los recursos de la API (CRUD)
    Route::apiResource('benefactors', BenefactorController::class);
    Route::apiResource('donaciones', DonacionController::class);
    Route::apiResource('medicamentos', MedicamentoController::class);
    Route::apiResource('equipos-medicos', EquipoMedicoController::class);
    Route::apiResource('beneficiarios', BeneficiarioController::class);

    // Ruta de ejemplo protegida
    Route::get('/protected-route', function () {
        return response()->json(['message' => 'You are authenticated!']);
    });
});
