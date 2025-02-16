<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoriaMedicamento extends Model
{
    use HasFactory;

    protected $fillable = [
        'Nombre',
        'Descripcion',
    ];

    public function medicamentos()
    {
        return $this->hasMany(Medicamento::class, 'ID_Categoria', 'ID_Categoria');
    }
}
