<?php

namespace Database\Factories;

use App\Models\Solicitud;
use App\Models\Medicamento;
use App\Models\EquipoMedico;
use App\Models\SedeCaritas;
use Illuminate\Database\Eloquent\Factories\Factory;

class SolicitudFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Solicitud::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $tiposSolicitud = ['Donacion_Medicina', 'Comodato_EquipoMedico'];
        $tipo = $this->faker->randomElement($tiposSolicitud);

        $medicamentoId = null;
        $equipoMedicoId = null;

        if ($tipo === 'Donacion_Medicina') {
            $medicamentoId = Medicamento::factory()->create()->ID_Medicamento;
        } else {
            $equipoMedicoId = EquipoMedico::factory()->create()->ID_Equipo;
        }

        return [
            'Tipo_Solicitud' => $tipo,
            'ID_Medicamento' => $medicamentoId,
            'ID_EquipoMedico' => $equipoMedicoId,
            'ID_Sede' => SedeCaritas::factory()->create()->ID_Sede,
            'Descripcion' => $this->faker->sentence,
            'Estado' => $this->faker->randomElement(['Pendiente', 'Aprobada', 'Rechazada']),
        ];
    }
}
