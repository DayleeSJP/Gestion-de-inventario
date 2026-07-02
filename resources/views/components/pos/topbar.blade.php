@props(['title' => ''])

<header class="h-16 flex items-center justify-between px-gutter bg-surface/90 backdrop-blur-md border-b border-outline-variant/30 sticky top-0 z-40 flex-shrink-0">
    <div class="flex items-center gap-4 flex-1">
        @if($title)
            <h1 class="text-headline-md font-headline-md font-bold text-on-surface truncate">{{ $title }}</h1>
        @endif
    </div>
    <div class="flex items-center gap-2">
        <button class="relative p-2 text-on-surface-variant hover:bg-surface-container-high hover:text-primary rounded-full transition-colors" title="Notificaciones">
            <span class="material-symbols-outlined">notifications</span>
            <!-- Red dot for unread notifications -->
            <span class="absolute top-2 right-2 w-2 h-2 bg-error rounded-full ring-2 ring-surface"></span>
        </button>
        <button class="p-2 text-on-surface-variant hover:bg-surface-container-high hover:text-primary rounded-full transition-colors" title="Ayuda">
            <span class="material-symbols-outlined">help</span>
        </button>
        <button class="p-2 text-on-surface-variant hover:bg-surface-container-high hover:text-primary rounded-full transition-colors mr-2" title="Configuración">
            <span class="material-symbols-outlined">settings</span>
        </button>
        
    </div>
</header>
