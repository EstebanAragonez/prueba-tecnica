<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('empleados', function (Blueprint $table) {
            $table->id();
            $table->string('first_name'); // Nombre del empleado
            $table->string('last_name'); // Apellido del empleado
            $table->foreignId('empresas_id')->constrained('empresas')->onDelete('cascade'); // Clave foránea referenciando a 'empresas'
            $table->timestamps(); // Crea los campos created_at y updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('empleados');
    }
};
