<?php

namespace App\Http\Controllers;

use App\Models\Factura;
use App\Models\Cliente;
use App\Models\FormaPago;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use App\Http\Requests\FacturaRequest;

class FacturaController extends Controller
{
    public function index(Request $request): View
    {
        $facturas = Factura::with(['cliente', 'formaPago'])
            ->paginate(10);

        return view('factura.index', compact('facturas'))
            ->with('i', ($request->input('page', 1) - 1) * $facturas->perPage());
    }

    public function create(): View
    {
        $factura = new Factura();

        $clientes = Cliente::orderBy('nombres')->get();

        // ✅ COLUMNA REAL DE TU BD
        $formasPago = FormaPago::orderBy('descripcion_formapago')->get();

        return view('factura.create', compact(
            'factura',
            'clientes',
            'formasPago'
        ));
    }

    public function store(FacturaRequest $request): RedirectResponse
    {
        Factura::create($request->validated());

        return Redirect::route('facturas.index')
            ->with('success', 'Factura creada correctamente.');
    }

    public function show(int $id): View
    {
        $factura = Factura::findOrFail($id);

        return view('factura.show', compact('factura'));
    }

    public function edit(int $id): View
    {
        $factura = Factura::findOrFail($id);
        $clientes = Cliente::orderBy('nombres')->get();
        $formasPago = FormaPago::orderBy('descripcion_formapago')->get();

        return view('factura.edit', compact(
            'factura',
            'clientes',
            'formasPago'
        ));
    }

    public function update(FacturaRequest $request, Factura $factura): RedirectResponse
    {
        $factura->update($request->validated());

        return Redirect::route('facturas.index')
            ->with('success', 'Factura actualizada correctamente.');
    }

    public function destroy(int $id): RedirectResponse
    {
        Factura::findOrFail($id)->delete();

        return Redirect::route('facturas.index')
            ->with('success', 'Factura eliminada correctamente.');
    }
}
