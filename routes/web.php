<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DonacionMedicamentoController;
use App\Http\Controllers\DonacionEquipoController;
use App\Http\Controllers\ComodatoEquipoController;
use App\Http\Controllers\ComponenteController;
use App\Http\Controllers\JornadaController;
use App\Http\Controllers\BenefactorController;
use App\Http\Controllers\BeneficiarioController;
use App\Http\Controllers\PacienteController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\InsumoController;
use App\Http\Controllers\MedicamentoController;
use App\Http\Controllers\EquipmentController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\SedeRegionalController;
use App\Http\Controllers\SedeParroquialController;
use App\Http\Controllers\SeguimientoController;
use App\Http\Controllers\SolicitudEquipmentController;
use App\Http\Controllers\SolicitudMedicamentoController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Auth\AuthenticatedSessionController;

// Ruta de cierre de sesión
Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');


// Rutas para los recursos: beneficiarios, benefactores, categorias, insumo, medicamentos
Route::resource('admin/beneficiarios', BeneficiarioController::class);
Route::resource('admin/donaciones_medicamentos', DonacionMedicamentoController::class);
Route::resource('admin/donaciones_equipments', DonacionEquipoController::class);
Route::resource('admin/comodato_equipments', ComodatoEquipoController::class);
Route::resource('admin/solicitud_equipments', SolicitudEquipmentController::class);
Route::resource('admin/benefactors', BenefactorController::class);
Route::resource('admin/categorias', CategoriaController::class);
Route::resource('admin/componentes', ComponenteController::class);
Route::resource('admin/insumos', InsumoController::class);
Route::resource('admin/medicamentos', MedicamentoController::class);
Route::resource('admin/equipments', EquipmentController::class);
Route::resource('admin/sede_parroquial', SedeParroquialController::class);
Route::resource('admin/sede_regional', SedeRegionalController::class);
Route::resource('admin/jornadas', JornadaController::class);
Route::resource('admin/seguimiento', SeguimientoController::class);
Route::resource('users', UserController::class);




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
Route::get('/beneficiarios/{id}/pdf', [BeneficiarioController::class, 'generarPDF'])->name('beneficiarios.pdf');

Route::get('/buscar-componentes', [MedicamentoController::class, 'buscarComponentes']);
Route::post('logout',[LogoutController::class,'index'])->name('logout');

Route::get('/pacientes/create', [PacienteController::class, 'create'])->name('pacientes.create');
Route::post('/pacientes/store', [PacienteController::class, 'store'])->name('pacientes.store');
Route::get('/jornadas/{jornada}/pdf', [JornadaController::class, 'generatePDF'])->name('jornadas.generatePDF');
// Ruta para generar el PDF de un medicamento 
Route::get('/medicamentos/{medicamento}/pdf', [EquipmentController::class, 'generatePDF'])->name('medicamentos.generatePDF');
// Ruta para generar el PDF de un equipo médico
Route::get('/equipments/{equipment}/pdf', [EquipmentController::class, 'generatePDF'])->name('equipments.generatePDF');
Route::get('/comprobante', [InsumoController::class, 'generarComprobantePorFecha'])->name('comprobante.fecha');
Route::get('profile', [ProfileController::class, 'profile'])->name('profile');
Route::get('/donaciones_medicamentos/{id}', [DonacionMedicamentoController::class, 'show'])
    ->name('donaciones_medicamentos.show');
Route::get('/admin/solicitud_equipments/{id}/{tipo}', [SolicitudEquipmentController::class, 'show'])->name('solicitud_equipments.show');
Route::get('/solicitud/pdf/{id}/{tipo}', [SolicitudEquipmentController::class, 'generarPDF'])->name('solicitud.pdf');




// Otras rutas que necesites agregar

require __DIR__.'/auth.php';
