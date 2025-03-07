<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Benefactor>
 */
class BenefactorFactory extends Factory
{
    protected $model = Benefactor::class;

    public function definition()
    {
        return [
            'Nombre' => $this->faker->name,
            'Tipo' => $this->faker->randomElement(['Persona Natural', 'Institución']),
            'RIF_Cedula' => $this->faker->unique()->numerify('V-########'),
            'Direccion' => $this->faker->address,
            'Telefono' => $this->faker->phoneNumber,
            'email' => $this->faker->unique()->safeEmail,
        ];
    }
}