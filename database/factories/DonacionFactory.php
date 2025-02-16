<?php

namespace Database\Factories;

use App\Models\Donacion;
use App\Models\Benefactor; // Importa el modelo Benefactor
use Illuminate\Database\Eloquent\Factories\Factory;
use Carbon\Carbon; // Importa Carbon

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
            'ID_Benefactor' => function () {
                return Benefactor::factory()->create()->id;
            },
            'Fecha_Donacion' => $this->faker->dateTimeBetween('-1 year', 'now'),
            'Descripcion' => $this->faker->sentence,
        ];
    }
}

