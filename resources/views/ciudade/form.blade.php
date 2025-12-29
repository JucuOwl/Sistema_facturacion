<div class="row">
    <div class="col-md-6">

        <div class="form-group">
            <label for="codigo_ciudad">Código de la Ciudad</label>
            <input type="text"
                   name="codigo_ciudad"
                   id="codigo_ciudad"
                   class="form-control @error('codigo_ciudad') is-invalid @enderror"
                   value="{{ old('codigo_ciudad', $ciudad->codigo_ciudad ?? '') }}"
                   placeholder="Ej: CHI01">
            @error('codigo_ciudad')
                <span class="invalid-feedback">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-group mt-2">
            <label for="nombre_ciudad">Nombre de la Ciudad</label>
            <input type="text"
                   name="nombre_ciudad"
                   id="nombre_ciudad"
                   class="form-control @error('nombre_ciudad') is-invalid @enderror"
                   value="{{ old('nombre_ciudad', $ciudad->nombre_ciudad ?? '') }}"
                   placeholder="Ej: Chiclayo">
            @error('nombre_ciudad')
                <span class="invalid-feedback">{{ $message }}</span>
            @enderror
        </div>

    </div>

    <div class="col-md-12 mt-3">
        <button type="submit" class="btn btn-primary">
            <i class="fas fa-save"></i> Guardar
        </button>
        <a href="{{ route('ciudades.index') }}" class="btn btn-secondary">
            Cancelar
        </a>
    </div>
</div>
