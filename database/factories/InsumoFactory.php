<?php

namespace Database\Factories;

use App\Models\Insumo;
use App\Models\Donacion;
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
            'donacions_id' => Donacion::factory(), // Crear un donación asociada
            'Nombre_Insumo' => $this->faker->word, // Generar un nombre aleatorio para el insumo
            'Tipo_Insumo' => $this->faker->randomElement(['Medicamento', 'Equipo Médico']), // Tipo aleatorio
        ];
    }
}
