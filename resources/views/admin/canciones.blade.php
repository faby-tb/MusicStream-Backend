@extends('admin.dashboard')

@section('content-admin')

<h2>Canciones</h2>
<div class="table-responsive">
    <table class="table table-striped table-sm">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Ruta</th>
                <th>ID del artista</th>
                <th>Agregado</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($canciones as $cancion)
                <tr>
                    <td>{{ $cancion->id }}</td>
                    <td>
                        <a href="{{ route('artistas.show', $cancion->songable_id) }}">
                            {{ $cancion->name }}
                        </a>
                    </td>
                    <td>{{ $cancion->filename }}</td>
                    <td>
                        <a href="{{ route('artistas.show', $cancion->songable_id) }}">
                            {{ $cancion->songable_id }}
                        </a>
                    </td>
                    <td>{{ $cancion->created_at->format("d F Y") }}</td>
                    <td class="text-left">
                        <div class="btn-group" role="group" aria-label="Acciones">
                            <a type="button" class="btn btn-primary" href="{{ route('artistas.show', $cancion->songable_id) }}" >
                                <i class="fas fa-eye"></i>
                            </a>
                            <a type="button" class="btn btn-warning" href="{{ route('canciones.edit', $cancion) }}">
                                <i class="fas fa-edit"></i>
                            </a>
                            <button type="button" class="btn btn-danger btn-eliminar-cancion" data-id="{{ $cancion->id }}">
                                <i class="fas fa-trash-alt"></i>
                            </button>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection

@section('scripts')
    <script>
        console.log('eliminar artistas');
    </script>
@endsection