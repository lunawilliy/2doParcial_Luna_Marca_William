@extends('layouts.app')

@section('content')
<div class="max-w-xl mx-auto">
    <div class="mb-4"><a href="{{ route('productos.index') }}" class="text-xs text-slate-400 hover:text-white">← Volver al catálogo</a></div>
    
    <div class="bg-slate-900 border border-slate-800 p-6 rounded-2xl shadow-xl">
        <span class="text-[10px] font-bold bg-slate-800 px-2 py-1 rounded border border-slate-700 text-amber-400 uppercase tracking-wider">Detalle del Elemento</span>
        <h1 class="text-2xl font-bold text-white mt-3 mb-2">{{ $producto->nombre }}</h1>
        <p class="text-xs text-slate-400 mb-6">SKU Único del sistema: <span class="text-slate-200 font-mono">{{ $producto->sku }}</span></p>

        <div class="space-y-3 text-sm border-t border-slate-800/80 pt-4 mb-6">
            <div class="flex justify-between"><span class="text-slate-400">Categoría Asociada:</span> <span class="font-semibold text-white">{{ $producto->categoria->nombre }}</span></div>
            <div class="flex justify-between"><span class="text-slate-400">Precio Comercial:</span> <span class="font-semibold text-emerald-400">Bs. {{ number_format($producto->precio, 2) }}</span></div>
            <div class="flex justify-between"><span class="text-slate-400">Inventario en Almacén:</span> <span class="font-semibold text-white">{{ $producto->stock }} unidades</span></div>
            <div class="flex justify-between"><span class="text-slate-400">Estado de Suministro:</span> <span class="font-semibold {{ $producto->stock > 0 ? 'text-teal-400' : 'text-rose-400' }}">{{ $producto->stock > 0 ? 'Disponible' : 'Agotado sin stock' }}</span></div>
        </div>

        <div class="flex justify-end gap-3 pt-4 border-t border-slate-800/60">
            <a href="{{ route('productos.edit', $producto) }}" class="bg-slate-800 hover:bg-slate-700 text-white font-semibold px-4 py-2 rounded-xl text-xs transition-colors">Modificar</a>
        </div>
    </div>
</div>
@endsection