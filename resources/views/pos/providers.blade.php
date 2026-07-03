<x-layouts.app active="providers" title="Gestión de Proveedores">
    <div class="p-margin-page flex-1 max-w-7xl mx-auto w-full" x-data="providersApp()">

        <!-- Header Section -->
        <div class="flex items-end justify-between mb-8">
            <div>
                <div class="flex items-center gap-3 mb-2">
                    <div class="w-12 h-12 rounded-xl bg-tertiary-container/20 flex items-center justify-center text-tertiary">
                        <span class="material-symbols-outlined text-[32px]" style="font-variation-settings: 'FILL' 1;">local_shipping</span>
                    </div>
                    <h2 class="font-headline-xl text-headline-xl text-on-surface">Proveedores</h2>
                </div>
                <p class="text-on-surface-variant font-body-md max-w-2xl">
                    Gestiona los datos de los proveedores de insumos de la pastelería.
                </p>
            </div>
            <button @click="openModal()" class="flex items-center gap-2 bg-primary text-on-primary px-6 py-3 rounded-lg font-label-md text-label-md hover:shadow-lg transition-all active:scale-95">
                <span class="material-symbols-outlined">add_business</span>
                Nuevo Proveedor
            </button>
        </div>

        <!-- Table Container -->
        <div class="bg-surface-container-lowest rounded-xl shadow-sm border border-outline-variant/20 overflow-hidden">
            <!-- Search and Filter Bar -->
            <div class="p-4 border-b border-outline-variant/20 flex items-center justify-between bg-surface-container-low/50">
                <div class="relative w-full max-w-sm">
                    <span class="material-symbols-outlined absolute left-3 top-1/2 -translate-y-1/2 text-outline">search</span>
                    <input type="text" x-model="searchQuery" placeholder="Buscar por empresa o contacto..." 
                           class="w-full pl-10 pr-4 py-2 bg-surface-container-lowest border border-outline-variant/30 rounded-lg text-body-md focus:border-primary focus:ring-1 focus:ring-primary outline-none transition-colors">
                </div>
            </div>

            <!-- Data Table -->
            <div class="overflow-x-auto">
                <table class="w-full text-left border-collapse">
                    <thead>
                        <tr class="bg-surface-container-low text-on-surface-variant text-label-md">
                            <th class="px-6 py-4 font-bold border-b border-outline-variant/30">Empresa</th>
                            <th class="px-6 py-4 font-bold border-b border-outline-variant/30">Contacto</th>
                            <th class="px-6 py-4 font-bold border-b border-outline-variant/30 hidden md:table-cell">Email & Teléfono</th>
                            <th class="px-6 py-4 font-bold border-b border-outline-variant/30">Estado</th>
                            <th class="px-6 py-4 font-bold border-b border-outline-variant/30 text-right">Acciones</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-outline-variant/20">
                        <template x-for="provider in filteredProviders" :key="provider.id">
                            <tr class="hover:bg-surface-container-lowest transition-colors group">
                                <td class="px-6 py-4">
                                    <div class="flex items-center gap-3">
                                        <div class="w-10 h-10 rounded-full bg-tertiary-fixed/30 flex items-center justify-center text-tertiary font-bold text-lg">
                                            <span x-text="provider.name.charAt(0)"></span>
                                        </div>
                                        <div>
                                            <div class="font-bold text-on-surface text-body-lg" x-text="provider.name"></div>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4 text-body-md text-on-surface" x-text="provider.contact_name"></td>
                                <td class="px-6 py-4 text-body-md text-on-surface-variant hidden md:table-cell">
                                    <div x-text="provider.email"></div>
                                    <div x-text="provider.phone"></div>
                                </td>
                                <td class="px-6 py-4">
                                    <span class="px-3 py-1 text-label-sm font-bold rounded-full"
                                          :class="provider.status ? 'bg-green-100 text-green-700 border border-green-200' : 'bg-red-100 text-red-700 border border-red-200'"
                                          x-text="provider.status ? 'Activo' : 'Inactivo'">
                                    </span>
                                </td>
                                <td class="px-6 py-4 text-right">
                                    <div class="flex items-center justify-end gap-2 opacity-0 group-hover:opacity-100 transition-opacity">
                                        <button @click="editProvider(provider)" class="p-2 text-on-surface-variant hover:text-primary hover:bg-primary-container/20 rounded-lg transition-colors" title="Editar">
                                            <span class="material-symbols-outlined text-[20px]">edit</span>
                                        </button>
                                        <button @click="deleteProvider(provider.id)" class="p-2 text-on-surface-variant hover:text-error hover:bg-error-container/20 rounded-lg transition-colors" title="Eliminar">
                                            <span class="material-symbols-outlined text-[20px]">delete</span>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                        </template>
                        <tr x-show="filteredProviders.length === 0">
                            <td colspan="5" class="px-6 py-12 text-center text-on-surface-variant">
                                <span class="material-symbols-outlined text-[48px] mb-2 opacity-50">search_off</span>
                                <p class="text-body-lg">No se encontraron proveedores.</p>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Modal (Create/Edit) -->
        <div x-show="isModalOpen" style="display: none;" class="fixed inset-0 z-50 flex items-center justify-center bg-black/50 backdrop-blur-sm" x-transition.opacity>
            <div class="bg-surface-container-lowest w-full max-w-md p-6 rounded-2xl shadow-xl m-4 transform transition-all" @click.outside="closeModal()" x-transition:enter="ease-out duration-300" x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95" x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100" x-transition:leave="ease-in duration-200" x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100" x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95">
                
                <div class="flex justify-between items-center mb-6">
                    <h3 class="text-title-lg font-bold text-on-surface" x-text="isEditing ? 'Editar Proveedor' : 'Nuevo Proveedor'"></h3>
                    <button @click="closeModal()" class="text-on-surface-variant hover:text-on-surface transition-colors p-1 rounded-full hover:bg-surface-container-low">
                        <span class="material-symbols-outlined">close</span>
                    </button>
                </div>

                <form @submit.prevent="saveProvider" class="space-y-4">
                    <div>
                        <label class="block text-label-md font-bold text-on-surface mb-1">Nombre de la Empresa *</label>
                        <input type="text" x-model="form.name" required class="w-full px-4 py-2.5 bg-surface-container-low border border-outline-variant/30 rounded-lg text-body-md focus:border-primary focus:ring-1 focus:ring-primary outline-none transition-colors">
                    </div>

                    <div>
                        <label class="block text-label-md font-bold text-on-surface mb-1">Nombre del Contacto</label>
                        <input type="text" x-model="form.contact_name" class="w-full px-4 py-2.5 bg-surface-container-low border border-outline-variant/30 rounded-lg text-body-md focus:border-primary focus:ring-1 focus:ring-primary outline-none transition-colors">
                    </div>

                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <label class="block text-label-md font-bold text-on-surface mb-1">Teléfono</label>
                            <input type="text" x-model="form.phone" class="w-full px-4 py-2.5 bg-surface-container-low border border-outline-variant/30 rounded-lg text-body-md focus:border-primary focus:ring-1 focus:ring-primary outline-none transition-colors">
                        </div>
                        <div>
                            <label class="block text-label-md font-bold text-on-surface mb-1">Email</label>
                            <input type="email" x-model="form.email" class="w-full px-4 py-2.5 bg-surface-container-low border border-outline-variant/30 rounded-lg text-body-md focus:border-primary focus:ring-1 focus:ring-primary outline-none transition-colors">
                        </div>
                    </div>

                    <div>
                        <label class="block text-label-md font-bold text-on-surface mb-1">Dirección</label>
                        <input type="text" x-model="form.address" class="w-full px-4 py-2.5 bg-surface-container-low border border-outline-variant/30 rounded-lg text-body-md focus:border-primary focus:ring-1 focus:ring-primary outline-none transition-colors">
                    </div>

                    <div class="flex items-center gap-2 mt-2">
                        <input type="checkbox" x-model="form.status" id="status" class="w-4 h-4 text-primary bg-surface-container-low border-outline-variant rounded focus:ring-primary">
                        <label for="status" class="text-label-md text-on-surface">Proveedor Activo</label>
                    </div>

                    <div class="pt-4 flex justify-end gap-3 border-t border-outline-variant/20 mt-6">
                        <button type="button" @click="closeModal()" class="px-5 py-2 text-on-surface-variant font-bold hover:bg-surface-container-low rounded-lg transition-colors">
                            Cancelar
                        </button>
                        <button type="submit" class="px-5 py-2 bg-primary text-on-primary font-bold rounded-lg shadow-sm hover:bg-primary/90 transition-colors flex items-center gap-2" :disabled="isLoading">
                            <span class="material-symbols-outlined text-[20px]" x-show="isLoading" class="animate-spin">sync</span>
                            <span x-text="isEditing ? 'Guardar Cambios' : 'Crear Proveedor'"></span>
                        </button>
                    </div>
                </form>
            </div>
        </div>

    </div>

    <script>
        document.addEventListener('alpine:init', () => {
            Alpine.data('providersApp', () => ({
                providers: [],
                searchQuery: '',
                isModalOpen: false,
                isEditing: false,
                isLoading: false,
                form: {
                    id: null,
                    name: '',
                    contact_name: '',
                    email: '',
                    phone: '',
                    address: '',
                    status: true
                },

                init() {
                    this.fetchProviders();
                },

                get filteredProviders() {
                    if (this.searchQuery === '') return this.providers;
                    return this.providers.filter(p => 
                        (p.name && p.name.toLowerCase().includes(this.searchQuery.toLowerCase())) ||
                        (p.contact_name && p.contact_name.toLowerCase().includes(this.searchQuery.toLowerCase()))
                    );
                },

                fetchProviders() {
                    fetch('/api/providers')
                        .then(res => res.json())
                        .then(data => {
                            this.providers = data;
                        });
                },

                openModal() {
                    this.resetForm();
                    this.isModalOpen = true;
                },

                closeModal() {
                    this.isModalOpen = false;
                    this.resetForm();
                },

                resetForm() {
                    this.isEditing = false;
                    this.form = { id: null, name: '', contact_name: '', email: '', phone: '', address: '', status: true };
                },

                editProvider(provider) {
                    this.isEditing = true;
                    // Boolean mapping
                    this.form = { ...provider, status: !!provider.status };
                    this.isModalOpen = true;
                },

                saveProvider() {
                    this.isLoading = true;
                    const url = this.isEditing ? `/api/providers/${this.form.id}` : '/api/providers';
                    const method = this.isEditing ? 'PUT' : 'POST';

                    fetch(url, {
                        method: method,
                        headers: {
                            'Content-Type': 'application/json',
                            'Accept': 'application/json'
                        },
                        body: JSON.stringify(this.form)
                    })
                    .then(res => {
                        if (res.ok) {
                            this.fetchProviders();
                            this.closeModal();
                        } else {
                            alert("Ocurrió un error al guardar.");
                        }
                    })
                    .finally(() => {
                        this.isLoading = false;
                    });
                },

                deleteProvider(id) {
                    if (confirm('¿Estás seguro de eliminar este proveedor?')) {
                        fetch(`/api/providers/${id}`, {
                            method: 'DELETE',
                        }).then(res => {
                            if(res.ok) {
                                this.fetchProviders();
                            }
                        });
                    }
                }
            }));
        });
    </script>
</x-layouts.app>
