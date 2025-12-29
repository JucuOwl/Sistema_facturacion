<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DevolucioneRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
			'detalle_factura_id' => 'required',
			'motivo' => 'required|string',
			'fecha_devolucion' => 'required',
			'cantidad' => 'required',
        ];
    }
}
