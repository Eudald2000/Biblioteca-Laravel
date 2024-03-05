<?php

namespace App\Http\Controllers;

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
    public function create()
    {
        //
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
        $respuesta = "";
        if ($request->user()->hasRole('Basico')) {
            $respuesta = "EL USUARIO TIENE ROL";
        } else {
            $respuesta = "EL USUARIO NO TIENE ROL";
        }
        return view('inicio', ['rolUsuario' => $respuesta]);
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
    public function update(Request $request, libro $libro)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(libro $libro)
    {
        //
    }
}
