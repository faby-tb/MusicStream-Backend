@extends('layouts.app')

@section('content')
<div class="container">

        <a href="{{ route('artistas.index') }}" type="button" class="btn btn-primary">@lang('Artistas')</a>

        <h2>{{$artista->nombre}}</h2>
        
        <img src="{{ url($artista->portada) }}" class="card-img-top" alt="{{$artista->nombre}}"> 

        <p>{{$artista->descripcion}}</p>

</div>
@endsection