@extends('admin.layouts.app')

@section('content')
<div class="container">
    <h1>Detalles del Equipo Medico:</h1>

    <table class="table table-bordered mt-4">

        <tr>
            <th>Tipo</th>
            <td>{{ $equipment->Tipo }}</td>
        </tr>
        <tr>
            <th>Marca</th>
            <td>{{ $equipment->Marca }}</td>
        </tr>
        <tr>
            <th>Modelo</th>
            <td>{{ $equipment->Modelo }}</td>
        </tr>
        <tr>
        <tr>
            <th>Existencia</th>
            <td>{{ $equipment->Existencia }}</td> 
        </tr>
        <tr>
            <th>Estado</th>
            <td>{{ $equipment->Estado }}</td> 
        </tr>

         <!-- Agrega más campos si es necesario -->
        
  

<!-- Botón para volver a la lista -->
<a href="{{ route('equipments.index') }}" class="btn btn-secondary mt-3">Volver a la lista</a>

    </table>

</div>

@endsection