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
        'sexo',
        'edad',
        'Direccion',
        'Telefono',
        'Informe_Medico',
    ];
     public function donacionesMedicamentos()
    {
        return $this->hasMany(DonacionMedicamento::class);
    }

    public function donacionesEquipos()
    {
        return $this->hasMany(DonacionEquipo::class);
    }

    public function comodatosEquipos()
    {
        return $this->hasMany(ComodatoEquipo::class);
    }

}
