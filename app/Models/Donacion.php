<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Donacion extends Model
{
    use HasFactory;

    protected $fillable = [
        'ID_Benefactor',
        'Fecha_Donacion',
        'Descripcion',
    ];

    // Definir la relación con el Benefactor
    public function benefactor()
    {
        return $this->belongsTo(Benefactor::class, 'ID_Benefactor', 'ID_Benefactor');
    }
}

