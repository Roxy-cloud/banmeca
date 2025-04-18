<<<<<<< HEAD
<div>
    <!-- Knowing is not enough; we must apply. Being willing is not enough; we must do. - Leonardo da Vinci -->
</div>
=======
<!-- resources/views/sede_regional/show.blade.php -->
@extends('admin.layouts.app')

@section('content')
    <div class="container">
        <h1>Detalles de la Sede Regional</h1>
        <div class="card">
            <div class="card-header">
                <h2>{{ $sedeRegional->Nombre }}</h2>
            </div>
            <div class="card-body">

                <p><strong>Dirección:</strong> {{ $sedeRegional->Direccion }}</p>
                <p><strong>Responsable:</strong> {{ $sedeRegional->Responsable }}</p>
                <a href="{{ route('sede_regional.index') }}" class="btn btn-secondary">Volver al Listado</a>
                <a href="{{ route('sede_regional.edit', $sedeRegional->id) }}" class="btn btn-warning">Editar</a>

                </form>
            </div>
        </div>
    </div>
@endsection

>>>>>>> e2a8b4e (Primer commit)
