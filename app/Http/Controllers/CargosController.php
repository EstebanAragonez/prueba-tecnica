<?php

namespace App\Http\Controllers;

use App\Models\Cargos;
use App\Http\Requests\StoreCargosRequest;
use App\Http\Requests\UpdateCargosRequest;

class CargosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cargos = Cargos::all();
        return response()->json($cargos);
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
    public function store(StoreCargosRequest $request)
    {
        $validatedData = $request->validated();

        $cargo = Cargos::create($validatedData);

        return response()->json([
            'nombre_cargo' => $cargo,
            'message' => 'Cargo creado con exito'
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Cargos $cargos)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Cargos $cargos)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCargosRequest $request, Cargos $cargos)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Cargos $cargos)
    {
        //
    }
}
