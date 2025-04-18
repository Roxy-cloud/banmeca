@extends('admin.layouts.app')

@section('content')
<div class="container">
<<<<<<< HEAD
    <h1>Detalles del Equipo Medico:</h1>

    <table class="table table-bordered mt-4">

        <tr>
            <th>Tipo</th>
            <td>{{ $equipment->Tipo }}</td>
=======
    

    <table class="table table-bordered mt-4">

        <tr><th colspan=2><h4>Detalles del Equipo Médico:{{ $equipment->Tipo }}</h4></th>

>>>>>>> e2a8b4e (Primer commit)
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
<<<<<<< HEAD

         <!-- Agrega más campos si es necesario -->
        
  

<!-- Botón para volver a la lista -->
<a href="{{ route('equipments.index') }}" class="btn btn-secondary mt-3">Volver a la lista</a>
=======
        <tr>
            <th>IMAGEN</th>
            <td>
        @if($equipment->imagen)
            <img src="{{ asset($equipment->imagen) }}" alt="Imagen del Equipo Médico" class="img-thumbnail" style="max-width: 100px;">
        @else
            <p>No hay imagen disponible</p>
        @endif
    </td> 
        </tr>
         <!-- Agrega más campos si es necesario -->
          </table>
          <table>
         <tr>
            <td><a href="{{ route('equipments.index') }}" class="btn btn-secondary mt-3">Volver a la lista</a>
            </td>
            <td>
                <a href="{{ route('equipments.edit', $equipment->id) }}" class="btn btn-warning">Editar</a>
            </td>
           
        </tr>     
  

<!-- Botón para volver a la lista -->

>>>>>>> e2a8b4e (Primer commit)

    </table>

</div>

@endsection