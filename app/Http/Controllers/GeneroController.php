<?php

namespace App\Http\Controllers;

use App\Models\genero;
use Illuminate\Http\Request;

class GeneroController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $nuevoGenero = new Genero();
        $nuevoGenero->genero = $request->nombreGenero;
        $nuevoGenero->save();

        // Redirigir a alguna página o retornar una respuesta JSON
        return redirect('dashboard');
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
    public function show(genero $genero)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(genero $genero)
    {
        //
    }

    public function getGenero($id) {
        $genero = Genero::findOrFail($id);
        return response()->json($genero);
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id) {
        $genero = Genero::findOrFail($id);
        $genero->genero = $request->input('nombreGenero');
        $genero->save();
        return redirect('dashboard');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $genero = genero::find($request->id);
        $genero->delete();
        return redirect('/dashboard');
    }
}
