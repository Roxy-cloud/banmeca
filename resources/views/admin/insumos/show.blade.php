@extends('layouts.app')

@section('content')
<div class="container">
   <h1>Detalles del Insumo: {{ $insumo->Tipo_Insumo }}</h1>

   <div class="card">
			<div class="card-body">
				<div class="table-responsive">
                <table id="solicitudes-table" class="datatable table table-hover table-center mb-0">
       <tr>
           <th>Fecha de Donación</th>
           <td>{{ $insumo->Fecha_Donacion }}</td> 
       </tr>
       <tr>

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
   </div>
   
</div>
   </div>

@endsection


