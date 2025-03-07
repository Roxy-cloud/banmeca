<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Equipment extends Model
{
    use HasFactory;
    protected $table = 'equipments';

    protected $fillable = [
        'insumo_id',
        'Tipo',
        'Marca',
        'Modelo',
        'Existencia',
        'Estado',
        'imagen',
    ];

    public function insumo()
    {
        return $this->belongsTo(Insumo::class);
    }
}