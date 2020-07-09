@extends('layouts.admin')

@section('content')

<nav class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
    <a class="navbar-brand col-md-3 col-lg-2 mr-0 px-3" href="{{route('artistas.index')}}">{{ config('app.name', 'Laravel') }}</a>
        <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-toggle="collapse" data-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
    <ul class="navbar-nav px-3">
        <li class="nav-item text-nowrap">
            <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                {{ __('Logout') }}
            </a>
        </li>
    </ul>
</nav>
<div class="container-fluid">
    <div class="row">

        @include('admin.sidebar')

        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
            @yield('content-admin')
        </main>
    </div>
</div>

@endsection