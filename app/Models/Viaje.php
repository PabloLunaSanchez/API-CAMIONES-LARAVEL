<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Viaje extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'Kilometros',
        'ciudad_origen',
        'ciudad_destino',
        'fecha_salida',
        'fecha_llegada',
        'gasolina',
        'peaje',
        'carga',
        'comida',
        'federales',
        'total'
    ]; // Campos que se pueden asignar de manera masiva

    protected $hidden = [
        'created_at',
        'updated_at'
    ]; // Campos que no se devuelven en la respuesta
}
