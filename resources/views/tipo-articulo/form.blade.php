<div class="row padding-1 p-1">
    <div class="col-md-12">
        
        <div class="form-group mb-2 mb20">
            <label for="descripcion_articulo" class="form-label">{{ __('Descripcion Articulo') }}</label>
            <input type="text" name="descripcion_articulo" class="form-control @error('descripcion_articulo') is-invalid @enderror" value="{{ old('descripcion_articulo', $tipoArticulo?->descripcion_articulo) }}" id="descripcion_articulo" placeholder="Descripcion Articulo">
            {!! $errors->first('descripcion_articulo', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>

    </div>
    <div class="col-md-12 mt20 mt-2">
        <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
    </div>
</div>