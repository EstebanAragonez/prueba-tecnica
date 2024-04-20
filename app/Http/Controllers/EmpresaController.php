<?php

namespace App\Http\Controllers;

use App\Models\Empresa;
use App\Http\Requests\StoreEmpresaRequest;
use App\Http\Requests\UpdateEmpresaRequest;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;

class EmpresaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $empresas = Empresa::all();
        return response()->json($empresas);
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
    public function store(StoreEmpresaRequest $request)
    {
        $data = $request->all();
        if ($request->hasFile('logotipo')) {
            $data['logotipo'] = $request->file('logotipo')->store('logotipos', 'public');
        }

        $empresa = Empresa::create($data);
        return response()->json($empresa, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Empresa $empresa)
    {
        return response()->json($empresa);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Empresa $empresa)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateEmpresaRequest $request, Empresa $empresa)
    {
        $data = $request->validated();
        logger()->info('Datos validados antes de la actualización:', $data);

        if ($request->hasFile('logotipo')) {
            $data['logotipo'] = $request->file('logotipo')->store('logotipos', 'public');
        }

        $updated = $empresa->update($data);
        logger()->info('Resultado de la actualización:', ['updated' => $updated]);

        $empresa->refresh(); // Asegúrate de que se recargan los datos del modelo de la base de datos
        return response()->json($empresa);
    }



    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        try {
            $empresa = Empresa::findOrFail($id);
            $nombre = $empresa->nombre;
            $empresa->delete();
            return response()->json(['message' => "La empresa '$nombre' fue eliminada con éxito"], 200);
        } catch (ModelNotFoundException $e) {
            return response()->json(['message' => 'No se encontró ninguna empresa con ese ID'], 404);
        }
    }
}
