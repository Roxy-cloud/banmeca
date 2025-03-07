<?php

namespace Database\Factories;

use App\Models\Solicitud;
use App\Models\Beneficiario;
use Illuminate\Database\Eloquent\Factories\Factory;

class SolicitudFactory extends Factory
{
    protected $model = Solicitud::class;

    public function definition()
    {
        return [
            'beneficiario_id' => Beneficiario::factory(), // Crear un beneficiario asociado
            'tipo' => $this->faker->randomElement(['comodato', 'donativo']),
            'categoria' => $this->faker->randomElement(['medicamentos', 'equipos médicos']),
            'descripcion' => $this->faker->optional()->sentence,
        ];
    }
}

