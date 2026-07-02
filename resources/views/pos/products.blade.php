<x-layouts.app active="products" title="Gestión de Productos">
    <div class="flex flex-col min-h-screen" x-data="productsApp()">
        <!-- Header -->
        <div class="px-margin-page pt-margin-page flex justify-between items-end">
            <div>
                <nav class="flex text-label-sm text-outline mb-2">
                    <span>Inventario</span>
                    <span class="mx-2">/</span>
                    <span class="text-primary font-bold">Gestión de Productos</span>
                </nav>
                <h2 class="font-headline-xl text-headline-xl text-on-surface">Catálogo de Productos</h2>
                <p class="text-body-md text-on-surface-variant mt-1">Administra tu inventario, precios y disponibilidad.</p>
            </div>
            <button @click="openModal()" class="flex items-center gap-2 bg-primary text-on-primary px-6 py-3 rounded-xl font-bold hover:opacity-90 active:scale-95 transition-all shadow-lg shadow-primary/20">
                <span class="material-symbols-outlined">add</span>
                Nuevo Producto
            </button>
        </div>
        
        <!-- Filters & Search Toolbar -->
        <div class="px-margin-page py-6 mt-6 bg-surface-container-lowest border-y border-outline-variant/30 flex flex-wrap items-center gap-6">
            <div class="relative flex-1 min-w-[300px]">
                <span class="absolute left-4 top-1/2 -translate-y-1/2 material-symbols-outlined text-outline">search</span>
                <input x-model="searchQuery" class="w-full pl-12 pr-4 py-3 rounded-xl border border-outline-variant bg-white focus:border-primary focus:ring-1 focus:ring-primary outline-none text-body-md transition-all shadow-sm" placeholder="Buscar por nombre o categoría..." type="text">
            </div>
            <div class="flex items-center gap-4">
                <div class="flex flex-col gap-1">
                    <label class="text-label-sm font-semibold text-on-surface-variant ml-1">Categoría</label>
                    <select x-model="filterCategory" class="bg-white border border-outline-variant rounded-xl px-4 py-2.5 text-body-md min-w-[160px] focus:border-primary outline-none shadow-sm cursor-pointer">
                        <option value="">Todas</option>
                        <option value="Panadería">Panadería</option>
                        <option value="Pastelería">Pastelería</option>
                        <option value="Cafetería">Cafetería</option>
                    </select>
                </div>
                <div class="flex flex-col gap-1">
                    <label class="text-label-sm font-semibold text-on-surface-variant ml-1">Stock</label>
                    <select x-model="filterStock" class="bg-white border border-outline-variant rounded-xl px-4 py-2.5 text-body-md min-w-[160px] focus:border-primary outline-none shadow-sm cursor-pointer">
                        <option value="">Todos</option>
                        <option value="in_stock">En Stock</option>
                        <option value="low_stock">Stock Bajo</option>
                        <option value="out_stock">Agotado</option>
                    </select>
                </div>
            </div>
        </div>
        
        <!-- Product Grid -->
        <div class="px-margin-page py-margin-page flex-1">
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
                <template x-for="(prod, index) in filteredProducts" :key="prod.id">
                    <div class="bg-white rounded-2xl shadow-sm border border-outline-variant/30 overflow-hidden hover:shadow-md hover:border-primary/30 transition-all group flex flex-col h-full"
                         :class="!prod.active ? 'opacity-60 grayscale-[50%]' : ''">
                        
                        <!-- Image Container -->
                        <div class="relative h-48 overflow-hidden bg-surface-container flex-shrink-0">
                            <!-- Overlay Agotado -->
                            <div x-show="prod.stock === 0" class="absolute inset-0 bg-black/40 z-10 flex items-center justify-center backdrop-blur-[2px]">
                                <span class="text-white font-bold tracking-widest border-2 border-white px-4 py-1 bg-black/20 rounded">AGOTADO</span>
                            </div>
                            
                            <!-- Overlay Inactivo -->
                            <div x-show="!prod.active" class="absolute inset-0 bg-black/10 z-10 flex items-center justify-center backdrop-blur-[1px]">
                                <span class="text-white font-bold bg-black/60 px-3 py-1 rounded-full text-label-sm">OCULTO</span>
                            </div>

                            <img :src="prod.image" :alt="prod.name" class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110">
                            
                            <!-- Actions Hover -->
                            <div class="absolute top-3 right-3 flex flex-col gap-2 opacity-0 group-hover:opacity-100 transition-opacity z-20">
                                <button @click="openModal(prod.originalIndex)" class="p-2.5 bg-white/95 backdrop-blur-sm rounded-full text-primary hover:bg-primary hover:text-white shadow-lg transition-all" title="Editar">
                                    <span class="material-symbols-outlined text-[18px]">edit</span>
                                </button>
                                <button @click="toggleStatus(prod.originalIndex)" class="p-2.5 bg-white/95 backdrop-blur-sm rounded-full shadow-lg transition-all" :class="prod.active ? 'text-secondary hover:bg-secondary hover:text-white' : 'text-primary hover:bg-primary hover:text-white'" :title="prod.active ? 'Ocultar' : 'Mostrar'">
                                    <span class="material-symbols-outlined text-[18px]" x-text="prod.active ? 'visibility_off' : 'visibility'"></span>
                                </button>
                                <button @click="confirmDelete(prod.originalIndex)" class="p-2.5 bg-white/95 backdrop-blur-sm rounded-full text-error hover:bg-error hover:text-white shadow-lg transition-all" title="Eliminar">
                                    <span class="material-symbols-outlined text-[18px]">delete</span>
                                </button>
                            </div>
                        </div>

                        <!-- Content -->
                        <div class="p-5 flex flex-col flex-1">
                            <div class="flex justify-between items-start mb-3">
                                <span class="px-2.5 py-1 bg-surface-container-high text-on-surface rounded-md text-label-sm font-semibold" x-text="prod.category"></span>
                                <span class="text-primary font-bold text-title-lg" x-text="`S/ ${prod.price.toFixed(2)}`"></span>
                            </div>
                            <h3 class="font-bold text-title-md text-on-surface mb-auto line-clamp-2" x-text="prod.name"></h3>
                            
                            <!-- Stock Footer -->
                            <div class="flex items-center justify-between mt-4 pt-4 border-t border-outline-variant/30">
                                <div class="flex items-center gap-2" :class="getStockColorText(prod.stock)">
                                    <span class="material-symbols-outlined text-[20px]" x-text="getStockIcon(prod.stock)"></span>
                                    <span class="font-semibold text-body-md" x-text="`${prod.stock} unids`"></span>
                                </div>
                                <span :class="getStockBadgeClass(prod.stock)" class="px-3 py-1 rounded-full text-label-sm font-bold" x-text="getStockLabel(prod.stock)"></span>
                            </div>
                        </div>
                    </div>
                </template>

                <!-- Empty State -->
                <div x-show="filteredProducts.length === 0" class="col-span-full py-20 flex flex-col items-center justify-center text-center">
                    <div class="w-20 h-20 bg-surface-container-high rounded-full flex items-center justify-center mb-4">
                        <span class="material-symbols-outlined text-4xl text-outline">search_off</span>
                    </div>
                    <h3 class="text-title-lg font-bold text-on-surface mb-2">No se encontraron productos</h3>
                    <p class="text-body-md text-on-surface-variant max-w-md">Intenta cambiar los filtros de búsqueda o agrega un nuevo producto al catálogo.</p>
                </div>
            </div>
        </div>
        
        <!-- ==================== Modal Nuevo / Editar Producto ==================== -->
        <div x-show="isModalOpen" style="display:none;" class="fixed inset-0 z-50 flex items-center justify-center p-4" x-transition.opacity>
            <div class="absolute inset-0 bg-black/40 backdrop-blur-sm" @click="closeModal()"></div>

            <div class="bg-white rounded-2xl shadow-xl w-full max-w-lg flex flex-col relative z-10 overflow-hidden max-h-[90vh]" x-transition.scale.95>
                <!-- Header -->
                <div class="px-6 py-4 border-b border-surface-container flex justify-between items-center bg-surface-container-lowest">
                    <h3 class="text-title-lg font-bold flex items-center gap-2">
                        <span class="material-symbols-outlined text-primary" x-text="isEditing ? 'edit' : 'add_circle'"></span>
                        <span x-text="isEditing ? 'Editar Producto' : 'Nuevo Producto'"></span>
                    </h3>
                    <button @click="closeModal()" class="p-2 text-outline hover:bg-surface-container rounded-full transition-colors">
                        <span class="material-symbols-outlined">close</span>
                    </button>
                </div>

                <!-- Body -->
                <div class="p-6 space-y-5 bg-background overflow-y-auto">
                    <!-- Preview Imagen -->
                    <div class="flex flex-col items-center justify-center mb-2">
                        <div class="relative w-32 h-32 rounded-xl overflow-hidden bg-surface-container border border-outline-variant/30 flex items-center justify-center group mb-3">
                            <img x-show="formData.image" :src="formData.image" class="w-full h-full object-cover">
                            <span x-show="!formData.image" class="material-symbols-outlined text-4xl text-outline">image</span>
                            <div class="absolute inset-0 bg-black/50 opacity-0 group-hover:opacity-100 transition-opacity flex flex-col items-center justify-center gap-2">
                                <button @click="$refs.fileInput.click()" type="button" class="bg-white/90 text-primary p-2 rounded-full hover:bg-white transition-colors" title="Subir imagen">
                                    <span class="material-symbols-outlined text-[20px]">upload</span>
                                </button>
                            </div>
                        </div>
                        <input x-ref="fileInput" type="file" accept="image/*" class="hidden" @change="handleImageUpload">
                        <input type="text" x-model="formData.image" class="w-full text-center text-label-sm bg-transparent border-b border-outline-variant focus:border-primary outline-none px-2 py-1" placeholder="O pega la URL de la imagen aquí...">
                    </div>

                    <div class="grid grid-cols-2 gap-4">
                        <!-- Nombre -->
                        <div class="col-span-2">
                            <label class="block text-label-md font-semibold text-on-surface mb-1">Nombre del Producto <span class="text-error">*</span></label>
                            <input type="text" x-model="formData.name" class="w-full rounded-xl border border-outline-variant bg-surface-container-lowest px-4 py-2.5 text-body-md focus:border-primary focus:ring-1 outline-none transition-all" placeholder="Ej. Tarta de Fresas">
                        </div>

                        <!-- Categoría -->
                        <div>
                            <label class="block text-label-md font-semibold text-on-surface mb-1">Categoría</label>
                            <select x-model="formData.category" class="w-full rounded-xl border border-outline-variant bg-surface-container-lowest px-4 py-2.5 text-body-md focus:border-primary focus:ring-1 outline-none transition-all cursor-pointer">
                                <option value="Panadería">Panadería</option>
                                <option value="Pastelería">Pastelería</option>
                                <option value="Cafetería">Cafetería</option>
                            </select>
                        </div>

                        <!-- Precio -->
                        <div>
                            <label class="block text-label-md font-semibold text-on-surface mb-1">Precio (S/) <span class="text-error">*</span></label>
                            <input type="number" step="0.10" min="0" x-model.number="formData.price" class="w-full rounded-xl border border-outline-variant bg-surface-container-lowest px-4 py-2.5 text-body-md focus:border-primary focus:ring-1 outline-none transition-all" placeholder="0.00">
                        </div>

                        <!-- Stock -->
                        <div>
                            <label class="block text-label-md font-semibold text-on-surface mb-1">Stock Actual <span class="text-error">*</span></label>
                            <input type="number" min="0" x-model.number="formData.stock" class="w-full rounded-xl border border-outline-variant bg-surface-container-lowest px-4 py-2.5 text-body-md focus:border-primary focus:ring-1 outline-none transition-all" placeholder="0">
                        </div>

                        <!-- Estado visualización -->
                        <div class="flex flex-col justify-end pb-2">
                            <label class="flex items-center gap-3 cursor-pointer">
                                <input type="checkbox" x-model="formData.active" class="w-5 h-5 accent-primary rounded">
                                <span class="text-body-md font-semibold text-on-surface">Visible en catálogo</span>
                            </label>
                        </div>
                    </div>

                    <!-- Error -->
                    <p x-show="formError" x-text="formError" class="text-error text-label-md bg-error-container/30 px-4 py-2 rounded-lg text-center font-semibold"></p>
                </div>

                <!-- Footer -->
                <div class="px-6 py-4 border-t border-surface-container bg-surface-container-low flex justify-end gap-3">
                    <button @click="closeModal()" class="px-5 py-2.5 text-on-surface font-semibold hover:bg-surface-container rounded-lg transition-colors">Cancelar</button>
                    <button @click="saveProduct()" class="px-5 py-2.5 bg-primary text-on-primary font-bold rounded-xl hover:opacity-90 transition-opacity shadow-sm flex items-center gap-2">
                        <span class="material-symbols-outlined text-[20px]">save</span>
                        Guardar Producto
                    </button>
                </div>
            </div>
        </div>

        <!-- ==================== Modal Eliminar ==================== -->
        <div x-show="isDeleteOpen" style="display:none;" class="fixed inset-0 z-50 flex items-center justify-center p-4" x-transition.opacity>
            <div class="absolute inset-0 bg-black/40 backdrop-blur-sm" @click="isDeleteOpen = false"></div>
            <div class="bg-white rounded-2xl shadow-xl w-full max-w-sm p-6 text-center relative z-10" x-transition.scale.95>
                <div class="w-16 h-16 rounded-full bg-error-container/50 flex items-center justify-center mx-auto mb-4">
                    <span class="material-symbols-outlined text-error text-[32px]">delete_forever</span>
                </div>
                <h3 class="text-title-lg font-bold mb-2 text-on-surface">¿Eliminar producto?</h3>
                <p class="text-body-md text-outline mb-1">Se eliminará <strong class="text-on-surface" x-text="deleteIndex !== null ? products[deleteIndex]?.name : ''"></strong>.</p>
                <p class="text-body-md text-outline mb-6">Esta acción es permanente.</p>
                <div class="flex gap-3">
                    <button @click="isDeleteOpen = false" class="flex-1 px-5 py-2.5 text-on-surface font-semibold bg-surface-container-high hover:bg-surface-container-highest rounded-xl transition-colors">Cancelar</button>
                    <button @click="deleteProduct()" class="flex-1 px-5 py-2.5 bg-error text-white font-bold rounded-xl hover:bg-error/90 transition-colors shadow-sm">Eliminar</button>
                </div>
            </div>
        </div>

    </div>

    <script>
        document.addEventListener('alpine:init', () => {
            Alpine.data('productsApp', () => ({
                // Datos iniciales con las imágenes originales
                products: [],
                init() {
                    this.fetchProducts();
                },
                async fetchProducts() {
                    try {
                        const res = await fetch('/api/products');
                        this.products = await res.json();
                    } catch (error) {
                        console.error('Error fetching products:', error);
                    }
                },

                // Buscador y filtros
                searchQuery: '',
                filterCategory: '',
                filterStock: '',

                // Modales
                isModalOpen: false,
                isDeleteOpen: false,
                isEditing: false,
                editIndex: null,
                deleteIndex: null,
                formError: '',

                formData: {
                    name: '',
                    category: 'Panadería',
                    price: 0,
                    stock: 0,
                    active: true,
                    image: ''
                },

                // Propiedad computada para filtrar
                get filteredProducts() {
                    return this.products
                        .map((prod, index) => ({ ...prod, originalIndex: index })) // Guardamos el index original para editar/borrar
                        .filter(prod => {
                            // Filtro texto
                            const matchSearch = prod.name.toLowerCase().includes(this.searchQuery.toLowerCase()) || 
                                                prod.category.toLowerCase().includes(this.searchQuery.toLowerCase());
                            // Filtro categoría
                            const matchCat = this.filterCategory === '' || prod.category === this.filterCategory;
                            // Filtro stock
                            let matchStock = true;
                            if (this.filterStock === 'in_stock') matchStock = prod.stock > 10;
                            if (this.filterStock === 'low_stock') matchStock = prod.stock > 0 && prod.stock <= 10;
                            if (this.filterStock === 'out_stock') matchStock = prod.stock === 0;

                            return matchSearch && matchCat && matchStock;
                        });
                },

                // UI Helpers para Stock
                getStockLabel(stock) {
                    if (stock === 0) return 'Agotado';
                    if (stock <= 10) return 'Stock Bajo';
                    return 'En Stock';
                },
                getStockBadgeClass(stock) {
                    if (stock === 0) return 'bg-error-container/50 text-on-error-container';
                    if (stock <= 10) return 'bg-secondary-container/50 text-on-secondary-container';
                    return 'bg-primary/10 text-primary';
                },
                getStockIcon(stock) {
                    if (stock === 0) return 'error';
                    if (stock <= 10) return 'warning';
                    return 'inventory';
                },
                getStockColorText(stock) {
                    if (stock === 0) return 'text-error';
                    if (stock <= 10) return 'text-secondary';
                    return 'text-primary';
                },

                // Helper para subir imagen
                handleImageUpload(event) {
                    const file = event.target.files[0];
                    if (!file) return;
                    
                    const reader = new FileReader();
                    reader.onload = (e) => {
                        this.formData.image = e.target.result;
                    };
                    reader.readAsDataURL(file);
                },

                // Lógica Modales CRUD
                openModal(index = null) {
                    this.isEditing = index !== null;
                    this.editIndex = index;
                    this.formError = '';

                    if (this.isEditing) {
                        const p = this.products[index];
                        this.formData = { ...p };
                    } else {
                        this.formData = { 
                            name: '', 
                            category: 'Panadería', 
                            price: 0, 
                            stock: 0, 
                            active: true, 
                            image: 'https://images.unsplash.com/photo-1509365465985-25d11c17e812?q=80&w=600&auto=format&fit=crop' 
                        };
                    }
                    this.isModalOpen = true;
                },

                closeModal() {
                    this.isModalOpen = false;
                    this.formError = '';
                },

                async saveProduct() {
                    this.formError = '';
                    if (!this.formData.name.trim()) { this.formError = 'El nombre es obligatorio.'; return; }
                    if (this.formData.price <= 0) { this.formError = 'El precio debe ser mayor a 0.'; return; }
                    if (this.formData.stock < 0) { this.formError = 'El stock no puede ser negativo.'; return; }

                    const isNew = !this.isEditing;
                    const url = isNew ? '/api/products' : `/api/products/${this.products[this.editIndex].id}`;

                    try {
                        const res = await fetch(url, {
                            method: isNew ? 'POST' : 'PUT',
                            headers: { 'Content-Type': 'application/json' },
                            body: JSON.stringify(this.formData)
                        });
                        if (res.ok) {
                            await this.fetchProducts();
                            this.closeModal();
                        }
                    } catch(error) {
                        console.error('Error saving:', error);
                    }
                },

                async toggleStatus(index) {
                    const prod = this.products[index];
                    prod.active = !prod.active;
                    try {
                        await fetch(`/api/products/${prod.id}`, {
                            method: 'PUT',
                            headers: { 'Content-Type': 'application/json' },
                            body: JSON.stringify(prod)
                        });
                    } catch(error) {
                        console.error('Error toggling status:', error);
                    }
                },

                confirmDelete(index) {
                    this.deleteIndex = index;
                    this.isDeleteOpen = true;
                },

                async deleteProduct() {
                    if (this.deleteIndex !== null) {
                        const id = this.products[this.deleteIndex].id;
                        try {
                            await fetch(`/api/products/${id}`, { method: 'DELETE' });
                            await this.fetchProducts();
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
