<?php

namespace App\Http\Controllers;

use App\Models\editorial;
use Illuminate\Http\Request;

class EditorialController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $nuevaEditorial = new Editorial();
        $nuevaEditorial->editorial = $request->nombreEditorial;
        $nuevaEditorial->save();

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
    public function show(editorial $editorial)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(editorial $editorial)
    {
        //
    }

    public function getEditorial($id) {
        $editorial = Editorial::findOrFail($id);
        return response()->json($editorial);
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id) {
        $editorial = Editorial::findOrFail($id);
        $editorial->editorial = $request->input('nombreEditorial');
        $editorial->save();
        return redirect('dashboard');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $editorial = editorial::find($request->id);
        $editorial->delete();
        return redirect('/dashboard');
    }
}
