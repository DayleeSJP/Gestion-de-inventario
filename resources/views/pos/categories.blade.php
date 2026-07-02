<x-layouts.app active="categories" title="Gestión de Categorías">
    <div class="p-margin-page max-w-7xl mx-auto space-y-gutter" x-data="categoriesApp()">

        <!-- Header & Metrics -->
        <div class="flex flex-col md:flex-row md:items-end justify-between gap-6">
            <div>
                <nav class="flex text-label-sm text-outline mb-2">
                    <span>Inventario</span>
                    <span class="mx-2">/</span>
                    <span class="text-primary font-bold">Gestión de Categorías</span>
                </nav>
                <h2 class="font-headline-xl text-headline-xl text-on-surface">Gestión de Categorías</h2>
                <p class="text-body-md text-on-surface-variant mt-1">Organiza y administra las familias de productos de tu pastelería.</p>
            </div>

            <div class="flex gap-4">
                <!-- Metric: Total -->
                <div class="bg-white p-4 rounded-xl shadow-sm border border-outline-variant/30 flex items-center gap-4 min-w-[180px]">
                    <div class="w-12 h-12 bg-secondary-container rounded-full flex items-center justify-center text-on-secondary-container">
                        <span class="material-symbols-outlined">category</span>
                    </div>
                    <div>
                        <p class="text-label-sm text-on-surface-variant">Total Categorías</p>
                        <p class="text-headline-md font-bold" x-text="categories.length"></p>
                    </div>
                </div>

                <!-- Metric: Activas -->
                <div class="bg-white p-4 rounded-xl shadow-sm border border-outline-variant/30 flex items-center gap-4 min-w-[180px]">
                    <div class="w-12 h-12 bg-primary-fixed-dim rounded-full flex items-center justify-center text-on-primary-fixed-variant">
                        <span class="material-symbols-outlined">check_circle</span>
                    </div>
                    <div>
                        <p class="text-label-sm text-on-surface-variant">Activas</p>
                        <p class="text-headline-md font-bold" x-text="categories.filter(c => c.active).length"></p>
                    </div>
                </div>

                <!-- Botón Nueva Categoría -->
                <button @click="openModal()" class="bg-primary text-on-primary px-6 py-3 rounded-xl font-bold flex items-center gap-2 shadow-lg shadow-primary/20 hover:scale-[1.02] active:scale-[0.98] transition-all self-end">
                    <span class="material-symbols-outlined">add</span>
                    Nueva Categoría
                </button>
            </div>
        </div>

        <!-- Table Card -->
        <div class="bg-white rounded-2xl shadow-sm border border-outline-variant/20 overflow-hidden">
            <div class="px-card-padding py-4 border-b border-outline-variant/30 flex justify-between items-center bg-white/50 backdrop-blur-sm sticky top-0">
                <h3 class="font-headline-md text-headline-md text-on-surface flex items-center gap-2">
                    <span class="material-symbols-outlined text-primary">list_alt</span>
                    Listado de Categorías
                </h3>
            </div>

            <div class="overflow-x-auto">
                <table class="w-full text-left">
                    <thead>
                        <tr class="bg-surface-container/50">
                            <th class="px-card-padding py-4 text-label-md text-on-surface-variant font-bold uppercase tracking-wider">Nombre de Categoría</th>
                            <th class="px-card-padding py-4 text-label-md text-on-surface-variant font-bold uppercase tracking-wider">Descripción</th>
                            <th class="px-card-padding py-4 text-label-md text-on-surface-variant font-bold uppercase tracking-wider">Productos</th>
                            <th class="px-card-padding py-4 text-label-md text-on-surface-variant font-bold uppercase tracking-wider text-center">Estado</th>
                            <th class="px-card-padding py-4 text-label-md text-on-surface-variant font-bold uppercase tracking-wider text-right">Acciones</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-outline-variant/20">
                        <template x-for="(cat, index) in categories" :key="index">
                            <tr class="hover:bg-surface-container-low transition-colors group" :class="!cat.active ? 'opacity-60' : ''">
                                <td class="px-card-padding py-5">
                                    <div class="flex items-center gap-3">
                                        <div class="w-10 h-10 rounded-lg flex items-center justify-center" :style="`background-color: ${cat.color}20; color: ${cat.color}`">
                                            <span class="material-symbols-outlined" x-text="cat.icon"></span>
                                        </div>
                                        <div>
                                            <p class="font-bold text-body-lg" x-text="cat.name"></p>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-card-padding py-5 text-body-md text-outline" x-text="cat.description || '—'"></td>
                                <td class="px-card-padding py-5 text-body-md" x-text="cat.products + ' productos'"></td>
                                <td class="px-card-padding py-5 text-center">
                                    <span x-show="cat.active" class="bg-primary/10 text-primary px-3 py-1 rounded-full text-label-sm font-bold border border-primary/20">Activo</span>
                                    <span x-show="!cat.active" class="bg-outline/10 text-outline px-3 py-1 rounded-full text-label-sm font-bold border border-outline/20">Inactivo</span>
                                </td>
                                <td class="px-card-padding py-5 text-right">
                                    <div class="flex justify-end gap-1">
                                        <!-- Editar -->
                                        <button @click="openModal(index)" class="p-2 text-primary hover:bg-primary/10 rounded-lg transition-colors" title="Editar">
                                            <span class="material-symbols-outlined text-[20px]">edit</span>
                                        </button>
                                        <!-- Activar/Desactivar -->
                                        <button @click="toggleStatus(index)"
                                            :class="cat.active ? 'text-secondary hover:bg-secondary/10' : 'text-primary hover:bg-primary/10'"
                                            :title="cat.active ? 'Desactivar' : 'Activar'"
                                            class="p-2 rounded-lg transition-colors">
                                            <span class="material-symbols-outlined text-[20px]" x-text="cat.active ? 'visibility_off' : 'visibility'"></span>
                                        </button>
                                        <!-- Eliminar -->
                                        <button @click="confirmDelete(index)" class="p-2 text-error hover:bg-error/10 rounded-lg transition-colors" title="Eliminar">
                                            <span class="material-symbols-outlined text-[20px]">delete</span>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                        </template>
                        <!-- Empty state -->
                        <tr x-show="categories.length === 0">
                            <td colspan="5" class="px-card-padding py-16 text-center text-on-surface-variant">
                                <span class="material-symbols-outlined text-[48px] opacity-30 block mb-2">category</span>
                                <p class="font-label-md">No hay categorías registradas.</p>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <!-- Pagination Footer -->
            <div class="px-card-padding py-4 border-t border-outline-variant/30 flex items-center justify-between">
                <p class="text-label-md text-on-surface-variant" x-text="`Mostrando ${categories.length} categoría(s)`"></p>
                <div class="flex gap-2">
                    <button class="w-10 h-10 flex items-center justify-center rounded-lg border border-outline-variant text-outline hover:bg-surface-container transition-colors disabled:opacity-50" disabled>
                        <span class="material-symbols-outlined">chevron_left</span>
                    </button>
                    <button class="w-10 h-10 flex items-center justify-center rounded-lg bg-primary text-on-primary font-bold">1</button>
                </div>
            </div>
        </div>

        <!-- ==================== Modal Nueva / Editar Categoría ==================== -->
        <div x-show="isModalOpen" style="display:none;" class="fixed inset-0 z-50 flex items-center justify-center p-4" x-transition.opacity>
            <div class="absolute inset-0 bg-black/40 backdrop-blur-sm" @click="closeModal()"></div>

            <div class="bg-white rounded-2xl shadow-xl w-full max-w-md flex flex-col relative z-10 overflow-hidden" x-transition.scale.95>
                <!-- Header -->
                <div class="px-6 py-4 border-b border-surface-container flex justify-between items-center bg-surface-container-lowest">
                    <h3 class="text-headline-md font-bold flex items-center gap-2">
                        <span class="material-symbols-outlined text-primary" x-text="isEditing ? 'edit' : 'add_circle'"></span>
                        <span x-text="isEditing ? 'Editar Categoría' : 'Nueva Categoría'"></span>
                    </h3>
                    <button @click="closeModal()" class="p-2 text-outline hover:bg-surface-container rounded-full transition-colors">
                        <span class="material-symbols-outlined">close</span>
                    </button>
                </div>

                <!-- Body -->
                <div class="p-6 space-y-5 bg-background overflow-y-auto">

                    <!-- Vista previa del ícono -->
                    <div class="flex items-center gap-4">
                        <div class="w-16 h-16 rounded-xl flex items-center justify-center text-2xl shadow-sm flex-shrink-0 transition-all" :style="`background-color: ${formData.color}20; color: ${formData.color}`">
                            <span class="material-symbols-outlined text-[32px]" x-text="formData.icon || 'category'"></span>
                        </div>
                        <div>
                            <p class="text-label-md font-semibold mb-1">Vista previa</p>
                            <p class="text-label-sm text-outline" x-text="formData.name || 'Nombre de categoría'"></p>
                        </div>
                    </div>

                    <!-- Nombre -->
                    <div>
                        <label class="block text-label-md font-semibold text-on-surface mb-1">Nombre <span class="text-error">*</span></label>
                        <input type="text" x-model="formData.name" class="w-full rounded-xl border border-outline-variant bg-surface-container-lowest px-4 py-2.5 text-body-md focus:border-primary focus:ring-1 focus:ring-primary outline-none transition-all" placeholder="Ej. Pasteles de Temporada">
                    </div>

                    <!-- Descripción -->
                    <div>
                        <label class="block text-label-md font-semibold text-on-surface mb-1">Descripción</label>
                        <input type="text" x-model="formData.description" class="w-full rounded-xl border border-outline-variant bg-surface-container-lowest px-4 py-2.5 text-body-md focus:border-primary focus:ring-1 focus:ring-primary outline-none transition-all" placeholder="Breve descripción...">
                    </div>

                    <!-- Ícono -->
                    <div>
                        <label class="block text-label-md font-semibold text-on-surface mb-2">Ícono</label>
                        <div class="grid grid-cols-6 gap-2">
                            <template x-for="ic in icons" :key="ic">
                                <button @click="formData.icon = ic" type="button"
                                    :class="formData.icon === ic ? 'ring-2 ring-primary bg-primary/10 text-primary' : 'hover:bg-surface-container text-on-surface-variant'"
                                    class="p-2 rounded-lg flex items-center justify-center transition-all">
                                    <span class="material-symbols-outlined text-[22px]" x-text="ic"></span>
                                </button>
                            </template>
                        </div>
                    </div>

                    <!-- Color -->
                    <div>
                        <label class="block text-label-md font-semibold text-on-surface mb-2">Color</label>
                        <div class="flex gap-2 flex-wrap">
                            <template x-for="col in colors" :key="col">
                                <button @click="formData.color = col" type="button"
                                    :style="`background-color: ${col}`"
                                    :class="formData.color === col ? 'ring-2 ring-offset-2 ring-primary scale-110' : 'opacity-70'"
                                    class="w-8 h-8 rounded-full transition-all shadow-sm"></button>
                            </template>
                        </div>
                    </div>

                    <!-- Estado -->
                    <div class="flex items-center gap-3 pt-1">
                        <label class="text-label-md font-semibold text-on-surface">Estado:</label>
                        <label class="flex items-center gap-2 cursor-pointer">
                            <input type="radio" x-model="formData.active" :value="true" class="accent-primary w-4 h-4">
                            <span class="text-body-md text-primary font-semibold">Activo</span>
                        </label>
                        <label class="flex items-center gap-2 cursor-pointer">
                            <input type="radio" x-model="formData.active" :value="false" class="accent-primary w-4 h-4">
                            <span class="text-body-md text-outline">Inactivo</span>
                        </label>
                    </div>

                    <!-- Error -->
                    <p x-show="formError" x-text="formError" class="text-error text-label-md bg-error-container/30 px-4 py-2 rounded-lg"></p>
                </div>

                <!-- Footer -->
                <div class="px-6 py-4 border-t border-surface-container bg-surface-container-low flex justify-end gap-3">
                    <button @click="closeModal()" class="px-5 py-2.5 text-on-surface font-semibold hover:bg-surface-container rounded-lg transition-colors">Cancelar</button>
                    <button @click="saveCategory()" class="px-5 py-2.5 bg-primary text-on-primary font-bold rounded-lg hover:opacity-90 transition-opacity shadow-sm flex items-center gap-2">
                        <span class="material-symbols-outlined text-[20px]">save</span>
                        Guardar
                    </button>
                </div>
            </div>
        </div>

        <!-- ==================== Modal Eliminar ==================== -->
        <div x-show="isDeleteOpen" style="display:none;" class="fixed inset-0 z-50 flex items-center justify-center p-4" x-transition.opacity>
            <div class="absolute inset-0 bg-black/40 backdrop-blur-sm" @click="isDeleteOpen = false"></div>
            <div class="bg-white rounded-2xl shadow-xl w-full max-w-sm p-6 text-center relative z-10" x-transition.scale.95>
                <div class="w-16 h-16 rounded-full bg-error-container flex items-center justify-center mx-auto mb-4">
                    <span class="material-symbols-outlined text-on-error-container text-[32px]">delete_forever</span>
                </div>
                <h3 class="text-headline-md font-bold mb-2">¿Eliminar categoría?</h3>
                <p class="text-body-md text-outline mb-1">Estás a punto de eliminar <strong class="text-on-surface" x-text="deleteIndex !== null ? categories[deleteIndex]?.name : ''"></strong>.</p>
                <p class="text-body-md text-outline mb-6">Esta acción no se puede deshacer.</p>
                <div class="flex gap-3">
                    <button @click="isDeleteOpen = false" class="flex-1 px-5 py-2.5 text-on-surface font-semibold hover:bg-surface-container rounded-lg transition-colors">Cancelar</button>
                    <button @click="deleteCategory()" class="flex-1 px-5 py-2.5 bg-error text-on-error font-bold rounded-lg hover:opacity-90 transition-opacity shadow-sm">Eliminar</button>
                </div>
            </div>
        </div>

    </div>

    <script>
        document.addEventListener('alpine:init', () => {
            Alpine.data('categoriesApp', () => ({
                categories: [],
                init() {
                    this.fetchCategories();
                },
                async fetchCategories() {
                    try {
                        const res = await fetch('/api/categories');
                        this.categories = await res.json();
                    } catch (error) {
                        console.error('Error fetching categories:', error);
                    }
                },

                icons: ['cake', 'bakery_dining', 'cookie', 'coffee', 'local_cafe', 'icecream', 'restaurant', 'fastfood', 'set_meal', 'lunch_dining', 'dinner_dining', 'egg'],
                colors: ['#03645c', '#954912', '#5c5951', '#116a61', '#ba1a1a', '#2d7d74', '#006874', '#7B6FA0', '#6D4C41', '#1565C0'],

                isModalOpen: false,
                isDeleteOpen: false,
                isEditing: false,
                editIndex: null,
                deleteIndex: null,
                formError: '',

                formData: {
                    name: '',
                    description: '',
                    icon: 'category',
                    color: '#03645c',
                    active: true,
                    products: 0
                },

                openModal(index = null) {
                    this.isEditing = index !== null;
                    this.editIndex = index;
                    this.formError = '';

                    if (this.isEditing) {
                        const c = this.categories[index];
                        this.formData = {
                            name: c.name,
                            description: c.description,
                            icon: c.icon,
                            color: c.color,
                            active: c.active,
                            products: c.products
                        };
                    } else {
                        this.formData = { name: '', description: '', icon: 'cake', color: '#03645c', active: true, products: 0 };
                    }

                    this.isModalOpen = true;
                },

                closeModal() {
                    this.isModalOpen = false;
                    this.formError = '';
                },

                async saveCategory() {
                    this.formError = '';
                    if (!this.formData.name.trim()) { this.formError = 'El nombre es obligatorio.'; return; }

                    const data = {
                        name: this.formData.name,
                        description: this.formData.description,
                        icon: this.formData.icon,
                        color: this.formData.color,
                        active: this.formData.active
                    };

                    const isNew = !this.isEditing;
                    const url = isNew ? '/api/categories' : `/api/categories/${this.categories[this.editIndex].id}`;

                    try {
                        const res = await fetch(url, {
                            method: isNew ? 'POST' : 'PUT',
                            headers: { 'Content-Type': 'application/json' },
                            body: JSON.stringify(data)
                        });
                        if (res.ok) {
                            await this.fetchCategories();
                            this.closeModal();
                        }
                    } catch(error) {
                        console.error('Error saving:', error);
                    }
                },

                async toggleStatus(index) {
                    const cat = this.categories[index];
                    cat.active = !cat.active;
                    try {
                        await fetch(`/api/categories/${cat.id}`, {
                            method: 'PUT',
                            headers: { 'Content-Type': 'application/json' },
                            body: JSON.stringify(cat)
                        });
                    } catch(error) {
                        console.error('Error toggling status:', error);
                    }
                },

                confirmDelete(index) {
                    this.deleteIndex = index;
                    this.isDeleteOpen = true;
                },

                async deleteCategory() {
                    if (this.deleteIndex !== null) {
                        const id = this.categories[this.deleteIndex].id;
                        try {
                            await fetch(`/api/categories/${id}`, { method: 'DELETE' });
                            await this.fetchCategories();
                        } catch (error) {
                            console.error('Error deleting:', error);
                        }
                    }
                    this.isDeleteOpen = false;
                    this.deleteIndex = null;
                }
            }));
        });
    </script>
</x-layouts.app>
