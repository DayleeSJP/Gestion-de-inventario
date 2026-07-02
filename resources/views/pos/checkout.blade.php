<x-layouts.app active="pos" title="Punto de Venta">
    <!-- View Content -->
    <div class="p-gutter flex flex-col gap-4 min-h-full">
        <!-- Acciones de la vista -->
        <div class="flex justify-between items-center bg-surface-container-low p-4 rounded-xl border border-outline-variant relative">
            <div class="relative w-full max-w-md">
                <span class="material-symbols-outlined absolute left-3 top-1/2 -translate-y-1/2 text-on-surface-variant">search</span>
                <input id="product-search" class="w-full bg-surface border border-outline-variant rounded-lg pl-10 pr-4 py-2 focus:ring-2 focus:ring-primary focus:border-primary outline-none text-body-md transition-all" placeholder="Buscar producto (nombre o código)..." type="text" autocomplete="off">
                
                <!-- Search Results Dropdown -->
                <div id="search-results" class="absolute top-full left-0 right-0 mt-2 bg-surface rounded-lg shadow-lg border border-outline-variant max-h-60 overflow-y-auto hidden z-50">
                    <!-- Injected by JS -->
                </div>
            </div>
            <button onclick="clearCart()" class="bg-surface-container-highest text-on-surface px-4 py-2 rounded-lg font-bold flex items-center gap-2 hover:bg-outline-variant/30 transition-all active:scale-95">
                <span class="material-symbols-outlined">restart_alt</span>
                Nueva Venta
            </button>
        </div>
        
        <div class="flex-1 grid grid-cols-12 gap-gutter">
            <!-- Left Column: Products and Cart -->
            <div class="col-span-8 flex flex-col gap-gutter">
                <!-- Productos Frecuentes Bento Card -->
                <section class="bg-surface-container-lowest rounded-xl p-card-padding shadow-soft">
                    <div class="flex items-center justify-between mb-4">
                        <div class="flex items-center gap-2">
                            <span class="material-symbols-outlined text-secondary filled-icon">star</span>
                            <h2 class="text-headline-md font-headline-md text-on-surface">Productos Frecuentes</h2>
                        </div>
                        <button class="text-primary text-label-md hover:underline">Ver todos</button>
                    </div>
                    <div class="flex flex-wrap gap-3">
                        @foreach($frequentProducts as $product)
                        <button onclick="addFromFrequent({{ $product->id }})" class="flex items-center gap-2 px-4 py-2 bg-surface-container rounded-full border border-outline-variant hover:border-primary hover:bg-primary-fixed transition-all group">
                            <span class="text-body-md font-medium text-on-surface group-hover:text-primary">{{ $product->name }}</span>
                            <span class="material-symbols-outlined text-body-md text-on-surface-variant group-hover:text-primary">add</span>
                        </button>
                        @endforeach
                    </div>
                </section>
                
                <!-- Carrito Bento Card -->
                <section class="bg-surface-container-lowest rounded-xl p-card-padding shadow-soft flex-1 flex flex-col min-h-[400px]">
                    <div class="flex items-center justify-between mb-6">
                        <div class="flex items-center gap-2">
                            <div class="w-10 h-10 bg-primary-container rounded-full flex items-center justify-center text-on-primary-container">
                                <span class="material-symbols-outlined">shopping_cart</span>
                            </div>
                            <h2 class="text-headline-md font-headline-md text-on-surface">Carrito de Venta</h2>
                        </div>
                        <button onclick="clearCart()" class="text-error text-label-md hover:bg-error/5 px-3 py-1 rounded transition-colors">Vaciar carrito</button>
                    </div>
                    
                    <!-- Cart Table -->
                    <div class="overflow-hidden border border-outline-variant rounded-lg flex-1 flex flex-col">
                        <table class="w-full text-left border-collapse">
                            <thead class="bg-surface-container-high">
                                <tr>
                                    <th class="px-4 py-3 text-label-md font-label-md text-on-surface-variant uppercase">Producto</th>
                                    <th class="px-4 py-3 text-label-md font-label-md text-on-surface-variant uppercase text-center">Precio</th>
                                    <th class="px-4 py-3 text-label-md font-label-md text-on-surface-variant uppercase text-center w-32">Cantidad</th>
                                    <th class="px-4 py-3 text-label-md font-label-md text-on-surface-variant uppercase text-right">Subtotal</th>
                                    <th class="px-4 py-3 w-12"></th>
                                </tr>
                            </thead>
                        </table>
                        <div class="overflow-y-auto flex-1">
                            <table class="w-full text-left border-collapse">
                                <tbody id="cart-items" class="divide-y divide-outline-variant">
                                    <!-- Injected by JS -->
                                    <tr id="empty-cart-msg">
                                        <td colspan="5" class="px-4 py-12 text-center text-on-surface-variant text-body-md">El carrito está vacío. Busca un producto para comenzar.</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </section>
            </div>
            
            <!-- Right Column: Checkout Summary -->
            <div class="col-span-4 flex flex-col gap-gutter">
                <section class="bg-surface-container-lowest rounded-xl p-card-padding shadow-soft flex flex-col gap-6 sticky top-20">
                    <h2 class="text-headline-md font-headline-md text-on-surface">Resumen de Venta</h2>
                    
                    <!-- Cliente Selection -->
                    <div class="flex flex-col gap-2">
                        <label class="text-label-md font-label-md text-on-surface-variant uppercase">Cliente</label>
                        <div class="relative">
                            <!-- We could use a select or input text. For POS, input is more flexible -->
                            <input id="customer_name" class="w-full bg-surface border border-outline-variant rounded-lg px-4 py-3 focus:ring-2 focus:ring-primary focus:border-primary outline-none text-body-md" placeholder="Cliente genérico (opcional)" type="text">
                        </div>
                    </div>
                    
                    <!-- Método de Pago -->
                    <div class="flex flex-col gap-3">
                        <label class="text-label-md font-label-md text-on-surface-variant uppercase">Método de Pago</label>
                        <div class="grid grid-cols-2 gap-2" id="payment-methods">
                            <button data-method="efectivo" class="payment-btn flex items-center justify-center gap-2 px-3 py-3 rounded-lg border-2 border-primary bg-primary-container text-on-primary-container font-bold transition-all">
                                <span class="material-symbols-outlined">payments</span>
                                <span class="text-label-md">Efectivo</span>
                            </button>
                            <button data-method="yape" class="payment-btn flex items-center justify-center gap-2 px-3 py-3 rounded-lg border-2 border-outline-variant hover:border-primary transition-all text-on-surface-variant hover:text-primary">
                                <span class="material-symbols-outlined">smartphone</span>
                                <span class="text-label-md">Yape</span>
                            </button>
                            <button data-method="plin" class="payment-btn flex items-center justify-center gap-2 px-3 py-3 rounded-lg border-2 border-outline-variant hover:border-primary transition-all text-on-surface-variant hover:text-primary">
                                <span class="material-symbols-outlined">smartphone</span>
                                <span class="text-label-md">Plin</span>
                            </button>
                            <button data-method="tarjeta" class="payment-btn flex items-center justify-center gap-2 px-3 py-3 rounded-lg border-2 border-outline-variant hover:border-primary transition-all text-on-surface-variant hover:text-primary">
                                <span class="material-symbols-outlined">credit_card</span>
                                <span class="text-label-md">Tarjeta</span>
                            </button>
                        </div>
                    </div>
                    
                    <!-- Payment Calculations -->
                    <div class="flex flex-col gap-4 bg-surface-container-low p-4 rounded-lg">
                        <div class="flex flex-col gap-2">
                            <label class="text-label-md font-label-md text-on-surface-variant uppercase">Monto Recibido</label>
                            <div class="relative">
                                <span class="absolute left-3 top-1/2 -translate-y-1/2 font-bold text-on-surface-variant">S/</span>
                                <input id="amount_received" class="w-full bg-surface border border-outline-variant rounded-lg pl-8 pr-4 py-3 focus:ring-2 focus:ring-primary focus:border-primary outline-none text-headline-md font-bold text-on-surface" type="number" step="0.01" min="0" placeholder="0.00">
                            </div>
                        </div>
                        <div class="flex justify-between items-center pt-2 border-t border-outline-variant">
                            <span class="text-body-md font-medium text-on-surface-variant">Cambio:</span>
                            <span id="change_amount" class="text-headline-md font-bold text-primary">S/ 0.00</span>
                        </div>
                    </div>
                    
                    <!-- Total Section -->
                    <div class="flex flex-col gap-1 border-t-2 border-dashed border-outline-variant pt-6">
                        <div class="flex justify-between items-end">
                            <span class="text-headline-md font-bold text-on-surface uppercase tracking-tighter">Total:</span>
                            <span id="total_amount" class="text-[40px] leading-none font-extrabold text-primary">S/ 0.00</span>
                        </div>
                    </div>
                    
                    <!-- Action Buttons -->
                    <div class="flex flex-col gap-2">
                        <button id="btn-pending-sale" onclick="submitSale(true)" class="w-full bg-surface-container-highest text-on-surface py-3 rounded-xl text-body-lg font-bold flex items-center justify-center gap-2 hover:bg-outline-variant/50 active:scale-[0.98] transition-all disabled:opacity-50 disabled:pointer-events-none" disabled>
                            <span class="material-symbols-outlined">schedule</span>
                            Guardar como Pendiente
                        </button>
                        
                        <button id="btn-confirm-sale" onclick="submitSale(false)" class="w-full bg-primary-container text-on-primary-container py-5 rounded-xl text-headline-md font-bold flex items-center justify-center gap-3 hover:brightness-110 active:scale-[0.98] transition-all shadow-lg disabled:opacity-50 disabled:pointer-events-none" disabled>
                            <span class="material-symbols-outlined filled-icon">check_circle</span>
                            Confirmar Venta
                        </button>
                    </div>
                </section>
            </div>
        </div>
    </div>    </div>
    <!-- JS POS Logic -->
    <script>
        // Data injected from Controller
        const products = @json($products);
        let cart = [];
        let paymentMethod = 'efectivo';

        // DOM Elements
        const searchInput = document.getElementById('product-search');
        const searchResults = document.getElementById('search-results');
        const cartItemsContainer = document.getElementById('cart-items');
        const btnPending = document.getElementById('btn-pending-sale');
        const totalAmountEl = document.getElementById('total_amount');
        const amountReceivedEl = document.getElementById('amount_received');
        const changeAmountEl = document.getElementById('change_amount');
        const btnConfirm = document.getElementById('btn-confirm-sale');
        const paymentBtns = document.querySelectorAll('.payment-btn');

        // Search Logic
        searchInput.addEventListener('input', function() {
            const query = this.value.toLowerCase().trim();
            if (query.length < 1) {
                searchResults.classList.add('hidden');
                return;
            }

            const filtered = products.filter(p => 
                p.name.toLowerCase().includes(query) || 
                (p.sku && p.sku.toLowerCase().includes(query))
            ).slice(0, 5); // Max 5 results

            if (filtered.length > 0) {
                searchResults.innerHTML = filtered.map(p => `
                    <div onclick="addFromFrequent(${p.id}); document.getElementById('product-search').value = ''; document.getElementById('search-results').classList.add('hidden')" class="p-3 hover:bg-surface-container-low cursor-pointer flex justify-between items-center border-b border-outline-variant last:border-0 transition-colors">
                        <div>
                            <div class="font-bold text-on-surface text-sm">${p.name}</div>
                            <div class="text-xs text-on-surface-variant">${p.category ? p.category.name : 'Sin categoría'}</div>
                        </div>
                        <div class="font-bold text-primary text-sm">S/ ${parseFloat(p.selling_price).toFixed(2)}</div>
                    </div>
                `).join('');
                searchResults.classList.remove('hidden');
            } else {
                searchResults.innerHTML = '<div class="p-3 text-center text-on-surface-variant text-sm">No se encontraron productos</div>';
                searchResults.classList.remove('hidden');
            }
        });

        // Hide search on click outside
        document.addEventListener('click', function(e) {
            if (!searchInput.contains(e.target) && !searchResults.contains(e.target)) {
                searchResults.classList.add('hidden');
            }
        });

        // Add to Cart Logic
        function addFromFrequent(id) {
            const product = products.find(p => p.id === id);
            if (!product) return;

            const existingItem = cart.find(item => item.id === id);
            if (existingItem) {
                existingItem.qty++;
            } else {
                cart.push({
                    id: product.id,
                    name: product.name,
                    category: product.category ? product.category.name : 'Varios',
                    price: parseFloat(product.selling_price),
                    qty: 1,
                    initial: product.name.charAt(0).toUpperCase()
                });
            }
            renderCart();
        }

        // Render Cart
        function renderCart() {
            if (cart.length === 0) {
                cartItemsContainer.innerHTML = `
                    <tr id="empty-cart-msg">
                        <td colspan="5" class="px-4 py-12 text-center text-on-surface-variant text-body-md">El carrito está vacío. Busca un producto para comenzar.</td>
                    </tr>
                `;
                btnConfirm.disabled = true;
                btnPending.disabled = true;
                calculateTotals();
                return;
            }

            btnConfirm.disabled = false;
            btnPending.disabled = false;
            cartItemsContainer.innerHTML = cart.map((item, index) => `
                <tr class="hover:bg-surface-container-low transition-colors">
                    <td class="px-4 py-4">
                        <div class="flex items-center gap-3">
                            <div class="w-10 h-10 rounded-lg ${getBgColorClass(index)} flex items-center justify-center text-white font-bold">${item.initial}</div>
                            <div class="flex flex-col">
                                <span class="text-body-md font-bold text-on-surface">${item.name}</span>
                                <span class="text-label-sm text-on-surface-variant">${item.category}</span>
                            </div>
                        </div>
                    </td>
                    <td class="px-4 py-4 text-center text-body-md">S/ ${item.price.toFixed(2)}</td>
                    <td class="px-4 py-4">
                        <div class="flex items-center justify-center gap-2">
                            <button onclick="updateQty(${item.id}, -1)" class="w-8 h-8 rounded-full border border-outline-variant flex items-center justify-center hover:bg-primary-fixed transition-colors">
                                <span class="material-symbols-outlined text-sm">remove</span>
                            </button>
                            <span class="w-8 text-center text-body-md font-bold">${item.qty}</span>
                            <button onclick="updateQty(${item.id}, 1)" class="w-8 h-8 rounded-full border border-outline-variant flex items-center justify-center hover:bg-primary-fixed transition-colors">
                                <span class="material-symbols-outlined text-sm">add</span>
                            </button>
                        </div>
                    </td>
                    <td class="px-4 py-4 text-right text-body-md font-bold">S/ ${(item.price * item.qty).toFixed(2)}</td>
                    <td class="px-4 py-4">
                        <button onclick="removeFromCart(${item.id})" class="text-on-surface-variant hover:text-error transition-colors">
                            <span class="material-symbols-outlined text-[20px]">delete</span>
                        </button>
                    </td>
                </tr>
            `).join('');
            
            calculateTotals();
        }

        function getBgColorClass(index) {
            const colors = ['bg-[#2D7D74]', 'bg-[#F39C12]', 'bg-[#8E44AD]', 'bg-[#E74C3C]', 'bg-[#3498DB]'];
            return colors[index % colors.length];
        }

        function updateQty(id, delta) {
            const item = cart.find(i => i.id === id);
            if (item) {
                item.qty += delta;
                if (item.qty <= 0) {
                    removeFromCart(id);
                } else {
                    renderCart();
                }
            }
        }

        function removeFromCart(id) {
            cart = cart.filter(i => i.id !== id);
            renderCart();
        }

        function clearCart() {
            cart = [];
            amountReceivedEl.value = '';
            document.getElementById('customer_name').value = '';
            renderCart();
        }

        // Totals and Payments
        let currentTotal = 0;
        function calculateTotals() {
            currentTotal = cart.reduce((sum, item) => sum + (item.price * item.qty), 0);
            totalAmountEl.innerText = `S/ ${currentTotal.toFixed(2)}`;
            calculateChange();
        }

        amountReceivedEl.addEventListener('input', calculateChange);

        function calculateChange() {
            let received = parseFloat(amountReceivedEl.value) || 0;
            if (received >= currentTotal && currentTotal > 0) {
                changeAmountEl.innerText = `S/ ${(received - currentTotal).toFixed(2)}`;
            } else {
                changeAmountEl.innerText = 'S/ 0.00';
            }
        }

        paymentBtns.forEach(btn => {
            btn.addEventListener('click', function() {
                paymentBtns.forEach(b => {
                    b.classList.remove('border-primary', 'bg-primary-container', 'text-on-primary-container');
                    b.classList.add('border-outline-variant', 'text-on-surface-variant');
                });
                this.classList.add('border-primary', 'bg-primary-container', 'text-on-primary-container');
                this.classList.remove('border-outline-variant', 'text-on-surface-variant');
                paymentMethod = this.dataset.method;
            });
        });

        // Submit Sale
        function submitSale(isPending = false) {
            if (cart.length === 0) return;

            btnConfirm.disabled = true;
            btnPending.disabled = true;
            if (isPending) {
                btnPending.innerHTML = '<span class="material-symbols-outlined animate-spin">refresh</span> Procesando...';
            } else {
                btnConfirm.innerHTML = '<span class="material-symbols-outlined animate-spin">refresh</span> Procesando...';
            }

            const payload = {
                customer_name: document.getElementById('customer_name').value,
                payment_method: paymentMethod,
                is_pending: isPending,
                items: cart.map(i => ({ id: i.id, quantity: i.qty }))
            };

            fetch('/pos/checkout', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'Accept': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                body: JSON.stringify(payload)
            })
            .then(async res => {
                const isJson = res.headers.get('content-type')?.includes('application/json');
                const data = isJson ? await res.json() : null;
                
                if (!res.ok) {
                    const error = (data && data.message) || res.statusText;
                    return Promise.reject(error);
                }
                return data;
            })
            .then(data => {
                if(data && data.success) {
                    alert('¡Venta registrada con éxito!');
                    clearCart();
                } else {
                    alert((data && data.message) || 'Error al procesar la venta');
                }
            })
            .catch(err => {
                alert('Error al guardar: ' + err);
                console.error('Submit error:', err);
            })
            .finally(() => {
                btnConfirm.disabled = false;
                btnPending.disabled = false;
                btnConfirm.innerHTML = '<span class="material-symbols-outlined filled-icon">check_circle</span> Confirmar Venta';
                btnPending.innerHTML = '<span class="material-symbols-outlined">schedule</span> Guardar como Pendiente';
            });
        }
    </script>
</x-layouts.app>
