<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Camion extends Model
{
    use HasFactory;

    protected $fillable = [
        'id', // No se debe agregar el id
        'chofer',
        'placa',
        'modelo',
        'estado'
    ]; // Campos que se pueden asignar de manera masiva

    protected $hidden = [
        'created_at',
        'updated_at'
    ]; // Campos que no se devuelven en la respuesta
}
