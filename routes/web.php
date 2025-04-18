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
<<<<<<< HEAD
=======
use App\Http\Controllers\SeguimientoController;
use App\Http\Controllers\SolicitudEquipmentController;
use App\Http\Controllers\SolicitudMedicamentoController;
use App\Http\Controllers\UserController;
>>>>>>> e2a8b4e (Primer commit)
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

// Rutas para los recursos: beneficiarios, benefactores, categorias, insumo, medicamentos
<<<<<<< HEAD
=======
Route::resource('admin/profile.edit', ProfileController::class);
>>>>>>> e2a8b4e (Primer commit)
Route::resource('admin/beneficiarios', BeneficiarioController::class);
Route::resource('admin/benefactors', BenefactorController::class);
Route::resource('admin/categorias', CategoriaController::class);
Route::resource('admin/insumos', InsumoController::class);
Route::resource('admin/medicamentos', MedicamentoController::class);
Route::resource('admin/equipments', EquipmentController::class);
Route::resource('admin/sede_parroquial', SedeParroquialController::class);
Route::resource('admin/sede_regional', SedeRegionalController::class);
Route::resource('admin/solicitudes', SolicitudController::class);
<<<<<<< HEAD
=======
Route::resource('admin/seguimiento', SeguimientoController::class);
Route::resource('users', UserController::class);
>>>>>>> e2a8b4e (Primer commit)
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
<<<<<<< HEAD
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');


});

=======
Route::middleware(['auth'])->group(function () {
    Route::get('/perfil', [UserController::class, 'edit'])->name('profile.edit');
    Route::post('/perfil', [UserController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});



>>>>>>> e2a8b4e (Primer commit)
// Otras rutas que necesites agregar

require __DIR__.'/auth.php';
