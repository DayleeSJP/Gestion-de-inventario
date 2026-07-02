<x-layouts.app>
    <x-pos.sidebar active="products" />

    <!-- Main Content Canvas -->
    <main class="ml-[260px] flex-1 min-h-screen flex flex-col overflow-x-hidden">
        <!-- TopAppBar -->
        <header class="sticky top-0 z-40 bg-surface-container-low px-margin-page py-stack-md flex justify-between items-center h-20">
            <h2 class="font-headline-lg text-headline-lg text-primary">Gestión de Productos</h2>
            <div class="flex items-center gap-stack-md">
                <button class="flex items-center gap-2 bg-primary-container text-on-primary-container px-6 py-2.5 rounded-lg font-body-md text-body-md hover:opacity-90 active:scale-95 transition-all shadow-sm">
                    <span class="material-symbols-outlined" data-icon="add">add</span>
                    Nuevo Producto
                </button>
                <div class="flex gap-2">
                    <button class="p-2.5 text-on-surface-variant hover:bg-surface-variant/50 rounded-full transition-colors">
                        <span class="material-symbols-outlined" data-icon="notifications">notifications</span>
                    </button>
                    <button class="p-2.5 text-on-surface-variant hover:bg-surface-variant/50 rounded-full transition-colors">
                        <span class="material-symbols-outlined" data-icon="help_outline">help_outline</span>
                    </button>
                </div>
            </div>
        </header>
        
        <!-- Filters & Search Toolbar -->
        <div class="px-margin-page py-stack-md bg-surface flex flex-wrap items-center gap-gutter">
            <div class="relative flex-1 min-w-[300px]">
                <span class="absolute left-4 top-1/2 -translate-y-1/2 material-symbols-outlined text-outline" data-icon="search">search</span>
                <input class="w-full pl-12 pr-4 py-2.5 rounded-lg border border-outline-variant bg-white focus:border-primary focus:ring-1 focus:ring-primary outline-none font-body-md text-body-md transition-all" placeholder="Buscar por nombre, código o categoría..." type="text">
            </div>
            <div class="flex items-center gap-stack-md">
                <div class="flex flex-col gap-1">
                    <label class="text-label-sm font-label-sm text-on-surface-variant ml-1">Categoría</label>
                    <select class="bg-white border border-outline-variant rounded-lg px-4 py-2 font-body-md text-body-md min-w-[160px] focus:border-primary outline-none">
                        <option>Todas</option>
                        <option>Panadería</option>
                        <option>Pastelería</option>
                        <option>Cafetería</option>
                    </select>
                </div>
                <div class="flex flex-col gap-1">
                    <label class="text-label-sm font-label-sm text-on-surface-variant ml-1">Stock</label>
                    <select class="bg-white border border-outline-variant rounded-lg px-4 py-2 font-body-md text-body-md min-w-[160px] focus:border-primary outline-none">
                        <option>Todos</option>
                        <option>En Stock</option>
                        <option>Stock Bajo</option>
                        <option>Agotado</option>
                    </select>
                </div>
                <button class="mt-5 flex items-center gap-2 px-4 py-2 text-on-surface-variant hover:bg-surface-container-high rounded-lg transition-colors border border-outline-variant bg-white">
                    <span class="material-symbols-outlined text-[20px]" data-icon="filter_list">filter_list</span>
                    <span class="font-label-md text-label-md">Filtros</span>
                </button>
            </div>
        </div>
        
        <!-- Product Grid -->
        <div class="px-margin-page pb-margin-page">
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-gutter mt-stack-lg">
                <!-- Product Card 1 -->
                <div class="bg-white rounded-xl card-shadow overflow-hidden border border-transparent hover:border-primary-container transition-all group">
                    <div class="relative h-48 overflow-hidden">
                        <img class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110" data-alt="Croissant" src="https://lh3.googleusercontent.com/aida-public/AB6AXuAJP9GCzXMD1h0hfbMi22V0flENG-g3su1egnuvyOslrrA7SXlQ4DXBYRRoxqHRYznbLKOJ6fzSZ50JDGOqz7QDsFVHvbu_i_1QrLR-GtS8YpgZRvkLhUK-9x5nPDzsZa2lfDYflq6Z8OjZEcJyIUS9UgipJYpF8zAhsFeOyYCHH1O8GqkPYYzJI7n0acNqTRyLtJjdVoDHLp3F-xPDpru0_8HoiJno0tWlIG6c4dn-SVq7L8EuLr2lfDccw2JCsrlYiuXm2NNZUVk">
                        <div class="absolute top-3 right-3 flex flex-col gap-2 opacity-0 group-hover:opacity-100 transition-opacity">
                            <button class="p-2 bg-white/90 backdrop-blur rounded-full text-primary hover:bg-primary-container hover:text-white shadow-lg transition-all">
                                <span class="material-symbols-outlined text-[18px]" data-icon="edit">edit</span>
                            </button>
                            <button class="p-2 bg-white/90 backdrop-blur rounded-full text-error hover:bg-error hover:text-white shadow-lg transition-all">
                                <span class="material-symbols-outlined text-[18px]" data-icon="delete">delete</span>
                            </button>
                        </div>
                    </div>
                    <div class="p-card-padding">
                        <div class="flex justify-between items-start mb-2">
                            <span class="px-2 py-0.5 bg-primary-fixed/30 text-on-primary-fixed-variant rounded text-label-sm font-label-sm">Panadería</span>
                            <span class="text-primary font-bold font-body-lg text-body-lg">S/ 4.50</span>
                        </div>
                        <h3 class="font-headline-md text-headline-md text-on-surface mb-4">Croissant de Mantequilla</h3>
                        <div class="flex items-center justify-between">
                            <div class="flex items-center gap-2">
                                <span class="material-symbols-outlined text-primary text-[20px]" data-icon="inventory">inventory</span>
                                <span class="font-body-md text-body-md text-on-surface-variant">42 unidades</span>
                            </div>
                            <span class="bg-primary/10 text-primary px-3 py-1 rounded-full text-label-md font-label-md">En Stock</span>
                        </div>
                    </div>
                </div>
                
                <!-- Product Card 2 (Low Stock) -->
                <div class="bg-white rounded-xl card-shadow overflow-hidden border border-transparent hover:border-primary-container transition-all group">
                    <div class="relative h-48 overflow-hidden">
                        <img class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110" data-alt="Tarta de Fresas" src="https://lh3.googleusercontent.com/aida-public/AB6AXuCSJhra_t33SIEIKnBeGq4a1DqHifecL31pJYoyBh8mFWRCW8ny5D57Pqm1iF5jQybNkpw-wezZ2ZLENbfHHENaLpaweAsN5LdxV4o26w9Yd26YnvZqGRoLAURGXh0Uikeca5mbawaGHbgc5GfkWsSlE2ZnVcm7hwrImSgWfhkD78YDrzlyu1LDUsYQI5bgIbvNLTRTnrdmOlF2h3dLvGZlCRfTjQtqYVd-XIn2Q5fT5BI7qfyHXTP5z_T8MjYWZgfrk2ZGCEFwmuU">
                        <div class="absolute top-3 right-3 flex flex-col gap-2 opacity-0 group-hover:opacity-100 transition-opacity">
                            <button class="p-2 bg-white/90 backdrop-blur rounded-full text-primary hover:bg-primary-container hover:text-white shadow-lg transition-all">
                                <span class="material-symbols-outlined text-[18px]" data-icon="edit">edit</span>
                            </button>
                            <button class="p-2 bg-white/90 backdrop-blur rounded-full text-error hover:bg-error hover:text-white shadow-lg transition-all">
                                <span class="material-symbols-outlined text-[18px]" data-icon="delete">delete</span>
                            </button>
                        </div>
                    </div>
                    <div class="p-card-padding">
                        <div class="flex justify-between items-start mb-2">
                            <span class="px-2 py-0.5 bg-secondary-fixed/50 text-on-secondary-fixed-variant rounded text-label-sm font-label-sm">Pastelería</span>
                            <span class="text-primary font-bold font-body-lg text-body-lg">S/ 12.00</span>
                        </div>
                        <h3 class="font-headline-md text-headline-md text-on-surface mb-4">Tarta de Fresas</h3>
                        <div class="flex items-center justify-between">
                            <div class="flex items-center gap-2">
                                <span class="material-symbols-outlined text-secondary text-[20px]" data-icon="warning">warning</span>
                                <span class="font-body-md text-body-md text-on-surface-variant">5 unidades</span>
                            </div>
                            <span class="bg-secondary-container/20 text-secondary px-3 py-1 rounded-full text-label-md font-label-md">Stock Bajo</span>
                        </div>
                    </div>
                </div>
                
                <!-- Product Card 3 -->
                <div class="bg-white rounded-xl card-shadow overflow-hidden border border-transparent hover:border-primary-container transition-all group">
                    <div class="relative h-48 overflow-hidden">
                        <img class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110" data-alt="Pan de Chocolate" src="https://lh3.googleusercontent.com/aida-public/AB6AXuAInWOWYgS1Xit4nLnvkAXFKqGiSVIksvk3cIUNbTNbzNO-FGNeNs2RuCtDWZf0mJUYGUMbRjQI88YM10W608HNWl87mLyg9te_XDnGutvE-qxx3Wb9auSZYuhvPLO63xGf6mPHihcdDRRilu9X4znUa75TmgTMtbzc7B1JTJqqrV3R6ng9JxinIpskBkp284Xb8_c7aCSWtv5C0_CCjXRJLwEqc_ug9KHmfqOLyQ-CBMygtB8ayAO7rHU3vka2wCo7MVOQuojEHag">
                        <div class="absolute top-3 right-3 flex flex-col gap-2 opacity-0 group-hover:opacity-100 transition-opacity">
                            <button class="p-2 bg-white/90 backdrop-blur rounded-full text-primary hover:bg-primary-container hover:text-white shadow-lg transition-all">
                                <span class="material-symbols-outlined text-[18px]" data-icon="edit">edit</span>
                            </button>
                            <button class="p-2 bg-white/90 backdrop-blur rounded-full text-error hover:bg-error hover:text-white shadow-lg transition-all">
                                <span class="material-symbols-outlined text-[18px]" data-icon="delete">delete</span>
                            </button>
                        </div>
                    </div>
                    <div class="p-card-padding">
                        <div class="flex justify-between items-start mb-2">
                            <span class="px-2 py-0.5 bg-primary-fixed/30 text-on-primary-fixed-variant rounded text-label-sm font-label-sm">Panadería</span>
                            <span class="text-primary font-bold font-body-lg text-body-lg">S/ 5.50</span>
                        </div>
                        <h3 class="font-headline-md text-headline-md text-on-surface mb-4">Pan de Chocolate</h3>
                        <div class="flex items-center justify-between">
                            <div class="flex items-center gap-2">
                                <span class="material-symbols-outlined text-primary text-[20px]" data-icon="inventory">inventory</span>
                                <span class="font-body-md text-body-md text-on-surface-variant">18 unidades</span>
                            </div>
                            <span class="bg-primary/10 text-primary px-3 py-1 rounded-full text-label-md font-label-md">En Stock</span>
                        </div>
                    </div>
                </div>
                
                <!-- Product Card 4 (Out of Stock) -->
                <div class="bg-white rounded-xl card-shadow overflow-hidden border border-transparent hover:border-primary-container transition-all group">
                    <div class="relative h-48 overflow-hidden">
                        <div class="absolute inset-0 bg-on-surface/40 z-10 flex items-center justify-center">
                            <span class="text-white font-headline-md uppercase tracking-widest border-2 border-white px-4 py-1">Agotado</span>
                        </div>
                        <img class="w-full h-full object-cover grayscale transition-transform duration-500 group-hover:scale-110" data-alt="Macarrón Arándano" src="https://lh3.googleusercontent.com/aida-public/AB6AXuAFcHaUL2_7JJiGRXwO47agMTbDA00C8w_fy8P8jydHeO1rqPTILdiLanlQEMYGNNsQPBC9U1XD2NyZN_90UW85yxEWPMxkTnDfjj_S2jTULC_6eL03HbnuzEXElrNWzKEyig__jR-Jxj5aU0gDB2U1b_5v38ZIL4gNzKYmCzF02jVf81J_3fB4nbOdr3XhN0NUOH3QGcmLdNCW40EukNm7lwkt3cIA788HtApEDcozmOQZd3V1ZUKIqvxqI6oWhQL0kl6jgsK5L0o">
                        <div class="absolute top-3 right-3 flex flex-col gap-2 opacity-0 group-hover:opacity-100 transition-opacity z-20">
                            <button class="p-2 bg-white/90 backdrop-blur rounded-full text-primary shadow-lg">
                                <span class="material-symbols-outlined text-[18px]" data-icon="edit">edit</span>
                            </button>
                            <button class="p-2 bg-white/90 backdrop-blur rounded-full text-error shadow-lg">
                                <span class="material-symbols-outlined text-[18px]" data-icon="delete">delete</span>
                            </button>
                        </div>
                    </div>
                    <div class="p-card-padding">
                        <div class="flex justify-between items-start mb-2">
                            <span class="px-2 py-0.5 bg-secondary-fixed/50 text-on-secondary-fixed-variant rounded text-label-sm font-label-sm">Pastelería</span>
                            <span class="text-primary font-bold font-body-lg text-body-lg">S/ 3.50</span>
                        </div>
                        <h3 class="font-headline-md text-headline-md text-on-surface mb-4">Macarrón Arándano</h3>
                        <div class="flex items-center justify-between">
                            <div class="flex items-center gap-2">
                                <span class="material-symbols-outlined text-error text-[20px]" data-icon="error_outline">error_outline</span>
                                <span class="font-body-md text-body-md text-on-surface-variant">0 unidades</span>
                            </div>
                            <span class="bg-error-container/50 text-on-error-container px-3 py-1 rounded-full text-label-md font-label-md">Agotado</span>
                        </div>
                    </div>
                </div>
                
                <!-- Product Card 5 -->
                <div class="bg-white rounded-xl card-shadow overflow-hidden border border-transparent hover:border-primary-container transition-all group">
                    <div class="relative h-48 overflow-hidden">
                        <img class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110" data-alt="Hogaza de Masa Madre" src="https://lh3.googleusercontent.com/aida-public/AB6AXuCntGCfp3GY1EfPXC5q1BxU9Q-IDAGrg1MWOzqrNoX_2cK8w1KZBHmdOptmaDeQHsIBTwsoWcIcYaYtICI0pzyLW-1ZA2LVuuHX_WQhkwe69v7c9QKGP56t0Opr4r2vhNG-QdvFUnhJb9h_NQ_QEWnzFjlKyWhxL29RgHDntDGuvd4bGu6Cr7Bz9Qs4u1L8oyYzpahZ_XVepWIjJP2graKETooKfSZx20cN8p3CgS_exCKxhzRHvoDizT3OaAfTaE-yhP5RMxbG3pw">
                        <div class="absolute top-3 right-3 flex flex-col gap-2 opacity-0 group-hover:opacity-100 transition-opacity">
                            <button class="p-2 bg-white/90 backdrop-blur rounded-full text-primary hover:bg-primary-container hover:text-white shadow-lg transition-all">
                                <span class="material-symbols-outlined text-[18px]" data-icon="edit">edit</span>
                            </button>
                            <button class="p-2 bg-white/90 backdrop-blur rounded-full text-error hover:bg-error hover:text-white shadow-lg transition-all">
                                <span class="material-symbols-outlined text-[18px]" data-icon="delete">delete</span>
                            </button>
                        </div>
                    </div>
                    <div class="p-card-padding">
                        <div class="flex justify-between items-start mb-2">
                            <span class="px-2 py-0.5 bg-primary-fixed/30 text-on-primary-fixed-variant rounded text-label-sm font-label-sm">Panadería</span>
                            <span class="text-primary font-bold font-body-lg text-body-lg">S/ 8.00</span>
                        </div>
                        <h3 class="font-headline-md text-headline-md text-on-surface mb-4">Hogaza de Masa Madre</h3>
                        <div class="flex items-center justify-between">
                            <div class="flex items-center gap-2">
                                <span class="material-symbols-outlined text-primary text-[20px]" data-icon="inventory">inventory</span>
                                <span class="font-body-md text-body-md text-on-surface-variant">12 unidades</span>
                            </div>
                            <span class="bg-primary/10 text-primary px-3 py-1 rounded-full text-label-md font-label-md">En Stock</span>
                        </div>
                    </div>
                </div>
                
                <!-- Product Card 6 -->
                <div class="bg-white rounded-xl card-shadow overflow-hidden border border-transparent hover:border-primary-container transition-all group">
                    <div class="relative h-48 overflow-hidden">
                        <img class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110" data-alt="Pastel de Fudge Intenso" src="https://lh3.googleusercontent.com/aida-public/AB6AXuAffP6KdNNmoE9ug7Jrs20nvXUZhB0RjwFBRrIyw5LorV9rsxa7AMmGcjc5RysAbiHC6SPm4yQQHET_lcP2lizSbIA2mFSOEOlYTWXW3OFdmUeUkzspQ5bpbPq3OZ2J1_qr1iMQZBKsu45825F6jn-ZxJCBsFSXshmyw7LlQBICNPkOXPKHvEyRHG1vRHWOa9Ir4O5V-VtrJP9NxoIjLpr5X8K55Nxbxm61tOHLk5bpg8hjAt_3U2E7E3OCFzcN8d1cJcmwvqcrGBg">
                        <div class="absolute top-3 right-3 flex flex-col gap-2 opacity-0 group-hover:opacity-100 transition-opacity">
                            <button class="p-2 bg-white/90 backdrop-blur rounded-full text-primary hover:bg-primary-container hover:text-white shadow-lg transition-all">
                                <span class="material-symbols-outlined text-[18px]" data-icon="edit">edit</span>
                            </button>
                            <button class="p-2 bg-white/90 backdrop-blur rounded-full text-error hover:bg-error hover:text-white shadow-lg transition-all">
                                <span class="material-symbols-outlined text-[18px]" data-icon="delete">delete</span>
                            </button>
                        </div>
                    </div>
                    <div class="p-card-padding">
                        <div class="flex justify-between items-start mb-2">
                            <span class="px-2 py-0.5 bg-secondary-fixed/50 text-on-secondary-fixed-variant rounded text-label-sm font-label-sm">Pastelería</span>
                            <span class="text-primary font-bold font-body-lg text-body-lg">S/ 15.00</span>
                        </div>
                        <h3 class="font-headline-md text-headline-md text-on-surface mb-4">Pastel de Fudge Intenso</h3>
                        <div class="flex items-center justify-between">
                            <div class="flex items-center gap-2">
                                <span class="material-symbols-outlined text-primary text-[20px]" data-icon="inventory">inventory</span>
                                <span class="font-body-md text-body-md text-on-surface-variant">8 unidades</span>
                            </div>
                            <span class="bg-primary/10 text-primary px-3 py-1 rounded-full text-label-md font-label-md">En Stock</span>
                        </div>
                    </div>
                </div>
                
                <!-- Pagination / Load More (Subtle Indicator) -->
                <div class="col-span-full py-stack-lg flex flex-col items-center gap-stack-md">
                    <p class="text-body-md text-on-surface-variant">Mostrando 6 de 142 productos</p>
                    <button class="px-8 py-2.5 border border-primary text-primary font-label-md text-label-md rounded-lg hover:bg-primary-container/10 active:scale-95 transition-all">
                        Cargar más productos
                    </button>
                </div>
            </div>
        </div>
        
        <!-- Footer -->
        <footer class="mt-auto px-margin-page py-6 border-t border-outline-variant bg-surface-container-low flex justify-between items-center text-label-sm text-on-surface-variant">
            <span>© 2026 — Pastelería Dulce Corazón · Todos los derechos reservados</span>
            <div class="flex gap-4">
                <a class="hover:text-primary transition-colors" href="#">Soporte</a>
                <a class="hover:text-primary transition-colors" href="#">Privacidad</a>
            </div>
        </footer>
    </main>
</x-layouts.app>
