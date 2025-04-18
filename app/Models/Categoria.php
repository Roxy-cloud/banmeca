<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    use HasFactory;
    protected $table = 'categorias';

    protected $fillable = [
        'Nombre',
        'Descripcion',
    ];

    // Definir la relación con Medicamento
    public function medicamento()
    {
        return $this->hasMany(Medicamento::class, 'categoria_id');
    }
}
