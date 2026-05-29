@extends('layouts.app') {{-- O el nombre de tu layout maestro --}}

@section('content')
<div class="container mt-5">
    <div class="card bg-dark text-white border-secondary" style="max-width: 600px; margin: 0 auto;">
        <div class="card-header border-secondary d-flex justify-content-between align-items-center">
            <h4 class="text-warning mb-0">Detalles del Artículo</h4>
            <span class="badge bg-success">ID: #{{ str_pad($producto->id, 4, '0', STR_PAD_LEFT) }}</span>
        </div>
        <div class="card-body">
            <div class="mb-3">
                <label class="text-secondary small d-block">NOMBRE DEL PRODUCTO</label>
                <h5 class="fw-bold">{{ $producto->nombre }}</h5>
            </div>

            <div class="mb-3">
                <label class="text-secondary small d-block">SKU / CÓDIGO</label>
                <p class="text-light font-monospace">{{ $producto->sku ?? 'N/A' }}</p>
            </div>

            <div class="mb-3">
                <label class="text-secondary small d-block">CATEGORÍA</label>
                <div>
                    <span class="badge bg-info text-dark fw-bold">{{ $producto->categoria->nombre }}</span>
                </div>
            </div>

            <div class="row">
                <div class="col-6 mb-3">
                    <label class="text-secondary small d-block">PRECIO UNITARIO</label>
                    <p class="text-warning fw-bold fs-5">Bs. {{ number_format($producto->precio, 2) }}</p>
                </div>
                <div class="col-6 mb-3">
                    <label class="text-secondary small d-block">STOCK DISPONIBLE</label>
                    <p class="{{ $producto->stock > 0 ? 'text-light' : 'text-danger fw-bold' }}">
                        {{ $producto->stock }} unidades
                    </p>
                </div>
            </div>
        </div>
        <div class="card-footer border-secondary text-end">
            <a href="{{ route('productos.index') }}" class="btn btn-outline-warning btn-sm">
                Volver al Inventario
            </a>
        </div>
    </div>
</div>
@endsection