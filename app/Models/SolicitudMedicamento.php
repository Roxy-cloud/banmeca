<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SolicitudMedicamento extends Model
{
    /** @use HasFactory<\Database\Factories\SolicitudMedicamentoFactory> */
    use HasFactory;

    protected $table = 'solicitud_medicamentos';

    public function equipos()
{
    return $this->belongsToMany(Equipment::class, 'solicitud_equipment');
}

public function medicamentos()
{
    return $this->belongsToMany(Medicamento::class, 'solicitud_medicamento');
}

}
