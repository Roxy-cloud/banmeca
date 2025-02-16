<?php

namespace Database\Factories;

use App\Models\EquipoMedico;
use Illuminate\Database\Eloquent\Factories\Factory;

class EquipoMedicoFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = EquipoMedico::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $estados = ['Bueno', 'Regular', 'Malo']; // Define los estados posibles

        return [
            'Tipo' => $this->faker->word,
            'Marca' => $this->faker->company,
            'Modelo' => $this->faker->word,
            'Estado' => $this->faker->randomElement($estados),
        ];
    }
}
