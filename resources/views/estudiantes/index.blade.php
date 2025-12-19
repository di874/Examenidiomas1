@extends('layout')

@section('content')
    <h1>Estudiantes - Speak Easy</h1>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <a href="{{ route('estudiantes.create') }}" class="btn btn-success mb-3">Nuevo Estudiante</a>

    <h2>Activos</h2>
    <table class="table table-bordered">
        <thead class="table-dark">
        <tr>
            <th>Nombre</th><th>Teléfono</th><th>Email</th><th>Idioma</th><th>Nivel</th><th>Estado</th><th>Acciones</th>
        </tr>
        </thead>
        <tbody>
        @foreach($activos as $e)
            <tr>
                <td>{{ $e->nombre }}</td>
                <td>{{ $e->telefono }}</td>
                <td>{{ $e->email }}</td>
                <td>{{ $e->idioma }}</td>
                <td>{{ $e->nivel }}</td>
                <td>{{ $e->estado }}</td>
                <td>
                    <a href="{{ route('estudiantes.edit',$e->id) }}" class="btn btn-warning btn-sm">Editar</a>
                    <form action="{{ route('estudiantes.destroy',$e->id) }}" method="POST" style="display:inline">
                        @csrf @method('DELETE')
                        <button class="btn btn-danger btn-sm">Retirar</button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

    <h2>Historial</h2>
    <table class="table table-bordered">
        <thead class="table-dark">
        <tr>
            <th>Nombre</th><th>Teléfono</th><th>Email</th><th>Idioma</th><th>Nivel</th><th>Estado</th>
        </tr>
        </thead>
        <tbody>
        @foreach($historial as $e)
            <tr>
                <td>{{ $e->nombre }}</td>
                <td>{{ $e->telefono }}</td>
                <td>{{ $e->email }}</td>
                <td>{{ $e->idioma }}</td>
                <td>{{ $e->nivel }}</td>
                <td>{{ $e->estado }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
