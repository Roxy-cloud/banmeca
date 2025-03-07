<?php

namespace Database\Factories;

use App\Models\Insumo;
use App\Models\Benefactor;
use Illuminate\Database\Eloquent\Factories\Factory;

class InsumoFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Insumo::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [

            'insumo_id' => Benefactor::factory(), // Crear un benefactor asociado
            'Tipo_Insumo' => $this->faker->randomElement(['Medicamento', 'Equipo Médico']), // Tipo aleatorio
            'Fecha_Insumo' => $this->faker->dateTime(),  
        ];
    }
}
