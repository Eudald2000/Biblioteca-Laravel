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
                    <a><button id="btnUsuarios"
                            class="bg-white text-gray-900 dark:bg-gray-800 dark:text-white font-bold py-2 px-4 rounded border border-solid border-gray-300 dark:border-gray-700 hover:bg-gray-100 dark:hover:bg-gray-700 hover:border-gray-400 dark:hover:border-gray-600 transition duration-300 ease-in-out ml-4">USUARIOS</button></a>

                </div>
            </div>

            {{-- ------ LIBROS ----- --}}
            <div id="divLibro" class="hidden">
                <h1>LIBROS</h1>
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
                                <td class="px-6 py-4 whitespace-nowrap">
                                    @isset($libro->autor)
                                        {{ $libro->autor->nombre }}
                                    @else
                                        Sin datos
                                    @endisset
                                </td>
                                {{-- <td class="px-6 py-4 whitespace-nowrap">{{ $libro->editorial->editorial }}</td> --}}
                                <td class="px-6 py-4 whitespace-nowrap">
                                    @isset($libro->editorial)
                                        {{ $libro->editorial->editorial }}
                                    @else
                                        Sin datos
                                    @endisset
                                </td>
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
                <h1>AUTORES</h1>
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
                <h1>EDITORIALES</h1>
                <button type="button" onclick="añadirEditorial()">AÑADIR</button>
                <table id="tablaEditoriales" class="min-w-full divide-y divide-gray-200">
                    <thead>
                        <tr class="bg-gray-50">
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                ID</th>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Editorial</th>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Eliminar</th>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Editar</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @foreach ($editoriales as $editorial)
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap">{{ $editorial->id }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">{{ $editorial->editorial }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <a href="{{ url('/eliminarEditorial/' . $editorial->id) }}"
                                        class="text-red-600 hover:text-red-800">Eliminar</a>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <button type="button"
                                        onclick="mostrarDatosEditorial({{ $editorial->id }})">EDITAR</button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <form action="" id="editarEditorial" method="POST" style="display: none">
                    @method('PUT')
                    @csrf
                    <label for="titulo">Editorial a editar:</label><br>
                    <input type="text" id="nombreEditorial" name="nombreEditorial" required><br>
                    <input type="submit"></input>
                </form>

                <form action="{{ route('crearEditorial') }}" id="añadirEditorial" method="POST"
                    style="display: none">
                    @csrf
                    <label for="nombreEditorial">Nueva editorial:</label><br>
                    <input type="text" id="nombreEditorial" name="nombreEditorial" required><br>
                    <input type="submit" value="Añadir Editorial">
                </form>
            </div>

            {{-- ------------- GENEROS ---------- --}}
            <div id="divGenero" class="hidden">
                <h1>GENEROS</h1>
                <button type="button" onclick="añadirGenero()">AÑADIR</button>
                <table id="tablaGeneros" class="min-w-full divide-y divide-gray-200">
                    <thead>
                        <tr class="bg-gray-50">
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                ID</th>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Genero</th>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Eliminar</th>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Editar</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @foreach ($generos as $genero)
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap">{{ $genero->id }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">{{ $genero->genero }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <a href="{{ url('/eliminarGenero/' . $genero->id) }}"
                                        class="text-red-600 hover:text-red-800">Eliminar</a>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <button type="button"
                                        onclick="mostrarDatosGenero({{ $genero->id }})">EDITAR</button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <form action="" id="editarGenero" method="POST" style="display: none">
                    @method('PUT')
                    @csrf
                    <label for="titulo">Genero a editar:</label><br>
                    <input type="text" id="nombreGenero" name="nombreGenero" required><br>
                    <input type="submit"></input>
                </form>

                <form action="{{ route('crearGenero') }}" id="añadirGenero" method="POST" style="display: none">
                    @csrf
                    <label for="nombreGenero">Nuevo genero:</label><br>
                    <input type="text" id="nombreGenero" name="nombreGenero" required><br>
                    <input type="submit" value="Añadir Genero">
                </form>
            </div>

            {{-- ----------USUARIOS ----------- --}}
            <div id="divUsuarios" class="hidden">
                <h1>USUARIOS</h1>
                <table id="tablaEditoriales" class="min-w-full divide-y divide-gray-200">
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
                                Email</th>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Eliminar</th>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Editar</th>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Bloquear</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @foreach ($usuarios as $usuario)
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap">{{ $usuario->id }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">{{ $usuario->name }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">{{ $usuario->email }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <a href="{{ url('/eliminarUsuario/' . $usuario->id) }}"
                                        class="text-red-600 hover:text-red-800">Eliminar</a>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <button type="button"
                                        onclick="mostrarDatosUsuario({{ $usuario->id }})">EDITAR</button>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <a href="{{ route('bloquear.usuario', $usuario->email) }}" class="text-red-600 hover:text-red-800">Bloquear</a>
                                </td>

                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <form action="" id="editarUsuario" method="POST" style="display: none">
                    @method('PUT')
                    @csrf
                    <label for="nombre">Nuevo nombre:</label><br>
                    <input type="text" id="nombreUsuario" name="nombreUsuario" required><br>
                    <label for="email">Nuevo email:</label><br>
                    <input type="email" id="email" name="email" required
                        pattern="[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}">
                    <input type="submit"></input>
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

            document.getElementById('btnUsuarios').addEventListener('click', function() {
                mostrarDiv('divUsuarios');
            });
        });
        const isbnInput = document.getElementById('isbn');
        isbnInput.addEventListener('input', function() {
            this.value = this.value.replace(/\D/g, ''); // Elimina caracteres no numéricos
        });


        // ------------ MOSTRAR FORMULARIOS -----------------
        // -------- autor ------------
        function añadirAutor() {
            document.getElementById('añadirAutor').style.display = (document.getElementById('añadirAutor').style.display ==
                "none") ? 'block' : "none";
        }
        // -------- libro ------------
        function añadirLibro() {
            document.getElementById('añadirLibro').style.display = (document.getElementById('añadirLibro').style.display ==
                "none") ? 'block' : "none";
        }
        // --------- genero ----------
        function añadirGenero() {
            document.getElementById('añadirGenero').style.display = (document.getElementById('añadirGenero').style
                .display ==
                "none") ? 'block' : "none";
        }
        // --------- editorial ----------
        function añadirEditorial() {
            document.getElementById('añadirEditorial').style.display = (document.getElementById('añadirEditorial').style
                .display ==
                "none") ? 'block' : "none";
        }

        // -------- TRAE LOS DATOS ------------
        // -------- autor -----------------
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

        // -------- editorial -------------
        function mostrarDatosEditorial(idEditorial) {
            fetch(`/dashboard/mostrarEditorial/${idEditorial}`)
                .then(response => response.json())
                .then(data => {
                    //ESTE IF ES HORRIBLE ALVARO
                    document.getElementById('editarEditorial').style.display = (document.getElementById(
                            'editarEditorial').style
                        .display == "none") ? 'block' : "none";
                    document.getElementById('editarEditorial').action = '/dashboard/editarEditorial/' + idEditorial;

                    document.getElementById('nombreEditorial').value = data.editorial;
                })
                .catch(error => {
                    console.error('Error al obtener los datos del Editorial:', error);
                });
        }

        // ----------- genero -----------
        function mostrarDatosGenero(idGenero) {
            fetch(`/dashboard/mostrarGenero/${idGenero}`)
                .then(response => response.json())
                .then(data => {
                    //ESTE IF ES HORRIBLE ALVARO
                    document.getElementById('editarGenero').style.display = (document.getElementById('editarGenero')
                        .style
                        .display == "none") ? 'block' : "none";
                    document.getElementById('editarGenero').action = '/dashboard/editarGenero/' + idGenero;

                    document.getElementById('nombreGenero').value = data.genero;
                })
                .catch(error => {
                    console.error('Error al obtener los datos del Genero:', error);
                });
        }

        // ----------- libro ------------
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

        // ----------- usuario ------------
        function mostrarDatosUsuario(idUsuario) {
            fetch(`/dashboard/mostrarUsuario/${idUsuario}`)
                .then(response => response.json())
                .then(data => {
                    //ESTE IF ES HORRIBLE ALVARO
                    document.getElementById('editarUsuario').style.display = (document.getElementById('editarUsuario')
                        .style
                        .display == "none") ? 'block' : "none";
                    document.getElementById('editarUsuario').action = '/dashboard/editarUsuario/' + idUsuario;

                    document.getElementById('nombreUsuario').value = data.name;
                    document.getElementById('email').value = data.email;
                })
                .catch(error => {
                    console.error('Error al obtener los datos del autor:', error);
                });
        }
        function bloquearUsuario(bloquearUsuario) {
            fetch(`/dashboard/bloquearUsuario/${bloquearUsuario}`)
                .then(response => response.json())
                .then(data => {


                })
                .catch(error => {
                    console.error('Error al obtener los datos del autor:', error);
                });
        }

        // TRAE EL MENSAJE DE ERROR ELIMINAR O NO
        @if (session('success'))
            alert("{{ session('success') }}");
        @endif

        @if (session('error'))
            alert("{{ session('error') }}");
        @endif
    </script>

</x-app-layout>
