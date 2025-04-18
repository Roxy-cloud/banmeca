<<<<<<< HEAD
@extends('layouts.app')

@section('content')
<div class="container">

    <div id="detalle-benefactor">
        <h1>Detalles del benefactor: {{ $benefactor->Nombre }}</h1>
=======
@extends('admin.layouts.app')

@section('content')
<div class="container">
    <style>
        @media print {
            /* Estilo para impresión */
        }
    </style>

    <div id="detalle-benefactor">
        <h2>Detalles del Benefactor: {{ $benefactor->Nombre }}</h2>
>>>>>>> e2a8b4e (Primer commit)
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

<<<<<<< HEAD
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

=======
        <!-- Botón para editar -->
        <a href="{{ route('benefactors.edit', $benefactor->id) }}" class="btn btn-warning mb-3">Editar</a>

    <h2>Insumos Recibidos de: {{ $benefactor->Nombre }}</h2>
    @if ($benefactor->medicamentos->isNotEmpty() || $benefactor->equipments->isNotEmpty())
    <td>
        @if ($benefactor->medicamentos->isNotEmpty())
            <h3>Medicamentos Donados</h3>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Nombre del Medicamento</th>
                        <th>Cantidad</th>
                        <th>Fecha de Recepción</th>
                        <th>Fecha de Vencimiento</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($benefactor->medicamentos as $medicamento)
                        <tr>
                            <td>{{ $medicamento->Nombre ?? 'Sin Nombre' }}</td>
                            <td>{{ $medicamento->Existencia ?? 'Sin Cantidad' }}</td>
                            <td>{{ $medicamento->Fecha_Donacion ?? 'Sin Especificar' }}</td>
                            <td>{{ $medicamento->Fecha_Vencimiento ?? 'No Disponible' }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif

        @if ($benefactor->equipments->isNotEmpty())
            <h3>Equipos Médicos Donados</h3>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Tipo de Equipo</th>
                        <th>Marca</th>
                        <th>Cantidad</th>
                        <th>Fecha de Recepción</th>
                        <th>Estado</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($benefactor->equipments as $equipment)
                        <tr>
                            <td>{{ $equipment->Tipo ?? 'Sin Nombre' }}</td>
                            <td>{{ $equipment->Marca ?? 'Sin Marca' }}</td>
                            <td>{{ $equipment->Existencia ?? 'Sin Cantidad' }}</td>
                            <td>{{ $equipment->Fecha_Donacion ?? 'Sin Especificar' }}</td>
                            <td>{{ $equipment->Estado ?? 'No Disponible' }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </td>
@else
    <td>No hay insumos registrados para este benefactor.</td>
@endif

    <!-- Botón para imprimir -->
    <button class="btn btn-primary no-print" onclick="imprimirReporte()">Imprimir Reporte</button>
</div>
</div>

<script>
    function imprimirReporte() {
        var contenido = document.getElementById('detalle-benefactor').innerHTML;
        var ventanaImpresion = window.open('', '_blank');
        ventanaImpresion.document.write(`
            <html>
            <head>
                <title>Reporte del Benefactor</title>
                <style>
                    @media print {
                        body {
                            font-family: Arial, sans-serif;
                            font-size: 12px;
                            color: #000;
                        }
                        table {
                            border-collapse: collapse;
                            width: 100%;
                        }
                        table, th, td {
                            border: 1px solid black;
                        }
                        th, td {
                            padding: 8px;
                            text-align: left;
                        }
                        .no-print {
                            display: none !important;
                        }
                        .page-break {
                            page-break-before: always !important;
                        }
                    }
                </style>
            </head>
            <body>
                ${contenido}
            </body>
            </html>
        `);
        setTimeout(() => {
            ventanaImpresion.print();
            ventanaImpresion.close();
        }, 500);
    }
</script>

@endsection
>>>>>>> e2a8b4e (Primer commit)
