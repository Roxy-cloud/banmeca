<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Medicamento extends Model
{
    use HasFactory;
    protected $table = 'medicamentos';

    protected $fillable = [
        'categoria_id',
        'insumo_id',
        'Nombre',
        'Laboratorio',
        'Componente',
        'Existencia',
        'Fecha_Vencimiento',
        'imagen',
    ];

    // Definir la relación con Categoria
    public function categoria()
    {
        return $this->belongsTo(Categoria::class, 'categoria_id');
    }

    // Definir la relación con Insumo
    public function insumo()
    {
        return $this->belongsTo(Insumo::class, 'insumo_id');
    }
}
