<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\GuardarViajeRequest;
use App\Http\Requests\ActualizarViajeRequest;
use App\Models\Viaje;

class ViajesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // get all - get
        return Viaje::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(GuardarViajeRequest $request)
    {
        // guardar - post
        // Validar y guardar el nuevo viaje en la base de datos
        $viaje = Viaje::create($request->validated());

        // Puedes devolver un respueta o redireccionar a una vista o a otra ruta
        return response()->json([
            'res' => true,
            'message' => 'Viaje creado con exito'
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Viaje $viaje)
    {
        // get by id - get
        return response()->json([ // Devolver el viaje
            'res' => true,
            'viaje' => $viaje
        ], 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ActualizarViajeRequest $request, string $id)
    {
        // update - put
        $viaje = Viaje::find($id); // Buscar el viaje
        if(!$viaje){ // Si no existe
            return response()->json([
                'res' => false,
                'message' => 'Viaje no encontrado'
            ], 400);
        }
        $viaje->update($request->validated()); // Actualizar el viaje
        return response()->json([
            'res' => true,
            'message' => 'Viaje actualizado con exito'
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // delete - delete
        $viaje = Viaje::find($id); // Buscar el viaje
        if(!$viaje){ // Si no existe
            return response()->json([
                'res' => false,
                'message' => 'Viaje no encontrado'
            ], 400);
        }
        return response()->json([
            'res' => true,
            'message' => 'Viaje eliminado con exito'
        ], 200);
    }
}
