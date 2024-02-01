<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class GuardarViajesRequest extends FormRequest
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
            'camion' => 'required|exists:camion,id',
            'chofer' => 'required|exists:personas,id',
            'Kilometros' => 'required|numeric',
            'cuidad_origen' => 'required|string|max:255',
            'cuidad_destino' => 'required|string|max:255',
            'fecha_salida' => 'required|date',
            'fecha_llegada' => 'required|date',
            'gasolina' => 'required|numeric',
            'peaje' => 'required|numeric',
            'carga' => 'required|numeric',
            'comida' => 'required|numeric',
            'federales' => 'required|numeric',
        ];
    }
}
