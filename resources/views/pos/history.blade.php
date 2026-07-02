<x-layouts.app active="history" title="Historial de Ventas">
    <div class="p-margin-page relative">

        @if(session('success'))
        <div class="bg-primary/10 text-primary p-4 rounded-lg mb-6 flex items-center gap-2">
            <span class="material-symbols-outlined">check_circle</span>
            {{ session('success') }}
        </div>
        @endif

        <form method="GET" action="{{ route('history') }}">
            <!-- Filters Bento Grid Section -->
            <div class="bg-white p-card-padding rounded-xl shadow-[0px_4px_12px_rgba(0,0,0,0.05)] mb-stack-lg border border-outline-variant/30">
                <div class="grid grid-cols-1 md:grid-cols-12 gap-4 items-end">
                    <div class="md:col-span-5">
                        <label class="block text-label-md text-on-surface-variant mb-2 px-1">Buscar Venta</label>
                        <div class="relative group">
                            <span class="material-symbols-outlined absolute left-3 top-1/2 -translate-y-1/2 text-on-surface-variant group-focus-within:text-primary transition-colors">search</span>
                            <input name="search" value="{{ request('search') }}" class="w-full pl-10 pr-4 py-2.5 bg-surface-container-lowest border border-outline-variant rounded-lg focus:ring-2 focus:ring-primary/20 focus:border-primary outline-none transition-all font-body-md" placeholder="Buscar por ID, cliente, cajero o método..." type="text">
                        </div>
                    </div>
                    <div class="md:col-span-3">
                        <label class="block text-label-md text-on-surface-variant mb-2 px-1 flex items-center gap-1">
                            <span class="material-symbols-outlined text-[14px]">calendar_today</span> DESDE
                        </label>
                        <input name="date_from" value="{{ request('date_from') }}" class="w-full px-4 py-2 bg-surface-container-lowest border border-outline-variant rounded-lg focus:ring-2 focus:ring-primary/20 focus:border-primary outline-none transition-all font-body-md text-on-surface" type="date">
                    </div>
                    <div class="md:col-span-3">
                        <label class="block text-label-md text-on-surface-variant mb-2 px-1 flex items-center gap-1">
                            <span class="material-symbols-outlined text-[14px]">calendar_today</span> HASTA
                        </label>
                        <input name="date_to" value="{{ request('date_to') }}" class="w-full px-4 py-2 bg-surface-container-lowest border border-outline-variant rounded-lg focus:ring-2 focus:ring-primary/20 focus:border-primary outline-none transition-all font-body-md text-on-surface" type="date">
                    </div>
                    <div class="md:col-span-1 flex flex-col gap-2">
                        <button type="submit" class="w-full aspect-square flex items-center justify-center bg-primary text-white border border-primary rounded-lg hover:bg-primary/90 transition-colors group" title="Aplicar Filtros">
                            <span class="material-symbols-outlined text-[20px]">search</span>
                        </button>
                    </div>
                </div>
            </div>
        </form>
            
            <!-- Main Data Table Container -->
            <div class="bg-white rounded-xl shadow-[0px_4px_12px_rgba(0,0,0,0.05)] border border-outline-variant/30 overflow-hidden">
                <div class="overflow-x-auto">
                    <table class="w-full text-left border-collapse">
                        <thead>
                            <tr class="bg-surface-container/50 border-b border-outline-variant/30">
                                <th class="px-6 py-4 font-label-md text-label-md text-on-surface-variant whitespace-nowrap">ID VENTA</th>
                                <th class="px-6 py-4 font-label-md text-label-md text-on-surface-variant whitespace-nowrap">FECHA</th>
                                <th class="px-6 py-4 font-label-md text-label-md text-on-surface-variant whitespace-nowrap">CLIENTE</th>
                                <th class="px-6 py-4 font-label-md text-label-md text-on-surface-variant whitespace-nowrap">CAJERO</th>
                                <th class="px-6 py-4 font-label-md text-label-md text-on-surface-variant whitespace-nowrap">TOTAL</th>
                                <th class="px-6 py-4 font-label-md text-label-md text-on-surface-variant whitespace-nowrap">MÉTODO PAGO</th>
                                <th class="px-6 py-4 font-label-md text-label-md text-on-surface-variant whitespace-nowrap">ESTADO</th>
                                <th class="px-6 py-4 font-label-md text-label-md text-on-surface-variant whitespace-nowrap text-center">ACCIONES</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-outline-variant/20">
                            @forelse($orders as $order)
                            <tr class="{{ $order->status == 'cancelado' ? 'bg-error-container/10 hover:bg-error-container/20' : 'hover:bg-surface-container-lowest' }} transition-colors">
                                <td class="px-6 py-4 font-body-md text-on-surface">#{{ $order->id }}</td>
                                <td class="px-6 py-4 font-body-md text-on-surface-variant">{{ $order->created_at->format('d/m/Y H:i') }}</td>
                                <td class="px-6 py-4 font-body-md text-on-surface {{ !$order->customer_name ? 'italic opacity-60' : '' }}">{{ $order->customer_name ?? 'Venta general' }}</td>
                                <td class="px-6 py-4 font-body-md text-on-surface-variant">{{ $order->user->name ?? 'Sistema' }}</td>
                                <td class="px-6 py-4 font-body-md font-bold {{ $order->status == 'cancelado' ? 'text-error' : 'text-primary' }}">S/{{ number_format($order->total_amount, 2) }}</td>
                                <td class="px-6 py-4 font-body-md capitalize">{{ $order->payment_method }}</td>
                                <td class="px-6 py-4">
                                    @if($order->status == 'cancelado')
                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-error/10 text-error">
                                        Anulada
                                    </span>
                                    @else
                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-primary-container/20 text-primary">
                                        {{ ucfirst($order->status) }}
                                    </span>
                                    @endif
                                </td>
                                <td class="px-6 py-4 text-center">
                                    <div class="flex items-center gap-2 justify-center">
                                        <button onclick="showDetails('{{ $order->id }}', '{{ $order->customer_name ?? 'Venta General' }}', '{{ $order->total_amount }}', '{{ json_encode($order->items) }}')" class="text-primary hover:bg-primary-container/20 rounded-md transition-colors flex items-center justify-center w-8 h-8" title="Ver detalle">
                                            <span class="material-symbols-outlined text-[20px]">visibility</span>
                                        </button>
                                        <button onclick="window.open('/orders/{{ $order->id }}/ticket', 'Ticket', 'width=400,height=600')" class="text-secondary hover:bg-secondary-container/20 rounded-md transition-colors flex items-center justify-center w-8 h-8" title="Imprimir">
                                            <span class="material-symbols-outlined text-[20px]">print</span>
                                        </button>
                                        @if($order->status != 'cancelado')
                                        <button onclick="cancelOrder('{{ $order->id }}')" class="text-error hover:bg-error-container/20 rounded-md transition-colors flex items-center justify-center w-8 h-8" title="Anular">
                                            <span class="material-symbols-outlined text-[20px]">cancel</span>
                                        </button>
                                        @else
                                        <div class="w-8 h-8"></div>
                                        @endif
                                    </div>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="8" class="px-6 py-8 text-center text-on-surface-variant font-body-md no-hover">No se encontraron ventas con los filtros aplicados.</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
                
                <!-- Pagination -->
                <div class="px-6 py-4 bg-surface-container-low/30 border-t border-outline-variant/30">
                    {{ $orders->links() }}
                </div>
            </div>
            
            <!-- Dashboard Snapshot / Bottom Bento -->
            <div class="grid grid-cols-1 md:grid-cols-4 gap-gutter mt-stack-lg pb-12">
                <div class="bg-white p-4 rounded-xl border border-outline-variant/30 shadow-sm flex items-center gap-4">
                    <div class="w-12 h-12 rounded-full bg-primary-container/10 flex items-center justify-center text-primary">
                        <span class="material-symbols-outlined fill-icon">payments</span>
                    </div>
                    <div>
                        <p class="text-label-sm text-on-surface-variant uppercase tracking-wide">Total del Día</p>
                        <p class="font-headline-md text-headline-md text-primary">S/1,240.50</p>
                    </div>
                </div>
                <div class="bg-white p-4 rounded-xl border border-outline-variant/30 shadow-sm flex items-center gap-4">
                    <div class="w-12 h-12 rounded-full bg-secondary-container/10 flex items-center justify-center text-secondary">
                        <span class="material-symbols-outlined fill-icon">shopping_bag</span>
                    </div>
                    <div>
                        <p class="text-label-sm text-on-surface-variant uppercase tracking-wide">Ventas Hoy</p>
                        <p class="font-headline-md text-headline-md text-secondary">42</p>
                    </div>
                </div>
                <div class="bg-white p-4 rounded-xl border border-outline-variant/30 shadow-sm flex items-center gap-4">
                    <div class="w-12 h-12 rounded-full bg-tertiary-container/10 flex items-center justify-center text-tertiary">
                        <span class="material-symbols-outlined fill-icon">group</span>
                    </div>
                    <div>
                        <p class="text-label-sm text-on-surface-variant uppercase tracking-wide">Nuevos Clientes</p>
                        <p class="font-headline-md text-headline-md text-tertiary">12</p>
                    </div>
                </div>
                <div class="bg-white p-4 rounded-xl border border-outline-variant/30 shadow-sm flex items-center gap-4">
                    <div class="w-12 h-12 rounded-full bg-error-container/10 flex items-center justify-center text-error">
                        <span class="material-symbols-outlined fill-icon">rule</span>
                    </div>
                    <div>
                        <p class="text-label-sm text-on-surface-variant uppercase tracking-wide">Anuladas (Mes)</p>
                        <p class="font-headline-md text-headline-md text-error">03</p>
                    </div>
                </div>
            </div>
    </div>

    <!-- Modal Detalle Venta -->
    <div id="modal-details" class="fixed inset-0 bg-black/50 z-50 flex items-center justify-center hidden opacity-0 transition-opacity duration-300">
        <div class="bg-white w-full max-w-lg rounded-xl shadow-lg p-6 transform scale-95 transition-transform duration-300" id="modal-content">
            <div class="flex justify-between items-center mb-4">
                <h2 class="text-xl font-bold text-on-surface">Detalles de Venta <span id="modal-order-id" class="text-primary"></span></h2>
                <button onclick="closeDetails()" class="text-on-surface-variant hover:text-error transition-colors">
                    <span class="material-symbols-outlined">close</span>
                </button>
            </div>
            <div class="mb-4">
                <p class="text-sm text-on-surface-variant">Cliente: <strong id="modal-customer" class="text-on-surface"></strong></p>
            </div>
            
            <div class="bg-surface-container-lowest rounded-lg border border-outline-variant/30 overflow-hidden mb-4">
                <table class="w-full text-left text-sm">
                    <thead class="bg-surface-container/50 border-b border-outline-variant/30">
                        <tr>
                            <th class="px-4 py-2 font-medium">Producto</th>
                            <th class="px-4 py-2 font-medium text-center">Cant.</th>
                            <th class="px-4 py-2 font-medium text-right">Subtotal</th>
                        </tr>
                    </thead>
                    <tbody id="modal-items-tbody" class="divide-y divide-outline-variant/20">
                        <!-- Llenado dinamicamente -->
                    </tbody>
                </table>
            </div>
            
            <div class="flex justify-between items-center">
                <button onclick="window.open('/orders/'+currentOrderId+'/ticket', 'Ticket', 'width=400,height=600')" class="flex items-center gap-2 bg-surface-container text-on-surface px-4 py-2 rounded-lg text-sm hover:bg-surface-variant transition-colors">
                    <span class="material-symbols-outlined text-[18px]">print</span> Imprimir
                </button>
                <p class="text-lg font-bold text-on-surface">TOTAL: <span id="modal-total" class="text-primary"></span></p>
            </div>
        </div>
    </div>

    <!-- Formulario Oculto para Anular -->
    <form id="cancel-form" method="POST" action="">
        @csrf
    </form>

    <script>
        let currentOrderId = null;

        document.addEventListener('DOMContentLoaded', () => {
            const rows = document.querySelectorAll('tbody tr:not(.no-hover)');
            rows.forEach(row => {
                row.addEventListener('mouseenter', () => {
                    row.style.transform = 'translateX(4px)';
                    row.style.transition = 'transform 0.2s ease-out';
                });
                row.addEventListener('mouseleave', () => {
                    row.style.transform = 'translateX(0)';
                });
            });
        });

        // Funcionalidad del Modal de Detalles
        function showDetails(orderId, customerName, totalAmount, itemsJson) {
            currentOrderId = orderId;
            document.getElementById('modal-order-id').innerText = '#' + orderId;
            document.getElementById('modal-customer').innerText = customerName;
            document.getElementById('modal-total').innerText = 'S/' + parseFloat(totalAmount).toFixed(2);
            
            let items = JSON.parse(itemsJson);
            let tbody = document.getElementById('modal-items-tbody');
            tbody.innerHTML = '';
            
            items.forEach(item => {
                let productName = item.product ? item.product.name : 'Producto Eliminado';
                let tr = document.createElement('tr');
                tr.innerHTML = `
                    <td class="px-4 py-3 text-on-surface">${productName}</td>
                    <td class="px-4 py-3 text-center text-on-surface-variant">${parseFloat(item.quantity)}</td>
                    <td class="px-4 py-3 text-right font-medium text-on-surface">S/${parseFloat(item.subtotal).toFixed(2)}</td>
                `;
                tbody.appendChild(tr);
            });

            let modal = document.getElementById('modal-details');
            let content = document.getElementById('modal-content');
            modal.classList.remove('hidden');
            // Trigger reflow
            void modal.offsetWidth;
            modal.classList.remove('opacity-0');
            content.classList.remove('scale-95');
        }

        function closeDetails() {
            let modal = document.getElementById('modal-details');
            let content = document.getElementById('modal-content');
            
            modal.classList.add('opacity-0');
            content.classList.add('scale-95');
            
            setTimeout(() => {
                modal.classList.add('hidden');
            }, 300);
        }

        // Funcionalidad de Anular Venta
        function cancelOrder(id) {
            if(confirm('¿Estás SEGURO de que deseas anular la venta #' + id + '? Esta acción cambiará el estado de la venta, pero no devolverá el stock automáticamente en esta versión.')) {
                const form = document.getElementById('cancel-form');
                form.action = `/orders/${id}/cancel`;
                form.submit();
            }
        }
    </script>
</x-layouts.app>
