<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Viaje;
use Illuminate\Support\Facades\Validator;

class ViajeController extends Controller
{
    public function guardarflete(Request $req)
    {
        // Validar
        $rules = [
            'Kilometros' => 'required|integer|min:0',
            'ciudad_origen' => 'required|string',
            'ciudad_destino' => 'required|string',
            'fecha_salida' => 'required|string',
            'fecha_llegada' => 'required|string',
            'gasolina' => ['required', 'numeric', 'min:0', 'regex:/^\d+(\.\d{1,2})?$/'],
    'peaje' => ['required', 'numeric', 'min:0', 'regex:/^\d+(\.\d{1,2})?$/'],
    'carga' => ['required', 'numeric', 'min:0', 'regex:/^\d+(\.\d{1,2})?$/'],
    'comida' => ['required', 'numeric', 'min:0', 'regex:/^\d+(\.\d{1,2})?$/'],
    'federales' => ['required', 'numeric', 'min:0', 'regex:/^\d+(\.\d{1,2})?$/'],
    'total' => ['required', 'numeric', 'min:0', 'regex:/^\d+(\.\d{1,2})?$/'],
        ];

        $validator = Validator::make($req->all(), $rules);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        // Crear un nuevo viaje
        $viaje = Viaje::create([
            'Kilometros' => $req->Kilometros,
            'ciudad_origen' => $req->ciudad_origen,
            'ciudad_destino' => $req->ciudad_destino,
            'fecha_salida' => $req->fecha_salida,
            'fecha_llegada' => $req->fecha_llegada,
            'gasolina' => $req->gasolina,
            'peaje' => $req->peaje,
            'carga' => $req->carga,
            'comida' => $req->comida,
            'federales' => $req->federales,
            'total' => $req->total,
        ]);
          
          // Puedes devolver una respuesta indicando que el viaje se ha guardado correctamente
          return response()->json(['message' => 'Viaje guardado correctamente'], 200);
       
    }}

