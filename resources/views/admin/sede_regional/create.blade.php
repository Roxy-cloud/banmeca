@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Agregar Sede Regional</h1>
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="{{ route('sede_regional.store') }}" method="POST">
        @csrf

        <div class="row">
            <div class="col-md-6 mb-3">
                <label for="Nombre" class="form-label">Nombre</label>
                <input type="text" name="Nombre" class="form-control" value="{{ old('Nombre') }}" required>
                @error('Nombre')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
            <div class="col-md-6 mb-3">
                <label for="Direccion" class="form-label">Dirección</label>
                <input type="text" name="Direccion" class="form-control" value="{{ old('Direccion') }}" required>
                @error('Direccion')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
        </div>

        <div class="mb-3">
            <label for="Responsable" class="form-label">Agregar Responsable</label>
            <input type="text" class="form-control" name="Responsable">
        </div>


        <button type="submit" class="btn btn-primary">
            <i class="fas fa-save"></i> Guardar
        </button>
    </form>
</div>
@endsection
