<?php

namespace App\Http\Controllers;

use App\Models\Proveedore;
use App\Models\TipoDocumento;
use App\Models\Ciudade;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use App\Http\Requests\ProveedoreRequest;

class ProveedoreController extends Controller
{
    public function index(Request $request): View
    {
        $proveedores = Proveedore::paginate(20);
        return view('proveedore.index', compact('proveedores'))
            ->with('i', ($request->input('page', 1) - 1) * 20);
    }

    public function create(): View
    {
        $proveedore = new Proveedore();
        $tiposDocumento = TipoDocumento::all();
        $ciudades = Ciudade::all();
        return view('proveedore.create', compact('proveedore', 'tiposDocumento', 'ciudades'));
    }

    public function store(ProveedoreRequest $request): RedirectResponse
    {
        Proveedore::create($request->validated());
        return Redirect::route('proveedores.index')->with('success', 'Proveedor creado correctamente.');
    }

    public function show($id): View
    {
        $proveedore = Proveedore::findOrFail($id);
        return view('proveedore.show', compact('proveedore'));
    }

    public function edit($id): View
    {
        $proveedore = Proveedore::findOrFail($id);
        $tiposDocumento = TipoDocumento::all();
        $ciudades = Ciudade::all();
        return view('proveedore.edit', compact('proveedore', 'tiposDocumento', 'ciudades'));
    }

    public function update(ProveedoreRequest $request, Proveedore $proveedore): RedirectResponse
    {
        $proveedore->update($request->validated());
        return Redirect::route('proveedores.index')->with('success', 'Proveedor actualizado correctamente.');
    }

    public function destroy($id): RedirectResponse
    {
        Proveedore::findOrFail($id)->delete();
        return Redirect::route('proveedores.index')->with('success', 'Proveedor eliminado correctamente.');
    }
}
