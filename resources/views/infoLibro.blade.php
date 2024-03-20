@extends('layouts.template')

@section('title', 'infoLibro')

@section('content')
<div>
    <div class="pt-32 mx-auto lg:w-4/5 md:w-4/5 flex justify-center items-center mb-16">
        <img src="{{ asset($libro->imagen) }}" alt="plato" class="max-w-lg mr-6"> <!-- Mantener el tamaño actual de la imagen -->
        <div>
            <h1 class="text-5xl font-bold border-b-2 border-white text-white">{{ $libro->titulo }}</h1>
            <h1 class="text-2xl font-bold text-white mb-2">{{ $libro->sinopsis }}</h1>
            <h1 class="text-2xl font-bold text-white mb-2">Autor: {{ $autor->nombre }}</h1>
            <h1 class="text-2xl font-bold text-white mb-2">Editorial: {{ $editorial->editorial }}</h1>
            <h1 class="text-2xl font-bold text-white mb-2">Fecha publicacion: {{ $libro->ano_publicacion }}</h1>
            <h1 class="text-2xl font-bold text-white mb-2">ISBN: {{ $libro->isbn }}</h1>
            <h1 class="text-2xl font-bold text-white mb-2">Precio: {{ $libro->precio }} &euro;</h1>
        </div>
    </div>
</div>
<div class="pt-8 mx-auto lg:w-4/5 md:w-4/5">
    <h2 class="text-3xl font-bold mb-4 text-white">Reseñas de los usuarios</h2>
    @foreach($reseñas as $reseña)
        <div class="mb-6 border border-white-300 p-4 rounded-lg">
            <h3 class="text-xl font-bold mb-2 text-white">{{ $reseña->user->name }}</h3>
            <p class="text-white">{{ $reseña->resena }}</p>
        </div>
    @endforeach
</div>

@endsection
