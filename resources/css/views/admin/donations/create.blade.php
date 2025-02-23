@extends('layouts.app')

@section('content')
<div class="container">
   <h1>Agregar Donación</h1>

   @if ($errors->any())
       <div class="alert alert-danger">
           <ul>
               @foreach ($errors->all() as $error)
                   <li>{{ $error }}</li>
               @endforeach
           </ul>
       </div>
   @endif

   <form action="{{ route('donaciones.store') }}" method="POST">
       @csrf

       <div class="mb-3">
           <label for="benefactor_id" class="form-label">Benefactor</label>
           <select class="form-control" id="benefactor_id" name="benefactor_id" required>
               <option value="">Seleccionar Benefactor</option>
               @foreach ($benefactores as $benefactor)
                   <option value="{{ $benefactor->id }}">{{ $benefactor->Nombre }}</option> <!-- Suponiendo que tienes un campo Nombre en Benefactor -->
               @endforeach
           </select>
       </div>

       <div class="mb-3">
           <label for="Fecha_Donacion" class="form-label">Fecha de Donación</label>
           <input type="datetime-local" class="form-control" id="Fecha_Donacion" name="Fecha_Donacion" required>
       </div>

       <div class="mb-3">
           <label for="Descripcion" class="form-label">Descripción (opcional)</label>
           <textarea class="form-control" id="Descripcion" name="Descripcion"></textarea>
       </div>

       <button type="submit" class="btn btn-primary">Guardar Donación</button>

       <a href="{{ route('donaciones.index') }}" class="btn btn-secondary mt-3">Volver a la lista</a>
   </form>
</div>
@endsection

