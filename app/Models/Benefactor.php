<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Benefactor extends Model
{
    /** @use HasFactory<\Database\Factories\BenefactorFactory> */
    use HasFactory;
    protected $table = 'benefactors';

    protected $fillable = [
        'Nombre',
        'Tipo',
        'RIF_Cedula',
        'Direccion',
        'Telefono',
        'Correo_Electronico',
    ];
    
    //relacion: un benefactor puede hacer de una a muchas donaciones
    public function donacions()
    {
    return $this->hasMany(Donacion::class, 'benefactor_id');
    }
}
