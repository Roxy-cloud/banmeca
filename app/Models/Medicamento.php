<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Medicamento extends Model
{
    use HasFactory;
    protected $table = 'medicamentos';
    // En el modelo Medicamento:

    protected $fillable = [
        'categoria_id',
        'insumo_id',
        'benefactor_id',
        'Fecha_Donacion',
        'Nombre',
        'Laboratorio',
        'dosificacion',
        'presentacion',
        'Existencia',
        'Fecha_Vencimiento',
        'imagen',
    ];

    // Definir la relación con Categoria
    public function categoria()
    {
        return $this->belongsTo(Categoria::class, 'categoria_id');
    }

    // Definir la relación con Insumo
    public function insumo()
    {
        return $this->belongsTo(Insumo::class, 'insumo_id');
    }
    public function benefactor()
    {
        return $this->belongsTo(Benefactor::class, 'benefactor_id');
    }
    public function solicitudes()
    {
        return $this->belongsTo(SolicitudMedicamento::class, 'solicitud_id');
    }
    public function componentes()
{
    return $this->belongsToMany(Componente::class, 'medicamento_componente');
}
public function pacientes()
{
    return $this->belongsToMany(Paciente::class, 'jornada_paciente')
                ->withPivot('jornada_id', 'cantidad');
}

}
