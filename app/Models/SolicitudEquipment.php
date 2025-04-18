<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SolicitudEquipment extends Model
{
    /** @use HasFactory<\Database\Factories\SolicitudEquipmentFactory> */
    use HasFactory;
    protected $table = 'solicitud_equipments';
}
