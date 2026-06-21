<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center gap-2">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7 text-purple-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
            </svg>
            <h2 class="font-bold text-2xl text-gray-800 leading-tight">
                {{ __('Nuevo sitio favorito') }}
            </h2>
        </div>
    </x-slot>

    <div class="py-12 bg-gradient-to-br from-slate-50 via-white to-purple-50/30">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white/80 backdrop-blur-sm shadow-2xl rounded-2xl border border-white/50 overflow-hidden transition-all duration-300 hover:shadow-purple-100/50">
                <div class="h-2 bg-gradient-to-r from-purple-500 via-pink-500 to-rose-500"></div>
                
                <div class="p-6 md:p-8">
                    <form method="POST" action="{{ route('sitios.store') }}">
                        @csrf

                        <div class="group">
                            <x-input-label for="titulo" :value="__('Título')" class="text-gray-700 font-semibold mb-1" />
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400 group-focus-within:text-purple-500 transition-colors" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 20h10M5 8h14M5 4h14M5 12h14" />
                                    </svg>
                                </div>
                                <x-text-input id="titulo" name="titulo" class="block mt-1 w-full pl-10 pr-4 py-3 border-gray-200 rounded-xl focus:border-purple-400 focus:ring-2 focus:ring-purple-200 transition-all duration-200" :value="old('titulo')" placeholder="Ej: GitHub" required />
                            </div>
                            <x-input-error :messages="$errors->get('titulo')" class="mt-2 text-sm text-red-500" />
                        </div>

                        <div class="mt-6 group">
                            <x-input-label for="url" :value="__('URL')" class="text-gray-700 font-semibold mb-1" />
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400 group-focus-within:text-purple-500 transition-colors" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.828 10.172a4 4 0 00-5.656 0l-4 4a4 4 0 105.656 5.656l1.102-1.101m-.758-4.899a4 4 0 005.656 0l4-4a4 4 0 00-5.656-5.656l-1.1 1.1" />
                                    </svg>
                                </div>
                                <x-text-input id="url" name="url" type="url" class="block mt-1 w-full pl-10 pr-4 py-3 border-gray-200 rounded-xl focus:border-purple-400 focus:ring-2 focus:ring-purple-200 transition-all duration-200" :value="old('url')" placeholder="https://ejemplo.com" required />
                            </div>
                            <x-input-error :messages="$errors->get('url')" class="mt-2 text-sm text-red-500" />
                        </div>

                        <div class="mt-6">
                            <x-input-label for="categoria" :value="__('Categoría')" class="text-gray-700 font-semibold mb-1" />
                            <div class="relative">
                                <select id="categoria" name="categoria" 
                                    class="block mt-1 w-full pl-4 pr-10 py-3 border-gray-200 rounded-xl shadow-sm focus:border-purple-400 focus:ring-2 focus:ring-purple-200 text-gray-700 appearance-none bg-white transition-all duration-200 cursor-pointer">
                                    @foreach (['Educación','Herramientas','Noticias','Entretenimiento','Redes sociales','Otros'] as $cat)
                                        <option value="{{ $cat }}" @selected(old('categoria') === $cat)>{{ $cat }}</option>
                                    @endforeach
                                </select>
                                <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                                    </svg>
                                </div>
                            </div>
                            <x-input-error :messages="$errors->get('categoria')" class="mt-2 text-sm text-red-500" />
                        </div>

                        <div class="mt-6">
                            <x-input-label for="descripcion" :value="__('Descripción (opcional)')" class="text-gray-700 font-semibold mb-1" />
                            <textarea id="descripcion" name="descripcion"
                                class="block mt-1 w-full px-4 py-3 border-gray-200 rounded-xl shadow-sm focus:border-purple-400 focus:ring-2 focus:ring-purple-200 text-gray-700 transition-all duration-200 resize-none"
                                rows="3" placeholder="Breve descripción del sitio...">{{ old('descripcion') }}</textarea>
                            <x-input-error :messages="$errors->get('descripcion')" class="mt-2 text-sm text-red-500" />
                        </div>

                        <div class="mt-6 flex items-center gap-3 p-3 bg-purple-50/50 rounded-xl border border-purple-100 transition-all hover:bg-purple-50">
                            <label class="relative inline-flex items-center cursor-pointer">
                                <input id="destacado" name="destacado" type="checkbox" value="1" @checked(old('destacado')) class="sr-only peer">
                                <div class="w-11 h-6 bg-gray-200 rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-purple-600"></div>
                            </label>
                            <x-input-label for="destacado" :value="__('Marcar como destacado')" class="text-gray-700 font-medium cursor-pointer" />
                            <span class="text-xs text-gray-500 ml-auto">⭐ Aparecerá en la sección principal</span>
                        </div>

                        <div class="mt-8 flex gap-4">
                            <button type="submit" class="inline-flex items-center justify-center gap-2 px-6 py-3 bg-gradient-to-r from-purple-600 to-pink-600 hover:from-purple-700 hover:to-pink-700 text-white font-semibold rounded-xl shadow-md hover:shadow-lg transition-all duration-200 transform hover:-translate-y-0.5 focus:ring-4 focus:ring-purple-200">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                </svg>
                                {{ __('Guardar sitio') }}
                            </button>
                            <a href="{{ route('sitios.index') }}" class="inline-flex items-center justify-center gap-2 px-6 py-3 bg-white border border-gray-300 text-gray-700 font-medium rounded-xl shadow-sm hover:bg-gray-50 hover:shadow transition-all duration-200">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                                </svg>
                                Cancelar
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>