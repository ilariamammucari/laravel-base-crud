@extends('layouts.app')
@section('titolo', 'Pagina Films')

@section('content')

    @foreach ($films as $film)
        <h1>
            {{ $film->titolo }}
        </h1>
        <ul class="navbar-nav">
            <li class="nav-item">
                <button type="button" class="btn btn-info">
                    <a class="nav-link" href="{{ route('film.show',$film->id) }}">Dettagli</a>
                </button>
                <button type="button" class="btn btn-warning">
                    <a href="{{ route('film.edit', $film->id) }}">Modifica</a>
                </button>
                <form method="POST" action="{{ route('film.destroy',$film->id) }}">
                    @csrf
                    @method('DELETE')
                    <button>Cancella</button>
                </form>
            </li>
        </ul>
        @endforeach
        <button type="button" class="btn btn-secondary">
            <a href="{{ route('film.create') }}">Aggiungi film</a>
        </button>
@endsection