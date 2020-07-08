@extends('layouts.app')

@section('content')
<div class="container">

        <a href="{{ route('artistas.index') }}" type="button" class="btn btn-primary">@lang('Artistas')</a>

        <h2>{{$artista->nombre}}</h2>

        

        <div id="carousel" class="carousel slide text-light" data-ride="carousel">
			<div class="carousel-inner embed-responsive embed-responsive-16by9">
			{{$first=true}}
				@foreach($artista->photos as $photo)
					@if(!$first)
						<div class="carousel-item card-img-top embed-responsive-item">
							<img src="{{url($photo->filename)}}" class="d-block w-100" alt="{{$photo->id}}">
						</div>
					@endif
					@if($first)
					{{$first=false}}
						<div class="carousel-item active card-img-top embed-responsive-item">
							<img src="{{url($photo->filename)}}" class="d-block w-100" alt="{{$photo->id}}">
						</div>
					@endif
				@endforeach
        	</div>
			<a class="carousel-control-prev" href="#carousel" role="button" data-slide="prev">
				<span class="carousel-control-prev-icon" aria-hidden="true"></span>
				<span class="sr-only">Previous</span>
			</a>
			<a class="carousel-control-next" href="#carousel" role="button" data-slide="next">
				<span class="carousel-control-next-icon" aria-hidden="true"></span>
				<span class="sr-only">Next</span>
			</a>
        </div>
        
        <p>{{$artista->descripcion}}</p>
		@if (Auth::check() && Auth::user()->hasAnyRole(['admin','moderador']))
			<a href="{{ route('artistas.edit', $artista)}}" class="btn btn-success mx-1"> Editar artista </a>
			<a href="{{ route('imagenes.create', $artista)}}" class="btn btn-primary mx-1"> Subir más imagenes del artista </a>
		@endif
        <h3>Lista de Canciones</h3>
        <ul class="list-group list-group-flush">
			@foreach($canciones[0]->songs as $cancion)
				<li class="list-group-item">
					{{$cancion->name}} 
					@if (Auth::check() && Auth::user()->hasAnyRole(['admin','moderador']))
						<a href="{{ route('canciones.edit', $cancion)}}" class="btn btn-success mx-1"> Editar información de canción </a>
					@endif
					@if (Auth::check() && Auth::user()->hasAnyRole(['admin']))
						<a href="{{ route('canciones.delete', $cancion)}}" class="btn btn-danger mx-1"> Eliminar canción </a>
					@endif
				</li>
			@endforeach
        </ul>
		@if (Auth::check() && Auth::user()->hasAnyRole(['admin','moderador']))
			<a href="{{ route('canciones.create') }}" type="button" class="btn btn-primary">@lang('Insertar Canciones')</a>
		@endif
</div>
@endsection     