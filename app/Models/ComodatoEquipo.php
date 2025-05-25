<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ComodatoEquipo extends Model
{
    use HasFactory;

    protected $table = 'comodato_equipos'; // Nombre de la tabla
    protected $fillable = ['beneficiario_id', 'equipment_id', 'cantidad', 'Fecha_Inicio', 'Fecha_Devolucion'];

    // Relación con Beneficiario
    public function beneficiario()
    {
        return $this->belongsTo(Beneficiario::class);
    }

    // Relación con Equipment
    public function equipment()
    {
        return $this->belongsTo(Equipment::class);
    }
}
