@extends('layouts.app')
@section('titolo', 'Pagina Films')

@section('content')
    @foreach ($films as $film)
        <h1>
            {{ $film->titolo }}
        </h1>
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" href="{{ route('film.show', ['film' => $film->id]) }}">Dettagli</a>
            </li>
        </ul>
        @endforeach
        <button type="button" class="btn btn-secondary">
            <a href="{{ route('film.create') }}">Aggiungi film</a>
        </button>
@endsection