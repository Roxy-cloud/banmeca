<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SeguimientoSolicitud extends Model
{
    use HasFactory;
    protected $table = 'seguimientos';

    public function seguimiento()
    {
        return $this->hasMany(SeguimientoSolicitud::class);
    }
    
    public function ultimoSeguimiento()
    {
        return $this->hasOne(SeguimientoSolicitud::class)->latest();
    }
    
}
