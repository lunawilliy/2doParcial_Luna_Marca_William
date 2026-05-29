<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Catálogo Corporativo - INF560</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
</head>
<body class="bg-slate-950 text-slate-100 min-h-screen antialiased">
    <nav class="bg-slate-900 border-b border-slate-800 p-4 mb-8 shadow-md">
        <div class="container mx-auto max-w-6xl flex justify-between items-center">
            <a href="{{ route('productos.index') }}" class="text-lg font-bold tracking-tight text-white">
                📦 Sistema<span class="text-amber-400 font-extrabold">Inventario</span>
            </a>
            <span class="text-xs font-semibold px-3 py-1 bg-slate-800 text-slate-300 rounded-full border border-slate-700">UATF Examen</span>
        </div>
    </nav>

    <div class="container mx-auto max-w-6xl px-4 pb-12">
        @if(session('success'))
            <div class="bg-emerald-500/10 border border-emerald-500/30 text-emerald-400 p-4 mb-6 rounded-xl text-sm font-medium">
                ✨ {{ session('success') }}
            </div>
        @endif

        @yield('content')
    </div>
</body>
</html>