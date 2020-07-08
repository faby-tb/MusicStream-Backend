@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>@lang('Editar artista')</h2>
        <a href="{{route('artistas.show',$artista)}}">Volver a {{$artista->nombre}}</a>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('artistas.update') }}" enctype="multipart/form-data">
            @csrf

            @method("PUT")

            <div class="form-group">
                <label for="nombre">@lang('Nombre')</label>
                <input type="text" class="form-control" id="nombre" name="nombre" value="{{$artista->nombre}}">
            </div>
            <div class="form-group">
                <label for="descripcion">@lang('Descripción')</label>
                <textarea type="text" class="form-control" id="descripcion" cols="20" rows="5" name="descripcion">{{$artista->descripcion}}</textarea>
            </div>
            <input type="hidden" id="id" name="id" value="{{$artista->id}}">
            <button type="submit" class="btn btn-primary my-5">@lang('Editar')</button>
        </form>
    </div>

@endsection