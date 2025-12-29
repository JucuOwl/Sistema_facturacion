<?php

namespace App\Http\Controllers;

use App\Models\Devolucione;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\DevolucioneRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class DevolucioneController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $devoluciones = Devolucione::paginate();

        return view('devolucione.index', compact('devoluciones'))
            ->with('i', ($request->input('page', 1) - 1) * $devoluciones->perPage());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $devolucione = new Devolucione();

        return view('devolucione.create', compact('devolucione'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(DevolucioneRequest $request): RedirectResponse
    {
        Devolucione::create($request->validated());

        return Redirect::route('devoluciones.index')
            ->with('success', 'Devolucione created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id): View
    {
        $devolucione = Devolucione::find($id);

        return view('devolucione.show', compact('devolucione'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id): View
    {
        $devolucione = Devolucione::find($id);

        return view('devolucione.edit', compact('devolucione'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(DevolucioneRequest $request, Devolucione $devolucione): RedirectResponse
    {
        $devolucione->update($request->validated());

        return Redirect::route('devoluciones.index')
            ->with('success', 'Devolucione updated successfully');
    }

    public function destroy($id): RedirectResponse
    {
        Devolucione::find($id)->delete();

        return Redirect::route('devoluciones.index')
            ->with('success', 'Devolucione deleted successfully');
    }
}
