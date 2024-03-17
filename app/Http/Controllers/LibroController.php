<?php

namespace App\Http\Controllers;

use App\Models\autor;
use App\Models\libro;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LibroController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function unLibroPorISBN()
    {
        // Desactivar temporalmente el modo estricto
        DB::statement("SET SESSION sql_mode=''");

        $libros = Libro::select('libros.*')
            ->groupBy('isbn')
            ->get();

        return view('inicio', ['libros' => $libros]);
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {

        $nuevoLibro = new Libro();

        $nuevoLibro->autor_id = $request->autor;
        $nuevoLibro->editorial_id = $request->editorial;
        $nuevoLibro->ano_publicacion = $request->ano_publicacion;
        $nuevoLibro->isbn = $request->isbn;
        $nuevoLibro->titulo = $request->titulo;
        $nuevoLibro->sinopsis = $request->sinopsis;
        $nuevoLibro->precio = $request->precio;
        $nuevoLibro->disponible = true;

        $nuevoLibro->save();
        return redirect('dashboard');
    }

    public function getLibro($id)
    {
        $libro = Libro::findOrFail($id);
        return response()->json($libro);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request, libro $libro)
    {
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(libro $libro)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id) {
        $libro = Libro::findOrFail($id);
        $libro->titulo = $request->input('titulo');
        $libro->sinopsis = $request->input('sinopsis');
        $libro->ano_publicacion = $request->input('ano_publicacion');
        $libro->autor_id = $request->input('autor');
        //$libro->genero_id = $request->input('genero');
        $libro->editorial_id = $request->input('editorial');
        $libro->ISBN = $request->input('isbn');
        $libro->precio = $request->input('precio');
        $libro->save();
        return redirect('dashboard');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    { {
            $libro = libro::find($request->id);
            $libro->delete();
            return redirect('/dashboard');
        }
    }
}
