<x-layouts.app>
    <x-pos.sidebar active="roles" />

    <!-- Main Content Canvas -->
    <main class="ml-[260px] min-h-screen flex flex-col bg-background relative">
        <!-- TopAppBar -->
        <header class="sticky top-0 z-40 h-16 bg-surface dark:bg-surface-dim border-b border-outline-variant dark:border-outline flex justify-between items-center px-gutter">
            <div class="flex items-center gap-4 flex-1">
                <div class="relative w-full max-w-md">
                    <span class="material-symbols-outlined absolute left-3 top-1/2 -translate-y-1/2 text-outline">search</span>
                    <input class="w-full bg-surface-container-lowest border-outline-variant focus:border-primary focus:ring-1 focus:ring-primary rounded-lg py-2 pl-10 text-body-md transition-all" placeholder="Buscar permisos o roles..." type="text"/>
                </div>
            </div>
            <div class="flex items-center gap-4">
                <button class="hover:bg-surface-container-low dark:hover:bg-surface-container-low rounded-full p-2 transition-all relative">
                    <span class="material-symbols-outlined text-on-surface-variant">notifications</span>
                    <span class="absolute top-2 right-2 w-2 h-2 bg-secondary rounded-full border-2 border-surface"></span>
                </button>
                <button class="hover:bg-surface-container-low dark:hover:bg-surface-container-low rounded-full p-2 transition-all">
                    <span class="material-symbols-outlined text-on-surface-variant">help</span>
                </button>
                <button class="hover:bg-surface-container-low dark:hover:bg-surface-container-low rounded-full p-2 transition-all">
                    <span class="material-symbols-outlined text-on-surface-variant">settings</span>
                </button>
            </div>
        </header>

        <div class="p-margin-page flex-1">
            <!-- Page Header Section -->
            <div class="flex flex-col md:flex-row md:items-center justify-between gap-4 mb-stack-lg">
                <div class="flex items-center gap-4">
                    <div class="p-3 bg-secondary-container rounded-2xl">
                        <span class="material-symbols-outlined text-on-secondary-container text-headline-md" style="font-variation-settings: 'FILL' 1;">shield_person</span>
                    </div>
                    <div>
                        <h2 class="text-headline-lg font-headline-lg text-on-surface">Gestión de Roles y Permisos</h2>
                        <p class="text-body-md text-outline">Define quién puede acceder y qué acciones pueden realizar en el sistema.</p>
                    </div>
                </div>
                <button class="bg-primary hover:opacity-90 text-on-primary px-6 py-3 rounded-lg font-semibold flex items-center gap-2 shadow-sm transition-all transform active:scale-95 self-start md:self-center">
                    <span class="material-symbols-outlined text-[20px]">add</span>
                    Nuevo Rol
                </button>
            </div>

            <!-- Dashboard Stats Row (Subtle) -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-gutter mb-stack-lg">
                <div class="bg-surface-container-lowest p-stack-md rounded-xl shadow-[0px_4px_12px_rgba(0,0,0,0.05)] border border-surface-container flex items-center gap-4">
                    <div class="w-12 h-12 rounded-full bg-primary-fixed flex items-center justify-center">
                        <span class="material-symbols-outlined text-primary">groups</span>
                    </div>
                    <div>
                        <p class="text-label-md text-outline">Total Roles</p>
                        <p class="text-headline-md font-bold">5</p>
                    </div>
                </div>
                <div class="bg-surface-container-lowest p-stack-md rounded-xl shadow-[0px_4px_12px_rgba(0,0,0,0.05)] border border-surface-container flex items-center gap-4">
                    <div class="w-12 h-12 rounded-full bg-secondary-fixed flex items-center justify-center">
                        <span class="material-symbols-outlined text-secondary">verified_user</span>
                    </div>
                    <div>
                        <p class="text-label-md text-outline">Permisos Activos</p>
                        <p class="text-headline-md font-bold">42</p>
                    </div>
                </div>
                <div class="bg-surface-container-lowest p-stack-md rounded-xl shadow-[0px_4px_12px_rgba(0,0,0,0.05)] border border-surface-container flex items-center gap-4">
                    <div class="w-12 h-12 rounded-full bg-tertiary-fixed flex items-center justify-center">
                        <span class="material-symbols-outlined text-tertiary">history</span>
                    </div>
                    <div>
                        <p class="text-label-md text-outline">Última Modificación</p>
                        <p class="text-body-md font-semibold">Hoy, 10:24 AM</p>
                    </div>
                </div>
            </div>

            <!-- Roles Table Container -->
            <div class="bg-white rounded-2xl shadow-[0px_4px_24px_rgba(0,0,0,0.04)] border border-surface-container overflow-hidden">
                <div class="overflow-x-auto">
                    <table class="w-full text-left border-collapse">
                        <thead>
                            <tr class="bg-surface-container-low text-on-surface-variant">
                                <th class="px-gutter py-4 font-label-md text-label-md uppercase tracking-wider">ROL</th>
                                <th class="px-gutter py-4 font-label-md text-label-md uppercase tracking-wider">DESCRIPCIÓN</th>
                                <th class="px-gutter py-4 font-label-md text-label-md uppercase tracking-wider">PERMISOS</th>
                                <th class="px-gutter py-4 font-label-md text-label-md uppercase tracking-wider text-right">ACCIONES</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-surface-container">
                            <!-- Row 1: Administrador -->
                            <tr class="hover:bg-surface-bright transition-colors group">
                                <td class="px-gutter py-5">
                                    <div class="flex items-center gap-3">
                                        <div class="w-2 h-2 rounded-full bg-primary"></div>
                                        <span class="font-bold text-on-surface text-body-lg">Administrador</span>
                                    </div>
                                </td>
                                <td class="px-gutter py-5 text-body-md text-outline">Acceso total a todas las funciones del sistema.</td>
                                <td class="px-gutter py-5">
                                    <span class="px-3 py-1 bg-primary text-on-primary rounded-full text-[11px] font-bold tracking-tight">29 permisos</span>
                                </td>
                                <td class="px-gutter py-5 text-right">
                                    <div class="flex justify-end gap-2">
                                        <button class="flex items-center gap-1 px-3 py-1.5 bg-secondary-container text-on-secondary-container rounded-lg text-label-md hover:opacity-90 transition-all font-bold">
                                            <span class="material-symbols-outlined text-[16px]">edit</span>
                                            Editar
                                        </button>
                                        <button class="p-1.5 bg-error-container text-on-error-container rounded-lg hover:opacity-90 transition-all">
                                            <span class="material-symbols-outlined text-[20px]">delete</span>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                            <!-- Row 2: Vendedor -->
                            <tr class="hover:bg-surface-bright transition-colors group">
                                <td class="px-gutter py-5">
                                    <div class="flex items-center gap-3">
                                        <div class="w-2 h-2 rounded-full bg-secondary"></div>
                                        <span class="font-bold text-on-surface text-body-lg">Vendedor</span>
                                    </div>
                                </td>
                                <td class="px-gutter py-5 text-body-md text-outline">Gestión de ventas y visualización de productos.</td>
                                <td class="px-gutter py-5">
                                    <span class="px-3 py-1 bg-surface-container-highest text-on-surface-variant rounded-full text-[11px] font-bold tracking-tight">12 permisos</span>
                                </td>
                                <td class="px-gutter py-5 text-right">
                                    <div class="flex justify-end gap-2">
                                        <button class="flex items-center gap-1 px-3 py-1.5 bg-secondary-container text-on-secondary-container rounded-lg text-label-md hover:opacity-90 transition-all font-bold">
                                            <span class="material-symbols-outlined text-[16px]">edit</span>
                                            Editar
                                        </button>
                                        <button class="p-1.5 bg-error-container text-on-error-container rounded-lg hover:opacity-90 transition-all">
                                            <span class="material-symbols-outlined text-[20px]">delete</span>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                            <!-- Row 3: Maestro Pastelero -->
                            <tr class="hover:bg-surface-bright transition-colors group">
                                <td class="px-gutter py-5">
                                    <div class="flex items-center gap-3">
                                        <div class="w-2 h-2 rounded-full bg-tertiary"></div>
                                        <span class="font-bold text-on-surface text-body-lg">Maestro Pastelero</span>
                                    </div>
                                </td>
                                <td class="px-gutter py-5 text-body-md text-outline">Gestión de inventario de insumos y recetas.</td>
                                <td class="px-gutter py-5">
                                    <span class="px-3 py-1 bg-surface-container-highest text-on-surface-variant rounded-full text-[11px] font-bold tracking-tight">18 permisos</span>
                                </td>
                                <td class="px-gutter py-5 text-right">
                                    <div class="flex justify-end gap-2">
                                        <button class="flex items-center gap-1 px-3 py-1.5 bg-secondary-container text-on-secondary-container rounded-lg text-label-md hover:opacity-90 transition-all font-bold">
                                            <span class="material-symbols-outlined text-[16px]">edit</span>
                                            Editar
                                        </button>
                                        <button class="p-1.5 bg-error-container text-on-error-container rounded-lg hover:opacity-90 transition-all">
                                            <span class="material-symbols-outlined text-[20px]">delete</span>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                            <!-- Row 4: Cajero -->
                            <tr class="hover:bg-surface-bright transition-colors group">
                                <td class="px-gutter py-5">
                                    <div class="flex items-center gap-3">
                                        <div class="w-2 h-2 rounded-full bg-primary-fixed-dim"></div>
                                        <span class="font-bold text-on-surface text-body-lg">Cajero</span>
                                    </div>
                                </td>
                                <td class="px-gutter py-5 text-body-md text-outline">Apertura y cierre de caja, cobro de ventas.</td>
                                <td class="px-gutter py-5">
                                    <span class="px-3 py-1 bg-surface-container-highest text-on-surface-variant rounded-full text-[11px] font-bold tracking-tight">8 permisos</span>
                                </td>
                                <td class="px-gutter py-5 text-right">
                                    <div class="flex justify-end gap-2">
                                        <button class="flex items-center gap-1 px-3 py-1.5 bg-secondary-container text-on-secondary-container rounded-lg text-label-md hover:opacity-90 transition-all font-bold">
                                            <span class="material-symbols-outlined text-[16px]">edit</span>
                                            Editar
                                        </button>
                                        <button class="p-1.5 bg-error-container text-on-error-container rounded-lg hover:opacity-90 transition-all">
                                            <span class="material-symbols-outlined text-[20px]">delete</span>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <!-- Pagination Footer -->
                <div class="px-gutter py-4 bg-surface-container-low border-t border-surface-container flex items-center justify-between">
                    <p class="text-label-md text-outline">Mostrando 4 de 5 roles</p>
                    <div class="flex gap-2">
                        <button class="p-2 border border-outline-variant rounded-lg hover:bg-surface transition-all disabled:opacity-50" disabled>
                            <span class="material-symbols-outlined text-[20px]">chevron_left</span>
                        </button>
                        <button class="px-4 py-1.5 bg-primary text-on-primary rounded-lg text-label-md font-bold">1</button>
                        <button class="p-2 border border-outline-variant rounded-lg hover:bg-surface transition-all">
                            <span class="material-symbols-outlined text-[20px]">chevron_right</span>
                        </button>
                    </div>
                </div>
            </div>

            <!-- Detailed Permissions Preview (Asymmetric Pattern) -->
            <div class="mt-stack-lg grid grid-cols-1 lg:grid-cols-12 gap-gutter">
                <div class="lg:col-span-8 bg-surface-container-lowest p-stack-lg rounded-2xl border border-surface-container shadow-sm">
                    <h3 class="text-headline-md font-bold mb-stack-md flex items-center gap-2">
                        <span class="material-symbols-outlined text-primary">visibility</span>
                        Vista Previa de Permisos (Administrador)
                    </h3>
                    <div class="grid grid-cols-2 md:grid-cols-3 gap-3">
                        <div class="flex items-center gap-2 p-3 bg-surface-bright border border-surface-container rounded-xl">
                            <span class="material-symbols-outlined text-primary text-[18px]">check_circle</span>
                            <span class="text-body-md">Crear Usuarios</span>
                        </div>
                        <div class="flex items-center gap-2 p-3 bg-surface-bright border border-surface-container rounded-xl">
                            <span class="material-symbols-outlined text-primary text-[18px]">check_circle</span>
                            <span class="text-body-md">Eliminar Ventas</span>
                        </div>
                        <div class="flex items-center gap-2 p-3 bg-surface-bright border border-surface-container rounded-xl">
                            <span class="material-symbols-outlined text-primary text-[18px]">check_circle</span>
                            <span class="text-body-md">Editar Reportes</span>
                        </div>
                        <div class="flex items-center gap-2 p-3 bg-surface-bright border border-surface-container rounded-xl">
                            <span class="material-symbols-outlined text-primary text-[18px]">check_circle</span>
                            <span class="text-body-md">Acceso a Caja</span>
                        </div>
                        <div class="flex items-center gap-2 p-3 bg-surface-bright border border-surface-container rounded-xl">
                            <span class="material-symbols-outlined text-primary text-[18px]">check_circle</span>
                            <span class="text-body-md">Gestión Insumos</span>
                        </div>
                        <div class="flex items-center gap-2 p-3 bg-surface-bright border border-surface-container rounded-xl">
                            <span class="material-symbols-outlined text-primary text-[18px]">check_circle</span>
                            <span class="text-body-md">Exportar Datos</span>
                        </div>
                    </div>
                    <div class="mt-4 text-center">
                        <button class="text-primary font-bold text-label-md hover:underline">+ Ver los 23 permisos restantes</button>
                    </div>
                </div>
                
                <div class="lg:col-span-4 bg-primary-container p-stack-lg rounded-2xl text-on-primary flex flex-col justify-between relative overflow-hidden">
                    <!-- Background texture/light effect -->
                    <div class="absolute -right-10 -bottom-10 w-40 h-40 bg-white/10 rounded-full blur-3xl"></div>
                    <div class="relative z-10">
                        <span class="material-symbols-outlined text-headline-xl mb-4 opacity-50">info</span>
                        <h3 class="text-headline-md font-bold mb-2">Consejo de Seguridad</h3>
                        <p class="text-body-md leading-relaxed opacity-90">Siga el principio de "mínimo privilegio". Otorgue a los usuarios únicamente los permisos necesarios para realizar sus tareas diarias.</p>
                    </div>
                    <button class="mt-6 bg-white/20 hover:bg-white/30 backdrop-blur-sm text-on-primary py-3 rounded-lg font-bold border border-white/30 transition-all relative z-10">
                        Leer Documentación
                    </button>
                </div>
            </div>
            
            <!-- Page Footer Information -->
            <footer class="mt-stack-lg text-center pb-8">
                <p class="text-label-md text-outline opacity-60">© 2026 — Pastelería Dulce Corazón · Gestión Segura de Datos</p>
            </footer>
        </div>

        <!-- Floating Action Button (Contextual) -->
        <button class="fixed bottom-8 right-8 w-14 h-14 bg-secondary text-on-secondary rounded-full shadow-lg flex items-center justify-center hover:scale-110 transition-transform active:scale-95 group z-50">
            <span class="material-symbols-outlined group-hover:rotate-90 transition-transform">add</span>
        </button>
    </main>

    <script>
        // Simple micro-interaction for rows
        document.querySelectorAll('tr').forEach(row => {
            row.addEventListener('mouseenter', () => {
                row.style.transform = 'translateY(-1px)';
            });
            row.addEventListener('mouseleave', () => {
                row.style.transform = 'translateY(0)';
            });
        });

        // Search bar focus effect
        const searchInput = document.querySelector('input[type="text"]');
        if (searchInput) {
            const searchIcon = searchInput.previousElementSibling;
            if (searchIcon) {
                searchInput.addEventListener('focus', () => {
                    searchIcon.classList.add('text-primary');
                });
                searchInput.addEventListener('blur', () => {
                    searchIcon.classList.remove('text-primary');
                });
            }
        }
    </script>
</x-layouts.app>
