<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\GuardarCamionRequest;
use App\Http\Requests\ActualizarCamionRequest;
use Illuminate\Http\Request;
use App\Models\Camion;

class CamionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //get all
        return Camion::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(GuardarCamionRequest $request)
    {
        //post
        $existingCamion = Camion::where('placa', $request->input('placa'))->first();
        if($existingCamion){
            return response()->json([
                'res' => false,
                'message' => 'Ya existe un camion con esa placa'
            ], 400);
        }

        Camion::create($request->all());
        return response()->json([
            'res' => true,
            'message' => 'Camion creado con exito'
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //get by id
        return response->json([
            'res' => true,
            'camion' => Camion::find($id)
        ], 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ActualizarCamionRequest $request, string $id)
    {
        //put camion
        $camion->update($request->all());
        return response->json([
            'res'=> true,
            'message' => 'Camion actualizado con exito'
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //delete
        $camion = Camion::find($id);
        if($camion){
            return response->json([
                'res' => false,
                'message' => 'Camion no encontrado'
            ], 400);
        }
        $camion->delete();
        return response->json([
            'res' => true,
            'message' => 'Camion eliminado con exito'
        ], 200);
    }
}
