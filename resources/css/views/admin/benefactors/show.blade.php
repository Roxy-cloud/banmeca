@extends('layouts.app')

@section('content')
<div class="container">
   
    <a href="#" class="btn btn-primary" onclick="imprimirBenefactor()">Imprimir Detalles</a>
    <div id="detalle-benefactor">
    <h1>Detalles del benefactor: {{ $benefactor->Nombre }}</h1>
    <table class="table table-bordered mt-4">
        <tr>
            <th>Cédula</th>
            <td>{{ $benefactor->Rif_Cedula }}</td>
        </tr>
        <tr>
            <th>Tipo</th>
            <td>{{ $benefactor->Tipo }}</td>
        </tr>
        <tr>
            <th>Dirección</th>
            <td>{{ $benefactor->Direccion }}</td>
        </tr>
        <tr>
            <th>Teléfono</th>
            <td>{{ $benefactor->Telefono }}</td>
        </tr>
        <tr>
            <th>Correo Electrónico</th>
            <td>{{ $benefactor->Correo_Electrónico }}</td> 
        </tr>
    </table>

    <!-- Botones para editar o eliminar -->
    <a href="{{ route('benefactors.edit', $benefactor->id) }}" class="btn btn-warning">Editar</a>

   
    @if ($benefactor->donacions()->count() > 0)
    <table class="table mt-4">
<th scope=row >Fecha de Donación </th>
<th scope=row >Descripción</th>
<th scope=row >Acciones</th>

@foreach($benefactor ->donacions as $donacion)

<tr data-toggle=collapse data-target="#demo{{($loop -> iteration)}}"class=accordion >
<td>{{$donacion -> Fecha_Donacion}}</td>
<td>{{$donacion -> Descripcion ?? 'No disponible'}}</td>

<td><a href="{{route( ' donaciones.show',$ donacion - > id)}}"class=btn btn - info > Ver detalles< / a ><br />

<a href="{{route( ' donaciones.edit',$ donacion - > id)}}"class=btn btn - warning > Editar informacion< / a ><br />

<form action={{route( ' donaciones.destroy',$ donacion - > id)}}method=post style=display:inline;>@csrf@method(DELETE)< button type=submitionclick(return confirm (' ¿ Estas seguro/a ?'))class=btn btn-danger-Eliminar registro/ button>/ form>/ tr >/ tbody >/ table >/ div >/ div>/ section>/ main>/ html>/ body>/ html>.

    @else
     No hay donaciones registradas.
     @endif

    </div><!-- Fin del div #detalle-benefador -->
 <!-- Formulario para eliminar -->
    <form action="{{ route('benefactors.destroy', $benefactor->id) }}" method="POST" style="display: inline;">
        @csrf
        @method('DELETE')
            <button type="submit" class="btn btn-danger"
                onclick="return confirm('¿Estás seguro de eliminar este benefactor?')">Eliminar</button>
    </form>
@endsection

<script>
    function imprimirBenefactor() {
        // Seleccionar el contenido a imprimir
        var contenido = document.getElementById('detalle-benefactor').innerHTML;
        
        // Crear una nueva ventana con ese contenido
        var ventanaImpresion = window.open('', '_blank');
        
        // Establecer los estilos y encabezados (opcional)
        ventanaImpresion.document.write('<html><head><title>Detalle Benefactor</title></head><body>');
        
        // Agregar el contenido a imprimir
        ventanaImpresion.document.write(contenido);
        
        // Cerrar los tags HTML y llamar a la función print()
        ventanaImpresion.document.write('</body></html>');
        
        // Abrir la ventana de diálogo para imprimir
        setTimeout(function() {
            ventanaImpresion.print();
            ventanaImpresion.close();
            
            }, 1000); 
    }
</script>
