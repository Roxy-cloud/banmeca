<?php

namespace Database\Factories;

use App\Models\Beneficiario;
use Illuminate\Database\Eloquent\Factories\Factory;

class BeneficiarioFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Beneficiario::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'Nombre' => $this->faker->name,
            'Cedula' => $this->faker->unique()->numerify('##########'), // Asumiendo 10 dígitos
            'Direccion' => $this->faker->address,
            'Telefono' => $this->faker->phoneNumber,
            'Informe_Medico' => $this->faker->optional()->text,
        ];
    }
}
