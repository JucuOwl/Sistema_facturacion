<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Models\Ciudade;
use App\Models\TipoDocumento;
use Illuminate\Http\Request;
use App\Http\Requests\ClienteRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class ClienteController extends Controller
{
    public function index(Request $request): View
    {
        $clientes = Cliente::with('ciudad')->paginate(10);

        return view('cliente.index', compact('clientes'));
    }

    public function create(): View
    {
        return view('cliente.create', [
            'cliente' => new Cliente(),
            'ciudades' => Ciudade::orderBy('nombre_ciudad')->get(),
            'tiposDocumento' => TipoDocumento::orderBy('descripcion')->get(),
        ]);
    }

    public function store(ClienteRequest $request)
    {
        Cliente::create($request->validated());

        return Redirect::route('clientes.index')
            ->with('success', 'Cliente registrado correctamente.');
    }

    public function show($id): View
    {
        $cliente = Cliente::with('ciudad')->findOrFail($id);

        return view('cliente.show', compact('cliente'));
    }

    public function edit($id): View
    {
        return view('cliente.edit', [
            'cliente' => Cliente::findOrFail($id),
            'ciudades' => Ciudade::orderBy('nombre_ciudad')->get(),
            'tiposDocumento' => TipoDocumento::orderBy('descripcion')->get(),
        ]);
    }

    public function update(ClienteRequest $request, Cliente $cliente)
    {
        $cliente->update($request->validated());

        return Redirect::route('clientes.index')
            ->with('success', 'Cliente actualizado correctamente.');
    }

    public function destroy($id)
    {
        Cliente::findOrFail($id)->delete();

        return Redirect::route('clientes.index')
            ->with('success', 'Cliente eliminado correctamente.');
    }
}
