@extends('layouts.app')

@section('content')
<div class="container">
    <h2>@lang('Artistas')</h2>
    @if (Auth::check() && Auth::user()->hasAnyRole(['admin','moderador']))
        <a href="{{ route('artistas.create') }}" type="button" class="btn btn-primary">@lang('Insertar Artistas')</a>
        <a href="{{ route('canciones.create') }}" type="button" class="btn btn-primary">@lang('Insertar Canciones')</a>
    @endif
    <div class="row">
    @if (Auth::check())
        @foreach($artistas as $artista)
            @if($artista->photos->first())
                <div class="col-4">
                    <div class="card">
                        <img src="{{url($artista->photos->random()->filename)}}" class="card-img-top" alt="{{$artista->nombre}}">
                        <div class="card-body">
                            <h5 class="card-title">{{$artista->nombre}}</h5>
                            <a href="{{route('artistas.show',$artista)}}" class="btn btn-link">@lang('Ver más')</a>
                            @if (Auth::check() && Auth::user()->hasAnyRole(['admin','moderador']))
                            <a href="{{ route('artistas.edit', $artista)}}" class="btn btn-success mx-1"> Editar </a>
                            @if (Auth::check() && Auth::user()->hasAnyRole(['admin']))
                            <form class="mx-1" method="POST" action="{{ route('artistas.delete', $artista) }}">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger" type="submit">Eliminar</button>
                            </form>
                            @endif
                            @endif
                        </div>
                    </div>
                </div>
            @endif
        @endforeach
    @endif
    @guest
        @foreach($artistas as $artista)
            @if($artista->photos->first())
                <div class="col-4">
                    <div class="card">
                        <img src="{{url($artista->photos->random()->filename)}}" class="card-img-top" alt="{{$artista->nombre}}">
                        <div class="card-body">
                            <h5 class="card-title">{{$artista->nombre}}</h5>
                            <a href="{{route('artistas.show',$artista)}}" class="btn btn-link">@lang('Ver más')</a>
                        </div>
                    </div>
                </div>
            @endif
        @endforeach
    @endguest
        
    </div>
@endsection