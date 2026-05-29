<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de Gestión - Catálogo de Productos</title>
    <!-- Tailwind CSS -->
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <!-- Google Fonts: Plus Jakarta Sans -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Plus Jakarta Sans', sans-serif; background-color: #f7f9f7 !important; }
    </style>
</head>
<body class="bg-[#f7f9f7] text-slate-700 flex flex-col min-h-screen">

    <!-- Barra de Navegación Verde Menta Pastel -->
    <nav class="bg-white border-b border-emerald-100 sticky top-0 z-50 shadow-xs">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16">
                <div class="flex items-center space-x-3">
                    <div class="w-9 h-9 bg-emerald-50 rounded-xl flex items-center justify-center text-emerald-600 font-extrabold text-sm border border-emerald-100">
                        CP
                    </div>
                    <div>
                        <span class="text-base font-bold tracking-tight text-slate-800">Catálogo de Productos</span>
                        <p class="text-[10px] text-emerald-600 font-bold tracking-wider uppercase">UATF - Gestión Académica</p>
                    </div>
                </div>
                <div class="flex items-center space-x-4">
                    <a href="{{ route('productos.index') }}" class="text-xs font-bold uppercase tracking-wider text-amber-800 bg-amber-50 px-4 py-2 rounded-xl hover:bg-amber-100 transition-all border border-amber-200 shadow-3xs">
                        Inicio
                    </a>
                </div>
            </div>
        </div>
    </nav>

    <!-- Contenido Principal -->
    <main class="flex-grow max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8 w-full">
        <!-- Notificaciones -->
        @if(session('success'))
            <div class="mb-6 p-4 bg-emerald-50 border border-emerald-200 rounded-2xl text-emerald-800 text-sm flex items-center justify-between shadow-xs">
                <div class="flex items-center space-x-3">
                    <div class="w-2 h-2 rounded-full bg-emerald-400 ring-4 ring-emerald-100"></div>
                    <p class="font-semibold">{{ session('success') }}</p>
                </div>
                <button onclick="this.parentElement.remove()" class="text-emerald-500 hover:text-emerald-700 text-xs font-bold uppercase tracking-wider ml-4 cursor-pointer">Cerrar</button>
            </div>
        @endif

        @yield('content')
    </main>

    <!-- Pie de Página -->
    <footer class="bg-white border-t border-slate-100 py-5 mt-auto">
        <div class="max-w-7xl mx-auto px-4 text-center text-xs text-slate-400 font-semibold tracking-wide">
            &copy; {{ date('Y') }} &bull; Ingeniería Informática &bull; Sistema de Control Local
        </div>
    </footer>

</body>
</html>