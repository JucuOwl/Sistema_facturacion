<?php

namespace App\Http\Controllers;

use App\Models\Articulo;
use App\Models\TipoArticulo;
use App\Models\Proveedore;
use App\Http\Requests\ArticuloRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class ArticuloController extends Controller
{
    public function index(Request $request): View
    {
        $articulos = Articulo::with(['tipoArticulo', 'proveedor'])->paginate(10);

        return view('articulo.index', compact('articulos'))
            ->with('i', ($request->input('page', 1) - 1) * $articulos->perPage());
    }

    public function create(): View
    {
        return view('articulo.create', [
            'articulo' => new Articulo(),
            'tipos' => TipoArticulo::orderBy('descripcion_articulo')->get(),
            'proveedores' => Proveedore::orderBy('nombre')->get(),
        ]);
    }

    public function store(ArticuloRequest $request)
    {
        Articulo::create($request->validated());

        return Redirect::route('articulos.index')
            ->with('success', 'Artículo creado correctamente.');
    }

    public function edit($id): View
    {
        return view('articulo.edit', [
            'articulo' => Articulo::findOrFail($id),
            'tipos' => TipoArticulo::orderBy('descripcion_articulo')->get(),
            'proveedores' => Proveedore::orderBy('nombre')->get(),
        ]);
    }

    public function update(ArticuloRequest $request, Articulo $articulo)
    {
        $articulo->update($request->validated());

        return Redirect::route('articulos.index')
            ->with('success', 'Artículo actualizado correctamente.');
    }

    public function destroy($id)
    {
        Articulo::findOrFail($id)->delete();

        return Redirect::route('articulos.index')
            ->with('success', 'Artículo eliminado correctamente.');
    }
}
