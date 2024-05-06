<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cargos extends Model
{
    use HasFactory;

    protected $fillable = ['nombre_cargo'];

    public function empleados()
    {
        return $this->hasMany(Empleado::class, 'cargo_id');
    }
}
