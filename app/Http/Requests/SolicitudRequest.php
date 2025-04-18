<<<<<<< HEAD
<?php

namespace App\Http\Requests;

class SolicitudRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
        'beneficiario_id' => 'required|exists:beneficiarios,id',
        'tipo' => 'required|in:comodato,donativo',
        'categoria' => 'required|in:medicamentos,equipos médicos',
        'equipos' => 'array|nullable',
        'medicamentos' => 'array|nullable',
        'equipos.*' => 'exists:equipments,id',
        'medicamentos.*' => 'exists:medicamentos,id',
        'descripcion' => 'nullable'
        ];
    }

    public function withValidator($validator)
{
    $validator->after(function ($validator) {
        // Validar equipos
        if ($this->input('equipos')) {
            foreach ($this->input('equipos') as $equipmentId) {
                $equipment = Equipment::find($equipmentId);
                if ($equipment->Estado === 'Malo') {
                    $validator->errors()->add('equipos', 'El equipo seleccionado está en mal estado');
                }
            }
        }
        
        // Validar medicamentos
        if ($this->input('medicamentos')) {
            foreach ($this->input('medicamentos') as $medicamentoId) {
                $medicamento = Medicamento::find($medicamentoId);
                if ($medicamento->Fecha_Vencimiento < now()) {
                    $validator->errors()->add('medicamentos', 'El medicamento seleccionado está vencido');
                }
            }
        }
    });
}

    
}
=======
<?php

namespace App\Http\Requests;

class SolicitudRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
        'beneficiario_id' => 'required|exists:beneficiarios,id',
        'tipo' => 'required|in:comodato,donativo',
        'categoria' => 'required|in:medicamentos,equipos médicos',
        'equipos' => 'array|nullable',
        'medicamentos' => 'array|nullable',
        'equipos.*' => 'exists:equipments,id',
        'medicamentos.*' => 'exists:medicamentos,id',
        'descripcion' => 'nullable'
        ];
    }

    public function withValidator($validator)
{
    $validator->after(function ($validator) {
        // Validar equipos
        if ($this->input('equipos')) {
            foreach ($this->input('equipos') as $equipmentId) {
                $equipment = Equipment::find($equipmentId);
                if ($equipment->Estado === 'Malo') {
                    $validator->errors()->add('equipos', 'El equipo seleccionado está en mal estado');
                }
            }
        }
        
        // Validar medicamentos
        if ($this->input('medicamentos')) {
            foreach ($this->input('medicamentos') as $medicamentoId) {
                $medicamento = Medicamento::find($medicamentoId);
                if ($medicamento->Fecha_Vencimiento < now()) {
                    $validator->errors()->add('medicamentos', 'El medicamento seleccionado está vencido');
                }
            }
        }
    });
}

    
}
>>>>>>> e2a8b4e (Primer commit)
