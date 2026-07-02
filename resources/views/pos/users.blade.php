<x-layouts.app>
    <x-pos.sidebar active="users" />

    <!-- Main Content Canvas -->
    <main class="flex-1 ml-[260px] overflow-y-auto bg-background flex flex-col min-h-screen">
        <!-- TopAppBar -->
        <header class="sticky top-0 z-40 h-16 w-full flex items-center justify-between px-margin-page bg-surface dark:bg-surface-dim shadow-sm">
            <div class="flex items-center gap-4">
                <div class="bg-surface-container-high px-4 py-2 rounded-full flex items-center gap-2 w-96 border border-outline-variant/30">
                    <span class="material-symbols-outlined text-on-surface-variant">search</span>
                    <input class="bg-transparent border-none focus:ring-0 text-body-md w-full placeholder:text-on-surface-variant/60" placeholder="Buscar usuarios, roles..." type="text"/>
                </div>
            </div>
            <div class="flex items-center gap-stack-md">
                <button class="p-2 rounded-full hover:bg-surface-container-high text-primary transition-colors duration-200 active:opacity-80 active:scale-98">
                    <span class="material-symbols-outlined">notifications</span>
                </button>
                <button class="p-2 rounded-full hover:bg-surface-container-high text-primary transition-colors duration-200 active:opacity-80 active:scale-98">
                    <span class="material-symbols-outlined">settings</span>
                </button>
                <div class="h-8 w-[1px] bg-outline-variant mx-2"></div>
                <div class="flex items-center gap-3">
                    <span class="font-label-md text-label-md text-on-surface font-semibold">Carlos López</span>
                    <div class="w-8 h-8 rounded-full bg-primary-fixed text-on-primary-fixed flex items-center justify-center font-bold text-xs">CL</div>
                </div>
            </div>
        </header>

        <!-- Page Content -->
        <div class="p-margin-page flex-1 max-w-7xl mx-auto w-full">
            <!-- Header Section -->
            <div class="flex items-end justify-between mb-8">
                <div>
                    <div class="flex items-center gap-3 mb-2">
                        <div class="w-12 h-12 rounded-xl bg-primary-container/10 flex items-center justify-center text-primary">
                            <span class="material-symbols-outlined text-[32px]" style="font-variation-settings: 'FILL' 1;">group</span>
                        </div>
                        <h2 class="font-headline-xl text-headline-xl text-on-surface">Gestión de Usuarios</h2>
                    </div>
                    <p class="text-on-surface-variant font-body-md max-w-2xl">
                        Administra el personal de la pastelería, define sus accesos al sistema y mantén actualizado el registro de colaboradores de Dulce Corazón.
                    </p>
                </div>
                <button class="flex items-center gap-2 bg-primary text-on-primary px-6 py-3 rounded-lg font-label-md text-label-md hover:shadow-lg transition-all active:scale-95">
                    <span class="material-symbols-outlined">person_add</span>
                    Nuevo Usuario
                </button>
            </div>

            <!-- Bento-style Stats Grid (Micro-interactions) -->
            <div class="grid grid-cols-1 md:grid-cols-4 gap-gutter mb-8">
                <div class="bg-surface-container-lowest p-card-padding rounded-xl shadow-sm border border-outline-variant/20 hover:border-primary/30 transition-all group">
                    <div class="flex items-center justify-between mb-4">
                        <div class="p-2 rounded-lg bg-surface-container-high text-primary group-hover:bg-primary group-hover:text-on-primary transition-colors">
                            <span class="material-symbols-outlined">person</span>
                        </div>
                        <span class="font-label-sm text-label-sm text-primary">+2 este mes</span>
                    </div>
                    <div class="text-on-surface-variant font-label-md">Total Usuarios</div>
                    <div class="text-headline-lg font-bold text-on-surface">24</div>
                </div>
                
                <div class="bg-surface-container-lowest p-card-padding rounded-xl shadow-sm border border-outline-variant/20 hover:border-secondary/30 transition-all group">
                    <div class="flex items-center justify-between mb-4">
                        <div class="p-2 rounded-lg bg-surface-container-high text-secondary group-hover:bg-secondary group-hover:text-on-secondary transition-colors">
                            <span class="material-symbols-outlined">verified_user</span>
                        </div>
                        <span class="font-label-sm text-label-sm text-secondary">3 Roles</span>
                    </div>
                    <div class="text-on-surface-variant font-label-md">Administradores</div>
                    <div class="text-headline-lg font-bold text-on-surface">5</div>
                </div>
                
                <div class="bg-surface-container-lowest p-card-padding rounded-xl shadow-sm border border-outline-variant/20 group transition-all">
                    <div class="flex items-center justify-between mb-4">
                        <div class="p-2 rounded-lg bg-surface-container-high text-primary transition-colors">
                            <span class="material-symbols-outlined">schedule</span>
                        </div>
                    </div>
                    <div class="text-on-surface-variant font-label-md">Conectados hoy</div>
                    <div class="text-headline-lg font-bold text-on-surface">18</div>
                </div>
                
                <div class="bg-surface-container-lowest p-card-padding rounded-xl shadow-sm border border-outline-variant/20 group transition-all">
                    <div class="flex items-center justify-between mb-4">
                        <div class="p-2 rounded-lg bg-surface-container-high text-error transition-colors">
                            <span class="material-symbols-outlined">person_off</span>
                        </div>
                    </div>
                    <div class="text-on-surface-variant font-label-md">Inactivos</div>
                    <div class="text-headline-lg font-bold text-on-surface">2</div>
                </div>
            </div>

            <!-- Users Table Card -->
            <div class="bg-surface-container-lowest rounded-xl shadow-sm border border-outline-variant/20 overflow-hidden">
                <div class="px-margin-page py-6 border-b border-outline-variant/30 flex items-center justify-between bg-surface-container-low">
                    <h3 class="font-headline-md text-headline-md text-on-surface">Lista de Personal</h3>
                    <div class="flex gap-2">
                        <button class="p-2 border border-outline-variant rounded-lg hover:bg-surface-container-high transition-colors">
                            <span class="material-symbols-outlined text-on-surface-variant">filter_list</span>
                        </button>
                        <button class="p-2 border border-outline-variant rounded-lg hover:bg-surface-container-high transition-colors">
                            <span class="material-symbols-outlined text-on-surface-variant">download</span>
                        </button>
                    </div>
                </div>
                <div class="overflow-x-auto">
                    <table class="w-full text-left border-collapse">
                        <thead>
                            <tr class="bg-surface-container-low/50">
                                <th class="px-margin-page py-4 font-label-md text-label-md text-on-surface-variant uppercase tracking-wider">Nombre Completo</th>
                                <th class="px-6 py-4 font-label-md text-label-md text-on-surface-variant uppercase tracking-wider">Username</th>
                                <th class="px-6 py-4 font-label-md text-label-md text-on-surface-variant uppercase tracking-wider">Rol</th>
                                <th class="px-6 py-4 font-label-md text-label-md text-on-surface-variant uppercase tracking-wider">Estado</th>
                                <th class="px-margin-page py-4 font-label-md text-label-md text-on-surface-variant uppercase tracking-wider text-right">Acciones</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-outline-variant/20">
                            <!-- User 1 -->
                            <tr class="hover:bg-surface-container-low/30 transition-colors group">
                                <td class="px-margin-page py-4">
                                    <div class="flex items-center gap-3">
                                        <div class="w-10 h-10 rounded-full overflow-hidden bg-primary-fixed-dim">
                                            <img class="w-full h-full object-cover" data-alt="Portrait" src="https://lh3.googleusercontent.com/aida-public/AB6AXuCfB5_MK4AI-ZIBT3Qmga87aRAPp_UFvb7n2yJD8MUQR98sezkHQHS6VcLJywmoKlS_GURVZAbIIBhSTm095tPzivC4TacQIwuU9Go5lJi1Hf7njtGUB-xw-LmvfuCIBT9_5CVqZfDEhILFCAOU097iPhJ8PGPbqy_2jDG9C2JQTFmVlKeDYOC_vupzhFtPPcL9qnT4w279p9wEPNTRWMxrn9xe20NRPZ35uNfqwy3cLR7t5vN3kDUTibUzkiT1r04GMwG515Lh_OE"/>
                                        </div>
                                        <div>
                                            <div class="font-label-md text-label-md text-on-surface font-bold">Daniela Cunurana</div>
                                            <div class="text-xs text-on-surface-variant">daniela@dulcecorazon.com</div>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4 text-body-md text-on-surface-variant">daniela20</td>
                                <td class="px-6 py-4">
                                    <span class="px-3 py-1 rounded-full bg-secondary-fixed text-on-secondary-fixed-variant text-[11px] font-bold uppercase tracking-tight">Administrador</span>
                                </td>
                                <td class="px-6 py-4">
                                    <span class="flex items-center gap-1.5 text-primary">
                                        <span class="w-2 h-2 rounded-full bg-primary animate-pulse"></span>
                                        <span class="font-label-md text-label-md">Activo</span>
                                    </span>
                                </td>
                                <td class="px-margin-page py-4 text-right">
                                    <div class="flex justify-end gap-2">
                                        <button class="p-2 rounded-lg bg-secondary-container/20 text-secondary-container hover:bg-secondary-container hover:text-on-secondary-container transition-all">
                                            <span class="material-symbols-outlined text-[18px]">edit</span>
                                        </button>
                                        <button class="p-2 rounded-lg text-outline-variant hover:text-error hover:bg-error-container/20 transition-all">
                                            <span class="material-symbols-outlined text-[18px]">delete</span>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                            
                            <!-- User 2 -->
                            <tr class="hover:bg-surface-container-low/30 transition-colors group">
                                <td class="px-margin-page py-4">
                                    <div class="flex items-center gap-3">
                                        <div class="w-10 h-10 rounded-full overflow-hidden bg-primary-fixed-dim">
                                            <img class="w-full h-full object-cover" data-alt="Portrait" src="https://lh3.googleusercontent.com/aida-public/AB6AXuBQIxyrB-jqsphATSyfM7zzd_QCbEiqhn7mp2rp83cVCJCWoNNISMmNEm8VpSZ3KE-L45RkcjILxd9xAFpT10yrXpqQoez_TYRnS2oBBzrnQ3DScMaKwcqzf0RrZlhVOtdIfGOSuubGdkkvWuqU-aIdb795M5hCTIErZKeC-EoFZafr2U65wjq0JsiakS1IJg8teOPEwFa1zhJqKlqXN3rRyMif4BG-SjXY1wjYD45gzf1o_xGVKbwKyzPX_Va5K-1tLF4UkbhaDuw"/>
                                        </div>
                                        <div>
                                            <div class="font-label-md text-label-md text-on-surface font-bold">Huaman Angelo</div>
                                            <div class="text-xs text-on-surface-variant">angelo@dulcecorazon.com</div>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4 text-body-md text-on-surface-variant">angelo</td>
                                <td class="px-6 py-4">
                                    <span class="px-3 py-1 rounded-full bg-surface-variant text-on-surface-variant text-[11px] font-bold uppercase tracking-tight">Personal Caja</span>
                                </td>
                                <td class="px-6 py-4">
                                    <span class="flex items-center gap-1.5 text-on-surface-variant/50">
                                        <span class="w-2 h-2 rounded-full bg-outline-variant"></span>
                                        <span class="font-label-md text-label-md">Inactivo</span>
                                    </span>
                                </td>
                                <td class="px-margin-page py-4 text-right">
                                    <div class="flex justify-end gap-2">
                                        <button class="p-2 rounded-lg bg-secondary-container/20 text-secondary-container hover:bg-secondary-container hover:text-on-secondary-container transition-all">
                                            <span class="material-symbols-outlined text-[18px]">edit</span>
                                        </button>
                                        <button class="p-2 rounded-lg text-outline-variant hover:text-error hover:bg-error-container/20 transition-all">
                                            <span class="material-symbols-outlined text-[18px]">delete</span>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                            
                            <!-- User 3 -->
                            <tr class="hover:bg-surface-container-low/30 transition-colors group">
                                <td class="px-margin-page py-4">
                                    <div class="flex items-center gap-3">
                                        <div class="w-10 h-10 rounded-full overflow-hidden bg-primary-fixed-dim">
                                            <img class="w-full h-full object-cover" data-alt="Portrait" src="https://lh3.googleusercontent.com/aida-public/AB6AXuDAJRlRhRH65EC3U8sho4yrFUu-4fm2S6WLMMBm7fQvnw3C3Fq--aVRZhqMPMq0rmdHOyA_Jq-7yDAez9Y2oIsFJ7nuyaKQpit0Y_2W4mQNTJ3CRI5uKybW4QeACyzmMgYWdIzEOPXfu38O8YmCcQrj0IPES2d-VYWe1xjHlp5Rebbh634HI8Ht-G2DPssnYhd3mhlGn9X8fEDVlfRO-HCR81eXP7SAvq1Y36EzoKSN7T-fYn9gOnBiRm1I_QNKFDhY-MO80wZb_bk"/>
                                        </div>
                                        <div>
                                            <div class="font-label-md text-label-md text-on-surface font-bold">Mateo Rivera</div>
                                            <div class="text-xs text-on-surface-variant">mateo@dulcecorazon.com</div>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4 text-body-md text-on-surface-variant">mateo_v</td>
                                <td class="px-6 py-4">
                                    <span class="px-3 py-1 rounded-full bg-primary-fixed text-on-primary-fixed-variant text-[11px] font-bold uppercase tracking-tight">Vendedor</span>
                                </td>
                                <td class="px-6 py-4">
                                    <span class="flex items-center gap-1.5 text-primary">
                                        <span class="w-2 h-2 rounded-full bg-primary"></span>
                                        <span class="font-label-md text-label-md">Activo</span>
                                    </span>
                                </td>
                                <td class="px-margin-page py-4 text-right">
                                    <div class="flex justify-end gap-2">
                                        <button class="p-2 rounded-lg bg-secondary-container/20 text-secondary-container hover:bg-secondary-container hover:text-on-secondary-container transition-all">
                                            <span class="material-symbols-outlined text-[18px]">edit</span>
                                        </button>
                                        <button class="p-2 rounded-lg text-outline-variant hover:text-error hover:bg-error-container/20 transition-all">
                                            <span class="material-symbols-outlined text-[18px]">delete</span>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="px-margin-page py-4 bg-surface-container-low border-t border-outline-variant/30 flex items-center justify-between">
                    <span class="text-label-sm font-label-sm text-on-surface-variant">Mostrando 3 de 24 usuarios</span>
                    <div class="flex items-center gap-1">
                        <button class="p-2 rounded-lg hover:bg-surface-container-high disabled:opacity-30" disabled>
                            <span class="material-symbols-outlined">chevron_left</span>
                        </button>
                        <button class="w-8 h-8 rounded-lg bg-primary text-on-primary font-bold text-xs">1</button>
                        <button class="w-8 h-8 rounded-lg hover:bg-surface-container-high text-on-surface-variant text-xs">2</button>
                        <button class="w-8 h-8 rounded-lg hover:bg-surface-container-high text-on-surface-variant text-xs">3</button>
                        <button class="p-2 rounded-lg hover:bg-surface-container-high">
                            <span class="material-symbols-outlined">chevron_right</span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Footer -->
        <footer class="mt-auto full-width py-4 bg-surface dark:bg-surface-container border-t border-outline-variant flex justify-between items-center px-margin-page w-full">
            <span class="font-label-sm text-label-sm text-on-surface-variant dark:text-outline-variant">© 2026 Pastelería Dulce Corazón · Sistema de Gestión Artisanal</span>
            <div class="flex gap-stack-lg">
                <a class="font-label-sm text-label-sm text-on-surface-variant hover:text-primary transition-colors duration-200" href="#">Ayuda</a>
                <a class="font-label-sm text-label-sm text-on-surface-variant hover:text-primary transition-colors duration-200" href="#">Soporte</a>
                <a class="font-label-sm text-label-sm text-on-surface-variant hover:text-primary transition-colors duration-200" href="#">Privacidad</a>
            </div>
        </footer>
    </main>

    <script>
        document.querySelectorAll('button, a').forEach(el => {
            el.addEventListener('mousedown', () => {
                el.style.transform = 'scale(0.96)';
            });
            el.addEventListener('mouseup', () => {
                el.style.transform = '';
            });
            el.addEventListener('mouseleave', () => {
                el.style.transform = '';
            });
        });

        const tableRows = document.querySelectorAll('tbody tr');
        tableRows.forEach(row => {
            row.addEventListener('mouseenter', () => {
                row.style.transition = 'all 0.3s ease';
            });
        });
    </script>
</x-layouts.app>
