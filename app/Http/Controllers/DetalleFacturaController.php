<?php

namespace App\Http\Controllers;

use App\Models\DetalleFactura;
use App\Models\Factura;
use App\Models\Articulo;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\DetalleFacturaRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class DetalleFacturaController extends Controller
{
    public function index(Request $request): View
    {
        $detalleFacturas = DetalleFactura::with(['factura', 'articulo'])
            ->paginate(10);

        return view('detalle-factura.index', compact('detalleFacturas'))
            ->with('i', ($request->input('page', 1) - 1) * $detalleFacturas->perPage());
    }

    public function create(): View
    {
        return view('detalle-factura.create', [
            'detalleFactura' => new DetalleFactura(),
            'facturas' => Factura::orderBy('id', 'desc')->get(),
            'articulos' => Articulo::orderBy('descripcion')->get(),
        ]);
    }

    public function store(DetalleFacturaRequest $request): RedirectResponse
    {
        DetalleFactura::create($request->validated());

        return Redirect::route('detalle-facturas.index')
            ->with('success', 'Detalle de factura registrado correctamente.');
    }

    public function show($id): View
    {
        $detalleFactura = DetalleFactura::with(['factura', 'articulo'])
            ->findOrFail($id);

        return view('detalle-factura.show', compact('detalleFactura'));
    }

    public function edit($id): View
    {
        return view('detalle-factura.edit', [
            'detalleFactura' => DetalleFactura::findOrFail($id),
            'facturas' => Factura::orderBy('id', 'desc')->get(),
            'articulos' => Articulo::orderBy('descripcion')->get(),
        ]);
    }

    public function update(
        DetalleFacturaRequest $request,
        DetalleFactura $detalleFactura
    ): RedirectResponse {
        $detalleFactura->update($request->validated());

        return Redirect::route('detalle-facturas.index')
            ->with('success', 'Detalle de factura actualizado correctamente.');
    }

    public function destroy($id): RedirectResponse
    {
        DetalleFactura::findOrFail($id)->delete();

        return Redirect::route('detalle-facturas.index')
            ->with('success', 'Detalle de factura eliminado correctamente.');
    }
}
