<!DOCTYPE html>
<html lang="es" class="light">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'POS - Pastelería Dulce Corazón' }}</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800;900&display=swap" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap" rel="stylesheet" />
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <script>
        tailwind.config = {
            darkMode: "class",
            theme: {
                extend: {
                    colors: {
                        "surface-container": "#f5ece8",
                        "on-secondary-container": "#733300",
                        "on-secondary": "#ffffff",
                        "on-error": "#ffffff",
                        "primary-container": "#2d7d74",
                        "tertiary": "#5c5951",
                        "primary": "#03645c",
                        "surface-dim": "#e1d8d4",
                        "error": "#ba1a1a",
                        "on-primary-container": "#d7fff8",
                        "tertiary-fixed": "#e7e2d8",
                        "surface-container-highest": "#eae1dc",
                        "outline-variant": "#bec9c6",
                        "inverse-primary": "#88d4c9",
                        "surface-tint": "#116a61",
                        "outline": "#6f7977",
                        "on-surface": "#1f1b18",
                        "on-background": "#1f1b18",
                        "surface-variant": "#eae1dc",
                        "surface-bright": "#fff8f5",
                        "on-secondary-fixed-variant": "#753400",
                        "on-tertiary-fixed": "#1d1b16",
                        "on-primary-fixed": "#00201d",
                        "secondary-container": "#fd9b5e",
                        "on-tertiary-container": "#fcf6ec",
                        "inverse-on-surface": "#f8efea",
                        "on-tertiary-fixed-variant": "#49473f",
                        "surface-container-high": "#efe6e2",
                        "tertiary-fixed-dim": "#cbc6bd",
                        "on-secondary-fixed": "#321200",
                        "on-primary": "#ffffff",
                        "surface-container-low": "#fbf2ed",
                        "on-primary-fixed-variant": "#005049",
                        "surface-container-lowest": "#ffffff",
                        "on-error-container": "#93000a",
                        "secondary": "#954912",
                        "surface": "#fff8f5",
                        "on-tertiary": "#ffffff",
                        "background": "#fff8f5",
                        "on-surface-variant": "#3f4947",
                        "inverse-surface": "#34302d",
                        "tertiary-container": "#747169",
                        "secondary-fixed": "#ffdbc9",
                        "error-container": "#ffdad6",
                        "primary-fixed": "#a4f1e5",
                        "secondary-fixed-dim": "#ffb68c",
                        "primary-fixed-dim": "#88d4c9"
                    },
                    spacing: {
                        "stack-sm": "8px",
                        "card-padding": "20px",
                        "stack-md": "16px",
                        "base": "4px",
                        "gutter": "24px",
                        "stack-lg": "24px",
                        "margin-page": "32px"
                    },
                    fontFamily: {
                        "label-md": ["Inter"],
                        "headline-lg-mobile": ["Inter"],
                        "body-lg": ["Inter"],
                        "label-sm": ["Inter"],
                        "headline-lg": ["Inter"],
                        "body-md": ["Inter"],
                        "headline-xl": ["Inter"],
                        "headline-md": ["Inter"],
                        "sans": ["Inter", "sans-serif"]
                    }
                }
            }
        }
    </script>
    <style>
        body {
            background-color: #F9F3E9;
            color: #1f1b18;
            font-family: 'Inter', sans-serif;
        }
        .material-symbols-outlined {
            font-variation-settings: 'FILL' 0, 'wght' 400, 'GRAD' 0, 'opsz' 24;
        }
        .filled-icon {
            font-variation-settings: 'FILL' 1;
        }
        .custom-scrollbar::-webkit-scrollbar { width: 4px; }
        .custom-scrollbar::-webkit-scrollbar-thumb { background: #bec9c6; border-radius: 10px; }
        .scrollbar-hide::-webkit-scrollbar { display: none; }
    </style>
</head>
<body class="antialiased overflow-hidden flex h-screen">
    <!-- Sidebar -->
    <x-pos.sidebar :active="$active ?? 'dashboard'" />

    <!-- Main Content Canvas -->
    <main class="ml-[260px] flex-1 flex flex-col h-screen relative bg-background overflow-hidden">
        
        <!-- Top App Bar -->
        <x-pos.topbar :title="$title ?? ''" />

        <!-- Scrollable Page Content -->
        <div class="flex-1 overflow-y-auto custom-scrollbar w-full relative">
            {{ $slot }}
        </div>
        
    </main>
    
    <script>
        // Micro-interactions and effects
        document.querySelectorAll('button:not([disabled]), a:not([disabled])').forEach(el => {
            // Avoid conflict with specific scales
            if(!el.classList.contains('active:scale-95') && !el.classList.contains('scale-[1.02]')) {
                el.addEventListener('mousedown', () => el.style.transform = 'scale(0.97)');
                el.addEventListener('mouseup', () => el.style.transform = '');
                el.addEventListener('mouseleave', () => el.style.transform = '');
            }
        });
    </script>
</body>
</html>
