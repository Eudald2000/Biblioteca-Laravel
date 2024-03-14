{{-- <x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{ __("You're logged in!") }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout> --}}
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Panel de Usuario ') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <a href="{{url('/')}}"><button class="bg-white text-gray-900 dark:bg-gray-800 dark:text-white font-bold py-2 px-4 rounded border border-solid border-gray-300 dark:border-gray-700 hover:bg-gray-100 dark:hover:bg-gray-700 hover:border-gray-400 dark:hover:border-gray-600 transition duration-300 ease-in-out">INICIO</button></a>
                    <a><button id="btnLibros" class="bg-white text-gray-900 dark:bg-gray-800 dark:text-white font-bold py-2 px-4 rounded border border-solid border-gray-300 dark:border-gray-700 hover:bg-gray-100 dark:hover:bg-gray-700 hover:border-gray-400 dark:hover:border-gray-600 transition duration-300 ease-in-out ml-4">LIBROS</button></a>
                    <a><button id="btnGeneros" class="bg-white text-gray-900 dark:bg-gray-800 dark:text-white font-bold py-2 px-4 rounded border border-solid border-gray-300 dark:border-gray-700 hover:bg-gray-100 dark:hover:bg-gray-700 hover:border-gray-400 dark:hover:border-gray-600 transition duration-300 ease-in-out ml-4">GENEROS</button></a>
                    <a><button id="btnAutores" class="bg-white text-gray-900 dark:bg-gray-800 dark:text-white font-bold py-2 px-4 rounded border border-solid border-gray-300 dark:border-gray-700 hover:bg-gray-100 dark:hover:bg-gray-700 hover:border-gray-400 dark:hover:border-gray-600 transition duration-300 ease-in-out ml-4">AUTORES</button></a>
                    <a><button id="btnEditoriales" class="bg-white text-gray-900 dark:bg-gray-800 dark:text-white font-bold py-2 px-4 rounded border border-solid border-gray-300 dark:border-gray-700 hover:bg-gray-100 dark:hover:bg-gray-700 hover:border-gray-400 dark:hover:border-gray-600 transition duration-300 ease-in-out ml-4">EDITORIALES</button></a>
                </div>
            </div>

            {{-------- LIBROS -------}}
        <div id="divLibro" class="hidden">
            <h2>LIBROS</h2>
            <form action="" method="POST">
                <label for="titulo">Título:</label><br>
                <input type="text" id="titulo" name="tituloLibro" required><br>

                <label for="autor">Autor:</label><br>
                <input type="text" id="autor" name="autorLibro" required><br>

                <label for="editorial">Editorial:</label><br>
                <input type="text" id="editorial" name="editorialLibro" required><br>

                <label for="sinopsis">Sinopsis:</label><br>
                <textarea id="sinopsis" name="sinopsisLibro" rows="4" cols="50" required></textarea><br>

                <label for="fecha_publicacion">Fecha de Publicación:</label><br>
                <input type="date" id="fecha_publicacion" name="fecha_publicacionLibro" required><br>

                <label for="isbn">ISBN:</label><br>
                <input type="text" id="isbn" name="isbnLibro" required><br>

                <label for="precio">Precio:</label><br>
                <input type="number" id="precio" name="precioLibro" min="0" step="0.01" required><br>

                <label for="disponible">Disponible:</label><br>
                <select id="disponible" name="disponibleLibro">
                    <option value="1">Sí</option>
                    <option value="2">No</option>
                </select><br><br>

                <input type="submit" value="Guardar Libro">
            </form>
        </div>

        {{--------- AUTORES ---------}}
        <div id="divAutor" class="hidden">
            <h2>AUTORES</h2>
            <button type="button" onclick="añadirAutor()">AÑADIR</button>
            <table id="tablaAutores" class="min-w-full divide-y divide-gray-200">
                <thead>
                    <tr class="bg-gray-50">
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">ID</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nombre</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Eliminar</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Editar</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @foreach ($autores as $autor)
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap">{{ $autor->id }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">{{ $autor->nombre }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <a href="{{ url('/eliminarAutor/' . $autor->id) }}" class="text-red-600 hover:text-red-800">Eliminar</a>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <button type="button" onclick="mostrarDatos({{ $autor->id }})">EDITAR</button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <form action="" id="editarAutor" method="POST" style="display: none">
                @method('PUT')
                @csrf
                <label for="titulo">Nombre Autor a editar:</label><br>
                <input type="text" id="nombreAutor" name="nombreAutor" required><br>
                <input type="submit"></input>
                {{-- <button onclick="editarAutor('{{ $autor->id }}')">EDITAR</button> --}}
            </form>

            <form action="" id="añadirAutor" style="display: none">
                <label for="titulo">Nombre nuevo autor:</label><br>
                <input type="text" id="nombreAutor" name="nombreAutor" required><br>
                <button>CREAR</button>
            </form>

        </div>

        {{------------ EDITORIALES -----------}}
        <div id="divEditorial" class="hidden">
            <h2>EDITORIALES</h2>
            <form action="" method="POST">

                <label for="nombre">Nombre:</label><br>
                <input type="text" id="editorial" name="editorial" required><br>

                <input type="submit" value="Guardar Libro">
            </form>
        </div>

        {{--------------- GENEROS ------------}}
        <div id="divGenero" class="hidden">
            <h2>GENEROS</h2>
            <form action="" method="POST">

                <label for="nombre">Nombre:</label><br>
                <input type="text" id="genero" name="genero" required><br>

                <input type="submit" value="Guardar Libro">
            </form>
        </div>
        </div>
    </div>
    <script>
        // Función para mostrar el div correspondiente y ocultar los demás
        function mostrarDiv(idDivMostrar) {
            // Ocultar todos los divs
            var divs = document.querySelectorAll('.hidden');
            divs.forEach(function(div) {
                div.style.display = 'none';
            });

            // Mostrar el div correspondiente al botón clickeado
            var divMostrar = document.getElementById(idDivMostrar);
            if (divMostrar) {
                divMostrar.style.display = 'block';
            }
        }

        // Agregar eventos de clic a los botones
        document.addEventListener('DOMContentLoaded', function() {
            document.getElementById('btnLibros').addEventListener('click', function() {
                mostrarDiv('divLibro');
            });

            document.getElementById('btnGeneros').addEventListener('click', function() {
                mostrarDiv('divGenero');
            });

            document.getElementById('btnAutores').addEventListener('click', function() {
                mostrarDiv('divAutor');
            });

            document.getElementById('btnEditoriales').addEventListener('click', function() {
                mostrarDiv('divEditorial');
            });
        });

        function mostrarDatos(idAutor) {
        // Realizar una solicitud Ajax a Laravel para obtener los datos del autor
        fetch(`/dashboard/mostrarAutor/${idAutor}`)
            .then(response => response.json())
            .then(data => {
                //ESTE IF ES HORRIBLE ALVARO
                document.getElementById('editarAutor').style.display = (document.getElementById('editarAutor').style.display == "none" )?'block': "none";
                document.getElementById('editarAutor').action = '/dashboard/editarAutor/' + idAutor;
                // Rellenar el formulario con los datos del autor obtenidos
                document.getElementById('nombreAutor').value = data.nombre;
            })
            .catch(error => {
                console.error('Error al obtener los datos del autor:', error);
            });
    }
    function añadirAutor(){
        document.getElementById('añadirAutor').style.display = (document.getElementById('añadirAutor').style.display == "none" )?'block': "none";
    }

    function editarAutor(idAutor) {
    var nuevoNombre = document.getElementById('nombreAutor').value;
    fetch(`/dashboard/editarAutor/${idAutor}`, {
        method: 'PUT',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
        },
        body: JSON.stringify({ nombre: nuevoNombre })
    })
    .then(response => {
        if (!response.ok) {
            throw new Error('Error al modificar el autor');
        }
        return response.json();
    })
    .then(data => {
        console.log('Autor modificado correctamente:', data);
        // Aquí puedes mostrar algún mensaje de éxito o actualizar la interfaz de usuario si es necesario
    })
    .catch(error => {
        console.error('Error al modificar el autor:', error);
        // Aquí puedes mostrar algún mensaje de error o manejar la situación de error de otra manera
    });
}

    </script>

</x-app-layout>

