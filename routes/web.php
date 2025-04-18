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
use App\Http\Controllers\SeguimientoController;
use App\Http\Controllers\SolicitudEquipmentController;
use App\Http\Controllers\SolicitudMedicamentoController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

// Rutas para los recursos
Route::resource('admin/profile', ProfileController::class);
Route::resource('admin/beneficiarios', BeneficiarioController::class);
Route::resource('admin/benefactors', BenefactorController::class);
Route::resource('admin/categorias', CategoriaController::class);
Route::resource('admin/insumos', InsumoController::class);
Route::resource('admin/medicamentos', MedicamentoController::class);
Route::resource('admin/equipments', EquipmentController::class);
Route::resource('admin/sede_parroquial', SedeParroquialController::class);
Route::resource('admin/sede_regional', SedeRegionalController::class);
Route::resource('admin/solicitudes', SolicitudController::class);
Route::resource('admin/seguimiento', SeguimientoController::class);
Route::resource('users', UserController::class);

// Ruta para perfil
Route::get('admin/profile', [ProfileController::class, 'profile'])->name('profile');

// Ruta de inicio de sesión
Route::get('/', function () {
    return view('auth.login');
});

// Ruta para el dashboard según el rol del usuario
Route::get('/dashboard', function () {
    if (Auth::check()) {
        if (auth()->user()->hasRole('admin')) {
            return view('admin.dashboard');
        } elseif (auth()->user()->hasRole('benefactor')) {
            return view('benefactor.dashboard');
        } elseif (auth()->user()->hasRole('beneficiario')) {
            return view('beneficiario.dashboard');
        } elseif (auth()->user()->hasRole('responsable_parroquial')) {
            return view('responsable.dashboard');
        }
    }
    
    return redirect('/');
})->middleware(['auth', 'verified'])->name('dashboard');

// Rutas protegidas por autenticación
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
