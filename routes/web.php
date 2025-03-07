<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\BenefactorController;
use App\Http\Controllers\BeneficiarioController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\InsumoController;
use App\Http\Controllers\MedicamentoController;
use App\Http\Controllers\EquipmentController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\SedeRegionalController;
use App\Http\Controllers\SedeParroquialController;
use App\Http\Controllers\SolicitudController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

// Rutas para los recursos: beneficiarios, benefactores, categorias, insumo, medicamentos
Route::resource('admin/beneficiarios', BeneficiarioController::class);
Route::resource('admin/benefactors', BenefactorController::class);
Route::resource('admin/categorias', CategoriaController::class);
Route::resource('admin/insumos', InsumoController::class);
Route::resource('admin/medicamentos', MedicamentoController::class);
Route::resource('admin/equipments', EquipmentController::class);
Route::resource('admin/sede_parroquial', SedeParroquialController::class);
Route::resource('admin/sede_regional', SedeRegionalController::class);
Route::resource('admin/solicitudes', SolicitudController::class);
Route::get('admin/profile', [ProfileController::class, 'profile'])->name('profile');



Route::get('/', function () {
    return view('auth.login');
});

// Ruta para el dashboard que redirige según el rol del usuario autenticado
Route::get('/dashboard', function () {
    if (Auth::check()) {
        if (auth()->user()->hasRole('admin')) {
            return view('admin.dashboard'); // Vista para admin
        } elseif (auth()->user()->hasRole('benefactor')) {
            return view('benefactor.dashboard'); // Vista para benefactor
        } elseif (auth()->user()->hasRole('beneficiario')) {
            return view('beneficiario.dashboard'); // Vista para beneficiario
        } elseif (auth()->user()->hasRole('responsable_parroquial')) {
            return view('responsable.dashboard'); // Vista para responsable parroquial
        }
    }
    
    return redirect('/'); // Redirigir si no hay rol definido o no está autenticado
})->middleware(['auth', 'verified'])->name('dashboard');

// Rutas protegidas por autenticación
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');


});

// Otras rutas que necesites agregar

require __DIR__.'/auth.php';
