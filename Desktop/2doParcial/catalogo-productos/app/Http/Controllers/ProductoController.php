<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use App\Models\Categoria;
use App\Http\Requests\ProductoRequest;
use Illuminate\Http\Request;

class ProductoController extends Controller
{
    public function index()
    {
        // Eager loading para evitar el problema N+1 
        $productos = Producto::with('categoria')->get();
        return view('productos.index', compact('productos'));
    }

    public function create()
    {
        $categorias = Categoria::where('activo', true)->get();
        return view('productos.create', compact('categorias'));
    }

    public function store(ProductoRequest $request) // Validación inyectada [cite: 275]
    {
        Producto::create($request->validated());
        return redirect()->route('productos.index')->with('success', 'Producto creado exitosamente.'); // Mensaje flash [cite: 285]
    }

    public function show(Producto $producto)
    {
        return view('productos.show', compact('producto'));
    }

    public function edit(Producto $producto)
    {
        $categorias = Categoria::where('activo', true)->get();
        return view('productos.edit', compact('producto', 'categorias'));
    }

    public function update(ProductoRequest $request, Producto $producto) // Validación inyectada [cite: 275]
    {
        $producto->update($request->validated());
        return redirect()->route('productos.index')->with('success', 'Producto actualizado exitosamente.'); // Mensaje flash [cite: 285]
    }

    public function destroy(Producto $producto)
    {
        $producto->delete();
        return redirect()->route('productos.index')->with('success', 'Producto eliminado exitosamente.'); // Mensaje flash [cite: 285]
    }
}