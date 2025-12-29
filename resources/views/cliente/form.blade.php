<div class="row">

    {{-- DOCUMENTO --}}
    <div class="col-md-6">
        <div class="form-group">
            <label>Documento</label>
            <input type="text" name="documento"
                class="form-control @error('documento') is-invalid @enderror"
                value="{{ old('documento', $cliente?->documento) }}">
            @error('documento') <span class="text-danger">{{ $message }}</span> @enderror
        </div>
    </div>

    {{-- TIPO DOCUMENTO --}}
    <div class="col-md-6">
        <div class="form-group">
            <label>Tipo de Documento</label>
            <select name="tipo_documento_id" class="form-control select2">
                <option value="">-- Seleccione --</option>
                @foreach($tiposDocumento as $tipo)
                    <option value="{{ $tipo->id }}"
                        {{ old('tipo_documento_id', $cliente?->tipo_documento_id) == $tipo->id ? 'selected' : '' }}>
                        {{ $tipo->descripcion }}
                    </option>
                @endforeach
            </select>
        </div>
    </div>

    {{-- NOMBRES --}}
    <div class="col-md-6">
        <div class="form-group">
            <label>Nombres</label>
            <input type="text" name="nombres" class="form-control"
                value="{{ old('nombres', $cliente?->nombres) }}">
        </div>
    </div>

    {{-- APELLIDOS --}}
    <div class="col-md-6">
        <div class="form-group">
            <label>Apellidos</label>
            <input type="text" name="apellidos" class="form-control"
                value="{{ old('apellidos', $cliente?->apellidos) }}">
        </div>
    </div>

    {{-- DIRECCION --}}
    <div class="col-md-6">
        <div class="form-group">
            <label>Dirección</label>
            <input type="text" name="direccion" class="form-control"
                value="{{ old('direccion', $cliente?->direccion) }}">
        </div>
    </div>

    {{-- CIUDAD --}}
    <div class="col-md-6">
        <div class="form-group">
            <label>Ciudad</label>
            <select name="ciudad_id" class="form-control select2">
                <option value="">-- Seleccione --</option>
                @foreach($ciudades as $ciudad)
                    <option value="{{ $ciudad->id }}"
                        {{ old('ciudad_id', $cliente?->ciudad_id) == $ciudad->id ? 'selected' : '' }}>
                        {{ $ciudad->nombre_ciudad }}
                    </option>
                @endforeach
            </select>
        </div>
    </div>

    {{-- TELEFONO --}}
    <div class="col-md-6">
        <div class="form-group">
            <label>Teléfono</label>
            <input type="text" name="telefono" class="form-control"
                value="{{ old('telefono', $cliente?->telefono) }}">
        </div>
    </div>

</div>

<div class="text-right">
    <button class="btn btn-primary">
        <i class="fas fa-save"></i> Guardar
    </button>
</div>
