@extends('admin.layouts.app')

@section('content')
<div class="container">
    <h1>Detalles:</h1>

<h2>Historial de seguimiento</h2>
<table class="table table-bordered mt-4">
<ul>
    
    @foreach($solicitud->seguimiento as $registro)
        <li>
            {{ $registro->estado }} - {{ $registro->created_at->diffForHumans() }}
            <p>Observaciones: {{ $registro->observaciones }}</p>
            <p>Actualizado por: {{ $registro->usuario->name ?? 'Sistema' }}</p>
        </li>
    @endforeach
</ul>
<!-- Botón para volver a la lista -->
<a href="{{ route('equipments.index') }}" class="btn btn-secondary mt-3">Volver a la lista</a>

    </table>

</div>

@endsection

@endsection