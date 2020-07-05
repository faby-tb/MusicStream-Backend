@extends('layouts.app')

@section('content')
<div class="container">
        <h2>@lang('Artistas')</h2>
        <a href="{{ route('artistas.create') }}" type="button" class="btn btn-primary">@lang('Insertar Artistas')</a>
        <!-- {{dd($artistas)}} -->
        <div class="row">

        @foreach ($artistas as $artista)
            <div class="col-4">
                <div class="card">
                    <img src="{{$artista->portada}}" class="card-img-top" alt="{{$artista->nombre}}">
                    <div class="card-body">
                        <h5 class="card-title">{{$artista->nombre}}</h5>
                        <a href="{{route('artistas.show',$libro)}}" class="btn btn-primary">Go somewhere</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection