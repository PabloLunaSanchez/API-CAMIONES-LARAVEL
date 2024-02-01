<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\GuardarPersonaRequest; // Importar el request
use App\Http\Requests\ActualizarPersonaRequest; // Importar el request
use App\Models\Persona; // Importar el modelo
use Illuminate\Http\Request;

class PersonaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index() 
    {
        //get all - get
        return Persona::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(GuardarPersonaRequest $request) // Inyectar el request
    {
        //guardar - post
        $existingPersona = Persona::where('correo', $request->input('correo'))->first(); // Buscar si ya existe una persona con ese correo
        if($existingPersona){
            return response()->json([
                'res' => false,
                'message' => 'Ya existe una persona con ese correo'
            ], 400);
        }

        Persona::create($request->all()); // Crear la persona
        return response()->json([
            'res' => true,
            'message' => 'Persona creada con exito'
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Persona $persona)
    {
        //get by id - get
        return response()->json([ // Devolver la persona
            'res' => true,
            'persona' => $persona
        ], 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ActualizarPersonaRequest $request, Persona $persona) // Inyectar el request
    {
        //update - put
        $persona->update($request->all()); // Actualizar la persona
        return response()->json([
            'res' => true,
            'message' => 'Persona actualizada con exito'
        ], 200); // Devolver respuesta json
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //delete - delete
        $persona = Persona::find($id); // Buscar la persona
        if(!$persona){
            return response()->json([
                'res' => false,
                'message' => 'No existe la persona'
            ], 404);
        }
        $persona->delete(); // Eliminar la persona

        return response()->json([
            'res' => true,
            'message' => 'Persona eliminada con exito'
        ], 200);
    }
}
