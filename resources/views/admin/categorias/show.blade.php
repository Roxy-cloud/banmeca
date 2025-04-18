<<<<<<< HEAD
@extends('layouts.app')
=======
@extends('admin.layouts.app')
>>>>>>> e2a8b4e (Primer commit)

@section('content')
<div class="container">
    <h1>Detalles de la Categoría: {{ $categoria->Nombre }}</h1>

    <table class="table table-bordered mt-4">
        <tr>
            <th>Descripción</th>
            <td>{{ $categoria->Descripcion ?? 'No disponible' }}</td> <!-- Muestra "No disponible" si está vacío -->
        </tr>
        
         <!-- Agrega más campos si es necesario -->
        
         <!-- Botones para editar o eliminar -->
         <a href="{{ route('categorias.edit', $categoria->id) }}" class="btn btn-warning">Editar</a>

         <!-- Formulario para eliminar -->
         <form action="{{ route('categorias.destroy', $categoria->id) }}" method="POST" style="display: inline;">
             @csrf
             @method('DELETE')
             <button type="submit" class="btn btn-danger"
                     onclick="return confirm('¿Estás seguro de eliminar esta categoría?')">Eliminar</button>
         </form>

         <a href="{{ route('categorias.index') }}" class="btn btn-secondary mt-3">Volver a la lista</a>

</div>

@endsection
