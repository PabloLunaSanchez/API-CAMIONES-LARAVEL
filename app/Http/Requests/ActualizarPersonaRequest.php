<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ActualizarPersonaRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true; // Cambiar a true
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            //Actualizar campos - put
            "nombre" => "required",
            "correo" => "required|email|unique:personas,correo,".$this->route('persona')->id, // unique:personas,correo
            "telefono" => "required|numeric",
            "edad" => "required|numeric",
            "categoria" => "required"
        ];
    }
}
