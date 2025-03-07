<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;



class Insumo extends Model
{
    use HasFactory;
    protected $table = 'insumos';

    protected $fillable = [
        'benefactor_id',
        'Fecha_Insumo',
        'Tipo_Insumo',
    ];

    public function benefactor()
    {
        return $this->belongsTo(Benefactor::class);
    }

    public function medicamento()
    {
        return $this->belongsTo(Medicamento::class, 'medicamento_id');
    }

    public function equipment()
    {
        return $this->belongsTo(Equipment::class, 'equipment_id');
    }
}
