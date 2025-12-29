@php use Illuminate\Support\Str; @endphp

<div class="row p-2">

    {{-- CÓDIGO --}}
    <div class="col-md-4">
        <label>Código Artículo</label>
        <input type="text"
               name="codigo"
               class="form-control"
               value="{{ old('codigo', $articulo->codigo ?? 'ART-' . strtoupper(Str::random(6))) }}"
               readonly>
    </div>

    {{-- DESCRIPCIÓN --}}
    <div class="col-md-8">
        <label>Descripción</label>
        <input type="text"
               name="descripcion"
               class="form-control @error('descripcion') is-invalid @enderror"
               value="{{ old('descripcion', $articulo->descripcion) }}"
               required>
        @error('descripcion')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    {{-- PRECIOS --}}
    <div class="col-md-4 mt-3">
        <label>Precio Venta</label>
        <input type="number" step="0.01" name="precio_venta"
               class="form-control"
               value="{{ old('precio_venta', $articulo->precio_venta) }}">
    </div>

    <div class="col-md-4 mt-3">
        <label>Precio Costo</label>
        <input type="number" step="0.01" name="precio_costo"
               class="form-control"
               value="{{ old('precio_costo', $articulo->precio_costo) }}">
    </div>

    <div class="col-md-4 mt-3">
        <label>Stock</label>
        <input type="number" name="stock"
               class="form-control"
               value="{{ old('stock', $articulo->stock) }}">
    </div>

    {{-- TIPO ARTÍCULO --}}
    <div class="col-md-6 mt-3">
        <label>Tipo de Artículo</label>
        <select name="tipo_articulo_id" class="form-control">
            <option value="">-- Seleccione --</option>
            @foreach($tipos as $tipo)
                <option value="{{ $tipo->id }}"
                    {{ old('tipo_articulo_id', $articulo->tipo_articulo_id) == $tipo->id ? 'selected' : '' }}>
                    {{ $tipo->descripcion_articulo }}
                </option>
            @endforeach
        </select>
    </div>

    {{-- PROVEEDOR --}}
    <div class="col-md-6 mt-3">
        <label>Proveedor</label>
        <select name="proveedor_id" class="form-control">
            <option value="">-- Seleccione --</option>
            @foreach($proveedores as $prov)
                <option value="{{ $prov->id }}"
                    {{ old('proveedor_id', $articulo->proveedor_id) == $prov->id ? 'selected' : '' }}>
                    {{ $prov->nombre_comercial ?? $prov->nombre }}
                </option>
            @endforeach
        </select>
    </div>

    {{-- FECHA --}}
    <div class="col-md-4 mt-3">
        <label>Fecha Ingreso</label>
        <input type="date" name="fecha_ingreso"
               class="form-control"
               value="{{ old('fecha_ingreso', $articulo->fecha_ingreso) }}">
    </div>

    {{-- BOTÓN --}}
    <div class="col-md-12 mt-4 text-end">
        <button type="submit" class="btn btn-primary">
            💾 Guardar
        </button>
    </div>
</div>
