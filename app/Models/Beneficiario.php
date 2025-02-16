<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Beneficiario extends Model
{
    use HasFactory;

    protected $fillable = [
        'Nombre',
        'Cedula',
        'Fecha_Nacimiento',
        'Direccion',
        'Telefono',
        'Informe_Medico',
    ];

    public function donaciones()
    {
        return $this->hasMany(Donacion::class, 'ID_Beneficiario', 'ID_Beneficiario');
    }
    public function beneficiario()
    {
        return $this->belongsTo(Beneficiario::class, 'ID_Beneficiario', 'ID_Beneficiario');
    }
    public function sedeCaritas()
    {
        return $this->belongsTo(SedeCaritas::class, 'ID_Sede', 'ID_Sede');
    }

}
