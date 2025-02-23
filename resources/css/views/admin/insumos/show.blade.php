@extends('layouts.app')

@section('content')
<div class="container">
   <h1>Detalles del Insumo: {{ $insumo->Nombre_Insumo }}</h1>

   <table class="table table-bordered mt-4">
       <tr>
           <th>Donación Asociada</th>
           <td>{{ $insumo->donacion->Fecha_Donacion }}</td> <!-- Suponiendo que tienes un campo Fecha_Donacion en Donación -->
       </tr>
       <tr>
           <th>Nombre del Insumo</th>
           <td>{{ $insumo->Nombre_Insumo }}</td>
       </tr>
       <tr>
           <th>Tipo de Insumo</th>
           <td>{{ $insumo->Tipo_Insumo }}</td>
       </tr>
   </table>

   <!-- Botones para editar o eliminar -->
   <a href="{{ route('insumos.edit', $insumo->id) }}" class="btn btn-warning">Editar</a>

   <!-- Formulario para eliminar -->
   <form action="{{ route('insumos.destroy', $insumo->id) }}" method="POST" style="display: inline;">
       @csrf
       @method('DELETE')
       <button type="submit" class="btn btn-danger"
               onclick="return confirm('¿Estás seguro de eliminar este insumo?')">Eliminar</button>
   </form>

   <!-- Botón para volver a la lista -->
   <a href="{{ route('insumos.index') }}" class="btn btn-secondary mt-3">Volver a la lista</a>

@endsection


