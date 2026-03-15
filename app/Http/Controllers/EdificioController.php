<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreEdificioRequest;
use App\Http\Requests\UpdateEdificioRequest;
use App\Models\Edificio;

class EdificioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $edificios = Edificio::with('aulas')->get();
        return response()->json($edificios);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreEdificioRequest $request)
    {
        $edificio = Edificio::create($request->validated());

        return response()->json($edificio, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $edificio = Edificio::with('aulas')->findOrFail($id);
        return response()->json($edificio);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateEdificioRequest $request, Edificio $edificio)
    {
        $edificio->update($request->validated());

        return response()->json([
            'message' => 'Edificio actualizado correctamente',
            'data'    => $edificio
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Edificio $edificio)
    {
        $edificio->delete();

        return response()->json([
            'message' => 'Edificio eliminado correctamente'
        ], 200);
    }
}
