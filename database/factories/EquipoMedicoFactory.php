<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\EquipoMedico>
 */
class EquipoMedicoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'insumo_id' => Insumo::factory(), // Crear un insumo asociado
            'Nombre'=> $this->faker->name,
            'Tipo'=> $this->faker->type,
            'Marca'=> $this->faker->brand,
            'Modelo'=> $this->faker->model,
            'Existencia'=> $this->faker->cant,
            'Estado'=> $this->faker->state,
            'imagen'=> $this->faker->image,
        ];
    }
}
