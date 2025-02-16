<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Benefactor extends Model
{
    use HasFactory;

    protected $fillable = [
        'Nombre',
        'Tipo',
        'RIF_Cedula',
        'Direccion',
        'Telefono',
        'Correo_Electronico',
    ];
}
