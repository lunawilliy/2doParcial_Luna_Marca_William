@extends('layouts.app')

@section('content')
<div class="max-w-xl mx-auto">
    <div class="mb-4"><a href="{{ route('productos.index') }}" class="text-xs text-slate-400 hover:text-white">← Regresar al catálogo</a></div>
    <h1 class="text-xl font-bold text-white mb-6">Registrar Producto</h1>

    <div class="bg-slate-900 border border-slate-800 p-6 rounded-2xl shadow-xl">
        <form action="{{ route('productos.store') }}" method="POST">
            @csrf

            <div class="mb-4">
                <label class="block text-xs font-semibold text-slate-400 uppercase tracking-wider mb-1.5">Nombre del Producto:</label>
                <input type="text" name="nombre" value="{{ old('nombre') }}" class="w-full bg-slate-950 p-2.5 rounded-xl border border-slate-800 focus:outline-none focus:border-amber-400 text-sm">
                @error('nombre') <span class="text-rose-400 text-xs mt-1 block">⚠️ {{ $message }}</span> @enderror
            </div>

            <div class="mb-4">
                <label class="block text-xs font-semibold text-slate-400 uppercase tracking-wider mb-1.5">Código SKU:</label>
                <input type="text" name="sku" value="{{ old('sku') }}" class="w-full bg-slate-950 p-2.5 rounded-xl border border-slate-800 focus:outline-none focus:border-amber-400 text-sm">
                @error('sku') <span class="text-rose-400 text-xs mt-1 block">⚠️ {{ $message }}</span> @enderror
            </div>

            <div class="mb-4">
                <label class="block text-xs font-semibold text-slate-400 uppercase tracking-wider mb-1.5">Categoría Relacionada:</label>
                <select name="categoria_id" class="w-full bg-slate-950 p-2.5 rounded-xl border border-slate-800 focus:outline-none focus:border-amber-400 text-sm">
                    <option value="">-- Seleccionar categoría padre --</option>
                    @foreach($categorias as $cat)
                        <option value="{{ $cat->id }}" {{ old('categoria_id') == $cat->id ? 'selected' : '' }}>{{ $cat->nombre }}</option>
                    @endforeach
                </select>
                @error('categoria_id') <span class="text-rose-400 text-xs mt-1 block">⚠️ {{ $message }}</span> @enderror
            </div>

            <div class="grid grid-cols-2 gap-4 mb-6">
                <div>
                    <label class="block text-xs font-semibold text-slate-400 uppercase tracking-wider mb-1.5">Precio (Bs.):</label>
                    <input type="number" name="precio" step="0.01" value="{{ old('precio') }}" class="w-full bg-slate-950 p-2.5 rounded-xl border border-slate-800 focus:outline-none focus:border-amber-400 text-sm">
                    @error('precio') <span class="text-rose-400 text-xs mt-1 block">⚠️ {{ $message }}</span> @enderror
                </div>
                <div>
                    <label class="block text-xs font-semibold text-slate-400 uppercase tracking-wider mb-1.5">Stock disponible:</label>
                    <input type="number" name="stock" value="{{ old('stock') }}" class="w-full bg-slate-950 p-2.5 rounded-xl border border-slate-800 focus:outline-none focus:border-amber-400 text-sm">
                    @error('stock') <span class="text-rose-400 text-xs mt-1 block">⚠️ {{ $message }}</span> @enderror
                </div>
            </div>

            <button type="submit" class="w-full bg-amber-400 hover:bg-amber-500 text-slate-950 font-bold py-2.5 rounded-xl text-sm transition-all shadow-md">
                Guardar e Insertar Registro
            </button>
        </form>
    </div>
</div>
@endsection