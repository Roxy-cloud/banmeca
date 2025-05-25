<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DonacionEquipo extends Model
{
    use HasFactory;

    protected $table = 'donacion_equipos'; // Nombre de la tabla
    protected $fillable = ['beneficiario_id', 'equipment_id', 'cantidad', 'Fecha_Donacion'];

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
