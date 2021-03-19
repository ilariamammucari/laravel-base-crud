@extends('layouts.app')
@section('titolo', 'Dettagli Film')

@section('content')

    <h3>Titolo: {{ $film->titolo }}</h3>
    <p>Trama: {{ $film->trama }}</p>
    <p>Regista: {{ $film->regista }}</p>
    <p>Genere: {{ $film->genere }}</p>
    <p>Anno: {{ $film->anno }}</p>
@endsection