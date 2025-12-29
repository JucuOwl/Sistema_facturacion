<?php

namespace App\Http\Controllers;

use App\Models\TipoDocumento;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\TipoDocumentoRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class TipoDocumentoController extends Controller
{
    public function index(Request $request): View
    {
        $tipoDocumentos = TipoDocumento::paginate(10);

        return view('tipo-documento.index', compact('tipoDocumentos'))
            ->with('i', ($request->input('page', 1) - 1) * $tipoDocumentos->perPage());
    }

    public function create(): View
    {
        $tipoDocumento = new TipoDocumento();

        return view('tipo-documento.create', compact('tipoDocumento'));
    }

    public function store(TipoDocumentoRequest $request): RedirectResponse
    {
        TipoDocumento::create($request->validated());

        return Redirect::route('tipo-documentos.index')
            ->with('success', 'Tipo de documento creado correctamente.');
    }

    public function show($id): View
    {
        $tipoDocumento = TipoDocumento::findOrFail($id);

        return view('tipo-documento.show', compact('tipoDocumento'));
    }

    public function edit($id): View
    {
        $tipoDocumento = TipoDocumento::findOrFail($id);

        return view('tipo-documento.edit', compact('tipoDocumento'));
    }

    public function update(TipoDocumentoRequest $request, TipoDocumento $tipoDocumento): RedirectResponse
    {
        $tipoDocumento->update($request->validated());

        return Redirect::route('tipo-documentos.index')
            ->with('success', 'Tipo de documento actualizado correctamente.');
    }

    public function destroy($id): RedirectResponse
    {
        TipoDocumento::findOrFail($id)->delete();

        return Redirect::route('tipo-documentos.index')
            ->with('success', 'Tipo de documento eliminado correctamente.');
    }
}
