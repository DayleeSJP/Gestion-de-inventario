<x-layouts.app active="reports" title="Reporte de Inventario">
    <!-- Canvas -->
    <div class="p-margin-page space-y-gutter">
            <!-- Header Section -->
            <div class="flex flex-col md:flex-row justify-between items-start md:items-center gap-4">
                <div>
                    <nav class="flex items-center gap-2 text-label-md text-on-surface-variant mb-2">
                        <span>Inventario</span>
                        <span class="material-symbols-outlined text-[14px]">chevron_right</span>
                        <span class="text-primary font-bold">Reportes</span>
                    </nav>
                    <div class="flex items-center gap-4">
                        <div class="p-3 bg-primary-container/10 rounded-2xl">
                            <span class="material-symbols-outlined text-primary text-3xl">inventory</span>
                        </div>
                        <h2 class="text-headline-xl font-headline-xl text-on-surface">Reporte de Inventario</h2>
                    </div>
                </div>
                <a href="/reports" class="px-6 py-2.5 rounded-xl border-2 border-primary text-primary font-bold text-label-md flex items-center gap-2 hover:bg-primary/5 transition-all">
                    <span class="material-symbols-outlined">arrow_back</span>
                    Volver al Menú
                </a>
            </div>

            <!-- Action Toolbar & Summary -->
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-gutter">
                <!-- Action Buttons -->
                <div class="lg:col-span-4 bg-white rounded-2xl shadow-[0px_4px_12px_rgba(0,0,0,0.05)] p-6 flex flex-col justify-center gap-4 hover:shadow-[0px_8px_24px_rgba(0,0,0,0.08)] transition-all">
                    <p class="text-label-md font-bold text-on-surface-variant uppercase tracking-wider">Acciones de Reporte</p>
                    <div class="grid grid-cols-3 gap-3">
                        <button class="flex flex-col items-center justify-center p-4 bg-primary text-white rounded-xl hover:bg-primary/90 transition-all gap-2 group">
                            <span class="material-symbols-outlined text-2xl group-hover:scale-110 transition-transform">print</span>
                            <span class="text-label-sm font-bold">Imprimir</span>
                        </button>
                        <button class="flex flex-col items-center justify-center p-4 bg-[#1D6F42] text-white rounded-xl hover:opacity-90 transition-all gap-2 group">
                            <span class="material-symbols-outlined text-2xl group-hover:scale-110 transition-transform">description</span>
                            <span class="text-label-sm font-bold">Excel</span>
                        </button>
                        <button class="flex flex-col items-center justify-center p-4 bg-[#C41E3A] text-white rounded-xl hover:opacity-90 transition-all gap-2 group">
                            <span class="material-symbols-outlined text-2xl group-hover:scale-110 transition-transform">picture_as_pdf</span>
                            <span class="text-label-sm font-bold">PDF</span>
                        </button>
                    </div>
                </div>

                <!-- Highlighted Total Banner -->
                <div class="lg:col-span-8 bg-primary-container rounded-2xl shadow-[0px_4px_12px_rgba(0,0,0,0.05)] relative overflow-hidden p-8 flex flex-col justify-center hover:shadow-[0px_8px_24px_rgba(0,0,0,0.08)] transition-all">
                    <div class="absolute -right-12 -top-12 w-48 h-48 bg-white/10 rounded-full blur-3xl"></div>
                    <div class="absolute right-12 bottom-0 opacity-10">
                        <span class="material-symbols-outlined text-[180px] text-on-primary-container">payments</span>
                    </div>
                    <div class="relative z-10">
                        <p class="text-on-primary-container/80 text-headline-md font-headline-md mb-2">Valor Total del Inventario <span class="text-label-md opacity-70">(a precio de costo)</span></p>
                        <div class="flex items-baseline gap-4">
                            <h3 class="text-[56px] leading-none font-bold text-on-primary-container tracking-tighter">S/ 36,234.76</h3>
                            <div class="flex items-center gap-1 bg-white/20 px-3 py-1 rounded-full text-on-primary-container">
                                <span class="material-symbols-outlined text-sm">trending_up</span>
                                <span class="text-label-md">+4.2%</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Inventory Status Table Section -->
            <div class="bg-white rounded-2xl shadow-[0px_4px_12px_rgba(0,0,0,0.05)] overflow-hidden hover:shadow-[0px_8px_24px_rgba(0,0,0,0.08)] transition-all">
                <div class="px-8 py-6 border-b border-outline-variant/30 flex justify-between items-center bg-surface-container-low/50">
                    <div>
                        <h3 class="text-headline-md font-headline-md text-on-surface">Estado Actual del Stock</h3>
                        <p class="text-body-md text-on-surface-variant">Monitoreo de niveles críticos y existencias totales</p>
                    </div>
                    <div class="flex gap-2">
                        <span class="flex items-center gap-1.5 px-3 py-1 bg-error-container text-on-error-container rounded-full text-label-sm font-bold">
                            <span class="w-2 h-2 bg-error rounded-full animate-pulse"></span>
                            3 Stock Crítico
                        </span>
                    </div>
                </div>
                <div class="overflow-x-auto custom-scrollbar">
                    <table class="w-full text-left border-collapse">
                        <thead>
                            <tr class="bg-surface-container-high/50 border-b border-outline-variant/30">
                                <th class="px-8 py-4 text-label-md font-bold text-on-surface-variant uppercase tracking-wider">Producto</th>
                                <th class="px-8 py-4 text-label-md font-bold text-on-surface-variant uppercase tracking-wider text-center">Stock Actual</th>
                                <th class="px-8 py-4 text-label-md font-bold text-on-surface-variant uppercase tracking-wider text-center">Stock Mínimo</th>
                                <th class="px-8 py-4 text-label-md font-bold text-on-surface-variant uppercase tracking-wider text-right">Precio Costo</th>
                                <th class="px-8 py-4 text-label-md font-bold text-on-surface-variant uppercase tracking-wider text-right">Precio Venta</th>
                                <th class="px-8 py-4 text-label-md font-bold text-on-surface-variant uppercase tracking-wider text-center">Estado</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-outline-variant/20">
                            <!-- Low Stock Item -->
                            <tr class="hover:bg-surface-container/50 transition-colors bg-error-container/5">
                                <td class="px-8 py-5">
                                    <div class="flex items-center gap-3">
                                        <div class="w-10 h-10 rounded-lg bg-surface-container-highest flex items-center justify-center">
                                            <span class="material-symbols-outlined text-primary">bakery_dining</span>
                                        </div>
                                        <div>
                                            <p class="text-body-md font-bold text-on-surface leading-tight">Camote rojo</p>
                                            <p class="text-label-sm text-on-surface-variant">Tubérculos frescos</p>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-8 py-5 text-center">
                                    <span class="text-headline-md font-bold text-error">2.30</span> <span class="text-label-sm text-on-surface-variant">kg</span>
                                </td>
                                <td class="px-8 py-5 text-center text-body-md text-on-surface-variant">1.00 kg</td>
                                <td class="px-8 py-5 text-right font-mono text-body-md">S/ 1.20</td>
                                <td class="px-8 py-5 text-right font-mono text-body-md">S/ 2.10</td>
                                <td class="px-8 py-5 text-center">
                                    <span class="px-3 py-1 bg-secondary-container text-on-secondary-container rounded-full text-label-sm font-bold">Bajo Stock</span>
                                </td>
                            </tr>
                            
                            <!-- Normal Stock Items -->
                            <tr class="hover:bg-surface-container/50 transition-colors">
                                <td class="px-8 py-5">
                                    <div class="flex items-center gap-3">
                                        <div class="w-10 h-10 rounded-lg bg-surface-container-highest flex items-center justify-center">
                                            <span class="material-symbols-outlined text-primary">fastfood</span>
                                        </div>
                                        <div>
                                            <p class="text-body-md font-bold text-on-surface leading-tight">Doritos</p>
                                            <p class="text-label-sm text-on-surface-variant">Snacks salados</p>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-8 py-5 text-center">
                                    <span class="text-headline-md font-bold text-on-surface">15</span> <span class="text-label-sm text-on-surface-variant">und</span>
                                </td>
                                <td class="px-8 py-5 text-center text-body-md text-on-surface-variant">5 und</td>
                                <td class="px-8 py-5 text-right font-mono text-body-md">S/ 1.20</td>
                                <td class="px-8 py-5 text-right font-mono text-body-md">S/ 2.00</td>
                                <td class="px-8 py-5 text-center">
                                    <span class="px-3 py-1 bg-primary-fixed text-on-primary-fixed-variant rounded-full text-label-sm font-bold">Saludable</span>
                                </td>
                            </tr>
                            
                            <tr class="hover:bg-surface-container/50 transition-colors">
                                <td class="px-8 py-5">
                                    <div class="flex items-center gap-3">
                                        <div class="w-10 h-10 rounded-lg bg-surface-container-highest flex items-center justify-center">
                                            <span class="material-symbols-outlined text-primary">cookie</span>
                                        </div>
                                        <div>
                                            <p class="text-body-md font-bold text-on-surface leading-tight">Galletas Oreo</p>
                                            <p class="text-label-sm text-on-surface-variant">Snacks dulces</p>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-8 py-5 text-center">
                                    <span class="text-headline-md font-bold text-on-surface">6</span> <span class="text-label-sm text-on-surface-variant">und</span>
                                </td>
                                <td class="px-8 py-5 text-center text-body-md text-on-surface-variant">5 und</td>
                                <td class="px-8 py-5 text-right font-mono text-body-md">S/ 1.00</td>
                                <td class="px-8 py-5 text-right font-mono text-body-md">S/ 2.00</td>
                                <td class="px-8 py-5 text-center">
                                    <span class="px-3 py-1 bg-secondary-container text-on-secondary-container rounded-full text-label-sm font-bold">Límite</span>
                                </td>
                            </tr>
                            
                            <tr class="hover:bg-surface-container/50 transition-colors">
                                <td class="px-8 py-5">
                                    <div class="flex items-center gap-3">
                                        <div class="w-10 h-10 rounded-lg bg-surface-container-highest flex items-center justify-center">
                                            <span class="material-symbols-outlined text-primary">egg</span>
                                        </div>
                                        <div>
                                            <p class="text-body-md font-bold text-on-surface leading-tight">Huevo</p>
                                            <p class="text-label-sm text-on-surface-variant">Abarrotes</p>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-8 py-5 text-center">
                                    <span class="text-headline-md font-bold text-on-surface">12.00</span> <span class="text-label-sm text-on-surface-variant">kg</span>
                                </td>
                                <td class="px-8 py-5 text-center text-body-md text-on-surface-variant">6.00 kg</td>
                                <td class="px-8 py-5 text-right font-mono text-body-md">S/ 4.00</td>
                                <td class="px-8 py-5 text-right font-mono text-body-md">S/ 5.20</td>
                                <td class="px-8 py-5 text-center">
                                    <span class="px-3 py-1 bg-primary-fixed text-on-primary-fixed-variant rounded-full text-label-sm font-bold">Saludable</span>
                                </td>
                            </tr>
                            
                            <!-- Large Scale Item -->
                            <tr class="hover:bg-surface-container/50 transition-colors">
                                <td class="px-8 py-5">
                                    <div class="flex items-center gap-3">
                                        <div class="w-10 h-10 rounded-lg bg-surface-container-highest flex items-center justify-center">
                                            <span class="material-symbols-outlined text-primary">grain</span>
                                        </div>
                                        <div>
                                            <p class="text-body-md font-bold text-on-surface leading-tight">Maiz entero</p>
                                            <p class="text-label-sm text-on-surface-variant">Granos y cereales</p>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-8 py-5 text-center">
                                    <span class="text-headline-md font-bold text-on-surface">30,000.00</span> <span class="text-label-sm text-on-surface-variant">kg</span>
                                </td>
                                <td class="px-8 py-5 text-center text-body-md text-on-surface-variant">1,000.00 kg</td>
                                <td class="px-8 py-5 text-right font-mono text-body-md">S/ 1.20</td>
                                <td class="px-8 py-5 text-right font-mono text-body-md">S/ 1.70</td>
                                <td class="px-8 py-5 text-center">
                                    <span class="px-3 py-1 bg-primary-fixed text-on-primary-fixed-variant rounded-full text-label-sm font-bold">Sobre-stock</span>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="px-8 py-6 bg-surface-container-low/30 border-t border-outline-variant/30 flex justify-between items-center">
                    <p class="text-label-md text-on-surface-variant">Mostrando 1-10 de 156 productos</p>
                    <div class="flex items-center gap-2">
                        <button class="w-10 h-10 rounded-lg flex items-center justify-center border border-outline-variant hover:bg-surface-container-high transition-colors">
                            <span class="material-symbols-outlined">chevron_left</span>
                        </button>
                        <button class="w-10 h-10 rounded-lg flex items-center justify-center bg-primary text-white font-bold">1</button>
                        <button class="w-10 h-10 rounded-lg flex items-center justify-center border border-outline-variant hover:bg-surface-container-high transition-colors">2</button>
                        <button class="w-10 h-10 rounded-lg flex items-center justify-center border border-outline-variant hover:bg-surface-container-high transition-colors">3</button>
                        <button class="w-10 h-10 rounded-lg flex items-center justify-center border border-outline-variant hover:bg-surface-container-high transition-colors">
                            <span class="material-symbols-outlined">chevron_right</span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        document.querySelectorAll('button, a').forEach(el => {
            if(!el.classList.contains('scale-[1.02]')) {
                el.addEventListener('mousedown', () => {
                    el.classList.add('scale-95');
                });
                el.addEventListener('mouseup', () => {
                    el.classList.remove('scale-95');
                });
                el.addEventListener('mouseleave', () => {
                    el.classList.remove('scale-95');
                });
            }
        });
    </script>
</x-layouts.app>
