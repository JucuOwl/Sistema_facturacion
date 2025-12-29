<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FacturaRequest extends FormRequest
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
        'num_factura' => 'required|string|max:50',
        'cliente_id' => 'required|exists:clientes,id',
        'forma_pago_id' => 'required|exists:forma_pagos,id',
        'fecha_facturacion' => 'required|date',
        'total_factura' => 'required|numeric',
        'iva' => 'required|numeric',
    ];
}

}
