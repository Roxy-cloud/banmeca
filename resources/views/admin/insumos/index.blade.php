@extends('layouts.app')

@section('content')
<div class="container">
   <h1>Lista de Insumos</h1>

   @if (session('success'))
       <div class="alert alert-success">
           {{ session('success') }}
       </div>
   @endif

   <a href="{{ route('insumos.create') }}" class="btn btn-primary">Agregar Insumo</a>

   <div class="card">
			<div class="card-body">
				<div class="table-responsive">
                <table id="solicitudes-table" class="datatable table table-hover table-center mb-0">
          <thead>
             <tr>
               <th>Benefactor</th>
               <th>Tipo de Insumo</th>
               <th>Nombre</th>
               <th>Acciones</th>
           </tr>
       </thead>
       <tbody>
           @foreach ($insumos as $insumo)
               <tr>
               <td>{{ $insumo->benefactor->Nombre }}</td>
                   <td>{{ $insumo->Tipo_Insumo }}</td>
                   <td>
                        @if ($insumo->Tipo_Insumo == 'Medicamento')
                            {{ $insumo->Medicamentos?->Nombre ?? 'No disponible' }}
                        @elseif ($insumo->Tipo_Insumo == 'equipment')
                            {{ $insumo->equipment?->Tipo ?? 'No disponible' }}
                            @if($insumo->equipment)
                                <img src="{{ asset('storage/' . $insumo->equipment->imagen) }}" alt="Imagen del Equipo" width="50">
                            @endif
                        @else
                            No disponible
                        @endif
                    </td> 
                   <td>
                       <a href="{{ route('insumos.show', $insumo->id) }}" class="btn btn-info">Ver</a>
                       <a href="{{ route('insumos.edit', $insumo->id) }}" class="btn btn-warning">Editar</a>
                       <form action="{{ route('insumos.destroy', $insumo->id) }}" method="POST" style="display: inline;">
                           @csrf
                           @method('DELETE')
                           <button type="submit" class="btn btn-danger" onclick="return confirm('¿Estás seguro de eliminar este insumo?')">Eliminar</button>
                       </form>
                   </td>
               </tr>
           @endforeach
       </tbody>
   </table>
</div>
</div>
</div>
@endsection

