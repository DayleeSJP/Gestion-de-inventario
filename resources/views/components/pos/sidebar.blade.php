@props(['active' => 'pos'])

<aside class="fixed left-0 top-0 h-screen w-[260px] bg-surface-container-low dark:bg-surface-dim shadow-sm flex flex-col py-margin-page px-stack-md z-50">
    <div class="flex flex-col gap-2 mb-8 px-2">
        <img alt="Pastelería Dulce Corazón Logo" class="w-12 h-12 rounded-xl object-cover mb-2" src="https://lh3.googleusercontent.com/aida/AP1WRLuFe0WYc3_sFgrFIAjokrDvKQSoF1u_IMYbhNWl1RR38hyJ0lpz0QNFWQZNCNEClsh_eHctjqrLUjkmrneZ62zkrZ5ihH3xXjKBuLGKuS1I2PNwlm2_Tr7ikiK1i0yrmwsCH06ks-zGnBpyrNxbjuc1FtQXjiZ4Jg90R_TVuveq1eIN7SbiFcI_nrwVk6PyaZyZ_hlVErESa4-wbnBMIijP-OYHMaWuC-5UFMCyQTm0IMcq6JtgFHGsauM">
        <div class="flex flex-col">
            <h1 class="text-headline-md font-headline-md font-bold text-primary dark:text-inverse-primary leading-tight">
                Pastelería Dulce Corazón
            </h1>
            <span class="text-label-md font-label-md text-on-surface-variant opacity-70">Sistema de Gestión</span>
        </div>
    </div>
    
    <nav class="flex-1 overflow-y-auto custom-scrollbar flex flex-col gap-1">
        <!-- Principal Section -->
        <div class="mb-4">
            <p class="text-label-md font-label-md text-on-surface-variant uppercase tracking-widest px-4 mb-2">Principal</p>
            <a class="flex items-center gap-3 px-4 py-3 {{ $active === 'dashboard' ? 'bg-primary-container text-on-primary-container font-bold scale-[0.98]' : 'text-on-surface-variant hover:text-primary hover:bg-surface-variant/50' }} transition-colors rounded-lg" href="/">
                <span class="material-symbols-outlined">dashboard</span>
                <span class="text-body-md font-medium">Dashboard</span>
            </a>
        </div>
        
        <!-- Operaciones Section -->
        <div class="mb-4">
            <p class="text-label-md font-label-md text-on-surface-variant uppercase tracking-widest px-4 mb-2">Operaciones</p>
            <a class="flex items-center gap-3 px-4 py-3 {{ $active === 'pos' ? 'bg-primary-container text-on-primary-container font-bold scale-[0.98]' : 'text-on-surface-variant hover:text-primary hover:bg-surface-variant/50' }} transition-colors rounded-lg" href="/pos">
                <span class="material-symbols-outlined">point_of_sale</span>
                <span class="text-body-md">Punto de Venta</span>
            </a>
            <a class="flex items-center gap-3 px-4 py-3 {{ $active === 'history' ? 'bg-primary-container text-on-primary-container font-bold scale-[0.98]' : 'text-on-surface-variant hover:text-primary hover:bg-surface-variant/50' }} transition-colors rounded-lg" href="/history">
                <span class="material-symbols-outlined">receipt_long</span>
                <span class="text-body-md">Historial Ventas</span>
            </a>
        </div>
        
        <!-- Inventario Section -->
        <div class="mb-4">
            <p class="text-label-md font-label-md text-on-surface-variant uppercase tracking-widest px-4 mb-2">Inventario</p>
            <a class="flex items-center gap-3 px-4 py-3 {{ $active === 'products' ? 'bg-primary-container text-on-primary-container font-bold scale-[0.98]' : 'text-on-surface-variant hover:text-primary hover:bg-surface-variant/50' }} transition-colors rounded-lg" href="/products">
                <span class="material-symbols-outlined">inventory_2</span>
                <span class="text-body-md">Productos</span>
            </a>
            <a class="flex items-center gap-3 px-4 py-3 {{ $active === 'categories' ? 'bg-primary-container text-on-primary-container font-bold scale-[0.98]' : 'text-on-surface-variant hover:text-primary hover:bg-surface-variant/50' }} transition-colors rounded-lg" href="/categories">
                <span class="material-symbols-outlined">category</span>
                <span class="text-body-md">Categorías</span>
            </a>
        </div>
        
        <!-- Administración Section -->
        <div class="mb-4">
            <p class="text-label-md font-label-md text-on-surface-variant uppercase tracking-widest px-4 mb-2">Administración</p>
            <a class="flex items-center gap-3 px-4 py-3 {{ $active === 'reports' ? 'bg-primary-container text-on-primary-container font-bold scale-[0.98]' : 'text-on-surface-variant hover:text-primary hover:bg-surface-variant/50' }} transition-colors rounded-lg" href="/reports">
                <span class="material-symbols-outlined">analytics</span>
                <span class="text-body-md">Reportes</span>
            </a>
            <a class="flex items-center gap-3 px-4 py-3 {{ $active === 'users' ? 'bg-secondary-container text-on-secondary-container font-bold scale-[0.98]' : 'text-on-surface-variant hover:text-primary hover:bg-surface-variant/50' }} transition-colors rounded-lg" href="/users">
                <span class="material-symbols-outlined">group</span>
                <span class="text-body-md">Usuarios</span>
            </a>
            <a class="flex items-center gap-3 px-4 py-3 {{ $active === 'roles' ? 'bg-secondary-container text-on-secondary-container font-bold scale-[0.98]' : 'text-on-surface-variant hover:text-primary hover:bg-surface-variant/50' }} transition-colors rounded-lg" href="/roles">
                <span class="material-symbols-outlined">admin_panel_settings</span>
                <span class="text-body-md">Roles y Permisos</span>
            </a>
        </div>
    </nav>
    <div class="px-4 mt-auto pt-6 border-t border-outline-variant/30 space-y-1">
        <a href="/profile" class="flex items-center gap-3 px-4 py-3 rounded-xl {{ $active === 'profile' ? 'bg-primary-fixed/10 text-on-primary-fixed-variant font-bold border-r-4 border-primary' : 'hover:bg-surface-container-high transition-all' }}">
            <div class="w-8 h-8 rounded-full bg-secondary-container flex items-center justify-center overflow-hidden">
                <img class="w-full h-full object-cover" data-alt="A portrait photo of Carlos López" src="https://lh3.googleusercontent.com/aida-public/AB6AXuCytkkJ7BKqvZsyq7OR3cTTJpaNAhLxxdUD6uvQQ8mY1XT8JthPj_sqdjnm4q8pOzcTrrGRbTMOiB93Q46t8Mulz4mG5Hy99uJmuR0BXrecDbxHF74YZEebG4pr8r7rLD98G0MPvqTbB0cTx4f8nP7Y4Na8h1fYFAVSvZZI81hfMNJRzyWD5Yp7eKyBX3_6gUydGZ-GjJIihvxKEV7FtrO64SgVQKKdqTleAIPgmB87asBAieAyUEyZmm3XZvNNMr9DH4PFx7h7euM"/>
            </div>
            <div class="flex-1 min-w-0 text-left">
                <p class="font-label-md text-label-md truncate text-on-surface">Carlos López</p>
                <p class="text-[10px] text-on-surface-variant font-normal">Maestro Pastelero</p>
            </div>
        </a>
        <a class="flex items-center gap-3 px-4 py-3 rounded-lg text-error hover:bg-error-container/20 transition-all" href="#">
            <span class="material-symbols-outlined">logout</span>
            <span class="font-label-md text-label-md">Cerrar Sesión</span>
        </a>
    </div>
</aside>
