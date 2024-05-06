<?php

namespace App\Http\Controllers;

use App\Models\Estados;
use App\Http\Requests\StoreEstadosRequest;
use App\Http\Requests\UpdateEstadosRequest;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Log;

class EstadosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $estados = Estados::all();
        return response()->json($estados);
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
    public function store(StoreEstadosRequest $request)
    {
        $validatedData = $request->validated();

        $estado = Estados::create($validatedData);

        return response()->json([
            'estado' => $estado,
            'message' => 'Estado creado con exito'
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Estados $estados)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Estados $estados)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateEstadosRequest $request, Estados $estado)
    {
        if (!$estado) {
            return response()->json(['message' => 'Estado no encontrado'], 404);
        }

        $validatedData = $request->validated();
        $estado->update($validatedData);

        return response()->json($estado, 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Estados $estado) // Cambia $id a $estado para reflejar que es una instancia del modelo
    {
        Log::info('Intentando eliminar la tarea');
        try {
            $nombre = $estado->nombre_estado; // Asume que este campo existe en tu modelo
            $estado->delete();
            return response()->json(['message' => "El estado '$nombre' fue eliminado con éxito"], 200);
        } catch (ModelNotFoundException $e) {
            return response()->json(['message' => 'No se encontró ningun estado con ese ID'], 404);
        }
    }
}
