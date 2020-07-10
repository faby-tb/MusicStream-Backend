@extends('admin.dashboard')

@section('content-admin')

<h2>Artistas</h2>
<div class="table-responsive">
    <table class="table table-striped table-sm">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Agregado</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($artistas as $artista)
                <tr>
                    <td>{{ $artista->id }}</td>
                    <td>
                        <a href="{{ route('artistas.show', $artista) }}">
                            {{ $artista->nombre }}
                        </a>
                    </td>
                    <td>{{ $artista->created_at->format("d F Y") }}</td>
                    <td class="text-left">
                        <div class="btn-group" role="group" aria-label="Acciones">
                            <a type="button" class="btn btn-primary" href="{{ route('artistas.show', $artista) }}" >
                                <i class="fas fa-eye"></i>
                            </a>
                            <a type="button" class="btn btn-warning" href="{{ route('artistas.edit', $artista) }}">
                                <i class="fas fa-edit"></i>
                            </a>
                            <form class="mx-1" method="POST" action="{{ route('artistas.delete', $artista) }}">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-eliminar-artista">
                                    <i class="fas fa-trash-alt"></i>
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection