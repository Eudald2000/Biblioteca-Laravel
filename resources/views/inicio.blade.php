@extends('layouts.template')

@section('title', 'Inicio')

@section('content')
<div style="background-image: url('{{ asset('storage/libroFondo.jpg') }}');">
    <div  class="pt-32 mx-auto lg:w-4/5 md:w-4/5 ">
        @foreach($libros as $libro)
            <div>
                <h2 class="text-white">{{ $libro->titulo }}</h2>
            </div>
        @endforeach
    </div>
</div>

@endsection