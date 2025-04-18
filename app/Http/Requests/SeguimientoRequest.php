<<<<<<< HEAD
<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SeguimientoRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'solicitud_id' => 'required|exists:solicitudes,id',
            'estado' => 'required|in:pendiente,aprobado,rechazado,entregado',
            'observaciones' => 'nullable'
        ];
    }
}
=======
<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SeguimientoRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'solicitud_id' => 'required|exists:solicitudes,id',
            'estado' => 'required|in:pendiente,aprobado,rechazado,entregado',
            'observaciones' => 'nullable'
        ];
    }
}
>>>>>>> e2a8b4e (Primer commit)
