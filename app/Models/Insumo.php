<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;



class Insumo extends Model
{
    use HasFactory;
    protected $table = 'insumos';

    protected $fillable = [
        'Tipo_Insumo',
        'medicamento_id',
        'equipment_id',
    ];


    public function medicamentos()
    {
        return $this->hasMany(Medicamento::class, 'benefactor_id');
    }
    
    

    public function equipments()
    {
        return $this->hasMany(Equipment::class, 'insumo_id');
    }
}
