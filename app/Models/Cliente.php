<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'nombre',
        'correo',
        'telefono',
        'cuidad',
        'folio',
        'pagos'
    ];

    protected $rules = [
        'correo' => 'unique:cliente',
        'folio' => 'unique:cliente'
    ];

    protected $hidden = [
        'created_at',
        'updated_at'
    ];
}
