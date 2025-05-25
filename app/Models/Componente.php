<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Componente extends Model
{
    use HasFactory;

    protected $fillable = ['Nombre'];

    // Relación con Medicamentos (muchos a muchos)
    public function medicamentos()
    {
        return $this->belongsToMany(Medicamento::class, 'medicamento_componente', 'componente_id', 'medicamento_id');
    }
}
