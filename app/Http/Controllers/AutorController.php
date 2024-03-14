<?php

namespace App\Http\Controllers;

use App\Models\autor;
use Illuminate\Http\Request;

class AutorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $autores = Autor::all();
        return view('/filtrar', compact('autores'));
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
    public function show(autor $autor)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request)
    {
        $autor = autor::find($request->id);

    }

    public function getAutor($id) {
        $autor = Autor::findOrFail($id);
        return response()->json($autor);
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id) {
        $autor = Autor::findOrFail($id);
        $autor->nombre = $request->input('nombreAutor');
        $autor->save();
        return redirect('dashboard');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $autor = autor::find($request->id);
        $autor->delete();
        return redirect('/dashboard');
    }
}
