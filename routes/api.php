<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmpresaController;
use App\Http\Controllers\AuthController;

/* Route::middleware(['auth:sanctum'])->get('/user', function (Request $request) {
    return $request->user();
}); */
Route::post('/auth/register', [AuthController::class, 'createUser']);
Route::post('/auth/login', [AuthController::class, 'loginUser']); 

Route::middleware(['auth:sanctum'])->group(function () {
    Route::post('crearEmpresa', [EmpresaController::class, 'store']);
    Route::get('empresas', [EmpresaController::class, 'index']);
});
