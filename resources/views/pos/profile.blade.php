<x-layouts.app active="profile" title="Mi Perfil">
    <div class="p-margin-page max-w-5xl mx-auto flex-1 w-full">
            <!-- Page Header -->
            <div class="flex items-center gap-3 mb-8">
                <div class="w-12 h-12 rounded-2xl bg-primary/10 flex items-center justify-center text-primary">
                    <span class="material-symbols-outlined text-3xl">account_circle</span>
                </div>
                <div>
                    <h2 class="font-headline-xl text-headline-xl text-on-surface">Mi Perfil</h2>
                    <p class="text-on-surface-variant">Gestiona tu información personal y preferencias del sistema</p>
                </div>
            </div>

            <!-- Form Content -->
            <div class="bg-surface-container-lowest rounded-3xl shadow-[0px_4px_12px_rgba(31,27,24,0.05)] overflow-hidden">
                <div class="p-8 space-y-10">
                    <!-- Identity Section -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-gutter">
                        <div class="space-y-2">
                            <label class="block font-label-md text-label-md text-outline uppercase tracking-wider px-1">Nombre Completo</label>
                            <div class="relative">
                                <span class="material-symbols-outlined absolute left-4 top-1/2 -translate-y-1/2 text-outline">person</span>
                                <input class="w-full pl-12 pr-4 py-3 bg-surface-container-low border border-transparent focus:border-primary focus:ring-0 rounded-xl font-body-lg text-body-lg transition-all" type="text" value="Carlos López"/>
                            </div>
                        </div>
                        <div class="space-y-2">
                            <label class="block font-label-md text-label-md text-outline uppercase tracking-wider px-1">Nombre de Usuario</label>
                            <div class="relative">
                                <span class="material-symbols-outlined absolute left-4 top-1/2 -translate-y-1/2 text-outline">alternate_email</span>
                                <input class="w-full pl-12 pr-4 py-3 bg-surface-container-low border border-transparent focus:border-primary focus:ring-0 rounded-xl font-body-lg text-body-lg transition-all" type="text" value="clopez_pastelero"/>
                            </div>
                        </div>
                    </div>

                    <!-- Preferences Section -->
                    <div class="space-y-2">
                        <label class="block font-label-md text-label-md text-outline uppercase tracking-wider px-1">Moneda Preferida</label>
                        <div class="relative">
                            <span class="material-symbols-outlined absolute left-4 top-1/2 -translate-y-1/2 text-outline">payments</span>
                            <select class="w-full pl-12 pr-10 py-3 bg-surface-container-low border-transparent focus:border-primary focus:ring-0 rounded-xl font-body-lg text-body-lg appearance-none transition-all">
                                <option>Soles (S/)</option>
                                <option>Dólares ($)</option>
                                <option>Euros (€)</option>
                            </select>
                            <span class="material-symbols-outlined absolute right-4 top-1/2 -translate-y-1/2 text-outline pointer-events-none">expand_more</span>
                        </div>
                    </div>

                    <!-- Theme Section -->
                    <div class="space-y-4">
                        <div class="flex items-center gap-2 px-1">
                            <span class="material-symbols-outlined text-secondary">palette</span>
                            <label class="block font-label-md text-label-md text-outline uppercase tracking-wider">Tema de Colores</label>
                        </div>
                        <p class="text-body-md text-on-surface-variant px-1">Personaliza la apariencia de tu sistema. Selecciona un tema y los colores se aplicarán de inmediato.</p>
                        
                        <div class="grid grid-cols-1 gap-4">
                            <!-- Standard Theme -->
                            <div class="group relative flex items-center gap-6 p-4 rounded-2xl bg-surface hover:bg-surface-container-high border-2 border-surface-variant transition-all cursor-pointer">
                                <div class="flex gap-1.5">
                                    <div class="w-6 h-6 rounded-full bg-[#00BFA5]"></div>
                                    <div class="w-6 h-6 rounded-full bg-[#6200EE]"></div>
                                    <div class="w-6 h-6 rounded-full bg-[#00E676]"></div>
                                    <div class="w-6 h-6 rounded-full bg-[#FF9100]"></div>
                                    <div class="w-6 h-6 rounded-full bg-[#00B0FF]"></div>
                                </div>
                                <div class="flex-1">
                                    <div class="flex items-center gap-2">
                                        <span class="material-symbols-outlined text-lg">settings_suggest</span>
                                        <p class="font-headline-md text-headline-md">Estándar</p>
                                    </div>
                                    <p class="text-sm text-on-surface-variant">Colores claros y vibrantes, ideal para uso diario</p>
                                </div>
                                <div class="w-6 h-6 bg-primary rounded-full hidden items-center justify-center text-white">
                                    <span class="material-symbols-outlined text-sm" style="font-variation-settings: 'FILL' 1;">check</span>
                                </div>
                            </div>
                            
                            <!-- Dark Mode -->
                            <div class="group relative flex items-center gap-6 p-4 rounded-2xl bg-surface hover:bg-surface-container-high border-2 border-surface-variant transition-all cursor-pointer">
                                <div class="flex gap-1.5">
                                    <div class="w-6 h-6 rounded-full bg-[#1A1C1E]"></div>
                                    <div class="w-6 h-6 rounded-full bg-[#3F4759]"></div>
                                    <div class="w-6 h-6 rounded-full bg-[#006C51]"></div>
                                    <div class="w-6 h-6 rounded-full bg-[#93000A]"></div>
                                    <div class="w-6 h-6 rounded-full bg-[#80D1FF]"></div>
                                </div>
                                <div class="flex-1">
                                    <div class="flex items-center gap-2">
                                        <span class="material-symbols-outlined text-lg">dark_mode</span>
                                        <p class="font-headline-md text-headline-md">Modo Oscuro</p>
                                    </div>
                                    <p class="text-sm text-on-surface-variant">Fondo oscuro, reduce la fatiga visual</p>
                                </div>
                                <div class="w-6 h-6 bg-primary rounded-full hidden items-center justify-center text-white">
                                    <span class="material-symbols-outlined text-sm" style="font-variation-settings: 'FILL' 1;">check</span>
                                </div>
                            </div>
                            
                            <!-- Tacna - Peru Theme -->
                            <div class="group relative flex items-center gap-6 p-4 rounded-2xl bg-primary/5 border-2 border-primary transition-all cursor-pointer">
                                <div class="flex gap-1.5">
                                    <div class="w-6 h-6 rounded-full bg-[#B06041]"></div>
                                    <div class="w-6 h-6 rounded-full bg-[#D4A12F]"></div>
                                    <div class="w-6 h-6 rounded-full bg-[#5D6345]"></div>
                                    <div class="w-6 h-6 rounded-full bg-[#03645c]"></div>
                                    <div class="w-6 h-6 rounded-full bg-[#BA1A1A]"></div>
                                </div>
                                <div class="flex-1">
                                    <div class="flex items-center gap-2">
                                        <span class="material-symbols-outlined text-lg text-primary">landscape</span>
                                        <p class="font-headline-md text-headline-md text-primary">Tacna — Perú</p>
                                    </div>
                                    <p class="text-sm text-on-surface-variant">Colores representativos: terracota, cobre, desierto, olivos y tradición</p>
                                </div>
                                <div class="w-6 h-6 bg-primary rounded-full flex items-center justify-center text-white">
                                    <span class="material-symbols-outlined text-sm" style="font-variation-settings: 'FILL' 1;">check</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Actions -->
                    <div class="pt-6 border-t border-outline-variant/20 flex justify-end gap-4">
                        <button class="px-8 py-3 rounded-xl border border-outline text-on-surface-variant font-label-md text-label-md hover:bg-surface-container transition-all active:scale-95">
                            Descartar
                        </button>
                        <button class="px-8 py-3 rounded-xl bg-primary text-on-primary font-label-md text-label-md shadow-lg shadow-primary/20 hover:bg-primary-container transition-all active:scale-95">
                            Guardar Cambios
                        </button>
                    </div>
                </div>
            </div>

            <!-- Decorative Footer -->
            <footer class="mt-12 text-center pb-12">
                <p class="text-outline text-xs uppercase tracking-[0.2em]">© 2026 — Artisanal Bakery Management System</p>
                <p class="text-outline/60 text-[10px] mt-1">Hecho con pasión por la pastelería tradicional</p>
            </footer>
        </div>
</x-layouts.app>
