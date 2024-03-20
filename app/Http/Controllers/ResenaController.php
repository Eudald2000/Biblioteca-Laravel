<?php

namespace App\Http\Controllers;

use App\Models\resena;
use Illuminate\Http\Request;

class ResenaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $reseñas = Resena::all(); // Obtén todas las reseñas
    return view('lista_reseñas', ['reseñas' => $reseñas]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $nuevaReseña = new Resena();
        $nuevaReseña -> resena = $request->resena;
        $nuevaReseña -> libro_id = $request->libro_id;
        $nuevaReseña -> isbn = $request->isbn;
        $nuevaReseña -> user_id = $request->user_id;

        $nuevaReseña->save();
        return back();

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
    public function show(resena $resena)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(resena $resena)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, resena $resena)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
{
    $resena = Resena::find($request->id);
    $resena->delete();

    return redirect()->back()->with('success', 'Reseña eliminada correctamente');
}

}
