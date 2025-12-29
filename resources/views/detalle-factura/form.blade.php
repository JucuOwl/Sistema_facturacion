<div class="row">
    <div class="col-md-6">
        <label>Factura</label>
        <select name="factura_id" class="form-control select2">
            <option value="">-- Seleccione factura --</option>
            @foreach($facturas as $factura)
                <option value="{{ $factura->id }}"
                    {{ old('factura_id', $detalleFactura?->factura_id) == $factura->id ? 'selected' : '' }}>
                    Factura #{{ $factura->id }}
                </option>
            @endforeach
        </select>
    </div>

    <div class="col-md-6">
        <label>Artículo</label>
        <select name="articulo_id" class="form-control select2">
            <option value="">-- Seleccione artículo --</option>
            @foreach($articulos as $articulo)
                <option value="{{ $articulo->id }}"
                    {{ old('articulo_id', $detalleFactura?->articulo_id) == $articulo->id ? 'selected' : '' }}>
                    {{ $articulo->descripcion }}
                </option>
            @endforeach
        </select>
    </div>

    <div class="col-md-6 mt-3">
        <label>Cantidad</label>
        <input type="number" name="cantidad" class="form-control"
               value="{{ old('cantidad', $detalleFactura?->cantidad) }}">
    </div>

    <div class="col-md-6 mt-3">
        <label>Total</label>
        <input type="number" step="0.01" name="total" class="form-control"
               value="{{ old('total', $detalleFactura?->total) }}">
    </div>

    <div class="col-md-12 mt-3">
        <button class="btn btn-primary">Guardar</button>
    </div>
</div>
