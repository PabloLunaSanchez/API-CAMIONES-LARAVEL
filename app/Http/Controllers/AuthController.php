<?php

namespace App\Http\Controllers;

use App\Models\Persona;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function register(Request $req)
    {
        // Validar
        $rules = [
            'nombre' => 'required|string',
            'correo' => 'required|string|unique:personas',
            'password' => 'required|string|min:6',
            'telefono' => 'required|string',
            'edad' => 'required|integer|min:0',
            'categoria' => 'required|in:admin,conductor',
        ];

        $validator = Validator::make($req->all(), $rules);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        // Crear nuevos usuarios o personas
        $persona = Persona::create([
            'nombre' => $req->nombre,
            'correo' => $req->correo,
            'password' => Hash::make($req->password),
            'telefono' => $req->telefono,
            'edad' => $req->edad,
            'categoria' => $req->categoria,
        ]);

        $token = $persona->createToken('Personal Access Token')->plainTextToken;
        $response = ['persona' => $persona, 'token' => $token];
        return response()->json($response, 200);
    }

    public function login(Request $req)
    {
        // Validar
        $rules = [
            'correo' => 'required',
            'password' => 'required|string',
        ];

        $req->validate($rules);

        // Encuentra el correo del usuario
        $persona = Persona::where('correo', $req->correo)->first();

        // Si el correo y contraseña encontrado del usuario es correcto
        if ($persona && Hash::check($req->password, $persona->password)) {
            $token = $persona->createToken('Personal Access Token')->plainTextToken;
            $response = ['persona' => $persona, 'token' => $token];
            return response()->json($response, 200);
        }

        $response = ['mensaje' => 'Correo incorrecto o contraseña'];
        return response()->json($response, 400);
    }
    
    public function getUserDataById($id)
    {
        $persona = Persona::find($id);

        if ($persona) {
            return response()->json(['persona' => $persona], 200);
        } else {
            return response()->json(['mensaje' => 'Usuario no encontrado'], 404);
        }
    }
}
