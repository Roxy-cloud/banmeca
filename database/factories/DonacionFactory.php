<?php

namespace Database\Factories;

use App\Models\Donacion;
use App\Models\Benefactor;
use Illuminate\Database\Eloquent\Factories\Factory;

class DonacionFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Donacion::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'benefactor_id' => Benefactor::factory(), // Crear un benefactor asociado
            'Fecha_Donacion' => $this->faker->dateTime(),
            'Descripcion' => $this->faker->optional()->sentence,
        ];
    }
}
