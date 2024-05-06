<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tareas extends Model
{
    use HasFactory;

    protected $fillable = ['descripcion', 'fecha_asignacion', 'estado_id', 'empleado_id'];

    public function estado()
    {
        return $this->belongsTo(Estados::class);
    }

    public function empleado()
    {
        return $this->belongsTo(Empleado::class);
    }
}
