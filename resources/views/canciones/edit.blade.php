@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>@lang('Editar cancion')</h2>
        <a href="{{route('artistas.index')}}">Volver a artistas</a>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('canciones.update') }}" enctype="multipart/form-data">
            @csrf

            @method("PUT")

            <div class="form-group">
                <label for="name">@lang('Nombre')</label>
                <input type="text" class="form-control" id="name" name="name" value="{{$cancion->name}}">
            </div>
            <input type="hidden" id="id" name="id" value="{{$cancion->id}}">
            <button type="submit" class="btn btn-primary my-5">@lang('Editar')</button>
        </form>
    </div>

@endsection 