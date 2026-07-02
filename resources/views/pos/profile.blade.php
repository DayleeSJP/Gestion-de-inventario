<x-layouts.app active="profile" title="Mi Perfil">
    <div class="p-margin-page max-w-5xl mx-auto flex-1 w-full" x-data="profileApp()">
            <!-- Page Header -->
            <div class="flex items-center gap-3 mb-8">
                <div class="w-12 h-12 rounded-2xl bg-primary/10 flex items-center justify-center text-primary">
                    <span class="material-symbols-outlined text-3xl">account_circle</span>
                </div>
                <div>
                    <h2 class="font-headline-xl text-headline-xl text-on-surface">Mi Perfil</h2>
                    <p class="text-on-surface-variant">Gestiona tu información personal y preferencias del sistema</p>
                </div>
            </div>

            <!-- Form Content -->
            <div class="bg-surface-container-lowest rounded-3xl shadow-[0px_4px_12px_rgba(31,27,24,0.05)] overflow-hidden">
                <div class="p-8 space-y-10">
                    <!-- Photo Section -->
                    <div class="flex items-center gap-6 pb-6 border-b border-outline-variant/20">
                        <div class="w-24 h-24 rounded-full bg-surface-variant overflow-hidden relative group cursor-pointer" @click="$refs.fileInput.click()">
                            <template x-if="formData.previewImage">
                                <img :src="formData.previewImage" class="w-full h-full object-cover">
                            </template>
                            <template x-if="!formData.previewImage">
                                <span class="material-symbols-outlined text-4xl text-outline absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2">person</span>
                            </template>
                            <div class="absolute inset-0 bg-black/40 flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity">
                                <span class="material-symbols-outlined text-white">photo_camera</span>
                            </div>
                        </div>
                        <div>
                            <h3 class="font-headline-md text-headline-md text-on-surface">Foto de Perfil</h3>
                            <p class="text-body-md text-on-surface-variant mb-3">Sube tu foto para personalizar tu cuenta</p>
                            <button type="button" @click="$refs.fileInput.click()" class="px-4 py-2 border border-outline rounded-lg text-label-md font-label-md hover:bg-surface-container transition-colors">
                                Cambiar imagen
                            </button>
                            <input type="file" x-ref="fileInput" class="hidden" accept="image/*" @change="handleFileChange">
                        </div>
                    </div>

                    <!-- Identity Section -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-gutter">
                        <div class="space-y-2">
                            <label class="block font-label-md text-label-md text-outline uppercase tracking-wider px-1">Nombre Completo</label>
                            <div class="relative">
                                <span class="material-symbols-outlined absolute left-4 top-1/2 -translate-y-1/2 text-outline">person</span>
                                <input x-model="formData.name" class="w-full pl-12 pr-4 py-3 bg-surface-container-low border border-transparent focus:border-primary focus:ring-0 rounded-xl font-body-lg text-body-lg transition-all" type="text" />
                            </div>
                        </div>
                        <div class="space-y-2">
                            <label class="block font-label-md text-label-md text-outline uppercase tracking-wider px-1">Nombre de Usuario</label>
                            <div class="relative">
                                <span class="material-symbols-outlined absolute left-4 top-1/2 -translate-y-1/2 text-outline">alternate_email</span>
                                <input x-model="formData.username" class="w-full pl-12 pr-4 py-3 bg-surface-container-low border border-transparent focus:border-primary focus:ring-0 rounded-xl font-body-lg text-body-lg transition-all" type="text" />
                            </div>
                        </div>
                    </div>

                    <!-- Preferences Section -->
                    <div class="space-y-2">
                        <label class="block font-label-md text-label-md text-outline uppercase tracking-wider px-1">Moneda Preferida</label>
                        <div class="relative">
                            <span class="material-symbols-outlined absolute left-4 top-1/2 -translate-y-1/2 text-outline">payments</span>
                            <select x-model="formData.currency" class="w-full pl-12 pr-10 py-3 bg-surface-container-low border-transparent focus:border-primary focus:ring-0 rounded-xl font-body-lg text-body-lg appearance-none transition-all">
                                <option value="PEN">Soles (S/)</option>
                                <option value="USD">Dólares ($)</option>
                                <option value="EUR">Euros (€)</option>
                            </select>
                            <span class="material-symbols-outlined absolute right-4 top-1/2 -translate-y-1/2 text-outline pointer-events-none">expand_more</span>
                        </div>
                    </div>

                    
                    <!-- Actions -->
                    <div class="pt-6 border-t border-outline-variant/20 flex justify-end gap-4">
                        <span x-show="saved" class="text-primary font-bold self-center mr-4" x-transition>¡Cambios guardados!</span>
                        <button type="button" @click="fetchUser()" class="px-8 py-3 rounded-xl border border-outline text-on-surface-variant font-label-md text-label-md hover:bg-surface-container transition-all active:scale-95">
                            Descartar
                        </button>
                        <button type="button" @click="saveProfile()" class="px-8 py-3 rounded-xl bg-primary text-on-primary font-label-md text-label-md shadow-lg shadow-primary/20 hover:bg-primary-container transition-all active:scale-95">
                            Guardar Cambios
                        </button>
                    </div>
                </div>
            </div>

            <!-- Decorative Footer -->
            <footer class="mt-12 text-center pb-12">
                <p class="text-outline text-xs uppercase tracking-[0.2em]">© 2026 — Artisanal Bakery Management System</p>
                <p class="text-outline/60 text-[10px] mt-1">Hecho con pasión por la pastelería tradicional</p>
            </footer>
        </div>

    <script>
        document.addEventListener('alpine:init', () => {
            Alpine.data('profileApp', () => ({
                formData: {
                    id: 1,
                    name: '',
                    username: '',
                    currency: 'PEN',
                    imageFile: null,
                    previewImage: null,
                },
                saved: false,

                init() {
                    this.fetchUser();
                },

                async fetchUser() {
                    try {
                        const res = await fetch('/api/users');
                        const users = await res.json();
                        if (users.length > 0) {
                            // Cargar el primer usuario o el admin
                            const admin = users.find(u => u.role === 'Administrador') || users[0];
                            this.formData.id = admin.id;
                            this.formData.name = admin.name;
                            this.formData.username = admin.username || admin.name.split(' ')[0].toLowerCase();
                            this.formData.previewImage = admin.image || null;
                        }
                    } catch (error) {
                        console.error('Error fetching user:', error);
                    }
                },

                handleFileChange(event) {
                    const file = event.target.files[0];
                    if (file) {
                        this.formData.imageFile = file;
                        this.formData.previewImage = URL.createObjectURL(file);
                    }
                },

                async saveProfile() {
                    const data = new FormData();
                    data.append('_method', 'PUT'); // Laravel requires this for PUT via FormData
                    data.append('name', this.formData.name);
                    data.append('username', this.formData.username);
                    if (this.formData.imageFile) {
                        data.append('image', this.formData.imageFile);
                    }

                    try {
                        const res = await fetch(`/api/users/${this.formData.id}`, {
                            method: 'POST', // POST because of FormData, Laravel sees _method
                            body: data
                        });
                        
                        if (res.ok) {
                            const updatedUser = await res.json();
                            this.saved = true;
                            setTimeout(() => this.saved = false, 3000);
                            
                            // Emit event to update sidebar
                            window.dispatchEvent(new CustomEvent('profile-updated', { detail: updatedUser }));
                        }
                    } catch (error) {
                        console.error('Error saving profile:', error);
                    }
                }
            }));
        });
    </script>
</x-layouts.app>
