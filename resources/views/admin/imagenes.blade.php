@extends('admin.dashboard')

@section('content-admin')

<h2>Imagenes</h2>
<div class="table-responsive">
    <table class="table table-striped table-sm">
        <thead>
            <tr>
                <th>ID</th>
                <th>Ruta</th>
                <th>Agregado</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($imagenes as $imagen)
                <tr>
                    <td>{{ $imagen->id }}</td>
                    <td>
                        <a href="{{ url($imagen->filename) }}">
                            {{ $imagen->filename }}
                        </a>
                    </td>
                    <td>{{ $imagen->created_at->format("d F Y") }}</td>
                    <td class="text-left">
                        <div class="btn-group" role="group" aria-label="Acciones">
                            <a type="button" class="btn btn-primary" href="{{ url($imagen->filename) }}" >
                                <i class="fas fa-eye"></i>
                            </a>
                            <button type="button" class="btn btn-danger btn-eliminar-imagen" data-id="{{ $imagen->id }}">
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