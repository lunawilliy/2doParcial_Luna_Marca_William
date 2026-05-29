@extends('layouts.app')

@section('content')
<div class="space-y-6">

    <!-- Tarjetas de Métricas en Tonos Pastel Orgánicos -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-5">
        <div class="bg-white p-5 border border-emerald-100 rounded-2xl shadow-2xs flex items-center justify-between">
            <div>
                <p class="text-[11px] font-bold text-slate-400 uppercase tracking-wider">Total Productos</p>
                <h3 class="text-2xl font-extrabold text-slate-800 mt-0.5">{{ $productos->count() }}</h3>
            </div>
            <div class="w-10 h-10 bg-emerald-50 text-emerald-600 rounded-xl flex items-center justify-center font-bold border border-emerald-100 text-xs">
                Cant.
            </div>
        </div>
        <div class="bg-white p-5 border border-amber-100 rounded-2xl shadow-2xs flex items-center justify-between">
            <div>
                <p class="text-[11px] font-bold text-slate-400 uppercase tracking-wider">Moneda Comercial</p>
                <h3 class="text-2xl font-extrabold text-amber-700 mt-0.5">Bolivianos</h3>
            </div>
            <div class="w-10 h-10 bg-amber-50 text-amber-700 rounded-xl flex items-center justify-center font-bold border border-amber-100 text-xs">
                Bs.
            </div>
        </div>
        <div class="bg-white p-5 border border-emerald-100 rounded-2xl shadow-2xs flex items-center justify-between">
            <div>
                <p class="text-[11px] font-bold text-slate-400 uppercase tracking-wider">Estado Servidor</p>
                <h3 class="text-2xl font-extrabold text-emerald-500 mt-0.5">Activo</h3>
            </div>
            <div class="w-10 h-10 bg-emerald-50 text-emerald-500 rounded-xl flex items-center justify-center font-bold border border-emerald-100 text-xs">
                OK
            </div>
        </div>
    </div>

    <!-- Bloque de la Tabla de Datos -->
    <div class="bg-white border border-slate-200 rounded-2xl shadow-xs overflow-hidden">
        
        <!-- Encabezado Limpio con botón café pastel -->
        <div class="p-6 border-b border-slate-200 sm:flex sm:items-center sm:justify-between bg-slate-50/50">
            <div>
                <h1 class="text-lg font-bold text-slate-800 tracking-tight">Inventario de Productos Registrados</h1>
                <p class="mt-0.5 text-xs text-slate-400 font-medium">Información completa de ítems disponibles, precios y categorías asociadas en el sistema.</p>
            </div>
            <div class="mt-4 sm:mt-0">
                <a href="{{ route('productos.create') }}" class="inline-flex items-center justify-center px-4 py-2.5 bg-amber-700 hover:bg-amber-800 text-white text-xs font-bold uppercase tracking-wider rounded-xl shadow-xs transition-all border border-amber-800">
                    Registrar Artículo
                </a>
            </div>
        </div>

        <!-- Tabla Clara y Espaciosa -->
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="bg-[#fcfdfc] text-slate-500 text-[11px] font-bold uppercase tracking-wider border-b border-slate-200">
                        <th class="py-3.5 px-6 text-emerald-700">ID</th>
                        <th class="py-3.5 px-6">Detalles del Ítem</th>
                        <th class="py-3.5 px-6">Categoría</th>
                        <th class="py-3.5 px-6 text-right">Precio Unitario</th>
                        <th class="py-3.5 px-6 text-center">Operaciones</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100 text-sm bg-white">
                    @forelse($productos as $producto)
                        <tr class="hover:bg-emerald-50/20 transition-colors">
                            <td class="py-4 px-6 font-mono text-xs font-semibold text-slate-400">
                                #{{ str_pad($producto->id, 4, '0', STR_PAD_LEFT) }}
                            </td>
                            <td class="py-4 px-6">
                                <div class="font-bold text-slate-800 text-sm">{{ $producto->nombre }}</div>
                                @if($producto->descripcion)
                                    <div class="text-[11px] text-slate-400 max-w-xs truncate mt-0.5">{{ $producto->descripcion }}</div>
                                @endif
                            </td>
                            <td class="py-4 px-6">
                                <span class="inline-flex items-center px-2.5 py-1 rounded-lg text-xs font-bold bg-emerald-50 text-emerald-700 border border-emerald-100">
                                    {{ $producto->categoria->nombre ?? 'General' }}
                                </span>
                            </td>
                            <td class="py-4 px-6 text-right font-bold text-amber-800">
                                Bs. {{ number_format($producto->precio, 2) }}
                            </td>
                            <td class="py-4 px-6 text-center">
                                <div class="flex items-center justify-center space-x-2">
                                <a href="{{ route('productos.show', $producto->id) }}" class="btn btn-sm btn-outline-info me-1">
        Ver
    </a>    
                                <a href="{{ route('productos.edit', $producto->id) }}" class="inline-flex items-center px-3 py-1.5 border border-amber-200 text-xs font-bold rounded-lg text-amber-800 bg-amber-50/50 hover:bg-amber-100 transition-all shadow-3xs">
                                        Editar
                                    </a>
                                    <form action="{{ route('productos.destroy', $producto->id) }}" method="POST" onsubmit="return confirm('¿Está seguro de eliminar este ítem?')" class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="inline-flex items-center px-3 py-1.5 text-xs font-semibold rounded-lg text-red-500 bg-red-50 hover:bg-red-100 transition-all cursor-pointer">
                                            Eliminar
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="py-16 text-center">
                                <div class="text-slate-400 text-sm font-semibold">El inventario se encuentra vacío</div>
                                <div class="text-xs text-slate-400 mt-0.5">Use el botón superior para incorporar nuevos elementos al sistema.</div>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <!-- Paginación -->
        @if(method_exists($productos, 'links') && $productos->hasPages())
            <div class="p-4 border-t border-slate-200 bg-slate-50/50">
                {{ $productos->links() }}
            </div>
        @endif
    </div>
</div>
@endsection