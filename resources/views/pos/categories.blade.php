<x-layouts.app>
    <x-pos.sidebar active="categories" />

    <!-- Main Canvas -->
    <main class="ml-[260px] min-h-screen">
        <!-- TopAppBar -->
        <header class="h-16 flex justify-between items-center px-8 bg-surface border-b border-outline-variant sticky top-0 z-40">
            <div class="flex items-center bg-surface-container-high px-4 py-2 rounded-full w-96 transition-all focus-within:ring-2 focus-within:ring-primary focus-within:bg-white">
                <span class="material-symbols-outlined text-outline mr-2">search</span>
                <input class="bg-transparent border-none outline-none text-body-md w-full focus:ring-0" placeholder="Buscar categoría..." type="text"/>
            </div>
            
            <div class="flex items-center gap-4">
                <button class="w-10 h-10 flex items-center justify-center rounded-full hover:bg-surface-container-high transition-colors">
                    <span class="material-symbols-outlined">notifications</span>
                </button>
                <div class="h-8 w-[1px] bg-outline-variant"></div>
                <button class="flex items-center gap-2 px-3 py-1.5 rounded-full hover:bg-surface-container-high transition-colors">
                    <span class="text-label-md font-bold text-primary">Artisan POS</span>
                    <span class="material-symbols-outlined">account_circle</span>
                </button>
            </div>
        </header>
        
        <!-- Content Area -->
        <div class="p-margin-page max-w-7xl mx-auto space-y-gutter">
            <!-- Header & Metrics -->
            <div class="flex flex-col md:flex-row md:items-end justify-between gap-6">
                <div>
                    <nav class="flex text-label-sm text-outline mb-2">
                        <span>Inventario</span>
                        <span class="mx-2">/</span>
                        <span class="text-primary font-bold">Gestión de Categorías</span>
                    </nav>
                    <h2 class="font-headline-xl text-headline-xl text-on-surface">Gestión de Categorías</h2>
                    <p class="text-body-md text-on-surface-variant mt-1">Organiza y administra las familias de productos de tu pastelería.</p>
                </div>
                
                <div class="flex gap-4">
                    <!-- Metric Card 1 -->
                    <div class="bg-white p-4 rounded-xl shadow-sm border border-outline-variant/30 flex items-center gap-4 min-w-[200px]">
                        <div class="w-12 h-12 bg-secondary-container rounded-full flex items-center justify-center text-on-secondary-container">
                            <span class="material-symbols-outlined">category</span>
                        </div>
                        <div>
                            <p class="text-label-sm text-on-surface-variant">Total Categorías</p>
                            <p class="text-headline-md font-bold">24</p>
                        </div>
                    </div>
                    
                    <!-- Metric Card 2 -->
                    <div class="bg-white p-4 rounded-xl shadow-sm border border-outline-variant/30 flex items-center gap-4 min-w-[200px]">
                        <div class="w-12 h-12 bg-primary-fixed-dim rounded-full flex items-center justify-center text-on-primary-fixed-variant">
                            <span class="material-symbols-outlined">check_circle</span>
                        </div>
                        <div>
                            <p class="text-label-sm text-on-surface-variant">Productos Activos</p>
                            <p class="text-headline-md font-bold">156</p>
                        </div>
                    </div>
                    
                    <button class="bg-primary text-on-primary px-6 py-3 rounded-xl font-bold flex items-center gap-2 shadow-lg shadow-primary/20 hover:scale-[1.02] active:scale-[0.98] transition-all">
                        <span class="material-symbols-outlined">add</span>
                        Nueva Venta
                    </button>
                </div>
            </div>
            
            <!-- Main Inventory Table Card -->
            <div class="bg-white rounded-2xl shadow-sm border border-outline-variant/20 overflow-hidden">
                <div class="px-card-padding py-4 border-b border-outline-variant/30 flex justify-between items-center bg-white/50 backdrop-blur-sm sticky top-0">
                    <h3 class="font-headline-md text-headline-md text-on-surface flex items-center gap-2">
                        <span class="material-symbols-outlined text-primary">list_alt</span>
                        Listado de Categorías
                    </h3>
                    <button class="text-primary bg-primary-fixed px-4 py-2 rounded-lg font-bold text-label-md flex items-center gap-2 hover:bg-primary-fixed-dim transition-colors">
                        <span class="material-symbols-outlined text-[18px]">add_circle</span>
                        Agregar Categoría
                    </button>
                </div>
                
                <div class="overflow-x-auto">
                    <table class="w-full text-left">
                        <thead>
                            <tr class="bg-surface-container/50">
                                <th class="px-card-padding py-4 text-label-md text-on-surface-variant font-bold uppercase tracking-wider">Nombre de Categoría</th>
                                <th class="px-card-padding py-4 text-label-md text-on-surface-variant font-bold uppercase tracking-wider">Productos</th>
                                <th class="px-card-padding py-4 text-label-md text-on-surface-variant font-bold uppercase tracking-wider text-center">Estado</th>
                                <th class="px-card-padding py-4 text-label-md text-on-surface-variant font-bold uppercase tracking-wider text-right">Acciones</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-outline-variant/20">
                            <!-- Row 1 -->
                            <tr class="hover:bg-surface-container-low transition-colors group">
                                <td class="px-card-padding py-5">
                                    <div class="flex items-center gap-3">
                                        <div class="w-10 h-10 bg-secondary/10 text-secondary rounded-lg flex items-center justify-center">
                                            <span class="material-symbols-outlined">cake</span>
                                        </div>
                                        <div>
                                            <p class="font-bold text-body-lg">Pasteles de Boda</p>
                                            <p class="text-label-sm text-outline">Pedidos personalizados de lujo</p>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-card-padding py-5 text-body-md">12 productos</td>
                                <td class="px-card-padding py-5 text-center">
                                    <span class="bg-primary/10 text-primary px-3 py-1 rounded-full text-label-sm font-bold border border-primary/20">Activo</span>
                                </td>
                                <td class="px-card-padding py-5 text-right space-x-2">
                                    <button class="p-2 text-primary hover:bg-primary/10 rounded-lg transition-colors" title="Editar">
                                        <span class="material-symbols-outlined">edit</span>
                                    </button>
                                    <button class="p-2 text-secondary hover:bg-secondary/10 rounded-lg transition-colors" title="Desactivar">
                                        <span class="material-symbols-outlined">visibility_off</span>
                                    </button>
                                    <button class="p-2 text-error hover:bg-error/10 rounded-lg transition-colors" title="Eliminar">
                                        <span class="material-symbols-outlined">delete</span>
                                    </button>
                                </td>
                            </tr>
                            
                            <!-- Row 2 -->
                            <tr class="hover:bg-surface-container-low transition-colors group">
                                <td class="px-card-padding py-5">
                                    <div class="flex items-center gap-3">
                                        <div class="w-10 h-10 bg-primary/10 text-primary rounded-lg flex items-center justify-center">
                                            <span class="material-symbols-outlined">bakery_dining</span>
                                        </div>
                                        <div>
                                            <p class="font-bold text-body-lg">Bollería Artesanal</p>
                                            <p class="text-label-sm text-outline">Panes recién horneados diarios</p>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-card-padding py-5 text-body-md">45 productos</td>
                                <td class="px-card-padding py-5 text-center">
                                    <span class="bg-primary/10 text-primary px-3 py-1 rounded-full text-label-sm font-bold border border-primary/20">Activo</span>
                                </td>
                                <td class="px-card-padding py-5 text-right space-x-2">
                                    <button class="p-2 text-primary hover:bg-primary/10 rounded-lg transition-colors">
                                        <span class="material-symbols-outlined">edit</span>
                                    </button>
                                    <button class="p-2 text-secondary hover:bg-secondary/10 rounded-lg transition-colors">
                                        <span class="material-symbols-outlined">visibility_off</span>
                                    </button>
                                    <button class="p-2 text-error hover:bg-error/10 rounded-lg transition-colors">
                                        <span class="material-symbols-outlined">delete</span>
                                    </button>
                                </td>
                            </tr>
                            
                            <!-- Row 3 -->
                            <tr class="hover:bg-surface-container-low transition-colors group">
                                <td class="px-card-padding py-5">
                                    <div class="flex items-center gap-3">
                                        <div class="w-10 h-10 bg-tertiary-fixed-dim/30 text-tertiary rounded-lg flex items-center justify-center">
                                            <span class="material-symbols-outlined">cookie</span>
                                        </div>
                                        <div>
                                            <p class="font-bold text-body-lg">Galletas & Snacks</p>
                                            <p class="text-label-sm text-outline">Galletería fina y empacada</p>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-card-padding py-5 text-body-md">28 productos</td>
                                <td class="px-card-padding py-5 text-center">
                                    <span class="bg-outline/10 text-outline px-3 py-1 rounded-full text-label-sm font-bold border border-outline/20">Inactivo</span>
                                </td>
                                <td class="px-card-padding py-5 text-right space-x-2">
                                    <button class="p-2 text-primary hover:bg-primary/10 rounded-lg transition-colors">
                                        <span class="material-symbols-outlined">edit</span>
                                    </button>
                                    <button class="p-2 text-primary hover:bg-primary/10 rounded-lg transition-colors">
                                        <span class="material-symbols-outlined">visibility</span>
                                    </button>
                                    <button class="p-2 text-error hover:bg-error/10 rounded-lg transition-colors">
                                        <span class="material-symbols-outlined">delete</span>
                                    </button>
                                </td>
                            </tr>
                            
                            <!-- Row 4 -->
                            <tr class="hover:bg-surface-container-low transition-colors group">
                                <td class="px-card-padding py-5">
                                    <div class="flex items-center gap-3">
                                        <div class="w-10 h-10 bg-secondary-container/20 text-on-secondary-container rounded-lg flex items-center justify-center">
                                            <span class="material-symbols-outlined">coffee</span>
                                        </div>
                                        <div>
                                            <p class="font-bold text-body-lg">Cafetería</p>
                                            <p class="text-label-sm text-outline">Bebidas calientes y frías</p>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-card-padding py-5 text-body-md">18 productos</td>
                                <td class="px-card-padding py-5 text-center">
                                    <span class="bg-primary/10 text-primary px-3 py-1 rounded-full text-label-sm font-bold border border-primary/20">Activo</span>
                                </td>
                                <td class="px-card-padding py-5 text-right space-x-2">
                                    <button class="p-2 text-primary hover:bg-primary/10 rounded-lg transition-colors">
                                        <span class="material-symbols-outlined">edit</span>
                                    </button>
                                    <button class="p-2 text-secondary hover:bg-secondary/10 rounded-lg transition-colors">
                                        <span class="material-symbols-outlined">visibility_off</span>
                                    </button>
                                    <button class="p-2 text-error hover:bg-error/10 rounded-lg transition-colors">
                                        <span class="material-symbols-outlined">delete</span>
                                    </button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                
                <!-- Pagination Footer -->
                <div class="px-card-padding py-4 border-t border-outline-variant/30 flex items-center justify-between">
                    <p class="text-label-md text-on-surface-variant">Mostrando 1 a 4 de 24 categorías</p>
                    <div class="flex gap-2">
                        <button class="w-10 h-10 flex items-center justify-center rounded-lg border border-outline-variant text-outline hover:bg-surface-container transition-colors disabled:opacity-50" disabled>
                            <span class="material-symbols-outlined">chevron_left</span>
                        </button>
                        <button class="w-10 h-10 flex items-center justify-center rounded-lg bg-primary text-on-primary font-bold">1</button>
                    </div>
                </div>
            </div>
        </div>
    </main>
</x-layouts.app>
