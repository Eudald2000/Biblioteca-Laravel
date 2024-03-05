@extends('layouts.template')

@section('title', 'Filtrar')

@section('content')
<div class="pt-32 mx-auto lg:w-4/5 md:w-4/5 ">
<form action="/filtrar" method="GET" class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
    <div class="mb-4">
    <label class="block text-gray-700 text-sm font-bold mb-2" for="autor">
        Autor
    </label>
    <select class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="autor" name="autor">
        <option value="">Seleccionar autor</option>
        @foreach($autores as $autor)
            <option value="{{ $autor->id }}">{{ $autor->nombre }}</option>
        @endforeach
    </select>
</div>
    <div class="mb-4">
      <label class="block text-gray-700 text-sm font-bold mb-2" for="editorial">
        Editorial
      </label>
      <select class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="autor" name="editorial">
        <option value="">Seleccionar editorial</option>
        @foreach($editoriales as $editorial)
            <option value="{{ $editorial->id }}">{{ $editorial->editorial }}</option>
        @endforeach
    </select>
    </div>
    <div class="mb-4">
      <label class="block text-gray-700 text-sm font-bold mb-2" for="anio_publicacion">
        Año de publicación
      </label>
      <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="ano_publicacion" name="ano_publicacion" type="text" minlength="4" maxlength="4" placeholder="Año de publicación">
    </div>
    <div class="mb-4">
      <label class="block text-gray-700 text-sm font-bold mb-2" for="isbn">
        ISBN
      </label>
      <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="isbn" name="isbn" type="text" minlength="13" maxlength="13" placeholder="ISBN">
    </div>
    <div class="mb-4">
      <label class="block text-gray-700 text-sm font-bold mb-2" for="genero">
        Género
      </label>
      <select class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="autor" name="genero">
        <option value="">Seleccionar genero</option>
        @foreach($generos as $genero)
            <option value="{{ $genero->id }}">{{ $genero->genero }}</option>
        @endforeach
    </select></div>
    <div class="mb-4">
      <label class="block text-gray-700 text-sm font-bold mb-2" for="titulo">
        Título
      </label>
      <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="titulo" name="titulo" type="text" placeholder="Título">
    </div>
    <div class="flex items-center justify-between">
      <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit">
        Filtrar
      </button>
    </div>
  </form>
</div>

<script>
       const isbnInput = document.getElementById('isbn');
       const ano_publicacion = document.getElementById('ano_publicacion');

isbnInput.addEventListener('input', function() {
    this.value = this.value.replace(/\D/g, ''); // Elimina caracteres no numéricos
});
ano_publicacion.addEventListener('input', function() {
    this.value = this.value.replace(/\D/g, ''); // Elimina caracteres no numéricos
});
</script>
@endsection