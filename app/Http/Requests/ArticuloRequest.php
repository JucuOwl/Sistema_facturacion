<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ArticuloRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'codigo' => 'required|string|max:20|unique:articulos,codigo',
            'descripcion' => 'required|string|max:255',
            'precio_venta' => 'nullable|numeric',
            'precio_costo' => 'nullable|numeric',
            'stock' => 'nullable|integer',
            'tipo_articulo_id' => 'required|integer',
            'proveedor_id' => 'required',
            'fecha_ingreso' => 'nullable|date',
        ];
    }
}
