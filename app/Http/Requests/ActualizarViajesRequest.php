<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ActualizarViajesRequest extends FormRequest
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
            'camion' => 'exists:camion,id',
            'chofer' => 'exists:personas,id',
            'Kilometros' => 'nullable|integer',
            'cuidad_origen' => 'nullable|string|max:255',
            'cuidad_destino' => 'nullable|string|max:255',
            'fecha_salida' => 'nullable|date',
            'fecha_llegada' => 'nullable|date|after_or_equal:fecha_salida',
            'gasolina' => 'nullable|numeric',
            'peaje' => 'nullable|numeric',
            'carga' => 'nullable|numeric',
            'comida' => 'nullable|numeric',
            'federales' => 'numeric',
        ];
    }
}
