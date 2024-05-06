<?php

namespace App\Http\Controllers;

use App\Models\Tareas;
use App\Http\Requests\StoreTareasRequest;
use App\Http\Requests\UpdateTareasRequest;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Log;

class TareasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tareas = Tareas::all();
        return response()->json($tareas);
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
    public function store(StoreTareasRequest $request)
    {
        $validatedData = $request->validated();

        $tarea = Tareas::create($validatedData);

        return response()->json([
            'tarea' => $tarea,
            'message' => 'Tarea creada con exito'
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Tareas $tareas)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Tareas $tareas)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTareasRequest $request, Tareas $tarea)
    {
        if (!$tarea) {
            return response()->json(['message' => 'Tarea no encontrada'], 404);
        }

        $validatedData = $request->validated();
        $tarea->update($validatedData);

        return response()->json($tarea, 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Tareas $tarea)
    {
        try {
            $tarea->delete();
            return response()->json(['message' => "La tarea fue eliminado con éxito"], 200);
        } catch (ModelNotFoundException $e) {
            Log::info('Intentando eliminar la tarea');
            return response()->json(['message' => 'No se encontró ningun estado con ese ID'], 404);
        }
    }
}
