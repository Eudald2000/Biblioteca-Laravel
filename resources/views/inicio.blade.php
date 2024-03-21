@extends('layouts.template')

@section('title', 'Inicio')

@section('content')
<div>
    <div class="pt-32 mx-auto lg:w-4/5 md:w-4/5 flex flex-wrap justify-center">
        @foreach($libros as $libro)
            <div class="m-4" style="width: 300px; height: 500px;"> <!-- Establece un tamaño fijo para el contenedor -->
                <h2 class="text-white">{{ $libro->titulo }}</h2>
                <a href="{{ route('info.libro', ['isbn'=>$libro->isbn]) }}" style="display: block; width: 100%; height: 100%;">
                    <img src="{{ $libro->imagen }}" alt="imagenLibro" style="width: 100%; height: 100%; object-fit: cover;"> <!-- Usa object-fit para cubrir el espacio -->
                </a>
            </div>
        @endforeach
    </div>
</div>

@endsection
