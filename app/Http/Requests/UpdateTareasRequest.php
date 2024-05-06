<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateTareasRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'descripcion' => 'required|string|max:500',
            'fecha_asignacion' => 'required|date',
            'estado_id' => 'required|integer|exists:estados,id',
            'empleado_id' => 'required|integer|exists:empleados,id'
        ];
    }
}
