<?php

namespace App\Models;

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EquipoMedico extends Model
{
    use HasFactory;

    protected $fillable = [
        'Tipo',
        'Marca',
        'Modelo',
        'Estado',
    ];

    public function donacion()
    {
        return $this->belongsTo(Donacion::class, 'ID_Donacion', 'ID_Donacion');
    }
}
