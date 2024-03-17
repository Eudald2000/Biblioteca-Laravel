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
                    <a href="{{ url('/') }}"><button
                            class="bg-white text-gray-900 dark:bg-gray-800 dark:text-white font-bold py-2 px-4 rounded border border-solid border-gray-300 dark:border-gray-700 hover:bg-gray-100 dark:hover:bg-gray-700 hover:border-gray-400 dark:hover:border-gray-600 transition duration-300 ease-in-out">INICIO</button></a>
                    <a><button id="btnLibros"
                            class="bg-white text-gray-900 dark:bg-gray-800 dark:text-white font-bold py-2 px-4 rounded border border-solid border-gray-300 dark:border-gray-700 hover:bg-gray-100 dark:hover:bg-gray-700 hover:border-gray-400 dark:hover:border-gray-600 transition duration-300 ease-in-out ml-4">LIBROS</button></a>
                    <a><button id="btnGeneros"
                            class="bg-white text-gray-900 dark:bg-gray-800 dark:text-white font-bold py-2 px-4 rounded border border-solid border-gray-300 dark:border-gray-700 hover:bg-gray-100 dark:hover:bg-gray-700 hover:border-gray-400 dark:hover:border-gray-600 transition duration-300 ease-in-out ml-4">GENEROS</button></a>
                    <a><button id="btnAutores"
                            class="bg-white text-gray-900 dark:bg-gray-800 dark:text-white font-bold py-2 px-4 rounded border border-solid border-gray-300 dark:border-gray-700 hover:bg-gray-100 dark:hover:bg-gray-700 hover:border-gray-400 dark:hover:border-gray-600 transition duration-300 ease-in-out ml-4">AUTORES</button></a>
                    <a><button id="btnEditoriales"
                            class="bg-white text-gray-900 dark:bg-gray-800 dark:text-white font-bold py-2 px-4 rounded border border-solid border-gray-300 dark:border-gray-700 hover:bg-gray-100 dark:hover:bg-gray-700 hover:border-gray-400 dark:hover:border-gray-600 transition duration-300 ease-in-out ml-4">EDITORIALES</button></a>
                </div>
            </div>

            {{-- ------ LIBROS ----- --}}
            <div id="divLibro" class="hidden">
                <h2>LIBROS</h2>
                <button type="button" onclick="añadirLibro()">AÑADIR</button>
                <table id="tablaAutores" class="min-w-full divide-y divide-gray-200">
                    <thead>
                        <tr class="bg-gray-50">
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                ID</th>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Titulo</th>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Autor</th>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Editorial</th>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Año publicación</th>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                ISBN</th>
                            {{-- <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Disponible</th> --}}
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Precio</th>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Eliminar</th>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Editar</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @foreach ($libros as $libro)
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap">{{ $libro->id }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">{{ $libro->titulo }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">{{ $libro->autor->nombre }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">{{ $libro->editorial->editorial }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">{{ $libro->ano_publicacion }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">{{ $libro->ISBN }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">{{ $libro->precio }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <a href="{{ url('/eliminarLibro/' . $libro->id) }}"
                                        class="text-red-600 hover:text-red-800">Eliminar</a>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <button type="button"
                                        onclick="mostrarDatosLibro({{ $libro->id }})">EDITAR</button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <form action="" id="editarLibro" method="POST" style="display: none">
                    @method('PUT')
                    @csrf
                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2" for="titulo">
                            Título
                        </label>
                        <input required
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                            id="titulo" name="titulo" type="text" placeholder="Título">
                    </div>
                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2" for="sinopsis">
                            Sinopsis
                        </label>
                        <input required
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                            id="sinopsis" name="sinopsis" type="text" placeholder="Título">
                    </div>
                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2" for="autor">
                            Autor
                        </label>
                        <select required
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                            id="autor" name="autor">
                            <option value="">Seleccionar autor</option>
                            @foreach ($autores as $autor)
                                <option value="{{ $autor->id }}">{{ $autor->nombre }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2" for="editorial">
                            Editorial
                        </label>
                        <select required
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                            id="autor" name="editorial">
                            <option value="">Seleccionar editorial</option>
                            @foreach ($editoriales as $editorial)
                                <option value="{{ $editorial->id }}">{{ $editorial->editorial }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2" for="genero">
                            Género
                        </label>
                        <select required
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                            id="autor" name="genero">
                            <option value="">Seleccionar genero</option>
                            @foreach ($generos as $genero)
                                <option value="{{ $genero->id }}">{{ $genero->genero }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2" for="fecha_publicacion">
                            Fecha de publicación (YYYY-MM-DD)
                        </label>
                        <input required
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                            id="ano_publicacion" name="ano_publicacion" type="text" placeholder="YYYY-MM-DD"
                            pattern="\d{4}-\d{2}-\d{2}">
                    </div>

                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2" for="isbn">
                            ISBN
                        </label>
                        <input required
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                            id="isbn" name="isbn" type="text" minlength="13" maxlength="13"
                            placeholder="ISBN">
                    </div>
                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2" for="precio">
                            Precio
                        </label>
                        <input required
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                            id="precio" name="precio" type="number" step="0.01" placeholder="Precio"
                            pattern="\d+(\.\d{1,2})?">
                    </div>
                    <input type="submit"></input>
                </form>
                <form action="{{ route('crearLibro') }}" id="añadirLibro" method="POST" style="display: none">
                    @csrf
                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2" for="titulo">
                            Título
                        </label>
                        <input required
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                            id="titulo" name="titulo" type="text" placeholder="Título">
                    </div>
                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2" for="sinopsis">
                            Sinopsis
                        </label>
                        <input required
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                            id="sinopsis" name="sinopsis" type="text" placeholder="Título">
                    </div>
                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2" for="autor">
                            Autor
                        </label>
                        <select required
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                            id="autor" name="autor">
                            <option value="">Seleccionar autor</option>
                            @foreach ($autores as $autor)
                                <option value="{{ $autor->id }}">{{ $autor->nombre }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2" for="editorial">
                            Editorial
                        </label>
                        <select required
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                            id="autor" name="editorial">
                            <option value="">Seleccionar editorial</option>
                            @foreach ($editoriales as $editorial)
                                <option value="{{ $editorial->id }}">{{ $editorial->editorial }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2" for="genero">
                            Género
                        </label>
                        <select required
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                            id="autor" name="genero">
                            <option value="">Seleccionar genero</option>
                            @foreach ($generos as $genero)
                                <option value="{{ $genero->id }}">{{ $genero->genero }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2" for="fecha_publicacion">
                            Fecha de publicación (YYYY-MM-DD)
                        </label>
                        <input required
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                            id="ano_publicacion" name="ano_publicacion" type="text" placeholder="YYYY-MM-DD"
                            pattern="\d{4}-\d{2}-\d{2}">
                    </div>

                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2" for="isbn">
                            ISBN
                        </label>
                        <input required
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                            id="isbn" name="isbn" type="text" minlength="13" maxlength="13"
                            placeholder="ISBN">
                    </div>
                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2" for="precio">
                            Precio
                        </label>
                        <input required
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                            id="precio" name="precio" type="number" step="0.01" placeholder="Precio"
                            pattern="\d+(\.\d{1,2})?">
                    </div>

                    <input type="submit" value="Añadir Libro">
                </form>
            </div>

            {{-- ------- AUTORES ------- --}}
            <div id="divAutor" class="hidden">
                <h2>AUTORES</h2>
                <button type="button" onclick="añadirAutor()">AÑADIR</button>
                <table id="tablaAutores" class="min-w-full divide-y divide-gray-200">
                    <thead>
                        <tr class="bg-gray-50">
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                ID</th>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Nombre</th>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Eliminar</th>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Editar</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @foreach ($autores as $autor)
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap">{{ $autor->id }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">{{ $autor->nombre }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <a href="{{ url('/eliminarAutor/' . $autor->id) }}"
                                        class="text-red-600 hover:text-red-800">Eliminar</a>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <button type="button"
                                        onclick="mostrarDatosAutor({{ $autor->id }})">EDITAR</button>
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
                </form>

                <form action="{{ route('crearAutor') }}" id="añadirAutor" method="POST" style="display: none">
                    @csrf
                    <label for="nombreAutor">Nombre nuevo autor:</label><br>
                    <input type="text" id="nombreAutor" name="nombreAutor" required><br>
                    <input type="submit" value="Añadir Autor">
                </form>


            </div>

            {{-- ---------- EDITORIALES --------- --}}
            <div id="divEditorial" class="hidden">
                <h2>EDITORIALES</h2>
                <form action="" method="POST">

                    <label for="nombre">Nombre:</label><br>
                    <input type="text" id="editorial" name="editorial" required><br>

                    <input type="submit" value="Guardar Libro">
                </form>
            </div>

            {{-- ------------- GENEROS ---------- --}}
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
        // ------------ MOSTRAR DIV INDICADO ------------
        function mostrarDiv(idDivMostrar) {
            var divs = document.querySelectorAll('.hidden');
            divs.forEach(function(div) {
                div.style.display = 'none';
            });
            var divMostrar = document.getElementById(idDivMostrar);
            if (divMostrar) {
                divMostrar.style.display = 'block';
            }
        }

        // ---------------- EVENTOS ----------------
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
        const isbnInput = document.getElementById('isbn');

        isbnInput.addEventListener('input', function() {
            this.value = this.value.replace(/\D/g, ''); // Elimina caracteres no numéricos
        });

        // -------- TRAE LOS DATOS DEL AUTOR ------------
        function mostrarDatosAutor(idAutor) {
            fetch(`/dashboard/mostrarAutor/${idAutor}`)
                .then(response => response.json())
                .then(data => {
                    //ESTE IF ES HORRIBLE ALVARO
                    document.getElementById('editarAutor').style.display = (document.getElementById('editarAutor').style
                        .display == "none") ? 'block' : "none";
                    document.getElementById('editarAutor').action = '/dashboard/editarAutor/' + idAutor;

                    document.getElementById('nombreAutor').value = data.nombre;
                })
                .catch(error => {
                    console.error('Error al obtener los datos del autor:', error);
                });
        }

        function mostrarDatosLibro(idLibro) {
            fetch(`/dashboard/mostrarLibro/${idLibro}`)
                .then(response => response.json())
                .then(data => {
                    //ESTE IF ES HORRIBLE ALVARO
                    document.getElementById('editarLibro').style.display = (document.getElementById('editarLibro').style
                        .display == "none") ? 'block' : "none";
                    document.getElementById('editarLibro').action = '/dashboard/editarLibro/' + idLibro;

                    document.getElementById('titulo').value = data.titulo;
                    document.getElementById('sinopsis').value = data.sinopsis;
                    document.getElementById('ano_publicacion').value = data.ano_publicacion;
                    /// autor, editorial, categoria
                    document.getElementById('isbn').value = data.ISBN;
                    document.getElementById('precio').value = data.precio;
                })
                .catch(error => {
                    console.error('Error al obtener los datos del autor:', error);
                });
        }


        // -------- AÑADIR AUTOR ------------
        function añadirAutor() {
            document.getElementById('añadirAutor').style.display = (document.getElementById('añadirAutor').style.display ==
                "none") ? 'block' : "none";
        }
        // -------- AÑADIR LIBRO ------------
        function añadirLibro() {
            document.getElementById('añadirLibro').style.display = (document.getElementById('añadirLibro').style.display ==
                "none") ? 'block' : "none";
        }

        // ------------- EDITAR AUTOR ------------
        function editarAutor(idAutor) {
            var nuevoNombre = document.getElementById('nombreAutor').value;
            fetch(`/dashboard/editarAutor/${idAutor}`, {
                    method: 'PUT',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                    },
                    body: JSON.stringify({
                        nombre: nuevoNombre
                    })
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
