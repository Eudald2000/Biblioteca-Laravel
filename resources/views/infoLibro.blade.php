@extends('layouts.template')

@section('title', 'infoLibro')

@section('content')
    <div>
        <div class="pt-32 mx-auto lg:w-4/5 md:w-4/5 flex justify-center items-center mb-16">
            <img src="{{ asset($libro->imagen) }}" alt="plato" class="max-w-lg mr-6">
            <!-- Mantener el tamaño actual de la imagen -->
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
        @auth
            <button onclick="mostrarPopup()"
                class="bg-white mr-4 text-gray-900 dark:bg-gray-800 dark:text-white font-bold py-2 px-4 rounded border border-solid border-gray-300 dark:border-gray-700 hover:bg-gray-100 dark:hover:bg-gray-700 hover:border-gray-400 dark:hover:border-gray-600 transition duration-300 ease-in-out">Añadir
                Reseña</button>
        @endauth
        @guest
            <a href="{{ route('login') }}"
                class="bg-white mr-4 text-gray-900 dark:bg-gray-800 dark:text-white font-bold py-2 px-4 rounded border border-solid border-gray-300 dark:border-gray-700 hover:bg-gray-100 dark:hover:bg-gray-700 hover:border-gray-400 dark:hover:border-gray-600 transition duration-300 ease-in-out">Añadir
                Reseña</a>
        @endguest
        <div id="popupReseña" class="hidden fixed inset-0 z-50 bg-gray-900 bg-opacity-50 flex items-center justify-center">
            <div class="bg-white p-8 rounded-lg relative">
                <!-- Aquí va el formulario de reseña -->
                <form action="{{ route('crear.reseña', ['isbn' => $libro->isbn]) }}" method="POST">
                    @csrf
                    <input type="hidden" name="libro_id" value="{{ $libro->id }}">
                    <input type="hidden" name="isbn" value="{{ $libro->isbn }}">
                    <input type="hidden" name="user_id" value="{{ auth()->user() ? auth()->user()->id : '' }}">
                    <!-- Otros campos del formulario -->
                    <textarea name="resena" rows="4" class="w-full p-2 border rounded mb-4" placeholder="Escribe tu reseña aquí..."
                        required></textarea>
                    <button type="submit"
                        class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Enviar</button>
                </form>
                <button id="cerrarPopup" class="absolute top-0 right-0 mt-2 mr-2 text-gray-600 hover:text-gray-800">
                    <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12">
                        </path>
                    </svg>
                </button>
            </div>
        </div>

        <h2 class="text-3xl font-bold mb-4 mt-4 text-white">Reseñas de los usuarios</h2>
        @foreach ($reseñas as $reseña)
            <div class="mb-6 border border-white-300 p-4 rounded-lg relative">
                <h3 class="text-xl font-bold mb-2 text-white">{{ $reseña->user->name }}</h3>
                <p class="text-white">{{ $reseña->resena }}</p>
                @auth
                    @if (auth()->user()->hasRole('admin'))
                        <a href="{{ url('/eliminarReseña/' . $reseña->id) }}" class="absolute bottom-0 right-0 mb-2 mr-2">
                            <img src="/storage/borrar.png" alt="Eliminar" class="w-6 h-6">
                        </a>
                    @endif
                @endauth
            </div>
        @endforeach

    </div>

    <script>
        function mostrarPopup() {
            document.getElementById('popupReseña').classList.remove('hidden');
            document.body.style.overflow = 'hidden'; // Evita el scroll en la página
        }

        function ocultarPopup() {
            document.getElementById('popupReseña').classList.add('hidden');
            document.body.style.overflow = ''; // Restablece el scroll en la página
        }

        document.getElementById('cerrarPopup').addEventListener('click', ocultarPopup);
    </script>

@endsection
