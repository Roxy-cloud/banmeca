<<<<<<< HEAD
@extends('layouts.app')
=======
@extends('admin.layouts.app')
>>>>>>> e2a8b4e (Primer commit)

@section('content')
<div class="container">
   <h1>Detalles del Insumo: {{ $insumo->Tipo_Insumo }}</h1>

   <div class="card">
			<div class="card-body">
				<div class="table-responsive">
                <table id="solicitudes-table" class="datatable table table-hover table-center mb-0">
       <tr>
           <th>Fecha de Donación</th>
<<<<<<< HEAD
           <td>{{ $insumo->Fecha_Donacion }}</td> 
=======
           <td>{{ $insumo->Fecha_Insumo }}</td> 
       </tr>
       <tr>
           <th>Nombre:</th>
           <td>

                        @if ($insumo->Tipo_Insumo == 'Medicamento')
                            {{ $insumo->Medicamentos?->nombre ?? 'No disponible' }}
                        @elseif ($insumo->Tipo_Insumo == 'Equipment')
                            {{ $insumo->equipments?->Tipo ?? 'No disponible' }}
                            @if($insumo->equipment)
                                <img src="{{ asset('storage/' . $insumo->equipment->imagen) }}" alt="Imagen del Equipo" width="50">
                            @endif
                        @else
                            No disponible
                        @endif
                    </td> 
 
>>>>>>> e2a8b4e (Primer commit)
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


