<?php

namespace App\Http\Controllers;

use App\Models\Autor;
use App\Models\Genero;
use App\Models\Editorial;
use App\Models\libro;
use Illuminate\Http\Request;

class formularioController extends Controller
{
    public function index()
    {
        $autores = Autor::all();
        $editoriales = Editorial::all();
        $generos = Genero::all();
        $libros = libro::all();
        // Obtén aquí todos los datos que necesites

        return view('filtrar', compact('autores', 'editoriales','generos', 'libros'));
    }
}
