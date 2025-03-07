<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Beneficiario extends Model
{
    use HasFactory;
    protected $table = 'beneficiarios';

    protected $fillable = [
        'Nombre',
        'Cedula',
        'Direccion',
        'Telefono',
        'Informe_Medico',
    ];
}
