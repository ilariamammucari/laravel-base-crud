@extends('layouts.app')
@section('titolo', 'Modifica Film')

@section('content')
    <div class="container">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form method="POST" action="{{ route('film.update',$film) }}">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label for="inputTitolo">Titolo</label>
                <input value="{{ $film->titolo }}" name="titolo" type="text" class="form-control" id="inputTitolo">
            </div>
            <div class="form-group">
                <label for="inputGenere">Genere</label>
                <input value="{{ $film->genere }}" name="genere" type="text" class="form-control" id="inputGenere">
            </div>
            <div class="form-group">
                <label for="inputTrama">Trama</label>
                <textarea name="trama" class="form-control" id="inputTrama" rows="3">{{ $film->trama }}</textarea>
            </div>
            <div class="form-group">
                <label for="inputRegista">Regista</label>
                <input value="{{ $film->regista }}" name="regista" type="text" class="form-control" id="inputRegista">
            </div>
            <div class="form-group">
                <label for="inputAnno">Anno</label>
                <input value="{{ $film->anno }}" name="anno" type="number" class="form-control" id="inputAnno">
            </div>
            <button type="submit" class="btn btn-primary">Salva</button>
        </form>
    </div>
@endsection