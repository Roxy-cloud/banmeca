<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Donacion extends Model
{
    use HasFactory;

    protected $fillable = [
        'benefactor_id',
        'Fecha_Donacion',
        'Descripcion',
    ];

    // Definir la relación con Benefactor
    public function benefactor()
    {
        return $this->belongsTo(Benefactor::class);
    }
}
