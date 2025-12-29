<?php

namespace App\Http\Controllers;

use App\Models\FormaPago;
use Illuminate\Http\Request;
use App\Http\Requests\FormaPagoRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class FormaPagoController extends Controller
{
    public function index(Request $request): View
    {
        $formaPagos = FormaPago::paginate();

        return view('forma-pago.index', compact('formaPagos'))
            ->with('i', ($request->input('page', 1) - 1) * $formaPagos->perPage());
    }

    public function create(): View
    {
        $formaPago = new FormaPago();

        return view('forma-pago.create', compact('formaPago'));
    }

    public function store(FormaPagoRequest $request): RedirectResponse
    {
        FormaPago::create($request->validated());

        return Redirect::route('forma-pagos.index')
            ->with('success', 'Forma de pago creada correctamente.');
    }

    public function show($id): View
    {
        $formaPago = FormaPago::findOrFail($id);

        return view('forma-pago.show', compact('formaPago'));
    }

    public function edit($id): View
    {
        $formaPago = FormaPago::findOrFail($id);

        return view('forma-pago.edit', compact('formaPago'));
    }

    public function update(FormaPagoRequest $request, FormaPago $formaPago): RedirectResponse
    {
        $formaPago->update($request->validated());

        return Redirect::route('forma-pagos.index')
            ->with('success', 'Forma de pago actualizada correctamente.');
    }

    public function destroy($id): RedirectResponse
    {
        FormaPago::findOrFail($id)->delete();

        return Redirect::route('forma-pagos.index')
            ->with('success', 'Forma de pago eliminada correctamente.');
    }
}
