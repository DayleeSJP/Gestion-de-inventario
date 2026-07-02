<x-layouts.app active="reports" title="Reporte de Ventas">
        <!-- Content Canvas -->
        <div class="p-gutter">
            <!-- Title and Action Bar -->
            <div class="flex justify-between items-center mb-stack-lg">
                <div class="flex items-center gap-3">
                    <span class="material-symbols-outlined text-primary text-3xl">analytics</span>
                    <h2 class="text-headline-xl font-bold text-on-surface tracking-tight">Reporte de Ventas</h2>
                </div>
                <a href="/reports" class="px-6 py-2 border border-outline text-on-surface-variant font-label-md rounded-lg hover:bg-surface-container-high transition-colors flex items-center gap-2">
                    <span class="material-symbols-outlined text-[18px]">arrow_back</span>
                    Volver al Menú
                </a>
            </div>

            <!-- Date Selectors & Filters -->
            <section class="bg-surface-container-lowest rounded-xl shadow-[0px_4px_12px_rgba(0,0,0,0.05)] p-6 mb-stack-lg border border-outline-variant/30">
                <div class="flex flex-col lg:flex-row items-end gap-gutter">
                    <div class="flex-1 w-full lg:w-auto">
                        <label class="block text-label-md text-on-surface-variant mb-2 ml-1">FECHA DE INICIO</label>
                        <div class="relative">
                            <input class="w-full bg-surface-bright border border-outline-variant rounded-lg px-4 py-3 focus:border-primary focus:ring-1 focus:ring-primary transition-all text-body-md outline-none" type="date" value="2026-07-01"/>
                        </div>
                    </div>
                    <div class="flex-1 w-full lg:w-auto">
                        <label class="block text-label-md text-on-surface-variant mb-2 ml-1">FECHA DE FIN</label>
                        <div class="relative">
                            <input class="w-full bg-surface-bright border border-outline-variant rounded-lg px-4 py-3 focus:border-primary focus:ring-1 focus:ring-primary transition-all text-body-md outline-none" type="date" value="2026-07-31"/>
                        </div>
                    </div>
                    <button class="bg-primary text-on-primary font-bold px-8 py-3.5 rounded-lg hover:brightness-110 active:scale-[0.98] transition-all shadow-md flex items-center gap-2 w-full lg:w-auto justify-center">
                        <span class="material-symbols-outlined">refresh</span>
                        Generar Reporte
                    </button>
                </div>
            </section>

            <!-- Export Actions -->
            <div class="flex flex-wrap gap-3 mb-stack-lg">
                <button class="bg-[#1EA7FD] text-white px-5 py-2.5 rounded-lg font-bold flex items-center gap-2 text-label-md shadow-sm hover:opacity-90 transition-opacity">
                    <span class="material-symbols-outlined text-[18px]">print</span>
                    Imprimir
                </button>
                <button class="bg-[#21A366] text-white px-5 py-2.5 rounded-lg font-bold flex items-center gap-2 text-label-md shadow-sm hover:opacity-90 transition-opacity">
                    <span class="material-symbols-outlined text-[18px]">table_view</span>
                    Exportar a Excel
                </button>
                <button class="bg-[#E53935] text-white px-5 py-2.5 rounded-lg font-bold flex items-center gap-2 text-label-md shadow-sm hover:opacity-90 transition-opacity">
                    <span class="material-symbols-outlined text-[18px]">picture_as_pdf</span>
                    Exportar a PDF
                </button>
            </div>

            <!-- Dashboard Summary Grid (Bento Style) -->
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-gutter mb-stack-lg">
                <!-- Resumen General -->
                <div class="lg:col-span-4 bg-surface-container-lowest rounded-xl p-card-padding shadow-[0px_4px_12px_rgba(0,0,0,0.05)] border border-outline-variant/30">
                    <div class="flex items-center gap-3 mb-6">
                        <div class="p-2 bg-primary/10 rounded-lg text-primary">
                            <span class="material-symbols-outlined">leaderboard</span>
                        </div>
                        <h3 class="text-headline-md font-bold text-on-surface">Resumen General</h3>
                    </div>
                    <div class="space-y-4">
                        <div class="flex justify-between items-center py-2 border-b border-outline-variant/20">
                            <span class="text-on-surface-variant font-medium">Total Ingresos:</span>
                            <span class="text-headline-md font-bold text-primary">S/ 0.00</span>
                        </div>
                        <div class="flex justify-between items-center py-2 border-b border-outline-variant/20">
                            <span class="text-on-surface-variant font-medium">Total Costos:</span>
                            <span class="text-headline-md font-bold text-error">S/ 0.00</span>
                        </div>
                        <div class="flex justify-between items-center py-2 border-b border-outline-variant/20">
                            <span class="text-on-surface-variant font-medium">Ganancia Neta:</span>
                            <span class="text-headline-md font-bold text-primary">S/ 0.00</span>
                        </div>
                        <div class="mt-6 pt-4 flex items-center gap-2">
                            <span class="text-body-lg text-on-surface-variant">Número de Ventas:</span>
                            <span class="text-headline-md font-bold text-on-surface">0</span>
                        </div>
                    </div>
                </div>

                <!-- Top 5 Productos -->
                <div class="lg:col-span-4 bg-surface-container-lowest rounded-xl p-card-padding shadow-[0px_4px_12px_rgba(0,0,0,0.05)] border border-outline-variant/30 flex flex-col">
                    <div class="flex items-center gap-3 mb-6">
                        <div class="p-2 bg-secondary/10 rounded-lg text-secondary">
                            <span class="material-symbols-outlined">stars</span>
                        </div>
                        <h3 class="text-headline-md font-bold text-on-surface">Top 5 Productos</h3>
                    </div>
                    <div class="flex-1 flex flex-col items-center justify-center text-center p-8 bg-surface-container/30 rounded-lg border border-dashed border-outline-variant">
                        <span class="material-symbols-outlined text-4xl text-on-surface-variant/30 mb-2">inventory</span>
                        <p class="text-on-surface-variant italic">No hay datos suficientes para el período seleccionado.</p>
                    </div>
                </div>

                <!-- Margen de Ganancia -->
                <div class="lg:col-span-4 bg-surface-container-lowest rounded-xl p-card-padding shadow-[0px_4px_12px_rgba(0,0,0,0.05)] border border-outline-variant/30 flex flex-col items-center justify-center relative overflow-hidden">
                    <div class="absolute top-4 left-4 p-2 bg-primary/10 rounded-lg text-primary">
                        <span class="material-symbols-outlined">pie_chart</span>
                    </div>
                    <div class="text-center">
                        <h3 class="text-label-md font-bold text-on-surface-variant uppercase tracking-widest mb-2">Margen de Ganancia</h3>
                        <div class="text-[64px] font-extrabold text-primary leading-none mb-4">0.0%</div>
                        <p class="text-label-md text-on-surface-variant max-w-[200px]">Porcentaje de ganancia sobre ingresos totales del período.</p>
                    </div>
                    <!-- Decorative Element -->
                    <div class="absolute -bottom-6 -right-6 opacity-5 pointer-events-none">
                        <span class="material-symbols-outlined text-[120px]">percent</span>
                    </div>
                </div>
            </div>

            <!-- Detailed Sales Table -->
            <section class="bg-surface-container-lowest rounded-xl shadow-[0px_4px_12px_rgba(0,0,0,0.05)] border border-outline-variant/30 overflow-hidden">
                <div class="px-6 py-5 border-b border-outline-variant/30 bg-surface-container-low flex items-center gap-3">
                    <span class="material-symbols-outlined text-primary">list_alt</span>
                    <h3 class="text-headline-md font-bold text-on-surface">Detalle de Ventas — Costo vs. Venta</h3>
                </div>
                <div class="overflow-x-auto custom-scrollbar">
                    <table class="w-full text-left border-collapse">
                        <thead>
                            <tr class="bg-surface-container-high/50 text-label-md text-on-surface-variant uppercase tracking-wider">
                                <th class="px-6 py-4 font-semibold"># VENTA</th>
                                <th class="px-6 py-4 font-semibold">FECHA</th>
                                <th class="px-6 py-4 font-semibold">PRODUCTO</th>
                                <th class="px-6 py-4 font-semibold">CANT.</th>
                                <th class="px-6 py-4 font-semibold text-right">P. COSTO</th>
                                <th class="px-6 py-4 font-semibold text-right">P. VENTA</th>
                                <th class="px-6 py-4 font-semibold text-right">SUBTOTAL COSTO</th>
                                <th class="px-6 py-4 font-semibold text-right">SUBTOTAL VENTA</th>
                                <th class="px-6 py-4 font-semibold text-right">GANANCIA</th>
                                <th class="px-6 py-4 font-semibold">MÉTODO</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-outline-variant/20">
                            <!-- Empty State Table -->
                            <tr>
                                <td class="px-6 py-20 text-center" colspan="10">
                                    <div class="flex flex-col items-center">
                                        <span class="material-symbols-outlined text-5xl text-on-surface-variant/20 mb-4">search_off</span>
                                        <p class="text-body-lg text-on-surface-variant/60 font-medium">No hay ventas registradas en este período.</p>
                                        <p class="text-label-md text-on-surface-variant/40 mt-1">Intente cambiar los filtros de fecha para visualizar información.</p>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <!-- Table Footer/Pagination placeholder -->
                <div class="px-6 py-4 bg-surface-container-lowest border-t border-outline-variant/30 flex justify-between items-center">
                    <p class="text-label-md text-on-surface-variant">Mostrando 0 de 0 registros</p>
                    <div class="flex gap-2">
                        <button class="p-2 rounded hover:bg-surface-container text-on-surface-variant/30 transition-colors" disabled>
                            <span class="material-symbols-outlined">chevron_left</span>
                        </button>
                        <button class="p-2 rounded hover:bg-surface-container text-on-surface-variant/30 transition-colors" disabled>
                            <span class="material-symbols-outlined">chevron_right</span>
                        </button>
                    </div>
                </div>
            </section>
        </div>

        <!-- Footer -->
        <footer class="mt-stack-lg px-gutter py-8 text-center border-t border-outline-variant/20">
            <p class="text-label-md text-on-surface-variant/50">© 2026 Artisan POS — Sistema de Gestión Panadera. Todos los derechos reservados.</p>
        </footer>

    <script>
        document.querySelectorAll('button, a').forEach(el => {
            el.addEventListener('mousedown', () => {
                el.classList.add('scale-95');
            });
            el.addEventListener('mouseup', () => {
                el.classList.remove('scale-95');
            });
            el.addEventListener('mouseleave', () => {
                el.classList.remove('scale-95');
            });
        });
    </script>
</x-layouts.app>
