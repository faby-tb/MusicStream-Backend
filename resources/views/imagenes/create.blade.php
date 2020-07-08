@extends('layouts.app')

@section('content')
    <div class="container">
    <a href="{{ route('artistas.show',$artista) }}" type="button" class="btn btn-primary">@lang('Volver a '){{$artista->nombre}}</a>
        <h2>@lang('Insertar Imagenes')</h2>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        
        <form method="POST" action="{{route('imagenes.store')}}" enctype="multipart/form-data">
            @csrf
            <div class="custom-file">
                <input type="file" class="custom-file-input" id="imagenes" name="imagenes[]" multiple>
                <label class="custom-file-label" for="imagenes">@lang('Subir imagenes del artista')</label>
            </div>
            <input type="hidden" id="id" name="id" value="{{$artista->id}}">
            <button type="submit" class="btn btn-primary my-5">@lang('Insertar imagenes')</button>
        </form>
    </div>
@endsection