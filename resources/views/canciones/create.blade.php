@extends('layouts.app')

@section('content')
    <div class="container">
    <a href="{{ route('artistas.index') }}" type="button" class="btn btn-primary">@lang('Volver a artistas')</a>
        <h2>@lang('Insertar Canción')</h2>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        
        <form method="POST" action="{{route('canciones.store')}}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="nombre">@lang('Nombre')</label>
                <input type="text" class="form-control" id="nombre" name="nombre" value="{{old('nombre')}}">
            </div>
            <div class="form-group">
                <label for="artista">@lang('Artista')</label>
                <select class="form-control" id="artista" name="artista">
                    @foreach($artistas as $artista)
                        <option>{{$artista->nombre}}</option>
                    @endforeach
                </select>
            </div>
            <div class="custom-file">
                <input type="file" class="custom-file-input" id="cancion" name="cancion">
                <label class="custom-file-label" for="cancion">@lang('Subir canciones del artista')</label>
            </div>
            <button type="submit" class="btn btn-primary my-5">@lang('Insertar canción')</button>
        </form>
    </div>
@endsection