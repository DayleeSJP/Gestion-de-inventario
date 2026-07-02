<div class="mb-6">
    <div class="relative">
        <span class="material-symbols-outlined absolute left-4 top-1/2 -translate-y-1/2 text-gray-400">
            search
        </span>
        <input type="text" placeholder="Buscar productos por nombre o código..." 
            class="w-full pl-12 pr-4 py-3 rounded-xl border-none shadow-sm focus:ring-2 focus:ring-primary outline-none text-primary-dark bg-white">
        
        <div class="absolute right-3 top-1/2 -translate-y-1/2 flex gap-2">
            <button class="p-1.5 bg-gray-100 rounded-md hover:bg-gray-200 text-gray-600 transition-colors">
                <span class="material-symbols-outlined text-sm">barcode_scanner</span>
            </button>
        </div>
    </div>

    <!-- Categorías -->
    <div class="flex gap-3 mt-4 overflow-x-auto pb-2 scrollbar-hide">
        <button class="px-4 py-1.5 bg-primary text-white rounded-full text-sm font-medium whitespace-nowrap shadow-sm">
            Todos
        </button>
        <button class="px-4 py-1.5 bg-white text-gray-600 hover:bg-gray-50 rounded-full text-sm font-medium whitespace-nowrap shadow-sm border border-gray-100 transition-colors">
            Pasteles
        </button>
        <button class="px-4 py-1.5 bg-white text-gray-600 hover:bg-gray-50 rounded-full text-sm font-medium whitespace-nowrap shadow-sm border border-gray-100 transition-colors">
            Cupcakes
        </button>
        <button class="px-4 py-1.5 bg-white text-gray-600 hover:bg-gray-50 rounded-full text-sm font-medium whitespace-nowrap shadow-sm border border-gray-100 transition-colors">
            Galletas
        </button>
        <button class="px-4 py-1.5 bg-white text-gray-600 hover:bg-gray-50 rounded-full text-sm font-medium whitespace-nowrap shadow-sm border border-gray-100 transition-colors">
            Bebidas
        </button>
    </div>
</div>

<!-- Grid de Productos (Mockeado) -->
<div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
    <!-- Producto 1 -->
    <div class="bg-white p-3 rounded-xl shadow-sm hover:shadow-md cursor-pointer transition-all border border-transparent hover:border-accent">
        <div class="aspect-square bg-background rounded-lg mb-3 flex items-center justify-center text-4xl">
            🍰
        </div>
        <h3 class="font-medium text-primary-dark text-sm leading-tight mb-1">Pastel de Chocolate</h3>
        <p class="text-primary font-semibold">$25.00</p>
    </div>
    
    <!-- Producto 2 -->
    <div class="bg-white p-3 rounded-xl shadow-sm hover:shadow-md cursor-pointer transition-all border border-transparent hover:border-accent">
        <div class="aspect-square bg-background rounded-lg mb-3 flex items-center justify-center text-4xl">
            🧁
        </div>
        <h3 class="font-medium text-primary-dark text-sm leading-tight mb-1">Cupcake Fresa</h3>
        <p class="text-primary font-semibold">$3.50</p>
    </div>

    <!-- Producto 3 -->
    <div class="bg-white p-3 rounded-xl shadow-sm hover:shadow-md cursor-pointer transition-all border border-transparent hover:border-accent">
        <div class="aspect-square bg-background rounded-lg mb-3 flex items-center justify-center text-4xl">
            🍪
        </div>
        <h3 class="font-medium text-primary-dark text-sm leading-tight mb-1">Galleta Chispas</h3>
        <p class="text-primary font-semibold">$1.50</p>
    </div>

    <!-- Producto 4 -->
    <div class="bg-white p-3 rounded-xl shadow-sm hover:shadow-md cursor-pointer transition-all border border-transparent hover:border-accent">
        <div class="aspect-square bg-background rounded-lg mb-3 flex items-center justify-center text-4xl">
            🎂
        </div>
        <h3 class="font-medium text-primary-dark text-sm leading-tight mb-1">Tarta de Queso</h3>
        <p class="text-primary font-semibold">$30.00</p>
    </div>
</div>
