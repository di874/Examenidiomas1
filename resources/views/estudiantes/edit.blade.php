@extends('layout')

@section('content')
    <h1>Editar Estudiante</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('estudiantes.update', $estudiante->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="nombre" class="form-label">Nombre completo</label>
            <input type="text" name="nombre" class="form-control"
                   value="{{ $estudiante->nombre }}" required>
        </div>

        <div class="mb-3">
            <label for="telefono" class="form-label">Teléfono</label>
            <input type="text" name="telefono" class="form-control"
                   value="{{ $estudiante->telefono }}" required
                   inputmode="numeric" pattern="[0-9]+" maxlength="15"
                   placeholder="Solo números">
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">Correo electrónico</label>
            <input type="email" name="email" class="form-control"
                   value="{{ $estudiante->email }}" required>
        </div>

        <div class="mb-3">
            <label for="idioma" class="form-label">Idioma</label>
            <input type="text" name="idioma" class="form-control"
                   value="{{ $estudiante->idioma }}" required>
        </div>

        <div class="mb-3">
            <label for="nivel" class="form-label">Nivel</label>
            <select name="nivel" class="form-select" required>
                <option value="básico" {{ $estudiante->nivel == 'básico' ? 'selected' : '' }}>Básico</option>
                <option value="intermedio" {{ $estudiante->nivel == 'intermedio' ? 'selected' : '' }}>Intermedio</option>
                <option value="avanzado" {{ $estudiante->nivel == 'avanzado' ? 'selected' : '' }}>Avanzado</option>
            </select>
        </div>

        <div class="mb-3">
            <label for="estado" class="form-label">Estado</label>
            <select name="estado" class="form-select" required>
                <option value="activo" {{ $estudiante->estado == 'activo' ? 'selected' : '' }}>Activo</option>
                <option value="pausado" {{ $estudiante->estado == 'pausado' ? 'selected' : '' }}>Pausado</option>
                <option value="graduado" {{ $estudiante->estado == 'graduado' ? 'selected' : '' }}>Graduado</option>
                <option value="retirado" {{ $estudiante->estado == 'retirado' ? 'selected' : '' }}>Retirado</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Actualizar</button>
        <a href="{{ route('estudiantes.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
@endsection
