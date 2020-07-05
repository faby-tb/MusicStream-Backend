@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>@lang('Insertar Artista')</h2>
        <form method="POST" action="{{route('artistas.store')}}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="nombre">@lang('Nombre')</label>
                <input type="text" class="form-control" id="nombre" name="nombre" value="{{old('nombre')}}">
            </div>
            <div class="form-group">
                <label for="descripcion">@lang('Descripción')</label>
                <textarea type="text" class="form-control" id="descripcion" cols="20" rows="5" name="descripcion" value="{{old('descripcion')}}"></textarea>
            </div>
            <div class="custom-file">
                <input type="file" class="custom-file-input" id="imagenes" name="imagenes">
                <label class="custom-file-label" for="imagenes">@lang('Subir imagenes del artista')</label>
            </div>
            <button type="submit" class="btn btn-primary my-5">@lang('Insertar')</button>
        </form>
    </div>
@endsection