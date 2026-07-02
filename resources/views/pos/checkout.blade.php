<x-layouts.app active="pos" title="Punto de Venta">
    <!-- View Content -->
    <div class="p-gutter flex flex-col gap-4 min-h-full">
        <!-- Acciones de la vista -->
        <div class="flex justify-between items-center bg-surface-container-low p-4 rounded-xl border border-outline-variant">
            <div class="relative w-full max-w-md">
                <span class="material-symbols-outlined absolute left-3 top-1/2 -translate-y-1/2 text-on-surface-variant">search</span>
                <input class="w-full bg-surface border border-outline-variant rounded-lg pl-10 pr-4 py-2 focus:ring-2 focus:ring-primary focus:border-primary outline-none text-body-md transition-all" placeholder="Buscar producto (nombre o código)..." type="text">
            </div>
            <button class="bg-primary text-on-primary px-4 py-2 rounded-lg font-bold flex items-center gap-2 hover:bg-primary/90 transition-all active:scale-95">
                <span class="material-symbols-outlined">add</span>
                Nueva Venta
            </button>
        </div>
        
        <div class="flex-1 grid grid-cols-12 gap-gutter">
            <!-- Left Column: Products and Cart -->
            <div class="col-span-8 flex flex-col gap-gutter">
                <!-- Productos Frecuentes Bento Card -->
                <section class="bg-surface-container-lowest rounded-xl p-card-padding shadow-soft">
                    <div class="flex items-center justify-between mb-4">
                        <div class="flex items-center gap-2">
                            <span class="material-symbols-outlined text-secondary filled-icon">star</span>
                            <h2 class="text-headline-md font-headline-md text-on-surface">Productos Frecuentes</h2>
                        </div>
                        <button class="text-primary text-label-md hover:underline">Ver todos</button>
                    </div>
                    <div class="flex flex-wrap gap-3">
                        <button class="flex items-center gap-2 px-4 py-2 bg-surface-container rounded-full border border-outline-variant hover:border-primary hover:bg-primary-fixed transition-all group">
                            <span class="text-body-md font-medium text-on-surface group-hover:text-primary">🥐 Croissant</span>
                            <span class="material-symbols-outlined text-body-md text-on-surface-variant group-hover:text-primary">add</span>
                        </button>
                        <button class="flex items-center gap-2 px-4 py-2 bg-surface-container rounded-full border border-outline-variant hover:border-primary hover:bg-primary-fixed transition-all group">
                            <span class="text-body-md font-medium text-on-surface group-hover:text-primary">🍫 Pan de Chocolate</span>
                            <span class="material-symbols-outlined text-body-md text-on-surface-variant group-hover:text-primary">add</span>
                        </button>
                        <button class="flex items-center gap-2 px-4 py-2 bg-surface-container rounded-full border border-outline-variant hover:border-primary hover:bg-primary-fixed transition-all group">
                            <span class="text-body-md font-medium text-on-surface group-hover:text-primary">🍓 Tartaleta</span>
                            <span class="material-symbols-outlined text-body-md text-on-surface-variant group-hover:text-primary">add</span>
                        </button>
                        <button class="flex items-center gap-2 px-4 py-2 bg-surface-container rounded-full border border-outline-variant hover:border-primary hover:bg-primary-fixed transition-all group">
                            <span class="text-body-md font-medium text-on-surface group-hover:text-primary">🥖 Baguette</span>
                            <span class="material-symbols-outlined text-body-md text-on-surface-variant group-hover:text-primary">add</span>
                        </button>
                        <button class="flex items-center gap-2 px-4 py-2 bg-surface-container rounded-full border border-outline-variant hover:border-primary hover:bg-primary-fixed transition-all group">
                            <span class="text-body-md font-medium text-on-surface group-hover:text-primary">🧁 Cupcake Vainilla</span>
                            <span class="material-symbols-outlined text-body-md text-on-surface-variant group-hover:text-primary">add</span>
                        </button>
                    </div>
                </section>
                
                <!-- Carrito Bento Card -->
                <section class="bg-surface-container-lowest rounded-xl p-card-padding shadow-soft flex-1 flex flex-col min-h-[400px]">
                    <div class="flex items-center justify-between mb-6">
                        <div class="flex items-center gap-2">
                            <div class="w-10 h-10 bg-primary-container rounded-full flex items-center justify-center text-on-primary-container">
                                <span class="material-symbols-outlined">shopping_cart</span>
                            </div>
                            <h2 class="text-headline-md font-headline-md text-on-surface">Carrito de Venta</h2>
                        </div>
                        <button class="text-error text-label-md hover:bg-error/5 px-3 py-1 rounded transition-colors">Vaciar carrito</button>
                    </div>
                    
                    <!-- Cart Table -->
                    <div class="overflow-hidden border border-outline-variant rounded-lg">
                        <table class="w-full text-left border-collapse">
                            <thead class="bg-surface-container-high">
                                <tr>
                                    <th class="px-4 py-3 text-label-md font-label-md text-on-surface-variant uppercase">Producto</th>
                                    <th class="px-4 py-3 text-label-md font-label-md text-on-surface-variant uppercase text-center">Precio</th>
                                    <th class="px-4 py-3 text-label-md font-label-md text-on-surface-variant uppercase text-center">Cantidad</th>
                                    <th class="px-4 py-3 text-label-md font-label-md text-on-surface-variant uppercase text-right">Subtotal</th>
                                    <th class="px-4 py-3 w-12"></th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-outline-variant">
                                <tr class="hover:bg-surface-container-low transition-colors">
                                    <td class="px-4 py-4">
                                        <div class="flex items-center gap-3">
                                            <div class="w-10 h-10 rounded-lg bg-tertiary-fixed flex items-center justify-center text-on-tertiary-fixed font-bold">C</div>
                                            <div class="flex flex-col">
                                                <span class="text-body-md font-bold text-on-surface">Croissant de Mantequilla</span>
                                                <span class="text-label-sm text-on-surface-variant">Panadería Dulce</span>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-4 py-4 text-center text-body-md">S/ 4.50</td>
                                    <td class="px-4 py-4">
                                        <div class="flex items-center justify-center gap-2">
                                            <button class="w-8 h-8 rounded-full border border-outline-variant flex items-center justify-center hover:bg-primary-fixed transition-colors">
                                                <span class="material-symbols-outlined text-sm">remove</span>
                                            </button>
                                            <span class="w-8 text-center text-body-md font-bold">2</span>
                                            <button class="w-8 h-8 rounded-full border border-outline-variant flex items-center justify-center hover:bg-primary-fixed transition-colors">
                                                <span class="material-symbols-outlined text-sm">add</span>
                                            </button>
                                        </div>
                                    </td>
                                    <td class="px-4 py-4 text-right text-body-md font-bold">S/ 9.00</td>
                                    <td class="px-4 py-4">
                                        <button class="text-on-surface-variant hover:text-error transition-colors">
                                            <span class="material-symbols-outlined text-[20px]">delete</span>
                                        </button>
                                    </td>
                                </tr>
                                <tr class="hover:bg-surface-container-low transition-colors">
                                    <td class="px-4 py-4">
                                        <div class="flex items-center gap-3">
                                            <div class="w-10 h-10 rounded-lg bg-tertiary-fixed flex items-center justify-center text-on-tertiary-fixed font-bold">T</div>
                                            <div class="flex flex-col">
                                                <span class="text-body-md font-bold text-on-surface">Tartaleta de Fresa</span>
                                                <span class="text-label-sm text-on-surface-variant">Repostería</span>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-4 py-4 text-center text-body-md">S/ 12.00</td>
                                    <td class="px-4 py-4">
                                        <div class="flex items-center justify-center gap-2">
                                            <button class="w-8 h-8 rounded-full border border-outline-variant flex items-center justify-center hover:bg-primary-fixed transition-colors">
                                                <span class="material-symbols-outlined text-sm">remove</span>
                                            </button>
                                            <span class="w-8 text-center text-body-md font-bold">1</span>
                                            <button class="w-8 h-8 rounded-full border border-outline-variant flex items-center justify-center hover:bg-primary-fixed transition-colors">
                                                <span class="material-symbols-outlined text-sm">add</span>
                                            </button>
                                        </div>
                                    </td>
                                    <td class="px-4 py-4 text-right text-body-md font-bold">S/ 12.00</td>
                                    <td class="px-4 py-4">
                                        <button class="text-on-surface-variant hover:text-error transition-colors">
                                            <span class="material-symbols-outlined text-[20px]">delete</span>
                                        </button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </section>
            </div>
            
            <!-- Right Column: Checkout Summary -->
            <div class="col-span-4 flex flex-col gap-gutter">
                <section class="bg-surface-container-lowest rounded-xl p-card-padding shadow-soft flex flex-col gap-6 sticky top-20">
                    <h2 class="text-headline-md font-headline-md text-on-surface">Resumen de Venta</h2>
                    
                    <!-- Cliente Selection -->
                    <div class="flex flex-col gap-2">
                        <label class="text-label-md font-label-md text-on-surface-variant uppercase">Cliente</label>
                        <div class="relative">
                            <select class="w-full bg-surface border border-outline-variant rounded-lg px-4 py-3 appearance-none focus:ring-2 focus:ring-primary focus:border-primary outline-none text-body-md">
                                <option>Venta genérica</option>
                                <option>Juan Pérez (DNI: 12345678)</option>
                                <option>María García (RUC: 20123456789)</option>
                            </select>
                            <span class="material-symbols-outlined absolute right-3 top-1/2 -translate-y-1/2 pointer-events-none text-on-surface-variant">expand_more</span>
                        </div>
                    </div>
                    
                    <!-- Método de Pago -->
                    <div class="flex flex-col gap-3">
                        <label class="text-label-md font-label-md text-on-surface-variant uppercase">Método de Pago</label>
                        <div class="grid grid-cols-2 gap-2">
                            <button class="flex items-center justify-center gap-2 px-3 py-3 rounded-lg border-2 border-primary bg-primary-container text-on-primary-container font-bold transition-all">
                                <span class="material-symbols-outlined">payments</span>
                                <span class="text-label-md">Efectivo</span>
                            </button>
                            <button class="flex items-center justify-center gap-2 px-3 py-3 rounded-lg border-2 border-outline-variant hover:border-primary transition-all text-on-surface-variant hover:text-primary">
                                <span class="material-symbols-outlined">smartphone</span>
                                <span class="text-label-md">Yape</span>
                            </button>
                            <button class="flex items-center justify-center gap-2 px-3 py-3 rounded-lg border-2 border-outline-variant hover:border-primary transition-all text-on-surface-variant hover:text-primary">
                                <span class="material-symbols-outlined">smartphone</span>
                                <span class="text-label-md">Plin</span>
                            </button>
                            <button class="flex items-center justify-center gap-2 px-3 py-3 rounded-lg border-2 border-outline-variant hover:border-primary transition-all text-on-surface-variant hover:text-primary">
                                <span class="material-symbols-outlined">credit_card</span>
                                <span class="text-label-md">Crédito</span>
                            </button>
                        </div>
                    </div>
                    
                    <!-- Payment Calculations -->
                    <div class="flex flex-col gap-4 bg-surface-container-low p-4 rounded-lg">
                        <div class="flex flex-col gap-2">
                            <label class="text-label-md font-label-md text-on-surface-variant uppercase">Monto Recibido</label>
                            <div class="relative">
                                <span class="absolute left-3 top-1/2 -translate-y-1/2 font-bold text-on-surface-variant">S/</span>
                                <input class="w-full bg-surface border border-outline-variant rounded-lg pl-8 pr-4 py-3 focus:ring-2 focus:ring-primary focus:border-primary outline-none text-headline-md font-bold text-on-surface" type="number" value="50.00">
                            </div>
                        </div>
                        <div class="flex justify-between items-center pt-2 border-t border-outline-variant">
                            <span class="text-body-md font-medium text-on-surface-variant">Cambio:</span>
                            <span class="text-headline-md font-bold text-primary">S/ 29.00</span>
                        </div>
                    </div>
                    
                    <!-- Total Section -->
                    <div class="flex flex-col gap-1 border-t-2 border-dashed border-outline-variant pt-6">
                        <div class="flex justify-between items-end">
                            <span class="text-headline-md font-bold text-on-surface uppercase tracking-tighter">Total:</span>
                            <span class="text-[40px] leading-none font-extrabold text-primary">S/ 21.00</span>
                        </div>
                    </div>
                    
                    <!-- Action Button -->
                    <button class="w-full bg-primary-container text-on-primary-container py-5 rounded-xl text-headline-md font-bold flex items-center justify-center gap-3 hover:brightness-110 active:scale-[0.98] transition-all shadow-lg">
                        <span class="material-symbols-outlined filled-icon">check_circle</span>
                        Confirmar Venta
                    </button>
                </section>
            </div>
        </div>
        </div>
        
        <!-- System Footer -->
        <footer class="h-12 flex items-center justify-center px-gutter border-t border-outline-variant bg-surface-container-low text-on-surface-variant mt-auto">
            <p class="text-label-md font-label-md">© 2026 — Pastelería Dulce Corazón — Todos los derechos reservados</p>
        </footer>
    </div>
    <!-- Floating Action Button -->
    <button class="fixed bottom-margin-page right-margin-page w-14 h-14 bg-secondary text-on-secondary rounded-full flex items-center justify-center shadow-xl hover:scale-110 active:scale-95 transition-all z-50">
        <span class="material-symbols-outlined">person_add</span>
    </button>
    
    <!-- Scripts for animations provided by user -->
    <script>
        document.querySelectorAll('button').forEach(btn => {
            btn.addEventListener('mousedown', function() {
                this.classList.add('scale-95');
            });
            btn.addEventListener('mouseup', function() {
                this.classList.remove('scale-95');
            });
            btn.addEventListener('mouseleave', function() {
                this.classList.remove('scale-95');
            });
        });

        function animateToCart(btn) {
            btn.classList.add('bg-primary-fixed-dim');
            setTimeout(() => {
                btn.classList.remove('bg-primary-fixed-dim');
            }, 300);
        }

        document.querySelectorAll('button[class*="group"]').forEach(btn => {
            btn.addEventListener('click', () => animateToCart(btn));
        });
    </script>
</x-layouts.app>
