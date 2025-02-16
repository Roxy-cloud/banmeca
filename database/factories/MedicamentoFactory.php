<?php

namespace Database\Factories;

use App\Models\Medicamento;
use App\Models\Categoria; // Importa el modelo Categoria
use Illuminate\Database\Eloquent\Factories\Factory;
use Carbon\Carbon;

class MedicamentoFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Medicamento::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'ID_Categoria' => function () {
                return Categoria::factory()->create()->id;
            },
            'Nombre' => $this->faker->word,
            'Descripcion' => $this->faker->sentence,
            'Fecha_Vencimiento' => $this->faker->dateTimeBetween('+1 month', '+1 year'),
            'Cantidad' => $this->faker->numberBetween(0, 100),
        ];
    }
}
