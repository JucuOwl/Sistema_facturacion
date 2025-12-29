<div class="row padding-1 p-1">
    <div class="col-md-12">

        {{-- No Documento --}}
        <div class="form-group mb-2">
            <label for="no_documento" class="form-label">{{ __('No Documento') }}</label>
            <input type="text" name="no_documento" class="form-control @error('no_documento') is-invalid @enderror" 
                   value="{{ old('no_documento', $proveedore?->no_documento) }}" id="no_documento" placeholder="No Documento">
            @error('no_documento')
                <div class="invalid-feedback"><strong>{{ $message }}</strong></div>
            @enderror
        </div>

        {{-- Tipo Documento --}}
        <div class="form-group mb-2">
            <label for="tipo_documento_id" class="form-label">{{ __('Tipo Documento') }}</label>
            <select name="tipo_documento_id" id="tipo_documento_id" class="form-control @error('tipo_documento_id') is-invalid @enderror">
                <option value="">Seleccione tipo documento</option>
                @foreach($tiposDocumento as $tipo)
                    <option value="{{ $tipo->id }}" 
                        {{ old('tipo_documento_id', $proveedore?->tipo_documento_id) == $tipo->id ? 'selected' : '' }}>
                        {{ $tipo->descripcion }}
                    </option>
                @endforeach
            </select>
            @error('tipo_documento_id')
                <div class="invalid-feedback"><strong>{{ $message }}</strong></div>
            @enderror
        </div>

        {{-- Nombre --}}
        <div class="form-group mb-2">
            <label for="nombre" class="form-label">{{ __('Nombre') }}</label>
            <input type="text" name="nombre" class="form-control @error('nombre') is-invalid @enderror" 
                   value="{{ old('nombre', $proveedore?->nombre) }}" id="nombre" placeholder="Nombre">
            @error('nombre')
                <div class="invalid-feedback"><strong>{{ $message }}</strong></div>
            @enderror
        </div>

        {{-- Apellido --}}
        <div class="form-group mb-2">
            <label for="apellido" class="form-label">{{ __('Apellido') }}</label>
            <input type="text" name="apellido" class="form-control @error('apellido') is-invalid @enderror" 
                   value="{{ old('apellido', $proveedore?->apellido) }}" id="apellido" placeholder="Apellido">
            @error('apellido')
                <div class="invalid-feedback"><strong>{{ $message }}</strong></div>
            @enderror
        </div>

        {{-- Nombre Comercial --}}
        <div class="form-group mb-2">
            <label for="nombre_comercial" class="form-label">{{ __('Nombre Comercial') }}</label>
            <input type="text" name="nombre_comercial" class="form-control @error('nombre_comercial') is-invalid @enderror" 
                   value="{{ old('nombre_comercial', $proveedore?->nombre_comercial) }}" id="nombre_comercial" placeholder="Nombre Comercial">
            @error('nombre_comercial')
                <div class="invalid-feedback"><strong>{{ $message }}</strong></div>
            @enderror
        </div>

        {{-- Direccion --}}
        <div class="form-group mb-2">
            <label for="direccion" class="form-label">{{ __('Direccion') }}</label>
            <input type="text" name="direccion" class="form-control @error('direccion') is-invalid @enderror" 
                   value="{{ old('direccion', $proveedore?->direccion) }}" id="direccion" placeholder="Direccion">
            @error('direccion')
                <div class="invalid-feedback"><strong>{{ $message }}</strong></div>
            @enderror
        </div>

        {{-- Ciudad --}}
        <div class="form-group mb-2">
            <label for="ciudad_id" class="form-label">{{ __('Ciudad') }}</label>
            <select name="ciudad_id" id="ciudad_id" class="form-control @error('ciudad_id') is-invalid @enderror">
                <option value="">Seleccione ciudad</option>
                @foreach($ciudades as $ciudad)
                    <option value="{{ $ciudad->id }}" 
                        {{ old('ciudad_id', $proveedore?->ciudad_id) == $ciudad->id ? 'selected' : '' }}>
                        {{ $ciudad->nombre }}
                    </option>
                @endforeach
            </select>
            @error('ciudad_id')
                <div class="invalid-feedback"><strong>{{ $message }}</strong></div>
            @enderror
        </div>

        {{-- Telefono --}}
        <div class="form-group mb-2">
            <label for="telefono" class="form-label">{{ __('Telefono') }}</label>
            <input type="text" name="telefono" class="form-control @error('telefono') is-invalid @enderror" 
                   value="{{ old('telefono', $proveedore?->telefono) }}" id="telefono" placeholder="Telefono">
            @error('telefono')
                <div class="invalid-feedback"><strong>{{ $message }}</strong></div>
            @enderror
        </div>

    </div>

    <div class="col-md-12 mt-2">
        <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
    </div>
</div>
