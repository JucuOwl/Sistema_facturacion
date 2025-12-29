<div class="row p-2">

    {{-- NUM FACTURA --}}
    <div class="col-md-4">
        <label>Num Factura</label>
        <input type="text" name="num_factura"
            class="form-control"
            value="{{ old('num_factura', $factura->num_factura ?? '') }}">
    </div>

    {{-- CLIENTE --}}
    <div class="col-md-8">
        <label>Cliente</label>
        <select name="cliente_id" class="form-control">
            <option value="">-- Seleccione --</option>
            @foreach ($clientes as $cliente)
                <option value="{{ $cliente->id }}"
                    {{ old('cliente_id', $factura->cliente_id ?? '') == $cliente->id ? 'selected' : '' }}>
                    {{ $cliente->nombres }}
                </option>
            @endforeach
        </select>
    </div>

    {{-- FORMA DE PAGO --}}
    <div class="col-md-6 mt-3">
        <label>Forma de Pago</label>
        <select name="forma_pago_id" class="form-control">
            <option value="">-- Seleccione --</option>
            @foreach ($formasPago as $fp)
                <option value="{{ $fp->id }}"
                    {{ old('forma_pago_id', $factura->forma_pago_id ?? '') == $fp->id ? 'selected' : '' }}>
                    {{ $fp->descripcion_formapago }}
                </option>
            @endforeach
        </select>
    </div>

    {{-- TOTAL --}}
    <div class="col-md-3 mt-3">
        <label>Total</label>
        <input type="number" step="0.01" id="total"
            name="total_factura" class="form-control"
            value="{{ old('total_factura', $factura->total_factura ?? '') }}">
    </div>

    {{-- IGV --}}
    <div class="col-md-3 mt-3">
        <label>IGV (18%)</label>
        <input type="number" step="0.01" id="igv"
            name="igv" class="form-control"
            value="{{ old('igv', $factura->igv ?? '') }}" readonly>
    </div>

    {{-- FECHA --}}
    <div class="col-md-4 mt-3">
        <label>Fecha</label>
        <input type="date" name="fecha_facturacion"
            class="form-control"
            value="{{ old('fecha_facturacion', $factura->fecha_facturacion ?? '') }}">
    </div>

    {{-- BOTÓN --}}
    <div class="col-md-12 mt-4 text-end">
        <button class="btn btn-primary">💾 Guardar</button>
    </div>
</div>

{{-- JS IGV --}}
<script>
document.getElementById('total')?.addEventListener('input', function () {
    let total = parseFloat(this.value) || 0;
    document.getElementById('igv').value = (total * 0.18).toFixed(2);
});
</script>
