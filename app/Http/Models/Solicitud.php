<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Solicitud extends Model
{
    use HasFactory;
    protected $table = 'solicitudes';

    protected $fillable = [
        'beneficiario_id',
        'tipo',
        'categoria',
        'descripcion',
    ];

    // Relación con Beneficiario
    public function beneficiario()
    {
        return $this->belongsTo(Beneficiario::class);
    }
}

