<x-layouts.app>
    <!-- Sidebar Component -->
    <x-pos.sidebar active="dashboard" />

    <!-- Main Content Area -->
    <main class="flex-1 ml-[260px] p-8 h-screen overflow-y-auto bg-background">
        
        <!-- Header -->
        <header class="flex justify-between items-center mb-8">
            <h1 class="text-[28px] font-bold text-primary">Dashboard</h1>
            
            <div class="flex items-center gap-6">
                <!-- Search -->
                <div class="relative">
                    <span class="material-symbols-outlined absolute left-3 top-1/2 -translate-y-1/2 text-gray-400 text-xl">search</span>
                    <input type="text" placeholder="Buscar..." class="w-64 pl-10 pr-4 py-2 rounded-lg bg-surface border border-surface-variant focus:outline-none focus:ring-1 focus:ring-primary text-sm shadow-sm">
                </div>
                
                <!-- Notification -->
                <div class="relative cursor-pointer">
                    <span class="material-symbols-outlined text-gray-600 text-2xl">notifications</span>
                    <span class="absolute top-0.5 right-0.5 w-2 h-2 bg-secondary-container rounded-full"></span>
                </div>
                
                <!-- Button -->
                <button class="bg-primary-container hover:bg-primary text-on-primary px-4 py-2 rounded-lg text-sm font-medium flex items-center gap-2 shadow-sm transition-colors">
                    <span class="material-symbols-outlined text-[18px]">add</span>
                    Nuevo Pedido
                </button>
            </div>
        </header>

        <!-- Alert Table Section -->
        <section class="bg-surface rounded-xl shadow-sm border border-surface-variant mb-8 overflow-hidden">
            <div class="bg-[#FFF4EC] px-6 py-4 flex justify-between items-center border-b border-[#FBE6D6]">
                <div class="flex items-center gap-2 text-[#9A3816]">
                    <span class="material-symbols-outlined">warning</span>
                    <h3 class="font-semibold text-sm">Pedidos Especiales Pendientes (3)</h3>
                </div>
                <a href="#" class="text-[#9A3816] text-xs font-semibold hover:underline">Ver Todos</a>
            </div>
            <div class="overflow-x-auto">
                <table class="w-full text-left text-sm text-gray-700">
                    <thead class="text-xs text-gray-500 font-semibold bg-[#FAFAFA] border-b border-surface-variant">
                        <tr>
                            <th class="px-6 py-3 font-semibold">Pedido #</th>
                            <th class="px-6 py-3 font-semibold">Cliente</th>
                            <th class="px-6 py-3 font-semibold">Total</th>
                            <th class="px-6 py-3 font-semibold">Fecha Entrega</th>
                            <th class="px-6 py-3 font-semibold">Estado</th>
                            <th class="px-6 py-3 font-semibold">Acción</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="px-6 py-4 font-medium">#253</td>
                            <td class="px-6 py-4">Marcos</td>
                            <td class="px-6 py-4">S/27.00</td>
                            <td class="px-6 py-4">28/10/2026</td>
                            <td class="px-6 py-4">
                                <span class="bg-[#FFE5E5] text-[#C0392B] px-2.5 py-1 rounded-md text-xs font-semibold">Vencido</span>
                            </td>
                            <td class="px-6 py-4">
                                <button class="bg-[#2D7D74] hover:bg-[#22635B] text-white px-4 py-1.5 rounded-md text-xs font-medium transition-colors">Pagado</button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </section>

        <!-- Greeting -->
        <div class="mb-6">
            <h2 class="text-2xl font-bold text-gray-900 mb-1">¡Feliz día, Carlos!</h2>
            <p class="text-gray-600 text-sm">Aquí tienes un vistazo a tu panadería hoy.</p>
        </div>

        <!-- Stat Cards Grid -->
        <div class="grid grid-cols-4 gap-6 mb-8">
            <!-- Card 1 -->
            <div class="bg-surface rounded-xl p-5 shadow-sm border border-surface-variant relative overflow-hidden flex flex-col justify-between h-40">
                <!-- Decorative Blob -->
                <div class="absolute top-0 right-0 w-24 h-24 bg-[#EAF7F5] rounded-bl-full -mr-4 -mt-4 opacity-50 pointer-events-none"></div>
                <div>
                    <div class="w-8 h-8 rounded-full bg-[#EAF7F5] text-primary flex items-center justify-center mb-4">
                        <span class="material-symbols-outlined text-lg">cake</span>
                    </div>
                    <h3 class="text-2xl font-bold text-gray-900 mb-0.5">18</h3>
                    <p class="text-xs text-gray-600">Tartas Vendidas Hoy</p>
                </div>
                <a href="#" class="text-primary text-xs font-semibold flex items-center gap-1 hover:underline mt-4 z-10">
                    Ver Detalles <span class="material-symbols-outlined text-sm">arrow_forward</span>
                </a>
            </div>

            <!-- Card 2 -->
            <div class="bg-surface rounded-xl p-5 shadow-sm border border-surface-variant relative overflow-hidden flex flex-col justify-between h-40">
                <div class="absolute top-0 right-0 w-24 h-24 bg-[#FFF0E6] rounded-bl-full -mr-4 -mt-4 opacity-50 pointer-events-none"></div>
                <div>
                    <div class="w-8 h-8 rounded-full bg-[#FFF0E6] text-[#D35400] flex items-center justify-center mb-4">
                        <span class="material-symbols-outlined text-lg">bakery_dining</span>
                    </div>
                    <h3 class="text-2xl font-bold text-gray-900 mb-0.5">45</h3>
                    <p class="text-xs text-gray-600">Pedidos Pan Completo</p>
                </div>
                <a href="#" class="text-[#D35400] text-xs font-semibold flex items-center gap-1 hover:underline mt-4 z-10">
                    Ver Listado <span class="material-symbols-outlined text-sm">arrow_forward</span>
                </a>
            </div>

            <!-- Card 3 -->
            <div class="bg-surface rounded-xl p-5 shadow-sm border border-surface-variant relative overflow-hidden flex flex-col justify-between h-40">
                <div class="absolute top-0 right-0 w-24 h-24 bg-gray-100 rounded-bl-full -mr-4 -mt-4 opacity-50 pointer-events-none"></div>
                <div>
                    <div class="w-8 h-8 rounded-full bg-gray-100 text-gray-600 flex items-center justify-center mb-4">
                        <span class="material-symbols-outlined text-lg">restaurant</span>
                    </div>
                    <h3 class="text-2xl font-bold text-gray-900 mb-0.5">3</h3>
                    <p class="text-xs text-gray-600">Recetas Nuevas Creadas</p>
                </div>
                <a href="#" class="text-gray-600 text-xs font-semibold flex items-center gap-1 hover:underline mt-4 z-10">
                    Ver Catálogo <span class="material-symbols-outlined text-sm">arrow_forward</span>
                </a>
            </div>

            <!-- Card 4 -->
            <div class="bg-surface rounded-xl p-5 shadow-sm border border-surface-variant relative overflow-hidden flex flex-col justify-between h-40">
                <div class="absolute top-0 right-0 w-24 h-24 bg-[#FFE5E5] rounded-bl-full -mr-4 -mt-4 opacity-50 pointer-events-none"></div>
                <div>
                    <div class="w-8 h-8 rounded-full bg-[#FFE5E5] text-[#C0392B] flex items-center justify-center mb-4">
                        <span class="material-symbols-outlined text-lg">shopping_bag</span>
                    </div>
                    <h3 class="text-2xl font-bold text-gray-900 mb-0.5">12</h3>
                    <p class="text-xs text-gray-600">Nuevos Ingredientes</p>
                </div>
                <a href="#" class="text-[#C0392B] text-xs font-semibold flex items-center gap-1 hover:underline mt-4 z-10">
                    Ver Catálogo <span class="material-symbols-outlined text-sm">arrow_forward</span>
                </a>
            </div>
        </div>

        <!-- Bottom Section: Chart & Top Sellers -->
        <div class="grid grid-cols-[2fr_1fr] gap-6 pb-12">
            
            <!-- Chart Section -->
            <div class="bg-surface rounded-xl p-6 shadow-sm border border-surface-variant flex flex-col">
                <div class="flex justify-between items-center mb-6">
                    <h3 class="text-xs font-bold text-gray-900 tracking-wider">VENTAS POR CATEGORÍA — ESTA SEMANA</h3>
                    <span class="material-symbols-outlined text-gray-400 cursor-pointer hover:text-gray-600">more_vert</span>
                </div>
                <!-- Simulated Chart Area -->
                <div class="flex-1 relative min-h-[200px]">
                    <div class="absolute inset-0 flex flex-col justify-between text-[10px] text-gray-400">
                        <div class="border-b border-gray-100 border-dashed w-full pb-1">100</div>
                        <div class="border-b border-gray-100 border-dashed w-full pb-1">75</div>
                        <div class="border-b border-gray-100 border-dashed w-full pb-1">50</div>
                    </div>
                    <!-- Chart Curves (SVG Mock) -->
                    <svg class="absolute inset-0 w-full h-full" preserveAspectRatio="none" viewBox="0 0 100 100">
                        <!-- Orange Curve -->
                        <path d="M 20 100 Q 40 40 60 100" fill="none" stroke="#fd9b5e" stroke-width="1.5" stroke-linecap="round"/>
                        <!-- Teal Curve -->
                        <path d="M 50 100 Q 80 10 95 40 T 100 80" fill="none" stroke="#03645c" stroke-width="1.5" stroke-linecap="round"/>
                    </svg>
                </div>
            </div>

            <!-- Top Sellers List -->
            <div class="bg-surface rounded-xl p-6 shadow-sm border border-surface-variant flex flex-col">
                <div class="flex justify-between items-center mb-6">
                    <h3 class="text-xs font-bold text-gray-900 tracking-wider">LOS MÁS VENDIDOS</h3>
                    <span class="text-[10px] text-gray-400 font-medium">Últimos 3 Días</span>
                </div>
                <div class="space-y-5">
                    <!-- Item 1 -->
                    <div class="flex justify-between items-center">
                        <div class="flex items-center gap-3">
                            <div class="w-6 h-6 rounded-full bg-[#2D7D74] text-white flex items-center justify-center text-xs font-bold">1</div>
                            <span class="text-sm font-medium text-gray-800">Croissant Clásico</span>
                        </div>
                        <span class="text-xs text-gray-400 font-medium">120 ud.</span>
                    </div>
                    <!-- Item 2 -->
                    <div class="flex justify-between items-center">
                        <div class="flex items-center gap-3">
                            <div class="w-6 h-6 rounded-full bg-[#fd9b5e] text-white flex items-center justify-center text-xs font-bold">2</div>
                            <span class="text-sm font-medium text-gray-800">Tartaleta de Frutas</span>
                        </div>
                        <span class="text-xs text-gray-400 font-medium">95 ud.</span>
                    </div>
                    <!-- Item 3 -->
                    <div class="flex justify-between items-center">
                        <div class="flex items-center gap-3">
                            <div class="w-6 h-6 rounded-full bg-[#eae1dc] text-gray-700 flex items-center justify-center text-xs font-bold">3</div>
                            <span class="text-sm font-medium text-gray-800">Pan de Chocolate</span>
                        </div>
                        <span class="text-xs text-gray-400 font-medium">88 ud.</span>
                    </div>
                    <!-- Item 4 -->
                    <div class="flex justify-between items-center">
                        <div class="flex items-center gap-3">
                            <div class="w-6 h-6 rounded-full bg-[#eae1dc] text-gray-700 flex items-center justify-center text-xs font-bold">4</div>
                            <span class="text-sm font-medium text-gray-800">Bizcocho de Limón</span>
                        </div>
                        <span class="text-xs text-gray-400 font-medium">60 ud.</span>
                    </div>
                    <!-- Item 5 -->
                    <div class="flex justify-between items-center">
                        <div class="flex items-center gap-3">
                            <div class="w-6 h-6 rounded-full bg-[#eae1dc] text-gray-700 flex items-center justify-center text-xs font-bold">5</div>
                            <span class="text-sm font-medium text-gray-800">Eclair de Crema</span>
                        </div>
                        <span class="text-xs text-gray-400 font-medium">45 ud.</span>
                    </div>
                </div>
            </div>

        </div>
        
        <!-- Footer Info -->
        <div class="text-center text-[10px] text-gray-400 font-medium pb-4">
            &copy; 2026 — Pastelería Dulce Corazón — Todos los derechos reservados
        </div>
    </main>
</x-layouts.app>
