<x-layouts.app active="reports" title="Módulo de Reportes">
    <!-- Canvas -->
    <div class="p-margin-page">
            <div class="max-w-6xl mx-auto space-y-stack-lg">
                <!-- Page Header -->
                <div class="mb-10 animate-in fade-in slide-in-from-bottom-4 duration-700">
                    <div class="flex items-center gap-3 mb-2">
                        <div class="p-2 bg-primary-fixed text-primary rounded-lg">
                            <span class="material-symbols-outlined text-[32px]">analytics</span>
                        </div>
                        <h2 class="text-headline-xl font-headline-xl text-on-surface">Módulo de Reportes</h2>
                    </div>
                    <p class="text-body-lg text-on-surface-variant max-w-2xl">
                        Selecciona un reporte para visualizar los datos consolidados de tu negocio. Accede a métricas detalladas para optimizar tus decisiones operativas.
                    </p>
                </div>
                
                <!-- Bento Grid Layout for Reports Selection -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-gutter">
                    <!-- Sales Report Card -->
                    <div class="group relative bg-surface-container-lowest p-stack-lg rounded-xl shadow-sm hover:shadow-md transition-all duration-300 border border-outline-variant/20 flex flex-col items-center text-center overflow-hidden">
                        <!-- Background Accent Decoration -->
                        <div class="absolute -top-12 -right-12 w-32 h-32 bg-primary-fixed/30 rounded-full blur-3xl group-hover:bg-primary-fixed/50 transition-colors"></div>
                        <div class="w-20 h-20 bg-primary-fixed/20 rounded-full flex items-center justify-center mb-6 relative z-10">
                            <span class="material-symbols-outlined text-[48px] text-primary" style="font-variation-settings: 'FILL' 1;">payments</span>
                        </div>
                        <h3 class="text-headline-lg font-headline-lg text-on-surface mb-3">Reporte de Ventas</h3>
                        <p class="text-body-md text-on-surface-variant mb-8 max-w-xs leading-relaxed">
                            Analiza los ingresos, productos más vendidos y rendimiento por fechas. Descubre tendencias y periodos de alta demanda.
                        </p>
                        <div class="mt-auto w-full">
                            <a href="/reports/sales" class="w-full py-4 bg-primary text-on-primary rounded-lg font-bold flex items-center justify-center gap-2 hover:bg-primary-container transition-colors group-hover:translate-y-[-4px]">
                                <span class="material-symbols-outlined">trending_up</span>
                                Ir al Reporte
                            </a>
                        </div>
                        <!-- Stats Preview Overlay (Hover State) -->
                        <div class="absolute inset-x-0 bottom-0 h-1 bg-primary scale-x-0 group-hover:scale-x-100 transition-transform origin-left"></div>
                    </div>
                    
                    <!-- Inventory Report Card -->
                    <div class="group relative bg-surface-container-lowest p-stack-lg rounded-xl shadow-sm hover:shadow-md transition-all duration-300 border border-outline-variant/20 flex flex-col items-center text-center overflow-hidden">
                        <!-- Background Accent Decoration -->
                        <div class="absolute -top-12 -right-12 w-32 h-32 bg-secondary-fixed/30 rounded-full blur-3xl group-hover:bg-secondary-fixed/50 transition-colors"></div>
                        <div class="w-20 h-20 bg-secondary-fixed/20 rounded-full flex items-center justify-center mb-6 relative z-10">
                            <span class="material-symbols-outlined text-[48px] text-secondary" style="font-variation-settings: 'FILL' 1;">inventory_2</span>
                        </div>
                        <h3 class="text-headline-lg font-headline-lg text-on-surface mb-3">Reporte de Inventario</h3>
                        <p class="text-body-md text-on-surface-variant mb-8 max-w-xs leading-relaxed">
                            Consulta el stock actual y el valor total de tus activos. Supervisa mermas y niveles críticos de reabastecimiento.
                        </p>
                        <div class="mt-auto w-full">
                            <a href="/reports/inventory" class="w-full py-4 bg-secondary text-on-secondary rounded-lg font-bold flex items-center justify-center gap-2 hover:bg-on-secondary-container transition-colors group-hover:translate-y-[-4px]">
                                <span class="material-symbols-outlined">shelves</span>
                                Ir al Reporte
                            </a>
                        </div>
                        <!-- Decoration line -->
                        <div class="absolute inset-x-0 bottom-0 h-1 bg-secondary scale-x-0 group-hover:scale-x-100 transition-transform origin-left"></div>
                    </div>
                </div>
                
                <!-- Footer / Quick Metrics Section -->
                <div class="mt-16 grid grid-cols-1 md:grid-cols-3 gap-stack-lg pt-12 border-t border-outline-variant/30">
                    <div class="flex items-start gap-4">
                        <div class="w-12 h-12 rounded-full bg-surface-container flex items-center justify-center flex-shrink-0">
                            <span class="material-symbols-outlined text-primary">schedule</span>
                        </div>
                        <div>
                            <h4 class="text-label-md font-bold text-on-surface uppercase tracking-wider">Último Cierre</h4>
                            <p class="text-headline-md text-on-surface">Ayer, 21:00</p>
                        </div>
                    </div>
                    
                    <div class="flex items-start gap-4">
                        <div class="w-12 h-12 rounded-full bg-surface-container flex items-center justify-center flex-shrink-0">
                            <span class="material-symbols-outlined text-secondary">update</span>
                        </div>
                        <div>
                            <h4 class="text-label-md font-bold text-on-surface uppercase tracking-wider">Siguiente Actualización</h4>
                            <p class="text-headline-md text-on-surface">En 15 minutos</p>
                        </div>
                    </div>
                    
                    <div class="flex items-start gap-4">
                        <div class="w-12 h-12 rounded-full bg-surface-container flex items-center justify-center flex-shrink-0">
                            <span class="material-symbols-outlined text-tertiary">cloud_sync</span>
                        </div>
                        <div>
                            <h4 class="text-label-md font-bold text-on-surface uppercase tracking-wider">Sincronización</h4>
                            <div class="flex items-center gap-2">
                                <p class="text-headline-md text-on-surface">Activa</p>
                                <span class="w-2 h-2 rounded-full bg-green-500 animate-pulse"></span>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Bottom Image Banner (Aesthetic touch) -->
                <div class="mt-12 relative rounded-2xl overflow-hidden h-48 group">
                    <img class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-1000" data-alt="Bakery Banner" src="https://lh3.googleusercontent.com/aida-public/AB6AXuACkCP9Y0CLW448fveULmqAYhzABx7TVMIdfmZ_KNH-A6raPaUHWzPeQ_Hi2M1WrvWcWzDJLyn09QsVQ9o0mO-7wQltk8_PkkDiDzAzAzQy6kdu9MNs0I1W0rS4Vf6ylaQRjtcCHJXMAKAnX-YX9gZXQVZZNcT-eiKqgoz6LTu1u54Y3RWwPQg8Wth9MDJkxqRYizKP-QFFxca6s0bP7Ci4XUkVDTsrRbTPn8Uk--EjAseDuzeHNKrHNIHys3VzNn-Nmn1J_60OqnM"/>
                    <div class="absolute inset-0 bg-gradient-to-r from-primary/80 to-transparent flex items-center p-8">
                        <div class="max-w-md">
                            <h3 class="text-headline-lg font-headline-lg text-on-primary-container mb-2">Artisan Insights</h3>
                            <p class="text-body-md text-on-primary-container/90">Toma mejores decisiones basadas en el comportamiento real de tus clientes y la salud de tu cocina.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Micro-interaction for hover states on buttons
        document.querySelectorAll('button').forEach(button => {
            button.addEventListener('mousedown', () => {
                button.classList.add('scale-[0.98]');
            });
            button.addEventListener('mouseup', () => {
                button.classList.remove('scale-[0.98]');
            });
            button.addEventListener('mouseleave', () => {
                button.classList.remove('scale-[0.98]');
            });
        });
    </script>
</x-layouts.app>
