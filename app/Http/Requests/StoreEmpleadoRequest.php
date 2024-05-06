<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreEmpleadoRequest extends FormRequest
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
            'nombre' => 'required|string|max:255',
            'apellido' => 'required|string|max:255',
            'empresas_id' => 'required|integer|exists:empresas,id', // Asegura que la empresa exista
        ];
    }
    public function messages(): array
    {
        return [
            'nombre.required' => 'El campo nombre es obligatorio',
            'apellido.required' => 'El campo apellido es obligatorio',
            'empresas_id.required' => 'El campo empresas_id es obligatorio',
            'cargo_id' => 'nullable|integer|exists:cargos,id'
        ];
    }
}
