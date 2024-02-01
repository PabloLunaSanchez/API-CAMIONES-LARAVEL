<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;

class Persona extends Model
{
    use HasFactory, HasApiTokens;

    protected $fillable = [
        'id', // No se debe agregar el id
        'nombre',
        'correo',
        'password',
        'telefono',
        'edad',
        'categoria'
    ]; // Campos que se pueden asignar de manera masiva

    protected $rules = [
        'correo' => 'unique:personas'
    ]; // Reglas de validación

    protected $hidden = [
        'created_at',
        'updated_at'
    ]; // Campos que no se devuelven en la respuesta
}
