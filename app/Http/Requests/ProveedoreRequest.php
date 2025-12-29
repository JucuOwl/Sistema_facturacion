<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProveedoreRequest extends FormRequest
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
			'no_documento' => 'required|string',
			'tipo_documento_id' => 'required',
			'nombre' => 'required|string',
			'apellido' => 'string',
			'nombre_comercial' => 'string',
			'direccion' => 'string',
			'ciudad_id' => 'required',
			'telefono' => 'string',
        ];
    }
}
