@extends('layouts.app')

@section('content')
<div class="container">

    <div id="detalle-benefactor">
        <h1>Detalles del benefactor: {{ $benefactor->Nombre }}</h1>
        <table class="table table-bordered mt-4">
            <tr>
                <th>Cédula</th>
                <td>{{ $benefactor->RIF_Cedula }}</td>
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
                <td>{{ $benefactor->email }}</td>
            </tr>
        </table>

        <!-- Botones para editar o eliminar -->
        <a href="{{ route('benefactors.edit', $benefactor->id) }}" class="btn btn-warning">Editar</a>

        @if ($benefactor->insumo()->count() > 0)
            <table class="table mt-4">
                <tr>
                    <th scope="row">Fecha de Donación</th>
                    <th scope="row">Tipo de Insumo</th>
                    <th scope="row">Acciones</th>
                </tr>
                @foreach($benefactor->insumo as $Insumo)
                    <tr data-toggle="collapse" data-target="#demo{{ $loop->iteration }}" class="accordion">
                        <td>{{ $Insumo->Fecha_Donacion }}</td>
                        <td>{{ $Insumo->Tipo_Insumo ?? 'No disponible' }}</td>
                        <td>
                            <a href="{{ route('insumos.show', $Insumo->id) }}" class="btn btn-info">Ver detalles</a><br />
                            <a href="{{ route('insumos.edit', $Insumo->id) }}" class="btn btn-warning">Editar información</a><br />
                            <form action="{{ route('insumos.destroy', $Insumo->id) }}" method="POST" style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" onclick="return confirm('¿Estás seguro de eliminar este registro?')">Eliminar registro</button>
                            </form>
                        </td>
                    </tr>
                    
                @endforeach
            </table>
        @else
            <p>No hay insumo registradas.</p>
        @endif

        <!-- Formulario para eliminar -->
        <form action="{{ route('benefactors.destroy', $benefactor->id) }}" method="POST" style="display: inline;">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger" onclick="return confirm('¿Estás seguro de eliminar este benefactor?')">Eliminar</button>
        </form>
        <a href="#" class="btn btn-primary" onclick="imprimirBenefactor()">Imprimir Detalles</a>
    </div><!-- Fin del div #detalle-benefactor -->
    
</div>

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
@endsection

