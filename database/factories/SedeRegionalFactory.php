<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\SedeCaritasRegional>
 */
class SedeCaritasRegionalFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'Nombre'=> $this->faker->name,
            'Direccion'=> $this->faker->address,
            'Responsable'=> $this->faker->responsable,
            'Telefono'=> $this->faker->phone,
        ];
    }
}
