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

   <table class="table">
       <thead>
           <tr>
               <th>Benefactor</th>
               <th>Nombre del Insumo</th>
               <th>Tipo de Insumo</th>
               <th>Acciones</th>
           </tr>
       </thead>
       <tbody>
           @foreach ($insumos as $insumo)
               <tr>
                   <td>{{ $insumo->donacion->benefactor->Nombre }}</td> <!-- Suponiendo que tienes un campo Nombre en Benefactor -->
                   <td>{{ $insumo->Nombre_Insumo }}</td>
                   <td>{{ $insumo->Tipo_Insumo }}</td>
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
@endsection

