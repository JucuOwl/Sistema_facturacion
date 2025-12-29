<?php

namespace App\Http\Controllers;

use App\Models\Ciudade;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class CiudadeController extends Controller
{
    public function index()
{
    $ciudades = Ciudade::paginate(10);

    // Definimos $i para la numeración en la vista
    return view('ciudade.index', compact('ciudades'))
        ->with('i', 0);
}


    public function create(): View
    {
        $ciudad = new Ciudade();
        return view('ciudade.create', compact('ciudad'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'codigo_ciudad' => 'required|string|max:10|unique:ciudades,codigo_ciudad',
            'nombre_ciudad' => 'required|string|max:255',
        ]);

        Ciudade::create($request->only('codigo_ciudad', 'nombre_ciudad'));

        return Redirect::route('ciudades.index')
            ->with('success', 'Ciudad creada correctamente.');
    }

    public function edit(Ciudade $ciudad): View
    {
        return view('ciudade.edit', compact('ciudad'));
    }

    public function update(Request $request, Ciudade $ciudad)
    {
        $request->validate([
            'codigo_ciudad' => 'required|string|max:10|unique:ciudades,codigo_ciudad,' . $ciudad->id,
            'nombre_ciudad' => 'required|string|max:255',
        ]);

        $ciudad->update($request->only('codigo_ciudad', 'nombre_ciudad'));

        return Redirect::route('ciudades.index')
            ->with('success', 'Ciudad actualizada correctamente.');
    }

    public function destroy(Ciudade $ciudad)
    {
        $ciudad->delete();

        return Redirect::route('ciudades.index')
            ->with('success', 'Ciudad eliminada correctamente.');
    }
}
