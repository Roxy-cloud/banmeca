<?php

namespace App\Http\Requests;

class BeneficiarioRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'Nombre' => 'required',
            'Cedula' => 'required|unique:beneficiarios',
            'Direccion' => 'required',
            'Telefono' => 'required',
            'Informe_Medico' => 'nullable|mimes:pdf,jpg,png|max:2048'
        ];
    }
}
