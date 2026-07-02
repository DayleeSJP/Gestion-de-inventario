<x-layouts.app active="users" title="Gestión de Usuarios">
    <div class="p-margin-page flex-1 max-w-7xl mx-auto w-full" x-data="usersApp()">

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
            <button @click="openModal()" class="flex items-center gap-2 bg-primary text-on-primary px-6 py-3 rounded-lg font-label-md text-label-md hover:shadow-lg transition-all active:scale-95">
                <span class="material-symbols-outlined">person_add</span>
                Nuevo Usuario
            </button>
        </div>

        <!-- Stats Grid -->
        <div class="grid grid-cols-1 md:grid-cols-4 gap-gutter mb-8">
            <div class="bg-surface-container-lowest p-card-padding rounded-xl shadow-sm border border-outline-variant/20 hover:border-primary/30 transition-all group">
                <div class="flex items-center justify-between mb-4">
                    <div class="p-2 rounded-lg bg-surface-container-high text-primary group-hover:bg-primary group-hover:text-on-primary transition-colors">
                        <span class="material-symbols-outlined">person</span>
                    </div>
                </div>
                <div class="text-on-surface-variant font-label-md">Total Usuarios</div>
                <div class="text-headline-lg font-bold text-on-surface" x-text="users.length"></div>
            </div>
            <div class="bg-surface-container-lowest p-card-padding rounded-xl shadow-sm border border-outline-variant/20 hover:border-secondary/30 transition-all group">
                <div class="flex items-center justify-between mb-4">
                    <div class="p-2 rounded-lg bg-surface-container-high text-secondary group-hover:bg-secondary group-hover:text-on-secondary transition-colors">
                        <span class="material-symbols-outlined">verified_user</span>
                    </div>
                </div>
                <div class="text-on-surface-variant font-label-md">Administradores</div>
                <div class="text-headline-lg font-bold text-on-surface" x-text="users.filter(u => u.role === 'Administrador').length"></div>
            </div>
            <div class="bg-surface-container-lowest p-card-padding rounded-xl shadow-sm border border-outline-variant/20 group transition-all">
                <div class="flex items-center justify-between mb-4">
                    <div class="p-2 rounded-lg bg-surface-container-high text-primary transition-colors">
                        <span class="material-symbols-outlined">check_circle</span>
                    </div>
                </div>
                <div class="text-on-surface-variant font-label-md">Activos</div>
                <div class="text-headline-lg font-bold text-on-surface" x-text="users.filter(u => u.status === 'activo').length"></div>
            </div>
            <div class="bg-surface-container-lowest p-card-padding rounded-xl shadow-sm border border-outline-variant/20 group transition-all">
                <div class="flex items-center justify-between mb-4">
                    <div class="p-2 rounded-lg bg-surface-container-high text-error transition-colors">
                        <span class="material-symbols-outlined">person_off</span>
                    </div>
                </div>
                <div class="text-on-surface-variant font-label-md">Inactivos</div>
                <div class="text-headline-lg font-bold text-on-surface" x-text="users.filter(u => u.status === 'inactivo').length"></div>
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
                        <template x-for="(user, index) in users" :key="index">
                            <tr class="hover:bg-surface-container-low/30 transition-colors group">
                                <td class="px-margin-page py-4">
                                    <div class="flex items-center gap-3">
                                        <!-- Avatar con iniciales -->
                                        <div class="w-10 h-10 rounded-full flex items-center justify-center font-bold text-sm text-on-primary flex-shrink-0" :style="`background-color: ${user.avatarColor}`" x-text="getInitials(user.name)"></div>
                                        <div>
                                            <div class="font-label-md text-label-md text-on-surface font-bold" x-text="user.name"></div>
                                            <div class="text-xs text-on-surface-variant" x-text="user.email"></div>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4 text-body-md text-on-surface-variant" x-text="user.username"></td>
                                <td class="px-6 py-4">
                                    <span class="px-3 py-1 rounded-full text-[11px] font-bold uppercase tracking-tight bg-surface-variant text-on-surface-variant" x-text="user.role"></span>
                                </td>
                                <td class="px-6 py-4">
                                    <span x-show="user.status === 'activo'" class="flex items-center gap-1.5 text-primary">
                                        <span class="w-2 h-2 rounded-full bg-primary animate-pulse"></span>
                                        <span class="font-label-md text-label-md">Activo</span>
                                    </span>
                                    <span x-show="user.status === 'inactivo'" class="flex items-center gap-1.5 text-on-surface-variant/50">
                                        <span class="w-2 h-2 rounded-full bg-outline-variant"></span>
                                        <span class="font-label-md text-label-md">Inactivo</span>
                                    </span>
                                </td>
                                <td class="px-margin-page py-4 text-right">
                                    <div class="flex justify-end gap-2">
                                        <button @click="openModal(index)" class="p-2 rounded-lg bg-secondary-container/20 text-secondary hover:bg-secondary-container hover:text-on-secondary-container transition-all">
                                            <span class="material-symbols-outlined text-[18px]">edit</span>
                                        </button>
                                        <button @click="confirmDelete(index)" class="p-2 rounded-lg text-outline-variant hover:text-error hover:bg-error-container/20 transition-all">
                                            <span class="material-symbols-outlined text-[18px]">delete</span>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                        </template>
                        <!-- Empty state -->
                        <tr x-show="users.length === 0">
                            <td colspan="5" class="px-margin-page py-12 text-center text-on-surface-variant">
                                <span class="material-symbols-outlined text-[48px] opacity-30 block mb-2">group_off</span>
                                <p class="font-label-md">No hay usuarios registrados aún</p>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="px-margin-page py-4 bg-surface-container-low border-t border-outline-variant/30 flex items-center justify-between">
                <span class="text-label-sm font-label-sm text-on-surface-variant" x-text="`Mostrando ${users.length} usuario(s)`"></span>
                <div class="flex items-center gap-1">
                    <button class="p-2 rounded-lg hover:bg-surface-container-high disabled:opacity-30" disabled>
                        <span class="material-symbols-outlined">chevron_left</span>
                    </button>
                    <button class="w-8 h-8 rounded-lg bg-primary text-on-primary font-bold text-xs">1</button>
                    <button class="p-2 rounded-lg hover:bg-surface-container-high disabled:opacity-30" disabled>
                        <span class="material-symbols-outlined">chevron_right</span>
                    </button>
                </div>
            </div>
        </div>

        <!-- Footer -->
        <footer class="mt-8 pb-4 text-center">
            <span class="font-label-sm text-label-sm text-on-surface-variant">© 2026 Pastelería Dulce Corazón · Sistema de Gestión Artisanal</span>
        </footer>

        <!-- ==================== Modal Nuevo / Editar Usuario ==================== -->
        <div x-show="isModalOpen" style="display: none;" class="fixed inset-0 z-50 flex items-center justify-center p-4 sm:p-6" x-transition.opacity>
            <!-- Backdrop -->
            <div class="absolute inset-0 bg-black/40 backdrop-blur-sm" @click="closeModal()"></div>

            <!-- Modal Box -->
            <div class="bg-white rounded-2xl shadow-xl w-full max-w-lg flex flex-col relative z-10 overflow-hidden" x-transition.scale.95>
                <!-- Header -->
                <div class="px-6 py-4 border-b border-surface-container flex justify-between items-center bg-surface-container-lowest">
                    <h3 class="text-headline-md font-bold flex items-center gap-2">
                        <span class="material-symbols-outlined text-primary" x-text="isEditing ? 'manage_accounts' : 'person_add'"></span>
                        <span x-text="isEditing ? 'Editar Usuario' : 'Nuevo Usuario'"></span>
                    </h3>
                    <button @click="closeModal()" class="p-2 text-outline hover:bg-surface-container rounded-full transition-colors">
                        <span class="material-symbols-outlined">close</span>
                    </button>
                </div>

                <!-- Content -->
                <div class="p-6 overflow-y-auto custom-scrollbar space-y-5 bg-background">

                    <!-- Avatar preview + iniciales -->
                    <div class="flex items-center gap-4 mb-2">
                        <div class="w-16 h-16 rounded-full flex items-center justify-center font-bold text-xl text-on-primary shadow-md flex-shrink-0 transition-all" :style="`background-color: ${formData.avatarColor}`" x-text="getInitials(formData.name) || 'U'"></div>
                        <div>
                            <p class="text-label-md font-semibold text-on-surface mb-1">Color de Avatar</p>
                            <div class="flex gap-2 flex-wrap">
                                <template x-for="color in avatarColors" :key="color">
                                    <button @click="formData.avatarColor = color" :style="`background-color: ${color}`" :class="formData.avatarColor === color ? 'ring-2 ring-offset-2 ring-primary scale-110' : 'opacity-70'" class="w-7 h-7 rounded-full transition-all shadow-sm"></button>
                                </template>
                            </div>
                        </div>
                    </div>

                    <!-- Nombre -->
                    <div>
                        <label class="block text-label-md font-semibold text-on-surface mb-1">Nombre Completo <span class="text-error">*</span></label>
                        <input type="text" x-model="formData.name" class="w-full rounded-xl border border-outline-variant bg-surface-container-lowest px-4 py-2.5 text-body-md focus:border-primary focus:ring-1 focus:ring-primary outline-none transition-all" placeholder="Ej. María García">
                    </div>

                    <!-- Email -->
                    <div>
                        <label class="block text-label-md font-semibold text-on-surface mb-1">Correo Electrónico <span class="text-error">*</span></label>
                        <input type="email" x-model="formData.email" class="w-full rounded-xl border border-outline-variant bg-surface-container-lowest px-4 py-2.5 text-body-md focus:border-primary focus:ring-1 focus:ring-primary outline-none transition-all" placeholder="Ej. maria@dulcecorazon.com">
                    </div>

                    <!-- Username -->
                    <div>
                        <label class="block text-label-md font-semibold text-on-surface mb-1">Nombre de Usuario <span class="text-error">*</span></label>
                        <input type="text" x-model="formData.username" class="w-full rounded-xl border border-outline-variant bg-surface-container-lowest px-4 py-2.5 text-body-md focus:border-primary focus:ring-1 focus:ring-primary outline-none transition-all" placeholder="Ej. maria_garcia">
                    </div>

                    <!-- Contraseña -->
                    <div>
                        <label class="block text-label-md font-semibold text-on-surface mb-1">
                            Contraseña <span x-show="isEditing" class="text-outline font-normal">(dejar vacío para no cambiar)</span>
                            <span x-show="!isEditing" class="text-error">*</span>
                        </label>
                        <div class="relative">
                            <input :type="showPassword ? 'text' : 'password'" x-model="formData.password" class="w-full rounded-xl border border-outline-variant bg-surface-container-lowest px-4 py-2.5 pr-11 text-body-md focus:border-primary focus:ring-1 focus:ring-primary outline-none transition-all" placeholder="••••••••">
                            <button @click="showPassword = !showPassword" type="button" class="absolute right-3 top-1/2 -translate-y-1/2 text-outline hover:text-on-surface transition-colors">
                                <span class="material-symbols-outlined text-[20px]" x-text="showPassword ? 'visibility_off' : 'visibility'"></span>
                            </button>
                        </div>
                    </div>

                    <!-- Rol y Estado en grid -->
                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <label class="block text-label-md font-semibold text-on-surface mb-1">Rol <span class="text-error">*</span></label>
                            <select x-model="formData.role" class="w-full rounded-xl border border-outline-variant bg-surface-container-lowest px-4 py-2.5 text-body-md focus:border-primary focus:ring-1 focus:ring-primary outline-none transition-all">
                                <option value="">Seleccionar...</option>
                                <option value="Administrador">Administrador</option>
                                <option value="Vendedor">Vendedor</option>
                                <option value="Cajero">Cajero</option>
                                <option value="Maestro Pastelero">Maestro Pastelero</option>
                                <option value="Personal Caja">Personal Caja</option>
                            </select>
                        </div>
                        <div>
                            <label class="block text-label-md font-semibold text-on-surface mb-1">Estado</label>
                            <div class="flex gap-3 mt-1">
                                <label class="flex items-center gap-2 cursor-pointer">
                                    <input type="radio" x-model="formData.status" value="activo" class="accent-primary w-4 h-4">
                                    <span class="text-body-md text-primary font-semibold">Activo</span>
                                </label>
                                <label class="flex items-center gap-2 cursor-pointer">
                                    <input type="radio" x-model="formData.status" value="inactivo" class="accent-primary w-4 h-4">
                                    <span class="text-body-md text-outline">Inactivo</span>
                                </label>
                            </div>
                        </div>
                    </div>

                    <!-- Error message -->
                    <p x-show="formError" x-text="formError" class="text-error text-label-md bg-error-container/30 px-4 py-2 rounded-lg"></p>
                </div>

                <!-- Footer -->
                <div class="px-6 py-4 border-t border-surface-container bg-surface-container-low flex justify-end gap-3">
                    <button @click="closeModal()" class="px-5 py-2.5 text-on-surface font-semibold hover:bg-surface-container rounded-lg transition-colors">Cancelar</button>
                    <button @click="saveUser()" class="px-5 py-2.5 bg-primary text-on-primary font-bold rounded-lg hover:opacity-90 transition-opacity shadow-sm flex items-center gap-2">
                        <span class="material-symbols-outlined text-[20px]">save</span>
                        Guardar Usuario
                    </button>
                </div>
            </div>
        </div>

        <!-- ==================== Modal Eliminar Usuario ==================== -->
        <div x-show="isDeleteModalOpen" style="display: none;" class="fixed inset-0 z-50 flex items-center justify-center p-4 sm:p-6" x-transition.opacity>
            <div class="absolute inset-0 bg-black/40 backdrop-blur-sm" @click="isDeleteModalOpen = false"></div>

            <div class="bg-white rounded-2xl shadow-xl w-full max-w-sm flex flex-col relative z-10 p-6 text-center" x-transition.scale.95>
                <div class="w-16 h-16 rounded-full bg-error-container text-on-error-container flex items-center justify-center mx-auto mb-4">
                    <span class="material-symbols-outlined text-[32px]">person_remove</span>
                </div>
                <h3 class="text-headline-md font-bold mb-2">¿Eliminar este usuario?</h3>
                <p class="text-body-md text-outline mb-1">
                    Estás a punto de eliminar a
                    <span class="font-bold text-on-surface" x-text="deleteIndex !== null ? users[deleteIndex]?.name : ''"></span>.
                </p>
                <p class="text-body-md text-outline mb-6">Esta acción no se puede deshacer.</p>
                <div class="flex justify-center gap-3">
                    <button @click="isDeleteModalOpen = false" class="px-5 py-2.5 text-on-surface font-semibold hover:bg-surface-container rounded-lg transition-colors flex-1">Cancelar</button>
                    <button @click="deleteUser()" class="px-5 py-2.5 bg-error text-on-error font-bold rounded-lg hover:opacity-90 transition-opacity shadow-sm flex-1">Eliminar</button>
                </div>
            </div>
        </div>

    </div>

    <!-- Alpine.js Logic -->
    <script>
        document.addEventListener('alpine:init', () => {
            Alpine.data('usersApp', () => ({
                users: [
                    { name: 'Daniela Cunurana', email: 'daniela@dulcecorazon.com', username: 'daniela20', role: 'Administrador', status: 'activo', avatarColor: '#03645c' },
                    { name: 'Huaman Angelo', email: 'angelo@dulcecorazon.com', username: 'angelo', role: 'Personal Caja', status: 'inactivo', avatarColor: '#954912' },
                    { name: 'Mateo Rivera', email: 'mateo@dulcecorazon.com', username: 'mateo_v', role: 'Vendedor', status: 'activo', avatarColor: '#5c5951' },
                ],
                avatarColors: ['#03645c', '#954912', '#5c5951', '#2d7d74', '#ba1a1a', '#116a61', '#753400', '#006874'],

                isModalOpen: false,
                isDeleteModalOpen: false,
                isEditing: false,
                editIndex: null,
                deleteIndex: null,
                showPassword: false,
                formError: '',

                formData: {
                    name: '',
                    email: '',
                    username: '',
                    password: '',
                    role: '',
                    status: 'activo',
                    avatarColor: '#03645c'
                },

                getInitials(name) {
                    if (!name) return '';
                    const parts = name.trim().split(' ');
                    return parts.length >= 2
                        ? (parts[0][0] + parts[1][0]).toUpperCase()
                        : parts[0].substring(0, 2).toUpperCase();
                },

                openModal(index = null) {
                    this.isEditing = index !== null;
                    this.editIndex = index;
                    this.formError = '';
                    this.showPassword = false;

                    if (this.isEditing) {
                        const u = this.users[index];
                        this.formData = {
                            name: u.name,
                            email: u.email,
                            username: u.username,
                            password: '',
                            role: u.role,
                            status: u.status,
                            avatarColor: u.avatarColor
                        };
                    } else {
                        this.formData = {
                            name: '',
                            email: '',
                            username: '',
                            password: '',
                            role: '',
                            status: 'activo',
                            avatarColor: '#03645c'
                        };
                    }

                    this.isModalOpen = true;
                },

                closeModal() {
                    this.isModalOpen = false;
                    this.formError = '';
                },

                saveUser() {
                    this.formError = '';

                    if (!this.formData.name.trim()) { this.formError = 'El nombre es obligatorio.'; return; }
                    if (!this.formData.email.trim()) { this.formError = 'El correo electrónico es obligatorio.'; return; }
                    if (!this.formData.username.trim()) { this.formError = 'El nombre de usuario es obligatorio.'; return; }
                    if (!this.isEditing && !this.formData.password.trim()) { this.formError = 'La contraseña es obligatoria para nuevos usuarios.'; return; }
                    if (!this.formData.role) { this.formError = 'Debes seleccionar un rol.'; return; }

                    const userData = {
                        name: this.formData.name,
                        email: this.formData.email,
                        username: this.formData.username,
                        role: this.formData.role,
                        status: this.formData.status,
                        avatarColor: this.formData.avatarColor
                    };

                    if (this.isEditing) {
                        this.users[this.editIndex] = userData;
                    } else {
                        this.users.push(userData);
                    }

                    this.closeModal();
                },

                confirmDelete(index) {
                    this.deleteIndex = index;
                    this.isDeleteModalOpen = true;
                },

                deleteUser() {
                    if (this.deleteIndex !== null) {
                        this.users.splice(this.deleteIndex, 1);
                    }
                    this.isDeleteModalOpen = false;
                    this.deleteIndex = null;
                }
            }));
        });
    </script>
</x-layouts.app>
