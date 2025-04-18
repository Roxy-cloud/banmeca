<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SedeParroquial extends Model
{
    /** @use HasFactory<\Database\Factories\SedeParroquialFactory> */
    use HasFactory;
    protected $table = 'sede_parroquial';

    protected $fillable = [
        'Nombre',
        'SedeRegional_id',
        'Direccion',
        'user_id',
        'telefono',
    
    ];

    public function sedeRegional()
    {
        return $this->belongsTo(SedeRegional::class, 'SedeRegional_id');
    }
    public function responsable()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    

}
