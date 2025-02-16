<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Medicamento extends Model
{
    use HasFactory;

    protected $fillable = [
        'ID_Categoria',
        'Nombre',
        'Descripcion',
        'Fecha_Vencimiento',
        'Cantidad',
    ];

    public function donacion()
    {
        return $this->belongsTo(Donacion::class, 'ID_Donacion', 'ID_Donacion');
    }
}
