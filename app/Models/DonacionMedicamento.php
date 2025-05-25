<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DonacionMedicamento extends Model
{
    use HasFactory;
    protected $table = 'donaciones_medicamentos';
 
    protected $fillable = ['beneficiario_id', 'medicamento_id', 'cantidad', 'Fecha_Donacion'];

    public function beneficiario()
    {
        return $this->belongsTo(Beneficiario::class, 'beneficiario_id');
    }

 public function medicamentos()
{
    return $this->belongsToMany(Medicamento::class, 'donaciones_medicamentos', 'id', 'medicamento_id')
                ->withPivot('cantidad', 'Fecha_Donacion');
}
}