<<<<<<< HEAD
<div>
    <!-- You must be the change you wish to see in the world. - Mahatma Gandhi -->
</div>
=======
<!-- resources/views/sede_parroquial/edit.blade.php -->
@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Agregar Sede Parroquial</h1>
        <form action="{{ route('sede_parroquial.store') }}" method="POST">
            @csrf

            {{-- Input hidden para registrar automáticamente la Sede Regional --}}
            <input type="hidden" name="SedeRegional_id" value="{{ $sedesRegionales->first()->id }}">
            
            <div class="mb-3">
                <label for="Nombre" class="form-label">Nombre</label>
                <input type="text" name="Nombre" class="form-control" value="{{ old('Nombre') }}" required>
            </div>
            <div class="mb-3">
            <label for="Direccion" class="form-label">Dirección</label>
            <input type="text" name="Direccion" class="form-control" value="{{ old('Direccion') }}" required>
                @error('Direccion')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
            <div class="mb-3">
            <label for="user_id" class="form-label">Agregar Responsable</label>
            <select id="user_id" name="user_id" class="form-control" required>
                <option value="">Seleccionar</option>
                @foreach($responsables as $user)
                    <option value="{{ $user->id }}" {{ old('user_id') == $user->id ? 'selected' : '' }}>
                        {{ $user->name }}
                    </option>
                @endforeach
            </select>
            @error('user_id')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
                <div class="mb-3">
                    <label for="telefono" class="form-label">Teléfono</label>
                    <input type="tel" name="telefono" class="form-control" pattern="[0-9]{4}-[0-9]{7}" 
                        placeholder="Ejemplo: 0412-1234567" value="{{ old('telefono') }}" required>
                    @error('telefono')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Actualizar</button>
        </form>
    </div>
@endsection
>>>>>>> e2a8b4e (Primer commit)
