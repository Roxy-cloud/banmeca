<<<<<<< HEAD
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

=======
@extends('admin.layouts.app')

@section('content')
<div class="container">
    <h1>Lista de Insumos</h1>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <a href="{{ route('insumos.create') }}" class="btn btn-primary mb-3">Agregar Insumo</a>

    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Tipo de Insumo</th>
                            <th>Nombre</th>
                            <th>Detalles Adicionales</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($insumos as $insumo)
                            @if ($insumo->Tipo_Insumo == 'MEDICAMENTO' && $insumo->medicamentos->isNotEmpty())
                                @foreach ($insumo->medicamentos as $medicamento)
                                    <tr>
                                        <td>Medicamento</td>
                                        <td>{{ $medicamento->Nombre ?? 'Sin Nombre' }}</td>
                                        <td>
                                            Fecha de Donación: {{ $medicamento->Fecha_Donacion ?? 'Sin Especificar' }}<br>
                                            Fecha de Vencimiento: {{ $medicamento->Fecha_Vencimiento ?? 'No Disponible' }}
                                        </td>
                                        <td>
                                            <a href="{{ route('medicamentos.show', $medicamento->id) }}" class="btn btn-info">Ver</a>
                                        </td>
                                    </tr>
                                @endforeach
                            @elseif ($insumo->Tipo_Insumo == 'EQUIPO' && $insumo->equipments->isNotEmpty())
                                @foreach ($insumo->equipments as $equipment)
                                    <tr>
                                        <td>Equipo</td>
                                        <td>{{ $equipment->Tipo ?? 'Sin Nombre' }}</td>
                                        <td>
                                            Marca: {{ $equipment->Marca ?? 'Sin Marca' }}<br>
                                            @if ($equipment->imagen)
                                                <img src="{{ asset($equipment->imagen) }}" alt="Imagen del Equipo" width="50" height="50">
                                            @else
                                                Sin Imagen
                                            @endif
                                        </td>
                                        <td>
                                            <a href="{{ route('equipments.show', $equipment->id) }}" class="btn btn-info">Ver</a>
                                        </td>
                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td colspan="4">Sin Insumos Registrados</td>
                                </tr>
                            @endif
                        @empty
                            <tr>
                                <td colspan="4">No hay insumos disponibles.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
>>>>>>> e2a8b4e (Primer commit)
