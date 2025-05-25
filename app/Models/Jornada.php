<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jornada extends Model
{
    use HasFactory;

    protected $table = 'jornadas';

    protected $fillable = [
        'SedeRegional_id', 
        'SedeParroquial_id', 
        'diocesis', 
        'fecha'
    ];

    /**
     * Relación: Una jornada pertenece a una sede regional.
     */
    public function sedeRegional()
    {
        return $this->belongsTo(SedeRegional::class, 'SedeRegional_id');
    }

    /**
     * Relación: Una jornada pertenece a una sede parroquial.
     */
    public function sedeParroquial()
    {
        return $this->belongsTo(SedeParroquial::class, 'SedeParroquial_id');
    }

    /**
     * Relación muchos a muchos con pacientes.
     */
    public function pacientes()
{
    return $this->belongsToMany(Paciente::class, 'jornada_paciente')
        ->withPivot(['medicamento_id', 'cantidad'])
        ->withTimestamps();
}

    
}
