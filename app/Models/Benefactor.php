<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Benefactor extends Model
{
    /** @use HasFactory<\Database\Factories\BenefactorFactory> */
    use HasFactory;
    protected $table = 'benefactors';

    protected $fillable = [
        'Nombre',
        'Tipo',
        'RIF_Cedula',
        'Direccion',
        'Telefono',
        'email',
    ];
    
    //relacion: un benefactor puede hacer de una a muchas insumo

    public function medicamentos()
    {
        return $this->hasMany(Medicamento::class, 'benefactor_id');
    }
    public function equipments()
    {
        return $this->hasMany(Equipment::class, 'benefactor_id');
    }
}
