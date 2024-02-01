<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return Cliente::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(GuardarClienteRequest $request)
    {
        //
        $existingCliente = Cliente::where('correo', $request->input('correo'))->first();

        if($existingCliente){
            return response()->json([
                'res' => false,
                'message' => 'Ya existe un cliente con ese correo'
            ], 400);
        }

        Cliente::create($request->all()); // Crear la persona

        return response()->json([
            'res' => true,
            'message' => 'Cliente creado con exito'
        ], 200);
    }

    /**
     * Display the specified resource.
     */
    public function show(Cliente $id)
    {
        // 
        $cliente = Cliente::find($id);

        return response()->json([
            'res' => true,
            'cliente' => $cliente
        ], 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ActualizarClienteRequest $request, string $id)
    {
        //
        $cliente->update($request->all());

        return response()->json([
            'res' => true,
            'message' => 'Cliente actualizado con exito'
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $cliente = Cliente::find($id);
        if(!$cliente){
            return response()->json([
                'res' => false,
                'message' => 'No existe el cliente'
            ], 400);
        }
        $cliente->delete();

        return response()->json([
            'res' => true,
            'message' => 'Cliente eliminado con exito'
        ], 200);
    }
}
