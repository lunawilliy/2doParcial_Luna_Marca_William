<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreSitioRequest;
use App\Http\Requests\UpdateSitioRequest;
use App\Models\Sitio;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class SitioController extends Controller
{
    public function index(Request $request): View
    {
        $query = auth()->user()->sitios();

        if ($request->filled('buscar')) {
            $query->where('titulo', 'ilike', '%' . $request->buscar . '%');
        }

        if ($request->filled('categoria')) {
            $query->where('categoria', $request->categoria);
        }

        $sitios = $query->latest()->get();

        return view('sitios.index', compact('sitios'));
    }

    public function create(): View
    {
        return view('sitios.create');
    }

    public function store(StoreSitioRequest $request): RedirectResponse
    {
        $data = $request->validated();
        $data['destacado'] = $request->boolean('destacado');

        auth()->user()->sitios()->create($data);

        return redirect()->route('sitios.index')->with('success', 'Sitio creado correctamente.');
    }

    public function edit(Sitio $sitio): View
    {
        abort_unless($sitio->user_id === auth()->id(), 403);
        return view('sitios.edit', compact('sitio'));
    }

    public function update(UpdateSitioRequest $request, Sitio $sitio): RedirectResponse
    {
        abort_unless($sitio->user_id === auth()->id(), 403);

        $data = $request->validated();
        $data['destacado'] = $request->boolean('destacado');

        $sitio->update($data);

        return redirect()->route('sitios.index')->with('success', 'Sitio actualizado correctamente.');
    }

    public function destroy(Sitio $sitio): RedirectResponse
    {
        abort_unless($sitio->user_id === auth()->id(), 403);
        $sitio->delete();

        return redirect()->route('sitios.index')->with('success', 'Sitio eliminado correctamente.');
    }
}
