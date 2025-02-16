<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SedeCaritas extends Model
{
    use HasFactory;

    protected $fillable = [
        'Nombre_Sede',
        'Direccion',
        'Telefono',
        'Correo_Electronico',

    ];
    public function donaciones()
    {
        return $this->hasMany(Donacion::class, 'ID_Sede', 'ID_Sede');
    }
}
