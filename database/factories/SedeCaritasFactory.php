<?php

namespace Database\Factories;

use App\Models\SedeCaritas;
use Illuminate\Database\Eloquent\Factories\Factory;

class SedeCaritasFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = SedeCaritas::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'Nombre_Sede' => $this->faker->company,
            'Direccion' => $this->faker->address,
            'Telefono' => $this->faker->phoneNumber,
            'Correo_Electronico' => $this->faker->unique()->safeEmail,
        ];
    }
}
