<x-layouts.app active="roles" title="Gestión de Roles y Permisos">
    <div class="p-margin-page flex-1" x-data="rolesApp()">
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
                <button @click="openModal()" class="bg-primary hover:opacity-90 text-on-primary px-6 py-3 rounded-lg font-semibold flex items-center gap-2 shadow-sm transition-all transform active:scale-95 self-start md:self-center">
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
                        <p class="text-headline-md font-bold" x-text="roles.length"></p>
                    </div>
                </div>
                <div class="bg-surface-container-lowest p-stack-md rounded-xl shadow-[0px_4px_12px_rgba(0,0,0,0.05)] border border-surface-container flex items-center gap-4">
                    <div class="w-12 h-12 rounded-full bg-secondary-fixed flex items-center justify-center">
                        <span class="material-symbols-outlined text-secondary">verified_user</span>
                    </div>
                    <div>
                        <p class="text-label-md text-outline">Módulos</p>
                        <p class="text-headline-md font-bold">10</p>
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
                            <template x-for="(role, index) in roles" :key="index">
                                <tr class="hover:bg-surface-bright transition-colors group">
                                    <td class="px-gutter py-5">
                                        <div class="flex items-center gap-3">
                                            <div class="w-2 h-2 rounded-full" :class="role.color"></div>
                                            <span class="font-bold text-on-surface text-body-lg" x-text="role.name"></span>
                                        </div>
                                    </td>
                                    <td class="px-gutter py-5 text-body-md text-outline" x-text="role.description"></td>
                                    <td class="px-gutter py-5">
                                        <span class="px-3 py-1 bg-surface-container-highest text-on-surface-variant rounded-full text-[11px] font-bold tracking-tight" x-text="role.permissionsCount + ' permisos'"></span>
                                    </td>
                                    <td class="px-gutter py-5 text-right">
                                        <div class="flex justify-end gap-2">
                                            <button @click="openModal(index)" class="flex items-center gap-1 px-3 py-1.5 bg-secondary-container text-on-secondary-container rounded-lg text-label-md hover:opacity-90 transition-all font-bold">
                                                <span class="material-symbols-outlined text-[16px]">edit</span>
                                                Editar
                                            </button>
                                            <button @click="confirmDelete(index)" class="p-1.5 bg-error-container text-on-error-container rounded-lg hover:opacity-90 transition-all">
                                                <span class="material-symbols-outlined text-[20px]">delete</span>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                            </template>
                        </tbody>
                    </table>
                </div>
                <!-- Pagination Footer -->
                <div class="px-gutter py-4 bg-surface-container-low border-t border-surface-container flex items-center justify-between">
                    <p class="text-label-md text-outline" x-text="`Mostrando ${roles.length} roles`"></p>
                    <div class="flex gap-2">
                        <button class="p-2 border border-outline-variant rounded-lg hover:bg-surface transition-all disabled:opacity-50" disabled>
                            <span class="material-symbols-outlined text-[20px]">chevron_left</span>
                        </button>
                        <button class="px-4 py-1.5 bg-primary text-on-primary rounded-lg text-label-md font-bold">1</button>
                        <button class="p-2 border border-outline-variant rounded-lg hover:bg-surface transition-all disabled:opacity-50" disabled>
                            <span class="material-symbols-outlined text-[20px]">chevron_right</span>
                        </button>
                    </div>
                </div>
            </div>

            <!-- Page Footer Information -->
            <footer class="mt-stack-lg text-center pb-8">
                <p class="text-label-md text-outline opacity-60">© 2026 — Pastelería Dulce Corazón · Gestión Segura de Datos</p>
            </footer>

            <!-- Modal Nuevo/Editar Rol -->
            <div x-show="isModalOpen" style="display: none;" class="fixed inset-0 z-50 flex items-center justify-center p-4 sm:p-6" x-transition.opacity>
                <!-- Backdrop -->
                <div class="absolute inset-0 bg-black/40 backdrop-blur-sm" @click="closeModal()"></div>
                
                <!-- Modal Box -->
                <div class="bg-white rounded-2xl shadow-xl w-full max-w-5xl max-h-[90vh] flex flex-col relative z-10 overflow-hidden transform transition-all" x-transition.scale.95>
                    <!-- Header -->
                    <div class="px-6 py-4 border-b border-surface-container flex justify-between items-center bg-surface-container-lowest">
                        <h3 class="text-headline-md font-bold flex items-center gap-2">
                            <span class="material-symbols-outlined text-primary" x-text="isEditing ? 'edit' : 'add_circle'"></span>
                            <span x-text="isEditing ? 'Editar Rol' : 'Crear Nuevo Rol'"></span>
                        </h3>
                        <button @click="closeModal()" class="p-2 text-outline hover:bg-surface-container rounded-full transition-colors">
                            <span class="material-symbols-outlined">close</span>
                        </button>
                    </div>

                    <!-- Scrollable Content -->
                    <div class="p-6 overflow-y-auto custom-scrollbar flex-1 bg-background">
                        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
                            <!-- Datos del Rol -->
                            <div class="lg:col-span-1 space-y-4">
                                <h4 class="font-bold text-body-lg mb-2 border-b border-surface-container pb-2">Datos del Rol</h4>
                                <div>
                                    <label class="block text-label-md font-semibold text-on-surface mb-1">Nombre del Rol</label>
                                    <input type="text" x-model="formData.name" class="w-full rounded-xl border border-outline-variant bg-surface-container-lowest px-4 py-2.5 text-body-md focus:border-primary focus:ring-1 focus:ring-primary outline-none transition-all" placeholder="Ej. Encargado">
                                </div>
                                <div>
                                    <label class="block text-label-md font-semibold text-on-surface mb-1">Descripción</label>
                                    <textarea x-model="formData.description" rows="3" class="w-full rounded-xl border border-outline-variant bg-surface-container-lowest px-4 py-2.5 text-body-md focus:border-primary focus:ring-1 focus:ring-primary outline-none transition-all" placeholder="Breve descripción de las responsabilidades..."></textarea>
                                </div>
                                <div>
                                    <label class="block text-label-md font-semibold text-on-surface mb-1">Color Identificador</label>
                                    <div class="flex gap-2">
                                        <template x-for="color in colors" :key="color">
                                            <button @click="formData.color = color" :class="[color, formData.color === color ? 'ring-2 ring-offset-2 ring-primary scale-110' : 'opacity-70']" class="w-8 h-8 rounded-full transition-all shadow-sm"></button>
                                        </template>
                                    </div>
                                </div>
                            </div>

                            <!-- Permisos (Módulos estilo tarjetas) -->
                            <div class="lg:col-span-2">
                                <div class="flex justify-between items-center mb-2 border-b border-surface-container pb-2">
                                    <h4 class="font-bold text-body-lg">Permisos de Módulos</h4>
                                    <div class="flex gap-4">
                                        <button @click="selectAll()" class="text-primary text-label-md font-bold hover:underline">Seleccionar Todo</button>
                                        <button @click="deselectAll()" class="text-outline text-label-md hover:underline">Deseleccionar Todo</button>
                                    </div>
                                </div>
                                
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mt-4">
                                    <template x-for="(module, mIndex) in modules" :key="mIndex">
                                        <!-- Card del Módulo -->
                                        <div class="bg-surface-container-lowest border border-surface-container rounded-xl overflow-hidden shadow-sm hover:border-primary-fixed transition-colors">
                                            <div class="px-4 py-3 bg-surface-container-low border-b border-surface-container flex items-center gap-2">
                                                <span class="material-symbols-outlined text-[20px] text-on-surface-variant">folder</span>
                                                <h5 class="font-bold text-body-lg text-on-surface" x-text="module.name"></h5>
                                            </div>
                                            <div class="p-4 flex flex-col gap-3 bg-white">
                                                <template x-for="(perm, pIndex) in module.permissions" :key="pIndex">
                                                    <label class="flex items-start gap-3 cursor-pointer group">
                                                        <div class="relative flex items-start pt-0.5">
                                                            <input type="checkbox" x-model="formData.permissions" :value="perm.id" class="peer sr-only">
                                                            <div class="w-5 h-5 border-2 border-outline rounded bg-surface-container-lowest peer-checked:bg-primary peer-checked:border-primary transition-all flex items-center justify-center">
                                                                <span class="material-symbols-outlined text-white text-[16px] opacity-0 peer-checked:opacity-100 font-bold" style="font-variation-settings: 'FILL' 1;">check</span>
                                                            </div>
                                                        </div>
                                                        <span class="text-body-md text-on-surface group-hover:text-primary transition-colors leading-tight" x-text="perm.name"></span>
                                                    </label>
                                                </template>
                                            </div>
                                        </div>
                                    </template>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Footer Actions -->
                    <div class="px-6 py-4 border-t border-surface-container bg-surface-container-low flex justify-end gap-3">
                        <button @click="closeModal()" class="px-5 py-2.5 text-on-surface font-semibold hover:bg-surface-container rounded-lg transition-colors">Cancelar</button>
                        <button @click="saveRole()" class="px-5 py-2.5 bg-primary text-on-primary font-bold rounded-lg hover:opacity-90 transition-opacity shadow-sm flex items-center gap-2">
                            <span class="material-symbols-outlined text-[20px]">save</span>
                            Guardar Rol
                        </button>
                    </div>
                </div>
            </div>

            <!-- Modal Eliminar Rol -->
            <div x-show="isDeleteModalOpen" style="display: none;" class="fixed inset-0 z-50 flex items-center justify-center p-4 sm:p-6" x-transition.opacity>
                <!-- Backdrop -->
                <div class="absolute inset-0 bg-black/40 backdrop-blur-sm" @click="isDeleteModalOpen = false"></div>
                
                <!-- Modal Box -->
                <div class="bg-white rounded-2xl shadow-xl w-full max-w-sm flex flex-col relative z-10 p-6 text-center transform transition-all" x-transition.scale.95>
                    <div class="w-16 h-16 rounded-full bg-error-container text-on-error-container flex items-center justify-center mx-auto mb-4">
                        <span class="material-symbols-outlined text-[32px]">warning</span>
                    </div>
                    <h3 class="text-headline-md font-bold mb-2">¿Eliminar este rol?</h3>
                    <p class="text-body-md text-outline mb-6">Esta acción no se puede deshacer. Los usuarios asociados a este rol perderán sus permisos actuales.</p>
                    
                    <div class="flex justify-center gap-3">
                        <button @click="isDeleteModalOpen = false" class="px-5 py-2.5 text-on-surface font-semibold hover:bg-surface-container rounded-lg transition-colors flex-1">Cancelar</button>
                        <button @click="deleteRole()" class="px-5 py-2.5 bg-error text-on-error font-bold rounded-lg hover:opacity-90 transition-opacity shadow-sm flex-1">Eliminar</button>
                    </div>
                </div>
            </div>

    </div>

    <!-- Alpine.js Logic -->
    <script>
        document.addEventListener('alpine:init', () => {
            Alpine.data('rolesApp', () => ({
                roles: [],
                init() {
                    this.fetchRoles();
                },
                async fetchRoles() {
                    try {
                        const res = await fetch('/api/roles');
                        this.roles = await res.json();
                    } catch (error) {
                        console.error('Error loading roles:', error);
                    }
                },
                colors: ['bg-primary', 'bg-secondary', 'bg-tertiary', 'bg-primary-fixed-dim', 'bg-secondary-container', 'bg-tertiary-container'],
                modules: [
                    {
                        name: 'Admin',
                        permissions: [
                            { id: 'admin_1', name: 'Permite editar los permisos de otros roles' }
                        ]
                    },
                    {
                        name: 'Categorias',
                        permissions: [
                            { id: 'cat_1', name: 'Activar o desactivar categorias' },
                            { id: 'cat_2', name: 'Crear y editar categorias' },
                            { id: 'cat_3', name: 'Ver la lista de categorias' }
                        ]
                    },
                    {
                        name: 'Compras',
                        permissions: [
                            { id: 'comp_1', name: 'Crear nuevas órdenes de compra' },
                            { id: 'comp_2', name: 'Marcar órdenes de compra como recibidas y actualizar stock' },
                            { id: 'comp_3', name: 'Ver la lista de órdenes de compra' }
                        ]
                    },
                    {
                        name: 'Productos',
                        permissions: [
                            { id: 'prod_1', name: 'Activar o desactivar productos' },
                            { id: 'prod_2', name: 'Crear nuevos productos' },
                            { id: 'prod_3', name: 'Editar productos existentes' },
                            { id: 'prod_4', name: 'Eliminar productos' },
                            { id: 'prod_5', name: 'Ver el historial de movimientos (Kardex) de un producto' },
                            { id: 'prod_6', name: 'Ver la lista de productos en el inventario' }
                        ]
                    },
                    {
                        name: 'Reportes',
                        permissions: [
                            { id: 'rep_1', name: 'Ver el reporte de inventario' },
                            { id: 'rep_2', name: 'Ver el reporte de productos con bajo stock' },
                            { id: 'rep_3', name: 'Ver el reporte de ventas' }
                        ]
                    },
                    {
                        name: 'Caja',
                        permissions: [
                            { id: 'caja_1', name: 'Abrir, cerrar y gestionar movimientos de caja' }
                        ]
                    },
                    {
                        name: 'Clientes',
                        permissions: [
                            { id: 'cli_1', name: 'Activar o desactivar clientes' },
                            { id: 'cli_2', name: 'Crear y editar clientes' },
                            { id: 'cli_3', name: 'Ver la lista de clientes' }
                        ]
                    },
                    {
                        name: 'Dashboard',
                        permissions: [
                            { id: 'dash_1', name: 'Acceso al dashboard principal' }
                        ]
                    },
                    {
                        name: 'Proveedores',
                        permissions: [
                            { id: 'prov_1', name: 'Activar o desactivar proveedores' },
                            { id: 'prov_2', name: 'Crear y editar proveedores' },
                            { id: 'prov_3', name: 'Ver la lista de proveedores' }
                        ]
                    },
                    {
                        name: 'Usuarios',
                        permissions: [
                            { id: 'user_1', name: 'Activar o desactivar usuarios' },
                            { id: 'user_2', name: 'Crear y editar usuarios del sistema' },
                            { id: 'user_3', name: 'Ver la lista de usuarios del sistema' }
                        ]
                    }
                ],
                isModalOpen: false,
                isDeleteModalOpen: false,
                isEditing: false,
                editIndex: null,
                deleteIndex: null,
                formData: {
                    name: '',
                    description: '',
                    color: 'bg-primary',
                    permissions: []
                },

                openModal(index = null) {
                    this.isEditing = index !== null;
                    this.editIndex = index;
                    
                    if (this.isEditing) {
                        const role = this.roles[index];
                        this.formData = {
                            name: role.name,
                            description: role.description,
                            color: role.color,
                            permissions: [...role.permissions]
                        };
                    } else {
                        this.formData = {
                            name: '',
                            description: '',
                            color: 'bg-primary',
                            permissions: []
                        };
                    }
                    
                    this.isModalOpen = true;
                },

                closeModal() {
                    this.isModalOpen = false;
                },

                selectAll() {
                    let allPerms = [];
                    this.modules.forEach(mod => {
                        mod.permissions.forEach(p => allPerms.push(p.id));
                    });
                    this.formData.permissions = allPerms;
                },

                deselectAll() {
                    this.formData.permissions = [];
                },

                async saveRole() {
                    if (!this.formData.name.trim()) return alert("Por favor ingresa un nombre para el rol");
                    
                    const roleData = {
                        name: this.formData.name,
                        description: this.formData.description,
                        color: this.formData.color,
                        permissions: [...this.formData.permissions]
                    };

                    const isNew = !this.isEditing;
                    const url = isNew ? '/api/roles' : `/api/roles/${this.roles[this.editIndex].id}`;
                    
                    try {
                        const res = await fetch(url, {
                            method: isNew ? 'POST' : 'PUT',
                            headers: { 'Content-Type': 'application/json' },
                            body: JSON.stringify(roleData)
                        });
                        if (res.ok) {
                            await this.fetchRoles();
                            this.closeModal();
                        }
                    } catch(error) {
                        console.error('Error saving:', error);
                    }
                },

                confirmDelete(index) {
                    this.deleteIndex = index;
                    this.isDeleteModalOpen = true;
                },

                async deleteRole() {
                    if (this.deleteIndex !== null) {
                        const id = this.roles[this.deleteIndex].id;
                        try {
                            await fetch(`/api/roles/${id}`, { method: 'DELETE' });
                            await this.fetchRoles();
                        } catch (error) {
                            console.error('Error deleting:', error);
                        }
                    }
                    this.isDeleteModalOpen = false;
                    this.deleteIndex = null;
                }
            }));
        });
    </script>
</x-layouts.app>
