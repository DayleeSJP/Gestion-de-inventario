<div class="w-[320px] bg-white border-l border-gray-100 flex flex-col h-screen fixed right-0 top-0 shadow-[-4px_0_15px_rgba(0,0,0,0.02)] z-10">
    <!-- Encabezado de Venta -->
    <div class="p-5 border-b border-gray-100 flex justify-between items-center bg-gray-50/50">
        <h2 class="font-semibold text-primary-dark">Orden #00124</h2>
        <button class="text-gray-400 hover:text-danger transition-colors p-1">
            <span class="material-symbols-outlined text-xl">delete</span>
        </button>
    </div>

    <!-- Lista de Productos en Carrito (Mockeado) -->
    <div class="flex-1 overflow-y-auto p-4 space-y-4">
        <!-- Item 1 -->
        <div class="flex justify-between items-start">
            <div class="flex gap-3">
                <div class="w-10 h-10 bg-background rounded flex items-center justify-center text-xl">🍰</div>
                <div>
                    <p class="text-sm font-medium text-primary-dark leading-tight">Pastel de Chocolate</p>
                    <p class="text-xs text-gray-400 mt-0.5">$25.00/u</p>
                </div>
            </div>
            <div class="text-right">
                <p class="text-sm font-semibold text-primary-dark">$50.00</p>
                <div class="flex items-center gap-2 mt-1 bg-gray-50 rounded-full px-2 py-0.5 border border-gray-100">
                    <button class="text-gray-500 hover:text-primary"><span class="material-symbols-outlined text-sm font-bold">remove</span></button>
                    <span class="text-xs font-medium w-3 text-center">2</span>
                    <button class="text-gray-500 hover:text-primary"><span class="material-symbols-outlined text-sm font-bold">add</span></button>
                </div>
            </div>
        </div>

        <!-- Item 2 -->
        <div class="flex justify-between items-start">
            <div class="flex gap-3">
                <div class="w-10 h-10 bg-background rounded flex items-center justify-center text-xl">🧁</div>
                <div>
                    <p class="text-sm font-medium text-primary-dark leading-tight">Cupcake Fresa</p>
                    <p class="text-xs text-gray-400 mt-0.5">$3.50/u</p>
                </div>
            </div>
            <div class="text-right">
                <p class="text-sm font-semibold text-primary-dark">$10.50</p>
                <div class="flex items-center gap-2 mt-1 bg-gray-50 rounded-full px-2 py-0.5 border border-gray-100">
                    <button class="text-gray-500 hover:text-primary"><span class="material-symbols-outlined text-sm font-bold">remove</span></button>
                    <span class="text-xs font-medium w-3 text-center">3</span>
                    <button class="text-gray-500 hover:text-primary"><span class="material-symbols-outlined text-sm font-bold">add</span></button>
                </div>
            </div>
        </div>
    </div>

    <!-- Resumen Total -->
    <div class="p-5 border-t border-gray-100 bg-white">
        <div class="space-y-2 mb-4">
            <div class="flex justify-between text-sm text-gray-500">
                <span>Subtotal</span>
                <span>$60.50</span>
            </div>
            <div class="flex justify-between text-sm text-gray-500">
                <span>Impuestos (12%)</span>
                <span>$7.26</span>
            </div>
            <div class="flex justify-between text-lg font-bold text-primary-dark mt-2 pt-2 border-t border-gray-50">
                <span>Total</span>
                <span>$67.76</span>
            </div>
        </div>

        <!-- Botón Pagar -->
        <button class="w-full bg-success hover:bg-[#3d7048] text-white py-3.5 rounded-xl font-semibold flex justify-center items-center gap-2 shadow-sm transition-all transform active:scale-[0.98]">
            <span class="material-symbols-outlined">payments</span>
            Cobrar $67.76
        </button>
    </div>
</div>
