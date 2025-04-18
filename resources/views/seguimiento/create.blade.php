@extends('layouts.app')

@section('content')

<form method="POST" action="{{ route('seguimiento.store') }}">
    @csrf
    <input type="hidden" name="solicitud_id" value="{{ $solicitud->id }}">
    
    <div>
        <label>Estado:</label>
        <select name="estado" required>
            <option value="pendiente">Pendiente</option>
            <option value="aprobado">Aprobado</option>
            <option value="rechazado">Rechazado</option>
            <option value="entregado">Entregado</option>
        </select>
    </div>
    <div>
        <label>Observaciones:</label>
        <textarea name="observaciones"></textarea>
    </div>
    <button type="submit">Actualizar seguimiento</button>
</form>

@endsection