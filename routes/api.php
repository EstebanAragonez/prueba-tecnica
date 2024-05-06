<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmpresaController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CargosController;
use App\Http\Controllers\EmpleadoController;
use App\Http\Controllers\EstadosController;
use App\Http\Controllers\TareasController;
use Database\Factories\CargosFactory;

/* Route::middleware(['auth:sanctum'])->get('/user', function (Request $request) {
    return $request->user();
}); */
Route::post('/auth/register', [AuthController::class, 'createUser']);
Route::post('/auth/login', [AuthController::class, 'loginUser']); 



Route::middleware(['auth:sanctum'])->group(function () {
    
    //rutas de empresa 
    Route::post('crearEmpresa', [EmpresaController::class, 'store']);
    Route::get('empresas', [EmpresaController::class, 'index']);
    Route::put('/updateEmpresa/{empresa}', [EmpresaController::class, 'update']);
    Route::delete('/deleteEmpresa/{id}', [EmpresaController::class, 'destroy']);
    
    //rutas de empleado
    Route::post('crearEmpleado', [EmpleadoController::class, 'store']);
    Route::get('empleados', [EmpleadoController::class, 'index']);
    Route::delete('/deleteEmpleado/{id}', [EmpleadoController::class, 'destroy']);
    Route::put('/updateEmpleado/{empleado}', [EmpleadoController::class, 'update']);

    //rutas de estados
    Route::post('crearEstado', [EstadosController::class, 'store']);
    Route::get('estados', [EstadosController::class, 'index']);
    Route::delete('/deleteEstado/{estado}', [EstadosController::class, 'destroy']);
    Route::put('/updateEstado/{estado}', [EstadosController::class, 'update']);

    //rutas tareas
    Route::post('crearTarea', [TareasController::class, 'store']);
    Route::get('tareas', [TareasController::class, 'index']);
    Route::delete('/deleteTarea/{tarea}', [TareasController::class, 'destroy']);
    Route::put('/updateTarea/{tarea}', [TareasController::class, 'update']);

    //rutas cargos
    Route::post('crearCargo', [CargosController::class, 'store']);
    Route::get('cargos', [CargosController::class, 'index']);
    Route::delete('/deleteCargo/{cargo}', [CargosController::class, 'destroy']);
    Route::put('/updateCargo/{cargo}', [CargosController::class, 'update']);


});
