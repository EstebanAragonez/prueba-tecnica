<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Empleado extends Model
{
    use HasFactory;

    protected $fillable = ['nombre', 'apellido', 'empresas_id'];

    // se define la relación con Empresa
    public function empresa()
    {
        return $this->belongsTo('App\Models\Empresa', 'empresas_id');
    }

    public function cargo()
    {
        return $this->belongsTo(Cargos::class, 'cargo_id');
    }
}
