<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SedeRegional extends Model
{
    /** @use HasFactory<\Database\Factories\SedeRegionalFactory> */
    use HasFactory;
    protected $table = 'sede_regional';

    protected $fillable = [
        'Nombre',
        'Direccion',
        'Responsable',
        'Telefono',
    ];

    public function sedesParroquiales()
    {
        return $this->hasMany(SedeParroquial::class, 'sede_regional_id');
    }
}
