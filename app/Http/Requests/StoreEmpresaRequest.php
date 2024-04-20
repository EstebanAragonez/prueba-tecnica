<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreEmpresaRequest extends FormRequest
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
            'email' => 'nullable|email',
            'sitio_web' => 'nullable|url',
            'logotipo' => 'nullable|image|max:1024', // Max 1MB
        ];
    }
    public function messages(): array
    {
        return [
            'nombre.required' => 'El campo nombre es obligatorio.',
            'email.email' => 'El email debe ser una dirección de correo electrónico válida.',
            'sitio_web.url' => 'La URL del sitio web no es válida.',
            'logotipo.image' => 'El logotipo debe ser una imagen.',
            'logotipo.max' => 'El tamaño máximo del logotipo es 1MB.',
        ];
    }
}
