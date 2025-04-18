<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Solicitud extends Model
{
    use HasFactory;
    protected $table = 'solicitudes';

    protected $fillable = [
        'beneficiario_id',
        'tipo',
        'categoria',
        'descripcion',
    ];

    // Relación con Beneficiario
            public function beneficiario()
        {
            return $this->belongsTo(Beneficiario::class);
        }
        public function equipos()
        {
            return $this->belongsToMany(Equipment::class, 'solicitud_equipment');
        }

        public function medicamentos()
        {
            return $this->belongsToMany(Medicamento::class, 'solicitud_medicamento');
        }
        
        public function seguimiento()
        {
            return $this->hasMany(SeguimientoSolicitud::class);
        }

        public function ultimoSeguimiento()
        {
            return $this->hasOne(SeguimientoSolicitud::class)->latest();
        }


}