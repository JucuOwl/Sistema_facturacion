<div class="row padding-1 p-1">
    <div class="col-md-12">
        <div class="form-group mb-2">
            <label for="descripcion_formapago" class="form-label">
                {{ __('Descripción Forma de Pago') }}
            </label>
            <input
                type="text"
                name="descripcion_formapago"
                class="form-control @error('descripcion_formapago') is-invalid @enderror"
                value="{{ old('descripcion_formapago', $formaPago->descripcion_formapago ?? '') }}"
                id="descripcion_formapago"
                placeholder="Ej: Efectivo, Tarjeta, Yape"
            >
            {!! $errors->first('descripcion_formapago', '<div class="invalid-feedback"><strong>:message</strong></div>') !!}
        </div>
    </div>

    <div class="col-md-12 mt-2">
        <button type="submit" class="btn btn-primary">
            {{ __('Guardar') }}
        </button>
    </div>
</div>
