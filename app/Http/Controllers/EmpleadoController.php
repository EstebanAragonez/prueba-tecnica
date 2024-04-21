<?php

namespace App\Http\Controllers;

use App\Models\Empleado;
use App\Http\Requests\StoreEmpleadoRequest;
use App\Http\Requests\UpdateEmpleadoRequest;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class EmpleadoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $empleados = Empleado::with('empresa')->get();

        return response()->json($empleados);
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
    public function store(StoreEmpleadoRequest $request)
    {
        $validatedData = $request->validated();

        $empleado = Empleado::create($validatedData);

        return response()->json($empleado, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Empleado $empleado)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Empleado $empleado)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateEmpleadoRequest $request, Empleado $id)
    {

        $empleado = Empleado::find($id);

        if (!$empleado) {
            return response()->json(['message' => 'ID no válido'], 404);
        }

        $validatedData = $request->validated();
        $empleado->update($validatedData);

        return response()->json($empleado, 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        try {
            $empleado = Empleado::findOrFail($id);
            $nombre = $empleado->nombre;
            $apellido = $empleado->apellido;
            $empleado->delete();
            return response()->json(['message' => "El empleado '$nombre' '$apellido' fue eliminado con éxito"], 200);
        } catch (ModelNotFoundException $e) {
            return response()->json(['message' => 'No se encontró ningun empleado con ese ID'], 404);
        }
    }
}
