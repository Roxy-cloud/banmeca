@extends('layouts.app')

@section('content')
<div class="container">
   <h1>Detalles de la Donación</h1>

   <table class="table table-bordered mt-4">
       <tr>
           <th>Benefactor</th>
           <td>{{ $donacion->benefactor->Nombre }}</td> <!-- Suponiendo que tienes un campo Nombre en Benefactor -->
       </tr>
       <tr>
           <th>Fecha de Donación</th>
           <td>{{ $donacion->Fecha_Donacion }}</td>
       </tr>
       <tr>
           <th>Descripción</th>
           <td>{{ $donacion->Descripcion ?? 'No disponible' }}</td> <!-- Muestra "No disponible" si está vacío -->
       </tr>
   </table>

   <!-- Botones para editar o eliminar -->
   <a href="{{ route('donaciones.edit', $donacion->id) }}" class="btn btn-warning">Editar</a>

   <!-- Formulario para eliminar -->
   <form action="{{ route('donaciones.destroy', $donacion->id) }}" method="POST" style="display: inline;">
       @csrf
       @method('DELETE')
       <button type="submit" class="btn btn-danger"
               onclick="return confirm('¿Estás seguro de eliminar esta donación?')">Eliminar</button>
   </form>

   <!-- Botón para volver a la lista -->
   <a href="{{ route('donaciones.index') }}" class="btn btn-secondary mt-3">Volver a la lista</a>

@endsection


