<x-layouts.guest title="Iniciar Sesión">
    <div class="flex min-h-screen w-full">
        <!-- Left Side: Image / Branding -->
        <div class="hidden lg:flex w-1/2 relative bg-surface-variant overflow-hidden">
            <!-- Background Image -->
            <img class="absolute inset-0 w-full h-full object-cover" 
                 src="https://images.unsplash.com/photo-1558961363-fa8fdf82db35?q=80&w=1600&auto=format&fit=crop" 
                 alt="Fondo de panadería">
            <!-- Gradient Overlay -->
            <div class="absolute inset-0 bg-gradient-to-br from-primary/90 to-tertiary/90 mix-blend-multiply"></div>
            
            <!-- Content -->
            <div class="relative z-10 w-full p-16 flex flex-col justify-between text-on-primary">
                <div>
                    <div class="flex items-center gap-3 mb-4">
                        <div class="w-12 h-12 rounded-2xl bg-white/20 backdrop-blur-md flex items-center justify-center">
                            <span class="material-symbols-outlined text-[32px] text-white" style="font-variation-settings: 'FILL' 1;">bakery_dining</span>
                        </div>
                        <h1 class="text-3xl font-bold font-headline-lg tracking-tight">Dulce Tentación</h1>
                    </div>
                    <p class="text-white/80 font-body-lg max-w-md leading-relaxed">
                        Sistema Integral de Gestión. Administra tu inventario, ventas y personal con la mejor herramienta para tu pastelería artesanal.
                    </p>
                </div>
                
                <div>
                    <div class="flex -space-x-4 mb-4">
                        <img class="w-12 h-12 rounded-full border-2 border-primary object-cover" src="https://images.unsplash.com/photo-1438761681033-6461ffad8d80?q=80&w=150&auto=format&fit=crop" alt="User">
                        <img class="w-12 h-12 rounded-full border-2 border-primary object-cover" src="https://images.unsplash.com/photo-1500648767791-00dcc994a43e?q=80&w=150&auto=format&fit=crop" alt="User">
                        <img class="w-12 h-12 rounded-full border-2 border-primary object-cover" src="https://images.unsplash.com/photo-1573496359142-b8d87734a5a2?q=80&w=150&auto=format&fit=crop" alt="User">
                        <div class="w-12 h-12 rounded-full border-2 border-primary bg-white/20 backdrop-blur-md flex items-center justify-center text-sm font-bold">
                            +12
                        </div>
                    </div>
                    <p class="text-white/90 font-medium">Únete a nuestro equipo de maestros pasteleros.</p>
                </div>
            </div>
        </div>

        <!-- Right Side: Login Form -->
        <div class="w-full lg:w-1/2 flex items-center justify-center p-8 sm:p-12 bg-surface-container-lowest">
            <div class="w-full max-w-md">
                
                <!-- Mobile Logo (Visible solo en mobile) -->
                <div class="lg:hidden flex items-center gap-3 mb-10 justify-center">
                    <div class="w-12 h-12 rounded-2xl bg-primary/10 flex items-center justify-center text-primary">
                        <span class="material-symbols-outlined text-[32px]" style="font-variation-settings: 'FILL' 1;">bakery_dining</span>
                    </div>
                        <h1 class="text-2xl font-bold text-primary font-headline-md tracking-tight">Dulce Tentación</h1>
                    <p class="text-body-lg text-on-surface-variant">Por favor, ingresa tus credenciales para acceder a tu cuenta.</p>
                </div>

                <!-- Errores globales -->
                @if ($errors->any())
                    <div class="mb-6 p-4 rounded-xl bg-error-container/30 border border-error/20 flex items-start gap-3 animate-[fade-in_0.3s_ease-out]">
                        <span class="material-symbols-outlined text-error mt-0.5" style="font-variation-settings: 'FILL' 1;">error</span>
                        <div>
                            <h4 class="text-error font-bold text-label-md">Error de Autenticación</h4>
                            <p class="text-error/90 text-body-sm mt-1">{{ $errors->first() }}</p>
                        </div>
                    </div>
                @endif

                <form method="POST" action="{{ route('login.post') }}" class="space-y-6" x-data="{ showPassword: false }">
                    @csrf
                    
                    <!-- Email -->
                    <div class="space-y-2">
                        <label for="email" class="block font-label-md text-label-md text-on-surface font-semibold">Correo Electrónico</label>
                        <div class="relative">
                            <span class="material-symbols-outlined absolute left-4 top-1/2 -translate-y-1/2 text-outline">mail</span>
                            <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus
                                class="w-full pl-12 pr-4 py-3.5 bg-surface-container-low border border-transparent focus:border-primary focus:ring-1 focus:ring-primary rounded-xl font-body-lg text-body-lg text-on-surface transition-all outline-none @error('email') border-error bg-error/5 @enderror" 
                                placeholder="tu@correo.com">
                        </div>
                    </div>

                    <!-- Password -->
                    <div class="space-y-2">
                        <label for="password" class="block font-label-md text-label-md text-on-surface font-semibold">Contraseña</label>
                        <div class="relative">
                            <span class="material-symbols-outlined absolute left-4 top-1/2 -translate-y-1/2 text-outline">lock</span>
                            <input id="password" :type="showPassword ? 'text' : 'password'" name="password" required
                                class="w-full pl-12 pr-12 py-3.5 bg-surface-container-low border border-transparent focus:border-primary focus:ring-1 focus:ring-primary rounded-xl font-body-lg text-body-lg text-on-surface transition-all outline-none @error('password') border-error bg-error/5 @enderror" 
                                placeholder="••••••••">
                            <button type="button" @click="showPassword = !showPassword" class="absolute right-4 top-1/2 -translate-y-1/2 text-outline hover:text-on-surface transition-colors focus:outline-none">
                                <span class="material-symbols-outlined" x-text="showPassword ? 'visibility_off' : 'visibility'"></span>
                            </button>
                        </div>
                    </div>

                    <!-- Options -->
                    <div class="flex items-center justify-between">
                        <label class="flex items-center gap-2 cursor-pointer group">
                            <input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }} class="w-5 h-5 rounded border-outline-variant text-primary focus:ring-primary/50 transition-colors cursor-pointer accent-primary">
                            <span class="text-body-md text-on-surface-variant font-medium group-hover:text-on-surface transition-colors">Recordarme</span>
                        </label>
                        <a href="#" class="text-body-md text-primary font-bold hover:underline">¿Olvidaste tu contraseña?</a>
                    </div>

                    <!-- Submit -->
                    <button type="submit" 
                        class="w-full py-3.5 bg-primary text-on-primary font-bold text-label-lg rounded-xl shadow-lg shadow-primary/25 hover:bg-primary/90 active:scale-[0.98] transition-all flex items-center justify-center gap-2">
                        <span>Iniciar Sesión</span>
                        <span class="material-symbols-outlined">arrow_forward</span>
                    </button>
                    
                    <div class="text-center mt-6">
                        <p class="text-body-md text-on-surface-variant">
                            ¿No tienes una cuenta? 
                            <a href="{{ route('register') }}" class="text-primary font-bold hover:underline transition-colors">Regístrate aquí</a>
                        </p>
                    </div>
                </form>

            </div>
        </div>
    </div>
</x-layouts.guest>
