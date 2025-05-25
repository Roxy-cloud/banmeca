<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Paciente extends Model
{
    use HasFactory;

    protected $table = 'pacientes';

    // Definir los campos que pueden ser rellenados de manera masiva
    protected $fillable = [
        'Nombre',
        'cedula',
        'edad', 
        'sexo',
        'categoria',
    ];


    /**
     * Relación muchos a muchos con jornadas, incluyendo los medicamentos entregados.
     */
   public function jornadas()
{
    return $this->belongsToMany(Jornada::class, 'jornada_paciente')
        ->withPivot(['medicamento_id', 'cantidad'])
        ->withTimestamps();
}

    public function medicamentos()
{
    return $this->belongsToMany(Medicamento::class, 'jornada_paciente')->withPivot('cantidad');
}

    


} 