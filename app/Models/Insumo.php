<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Insumo extends Model
{
    use HasFactory;

    protected $table = 'insumos';

    protected $fillable = [
        'tipo',


    

    ];
    public function equipment()
    {
        return $this->hasMany(Equipment::class, 'insumo_id');
    }
    public function medicamento()
    {
        return $this->hasMany(Medicamento::class, 'insumo_id');
    }
    // Relación con Solicitudes
}
