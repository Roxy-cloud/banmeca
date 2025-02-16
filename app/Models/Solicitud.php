<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Solicitud extends Model
{
    use HasFactory;

    protected $table = 'solicitudes'; // Nombre de la tabla
    protected $primaryKey = 'ID_Solicitud'; // Clave primaria
    public $timestamps = true; // Habilitar timestamps (created_at, updated_at)
    protected $fillable = [
        'Tipo_Solicitud',
        'ID_Medicamento',
        'ID_EquipoMedico',
        'ID_Sede',
        'Descripcion',
        'Estado',
    ];

    // Definir las relaciones
    public function medicamento()
    {
        return $this->belongsTo(Medicamento::class, 'ID_Medicamento', 'ID_Medicamento');
    }

    public function equipoMedico()
    {
        return $this->belongsTo(EquipoMedico::class, 'ID_EquipoMedico', 'ID_Equipo');
    }

    public function sede()
    {
        return $this->belongsTo(SedeCaritas::class, 'ID_Sede', 'ID_Sede');
    }
}
