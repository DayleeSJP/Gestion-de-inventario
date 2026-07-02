<x-layouts.app>
    <x-pos.sidebar active="history" />

    <!-- Main Content Canvas -->
    <main class="flex-1 ml-[260px] h-screen flex flex-col overflow-hidden bg-surface-bright">
        <!-- TopAppBar -->
        <header class="flex justify-between items-center w-full px-margin-page py-stack-sm bg-surface-container-low dark:bg-surface-container-high sticky top-0 z-40">
            <div class="flex items-center gap-4">
                <h2 class="font-headline-md text-headline-md font-bold text-primary">Historial de Ventas</h2>
            </div>
            
            <div class="flex items-center gap-4">
                <button class="p-2 text-on-surface-variant hover:bg-surface-variant/50 rounded-full transition-colors relative">
                    <span class="material-symbols-outlined">notifications</span>
                    <span class="absolute top-2 right-2 w-2 h-2 bg-secondary rounded-full"></span>
                </button>
                <button class="p-2 text-on-surface-variant hover:bg-surface-variant/50 rounded-full transition-colors">
                    <span class="material-symbols-outlined">help_outline</span>
                </button>
                <div class="h-8 w-[1px] bg-outline-variant mx-2"></div>
                <a href="/pos" class="flex items-center gap-2 bg-primary text-on-primary px-4 py-2 rounded-lg font-label-md text-label-md hover:opacity-90 transition-opacity">
                    <span class="material-symbols-outlined text-[20px]">add</span>
                    Nueva Venta
                </a>
            </div>
        </header>
        
        <!-- Content Area -->
        <div class="flex-1 overflow-y-auto p-margin-page custom-scrollbar">
            <!-- Filters Bento Grid Section -->
            <div class="bg-white p-card-padding rounded-xl shadow-[0px_4px_12px_rgba(0,0,0,0.05)] mb-stack-lg border border-outline-variant/30">
                <div class="grid grid-cols-1 md:grid-cols-12 gap-4 items-end">
                    <div class="md:col-span-5">
                        <label class="block text-label-md text-on-surface-variant mb-2 px-1">Buscar Venta</label>
                        <div class="relative group">
                            <span class="material-symbols-outlined absolute left-3 top-1/2 -translate-y-1/2 text-on-surface-variant group-focus-within:text-primary transition-colors">search</span>
                            <input class="w-full pl-10 pr-4 py-2.5 bg-surface-container-lowest border border-outline-variant rounded-lg focus:ring-2 focus:ring-primary/20 focus:border-primary outline-none transition-all font-body-md" placeholder="Buscar por ID, cliente, cajero o método..." type="text">
                        </div>
                    </div>
                    <div class="md:col-span-3">
                        <label class="block text-label-md text-on-surface-variant mb-2 px-1 flex items-center gap-1">
                            <span class="material-symbols-outlined text-[14px]">calendar_today</span> DESDE
                        </label>
                        <input class="w-full px-4 py-2 bg-surface-container-lowest border border-outline-variant rounded-lg focus:ring-2 focus:ring-primary/20 focus:border-primary outline-none transition-all font-body-md text-on-surface" type="date">
                    </div>
                    <div class="md:col-span-3">
                        <label class="block text-label-md text-on-surface-variant mb-2 px-1 flex items-center gap-1">
                            <span class="material-symbols-outlined text-[14px]">calendar_today</span> HASTA
                        </label>
                        <input class="w-full px-4 py-2 bg-surface-container-lowest border border-outline-variant rounded-lg focus:ring-2 focus:ring-primary/20 focus:border-primary outline-none transition-all font-body-md text-on-surface" type="date">
                    </div>
                    <div class="md:col-span-1">
                        <button class="w-full aspect-square flex items-center justify-center bg-surface-container border border-outline-variant rounded-lg hover:bg-surface-variant/30 text-on-surface-variant transition-colors group">
                            <span class="material-symbols-outlined group-hover:rotate-90 transition-transform">close</span>
                        </button>
                    </div>
                </div>
            </div>
            
            <!-- Main Data Table Container -->
            <div class="bg-white rounded-xl shadow-[0px_4px_12px_rgba(0,0,0,0.05)] border border-outline-variant/30 overflow-hidden">
                <div class="overflow-x-auto">
                    <table class="w-full text-left border-collapse">
                        <thead>
                            <tr class="bg-surface-container/50 border-b border-outline-variant/30">
                                <th class="px-6 py-4 font-label-md text-label-md text-on-surface-variant whitespace-nowrap">ID VENTA</th>
                                <th class="px-6 py-4 font-label-md text-label-md text-on-surface-variant whitespace-nowrap">FECHA</th>
                                <th class="px-6 py-4 font-label-md text-label-md text-on-surface-variant whitespace-nowrap">CLIENTE</th>
                                <th class="px-6 py-4 font-label-md text-label-md text-on-surface-variant whitespace-nowrap">CAJERO</th>
                                <th class="px-6 py-4 font-label-md text-label-md text-on-surface-variant whitespace-nowrap">TOTAL</th>
                                <th class="px-6 py-4 font-label-md text-label-md text-on-surface-variant whitespace-nowrap">MÉTODO PAGO</th>
                                <th class="px-6 py-4 font-label-md text-label-md text-on-surface-variant whitespace-nowrap">ESTADO</th>
                                <th class="px-6 py-4 font-label-md text-label-md text-on-surface-variant whitespace-nowrap text-center">ACCIONES</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-outline-variant/20">
                            <!-- Row 1 -->
                            <tr class="hover:bg-surface-container-lowest transition-colors">
                                <td class="px-6 py-4 font-body-md text-on-surface">#257</td>
                                <td class="px-6 py-4 font-body-md text-on-surface-variant">16/06/2026 19:28</td>
                                <td class="px-6 py-4 font-body-md text-on-surface">Marcos</td>
                                <td class="px-6 py-4 font-body-md text-on-surface-variant">Daniela Cunurana</td>
                                <td class="px-6 py-4 font-body-md font-bold text-primary">S/2.10</td>
                                <td class="px-6 py-4 font-body-md">Crédito</td>
                                <td class="px-6 py-4">
                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-primary-container/20 text-primary">
                                        Completada
                                    </span>
                                </td>
                                <td class="px-6 py-4 text-center">
                                    <div class="flex items-center gap-2 justify-center">
                                        <button class="text-primary hover:bg-primary-container/20 rounded-md transition-colors flex items-center justify-center w-8 h-8" title="Ver detalle">
                                            <span class="material-symbols-outlined text-[20px]">visibility</span>
                                        </button>
                                        <button class="text-secondary hover:bg-secondary-container/20 rounded-md transition-colors flex items-center justify-center w-8 h-8" title="Imprimir">
                                            <span class="material-symbols-outlined text-[20px]">print</span>
                                        </button>
                                        <button class="text-error hover:bg-error-container/20 rounded-md transition-colors flex items-center justify-center w-8 h-8" title="Anular">
                                            <span class="material-symbols-outlined text-[20px]">cancel</span>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                            
                            <!-- Row 2 -->
                            <tr class="hover:bg-surface-container-lowest transition-colors">
                                <td class="px-6 py-4 font-body-md text-on-surface">#231</td>
                                <td class="px-6 py-4 font-body-md text-on-surface-variant">11/06/2026 17:24</td>
                                <td class="px-6 py-4 font-body-md text-on-surface italic opacity-60">Venta genérica</td>
                                <td class="px-6 py-4 font-body-md text-on-surface-variant">Daniela Cunurana</td>
                                <td class="px-6 py-4 font-body-md font-bold text-primary">S/4.10</td>
                                <td class="px-6 py-4 font-body-md">Yape</td>
                                <td class="px-6 py-4">
                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-primary-container/20 text-primary">
                                        Completada
                                    </span>
                                </td>
                                <td class="px-6 py-4 text-center">
                                    <div class="flex items-center gap-2 justify-center">
                                        <button class="text-primary hover:bg-primary-container/20 rounded-md transition-colors flex items-center justify-center w-8 h-8">
                                            <span class="material-symbols-outlined text-[20px]">visibility</span>
                                        </button>
                                        <button class="text-secondary hover:bg-secondary-container/20 rounded-md transition-colors flex items-center justify-center w-8 h-8">
                                            <span class="material-symbols-outlined text-[20px]">print</span>
                                        </button>
                                        <button class="text-error hover:bg-error-container/20 rounded-md transition-colors flex items-center justify-center w-8 h-8">
                                            <span class="material-symbols-outlined text-[20px]">cancel</span>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                            
                            <!-- Row 3 (Anulada) -->
                            <tr class="bg-error-container/10 hover:bg-error-container/20 transition-colors">
                                <td class="px-6 py-4 font-body-md text-on-surface">#208</td>
                                <td class="px-6 py-4 font-body-md text-on-surface-variant">04/06/2026 23:53</td>
                                <td class="px-6 py-4 font-body-md text-on-surface italic opacity-60">Venta genérica</td>
                                <td class="px-6 py-4 font-body-md text-on-surface-variant">Daniela Cunurana</td>
                                <td class="px-6 py-4 font-body-md font-bold text-error">S/8.40</td>
                                <td class="px-6 py-4 font-body-md">Efectivo</td>
                                <td class="px-6 py-4">
                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-error/10 text-error">
                                        Anulada
                                    </span>
                                </td>
                                <td class="px-6 py-4 text-center">
                                    <div class="flex items-center gap-2 justify-center">
                                        <button class="text-primary hover:bg-primary-container/20 rounded-md transition-colors flex items-center justify-center w-8 h-8">
                                            <span class="material-symbols-outlined text-[20px]">visibility</span>
                                        </button>
                                        <button class="text-secondary hover:bg-secondary-container/20 rounded-md transition-colors flex items-center justify-center w-8 h-8">
                                            <span class="material-symbols-outlined text-[20px]">print</span>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                            
                            <!-- Row 4 -->
                            <tr class="hover:bg-surface-container-lowest transition-colors">
                                <td class="px-6 py-4 font-body-md text-on-surface">#207</td>
                                <td class="px-6 py-4 font-body-md text-on-surface-variant">04/06/2026 22:04</td>
                                <td class="px-6 py-4 font-body-md text-on-surface italic opacity-60">Venta genérica</td>
                                <td class="px-6 py-4 font-body-md text-on-surface-variant">Daniela Cunurana</td>
                                <td class="px-6 py-4 font-body-md font-bold text-primary">S/2.10</td>
                                <td class="px-6 py-4 font-body-md">Efectivo</td>
                                <td class="px-6 py-4">
                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-primary-container/20 text-primary">
                                        Completada
                                    </span>
                                </td>
                                <td class="px-6 py-4 text-center">
                                    <div class="flex items-center gap-2 justify-center">
                                        <button class="text-primary hover:bg-primary-container/20 rounded-md transition-colors flex items-center justify-center w-8 h-8">
                                            <span class="material-symbols-outlined text-[20px]">visibility</span>
                                        </button>
                                        <button class="text-secondary hover:bg-secondary-container/20 rounded-md transition-colors flex items-center justify-center w-8 h-8">
                                            <span class="material-symbols-outlined text-[20px]">print</span>
                                        </button>
                                        <button class="text-error hover:bg-error-container/20 rounded-md transition-colors flex items-center justify-center w-8 h-8">
                                            <span class="material-symbols-outlined text-[20px]">cancel</span>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                            
                            <!-- Row 5 -->
                            <tr class="hover:bg-surface-container-lowest transition-colors">
                                <td class="px-6 py-4 font-body-md text-on-surface">#206</td>
                                <td class="px-6 py-4 font-body-md text-on-surface-variant">04/06/2026 21:54</td>
                                <td class="px-6 py-4 font-body-md text-on-surface italic opacity-60">Venta genérica</td>
                                <td class="px-6 py-4 font-body-md text-on-surface-variant">Daniela Cunurana</td>
                                <td class="px-6 py-4 font-body-md font-bold text-primary">S/2.00</td>
                                <td class="px-6 py-4 font-body-md">Yape</td>
                                <td class="px-6 py-4">
                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-primary-container/20 text-primary">
                                        Completada
                                    </span>
                                </td>
                                <td class="px-6 py-4 text-center">
                                    <div class="flex items-center gap-2 justify-center">
                                        <button class="text-primary hover:bg-primary-container/20 rounded-md transition-colors flex items-center justify-center w-8 h-8">
                                            <span class="material-symbols-outlined text-[20px]">visibility</span>
                                        </button>
                                        <button class="text-secondary hover:bg-secondary-container/20 rounded-md transition-colors flex items-center justify-center w-8 h-8">
                                            <span class="material-symbols-outlined text-[20px]">print</span>
                                        </button>
                                        <button class="text-error hover:bg-error-container/20 rounded-md transition-colors flex items-center justify-center w-8 h-8">
                                            <span class="material-symbols-outlined text-[20px]">cancel</span>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                
                <!-- Pagination -->
                <div class="px-6 py-4 bg-surface-container-low/30 border-t border-outline-variant/30 flex items-center justify-between">
                    <p class="text-label-md text-on-surface-variant">Mostrando 1 - 10 de 524 ventas</p>
                    <div class="flex items-center gap-2">
                        <button class="w-8 h-8 flex items-center justify-center rounded border border-outline-variant text-on-surface-variant hover:bg-white transition-colors">
                            <span class="material-symbols-outlined text-[18px]">chevron_left</span>
                        </button>
                        <button class="w-8 h-8 flex items-center justify-center rounded border border-primary bg-primary text-on-primary text-label-md">1</button>
                        <button class="w-8 h-8 flex items-center justify-center rounded border border-outline-variant text-on-surface-variant hover:bg-white transition-colors text-label-md">2</button>
                        <button class="w-8 h-8 flex items-center justify-center rounded border border-outline-variant text-on-surface-variant hover:bg-white transition-colors text-label-md">3</button>
                        <span class="text-on-surface-variant">...</span>
                        <button class="w-8 h-8 flex items-center justify-center rounded border border-outline-variant text-on-surface-variant hover:bg-white transition-colors text-label-md">53</button>
                        <button class="w-8 h-8 flex items-center justify-center rounded border border-outline-variant text-on-surface-variant hover:bg-white transition-colors">
                            <span class="material-symbols-outlined text-[18px]">chevron_right</span>
                        </button>
                    </div>
                </div>
            </div>
            
            <!-- Dashboard Snapshot / Bottom Bento -->
            <div class="grid grid-cols-1 md:grid-cols-4 gap-gutter mt-stack-lg pb-12">
                <div class="bg-white p-4 rounded-xl border border-outline-variant/30 shadow-sm flex items-center gap-4">
                    <div class="w-12 h-12 rounded-full bg-primary-container/10 flex items-center justify-center text-primary">
                        <span class="material-symbols-outlined fill-icon">payments</span>
                    </div>
                    <div>
                        <p class="text-label-sm text-on-surface-variant uppercase tracking-wide">Total del Día</p>
                        <p class="font-headline-md text-headline-md text-primary">S/1,240.50</p>
                    </div>
                </div>
                <div class="bg-white p-4 rounded-xl border border-outline-variant/30 shadow-sm flex items-center gap-4">
                    <div class="w-12 h-12 rounded-full bg-secondary-container/10 flex items-center justify-center text-secondary">
                        <span class="material-symbols-outlined fill-icon">shopping_bag</span>
                    </div>
                    <div>
                        <p class="text-label-sm text-on-surface-variant uppercase tracking-wide">Ventas Hoy</p>
                        <p class="font-headline-md text-headline-md text-secondary">42</p>
                    </div>
                </div>
                <div class="bg-white p-4 rounded-xl border border-outline-variant/30 shadow-sm flex items-center gap-4">
                    <div class="w-12 h-12 rounded-full bg-tertiary-container/10 flex items-center justify-center text-tertiary">
                        <span class="material-symbols-outlined fill-icon">group</span>
                    </div>
                    <div>
                        <p class="text-label-sm text-on-surface-variant uppercase tracking-wide">Nuevos Clientes</p>
                        <p class="font-headline-md text-headline-md text-tertiary">12</p>
                    </div>
                </div>
                <div class="bg-white p-4 rounded-xl border border-outline-variant/30 shadow-sm flex items-center gap-4">
                    <div class="w-12 h-12 rounded-full bg-error-container/10 flex items-center justify-center text-error">
                        <span class="material-symbols-outlined fill-icon">rule</span>
                    </div>
                    <div>
                        <p class="text-label-sm text-on-surface-variant uppercase tracking-wide">Anuladas (Mes)</p>
                        <p class="font-headline-md text-headline-md text-error">03</p>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const rows = document.querySelectorAll('tbody tr');
            rows.forEach(row => {
                row.addEventListener('mouseenter', () => {
                    row.style.transform = 'translateX(4px)';
                    row.style.transition = 'transform 0.2s ease-out';
                });
                row.addEventListener('mouseleave', () => {
                    row.style.transform = 'translateX(0)';
                });
            });
        });
    </script>
</x-layouts.app>
