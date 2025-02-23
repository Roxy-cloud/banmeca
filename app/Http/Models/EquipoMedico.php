<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EquipoMedico extends Model
{
    /** @use HasFactory<\Database\Factories\EquipoMedicoFactory> */
    use HasFactory;
    protected $fillable = [
        'insumo_id',
        'Nombre',
        'Tipo',
        'Marca',
        'Modelo',
        'Existencia',
        'Estado',
        'imagen',
    ];
    public function insumo()
    {
        return $this->belongsTo(Insumo::class, 'insumo_id');
    }
}
