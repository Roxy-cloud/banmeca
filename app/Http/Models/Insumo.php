<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Insumo extends Model
{
    use HasFactory;

    protected $fillable = [
        'donacions_id',
        'Nombre_Insumo',
        'Tipo_Insumo',
    ];
    public function medicamentos()
    {
        return $this->hasMany(Medicamento::class);
    }

    public function equiposMedicos()
    {
        return $this->hasMany(EquipoMedico::class);
    }
    // Definir la relación con Donacion
    public function donacion()
    {
        return $this->belongsTo(Donacion::class, 'donacions_id');
    }
}
