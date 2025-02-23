<?php

namespace Database\Factories;

use App\Models\Medicamento;
use App\Models\Categoria;
use App\Models\Insumo;
use Illuminate\Database\Eloquent\Factories\Factory;

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
            'categoria_id' => Categoria::factory(), // Crear una categoría asociada
            'insumo_id' => Insumo::factory(), // Crear un insumo asociado
            'Nombre' => $this->faker->word, // Generar un nombre aleatorio para el medicamento
            'Laboratorio' => $this->faker->company, // Generar un nombre de laboratorio aleatorio
            'Componente' => $this->faker->word, // Generar un componente aleatorio
            'Existencia' => $this->faker->randomNumber(), // Generar una cantidad de existencia aleatoria
            'imagen' => 'parring.png', // Imagen por defecto
        ];
    }
}
