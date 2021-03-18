@extends('layouts.app')
@section('titolo', 'Dettagli Film')

@section('content')
    <h3>{{ $film->titolo }}</h3>
    <p>{{ $film->trama }}</p>
@endsection