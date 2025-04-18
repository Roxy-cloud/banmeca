<<<<<<< HEAD
@extends('layouts.app')
=======
@extends('admin.layouts.app')
>>>>>>> e2a8b4e (Primer commit)

@section('content')
<div class="container">
   <h1>Agregar Insumo</h1>

   @if ($errors->any())
       <div class="alert alert-danger">
           <ul>
               @foreach ($errors->all() as $error)
                   <li>{{ $error }}</li>
               @endforeach
           </ul>
       </div>
   @endif

   <form action="{{ route('insumos.store') }}" method="POST">
       @csrf

       <div class="mb-3">
           <label for="insumo_id" class="form-label">Donación</label>
           <select class="form-control" id="insumo_id" name="insumo_id" required>
               <option value="">Seleccionar Donación</option>
               @foreach ($insumo as $Insumo)
                   <option value="{{ $Insumo->id }}">{{ $Insumo->Fecha_Insumo }}</option> <!-- Suponiendo que tienes un campo Fecha_Insumo en Donación -->
               @endforeach
           </select>
       </div>

       <div class="mb-3">
<<<<<<< HEAD
           <label for="Nombre_Insumo" class="form-label">Nombre del Insumo</label>
           <input type="text" class="form-control" id="Nombre_Insumo" name="Nombre_Insumo" required>
       </div>

       <div class="mb-3">
           <label for="Tipo_Insumo" class="form-label">Tipo de Insumo</label>
           <select class="form-control" id="Tipo_Insumo" name="Tipo_Insumo" required>
               <option value="">Seleccionar Tipo de Insumo</option>
               <option value="Medicamento">Medicamento</option>
               <option value="Equipo Médico">Equipo Médico</option>
           </select>
       </div>

       <button type="submit" class="btn btn-primary">Guardar Insumo</button>
=======
           <label for="Tipo_Insumo" class="form-label">Tipo de Insumo</label>
           <select class="form-control" id="Tipo_Insumo" name="Tipo_Insumo" required>
                    <option value="">Seleccionar </option>
                    <option value="medicamento">Medicamento</option>
                    <option value="equipment">Equipo Médico</option>
                </select>
       </div>

>>>>>>> e2a8b4e (Primer commit)

       <a href="{{ route('insumos.index') }}" class="btn btn-secondary mt-3">Volver a la lista</a>
   </form>
</div>
<!----------- añadir formulario para agregar el medicamento ------>
@endsection
