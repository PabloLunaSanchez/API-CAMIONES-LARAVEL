<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ActualizarClienteRequest extends FormRequest
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
            //
            "nombre" => "required",
            "correo" => "required|email|unique:cliente,correo,".$this->route('cliente')->id, // unique:cliente,correo
            "telefono" => "required|numeric",
            "cuidad" => "required",
            "folio" => "required|unique:cliente,folio,".$this->route('cliente')->id,
            "pagos" => "required|numeric"
        ];
    }
}
