@extends('layouts.app')

@section('content')
<div class="flex justify-between items-center mb-6">
    <div>
        <h1 class="text-2xl font-bold text-white">Catálogo de Productos</h1>
        <p class="text-sm text-slate-400">Control de inventario persistente y asignación de categorías.</p>
    </div>
    <a href="{{ route('productos.create') }}" class="bg-amber-400 hover:bg-amber-500 text-slate-950 font-bold px-4 py-2 rounded-xl text-sm transition-all shadow-md">
        + Nuevo Producto
    </a>
</div>

<div class="bg-slate-900 border border-slate-800 rounded-2xl overflow-hidden shadow-xl">
    <table class="w-full text-left border-collapse">
        <thead>
            <tr class="bg-slate-950 border-b border-slate-800 text-xs font-bold text-slate-400 uppercase tracking-wider">
                <th class="p-4">Nombre</th>
                <th class="p-4">SKU</th>
                <th class="p-4">Categoría</th>
                <th class="p-4">Precio</th>
                <th class="p-4">Stock</th>
                <th class="p-4 text-center">Acciones</th>
            </tr>
        </thead>
        <tbody class="text-sm text-slate-300 divide-y divide-slate-800/60">
            @forelse($productos as $prod)
                <tr class="hover:bg-slate-800/30 transition-colors">
                    <td class="p-4 font-semibold text-white">{{ $prod->nombre }}</td>
                    <td class="p-4"><code class="text-amber-400 text-xs">{{ $prod->sku }}</code></td>
                    <td class="p-4"><span class="px-2 py-0.5 bg-slate-800 text-slate-300 rounded border border-slate-700 text-xs">{{ $prod->categoria->nombre }}</span></td>
                    <td class="p-4">Bs. {{ number_format($prod->precio, 2) }}</td>
                    <td class="p-4">
                        <span class="{{ $prod->stock == 0 ? 'text-rose-400 font-bold' : '' }}">
                            {{ $prod->stock }} u.
                        </span>
                    </td>
                    <td class="p-4 text-center">
                        <div class="flex justify-center items-center space-x-3 text-xs">
                            <a href="{{ route('productos.show', $prod) }}" class="text-slate-400 hover:text-white transition-colors">Ver</a>
                            <a href="{{ route('productos.edit', $prod) }}" class="text-amber-400 hover:text-amber-300 transition-colors">Editar</a>
                            <form action="{{ route('productos.destroy', $prod) }}" method="POST" onsubmit="return confirm('¿Confirma que desea eliminar permanentemente este producto del inventario?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-rose-500 hover:text-rose-400 font-semibold cursor-pointer">Eliminar</button>
                            </form>
                        </div>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="6" class="text-center p-8 text-slate-500">No existen registros en el inventario actual.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection