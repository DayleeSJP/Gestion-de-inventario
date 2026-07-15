<x-layouts.app active="dashboard" title="Dashboard">
    <div class="p-8">
        
        <!-- Greeting -->
        <div class="mb-6 flex items-center justify-between">
            <div>
                <h2 class="text-2xl font-bold text-gray-900 mb-1">¡Buen día, {{ auth()->user()->name ?? 'Carlos' }}!</h2>
                <p class="text-gray-500 text-sm">Aquí tienes un resumen de tu negocio. ¡Hoy es un gran día!</p>
            </div>
        </div>

        <!-- Unified Stat Cards Grid -->
        <div class="grid grid-cols-4 gap-6 mb-8">
            <!-- Card 1 -->
            <div class="bg-surface rounded-xl p-5 shadow-sm border-l-4 border-[#2D7D74] relative overflow-hidden flex flex-col justify-between h-32">
                <div class="flex items-start justify-between">
                    <div class="w-10 h-10 rounded-xl bg-[#EAF7F5] text-[#2D7D74] flex items-center justify-center">
                        <span class="material-symbols-outlined">shopping_cart</span>
                    </div>
                    <div class="text-right">
                        <h3 class="text-2xl font-bold text-gray-900 mb-0.5">{{ $ventasHoy }}</h3>
                        <p class="text-[11px] text-gray-500 uppercase tracking-wide font-medium">Ventas Completadas</p>
                    </div>
                </div>
                <a href="/history" class="text-[#2D7D74] text-xs font-semibold flex items-center gap-1 hover:underline mt-4 z-10 w-max">
                    Ver historial <span class="material-symbols-outlined text-sm">arrow_forward</span>
                </a>
            </div>

            <!-- Card 2 -->
            <div class="bg-surface rounded-xl p-5 shadow-sm border-l-4 border-[#8E44AD] relative overflow-hidden flex flex-col justify-between h-32">
                <div class="flex items-start justify-between">
                    <div class="w-10 h-10 rounded-xl bg-[#F5EEF8] text-[#8E44AD] flex items-center justify-center">
                        <span class="material-symbols-outlined">payments</span>
                    </div>
                    <div class="text-right">
                        <h3 class="text-2xl font-bold text-gray-900 mb-0.5">S/{{ number_format($ingresosMes, 2) }}</h3>
                        <p class="text-[11px] text-gray-500 uppercase tracking-wide font-medium">Ingresos del Mes</p>
                    </div>
                </div>
                <a href="/reports" class="text-[#8E44AD] text-xs font-semibold flex items-center gap-1 hover:underline mt-4 z-10 w-max">
                    Ver reportes <span class="material-symbols-outlined text-sm">arrow_forward</span>
                </a>
            </div>

            <!-- Card 3 -->
            <div class="bg-surface rounded-xl p-5 shadow-sm border-l-4 border-[#E74C3C] relative overflow-hidden flex flex-col justify-between h-32">
                <div class="flex items-start justify-between">
                    <div class="w-10 h-10 rounded-xl bg-[#FDEDEC] text-[#E74C3C] flex items-center justify-center">
                        <span class="material-symbols-outlined">inventory_2</span>
                    </div>
                    <div class="text-right">
                        <h3 class="text-2xl font-bold text-gray-900 mb-0.5">{{ $productosActivos }}</h3>
                        <p class="text-[11px] text-gray-500 uppercase tracking-wide font-medium">Productos Activos</p>
                    </div>
                </div>
                <a href="/products" class="text-[#E74C3C] text-xs font-semibold flex items-center gap-1 hover:underline mt-4 z-10 w-max">
                    Ver inventario <span class="material-symbols-outlined text-sm">arrow_forward</span>
                </a>
            </div>

            <!-- Card 4 -->
            <div class="bg-surface rounded-xl p-5 shadow-sm border-l-4 border-[#F39C12] relative overflow-hidden flex flex-col justify-between h-32">
                <div class="flex items-start justify-between">
                    <div class="w-10 h-10 rounded-xl bg-[#FEF5E7] text-[#F39C12] flex items-center justify-center">
                        <span class="material-symbols-outlined">category</span>
                    </div>
                    <div class="text-right">
                        <h3 class="text-2xl font-bold text-gray-900 mb-0.5">{{ $categoriasActivas }}</h3>
                        <p class="text-[11px] text-gray-500 uppercase tracking-wide font-medium">Categorías Disponibles</p>
                    </div>
                </div>
                <a href="/categories" class="text-[#F39C12] text-xs font-semibold flex items-center gap-1 hover:underline mt-4 z-10 w-max">
                    Ver catálogo <span class="material-symbols-outlined text-sm">arrow_forward</span>
                </a>
            </div>
        </div>

        <!-- Alert Table Section (Pending Orders) -->
        <section class="bg-surface rounded-xl shadow-sm border border-surface-variant mb-8 overflow-hidden">
            <div class="bg-[#FFF4EC] px-6 py-4 flex justify-between items-center border-b border-[#FBE6D6]">
                <div class="flex items-center gap-2 text-[#9A3816]">
                    <span class="material-symbols-outlined">warning</span>
                    <h3 class="font-semibold text-sm">Pedidos Especiales Pendientes (<span id="pending-count">{{ $pendingOrders->count() }}</span>)</h3>
                </div>
            </div>
            <div class="overflow-x-auto">
                <table class="w-full text-left text-sm text-gray-700" id="pending-orders-table">
                    <thead class="text-xs text-gray-500 font-semibold bg-[#FAFAFA] border-b border-surface-variant">
                        <tr>
                            <th class="px-6 py-3 font-semibold">Pedido #</th>
                            <th class="px-6 py-3 font-semibold">Cliente</th>
                            <th class="px-6 py-3 font-semibold">Total</th>
                            <th class="px-6 py-3 font-semibold">Fecha Entrega</th>
                            <th class="px-6 py-3 font-semibold">Estado</th>
                            <th class="px-6 py-3 font-semibold text-right">Acción</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($pendingOrders as $order)
                        <tr class="transition-all duration-300 border-b border-gray-100 last:border-0">
                            <td class="px-6 py-4 font-medium">#{{ $order->id }}</td>
                            <td class="px-6 py-4">{{ $order->customer_name ?? 'Cliente General' }}</td>
                            <td class="px-6 py-4 font-semibold text-primary">S/{{ number_format($order->total_amount, 2) }}</td>
                            <td class="px-6 py-4">{{ $order->created_at->format('d/m/Y') }}</td>
                            <td class="px-6 py-4">
                                <span class="bg-[#FFE5E5] text-[#C0392B] px-2.5 py-1 rounded-md text-xs font-semibold">{{ ucfirst($order->status) }}</span>
                            </td>
                            <td class="px-6 py-4 text-right">
                                <button onclick="markAsPaid(this, {{ $order->id }})" class="bg-[#2D7D74] hover:bg-[#22635B] text-white px-4 py-1.5 rounded-md text-xs font-medium transition-colors shadow-sm">Marcar Pagado</button>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="6" class="px-6 py-8 text-center text-gray-500 bg-gray-50/50">No hay pedidos pendientes</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
                <div id="empty-orders-msg" class="hidden p-6 text-center text-gray-500 text-sm bg-gray-50/50">
                    No hay pedidos especiales pendientes.
                </div>
            </div>
        </section>

        <!-- Chart & Top Sellers Grid -->
        <div class="grid grid-cols-[2fr_1fr] gap-6 pb-12">
            
            <!-- Chart Section -->
            <div class="bg-surface rounded-xl p-6 shadow-sm border border-surface-variant flex flex-col">
                <div class="flex justify-between items-center mb-6 border-b border-gray-100 pb-4">
                    <div class="flex items-center gap-2">
                        <span class="material-symbols-outlined text-[#03645c] text-lg">trending_up</span>
                        <h3 class="text-sm font-bold text-gray-900">Ventas — Últimos 7 Días</h3>
                    </div>
                    <div class="flex items-center gap-2 text-xs font-medium text-gray-500">
                        <span class="w-2 h-2 rounded-full bg-[#03645c]"></span> Ingresos diarios
                    </div>
                </div>
                <!-- Real ChartJS Area -->
                <div class="flex-1 relative w-full h-[300px]">
                    <canvas id="salesChart"></canvas>
                </div>
            </div>

            <!-- Top Sellers List -->
            <div class="bg-surface rounded-xl p-6 shadow-sm border border-surface-variant flex flex-col">
                <div class="flex justify-between items-center mb-6 border-b border-gray-100 pb-4">
                    <div class="flex items-center gap-2">
                        <span class="material-symbols-outlined text-[#F39C12] text-lg">emoji_events</span>
                        <h3 class="text-sm font-bold text-gray-900">Top Productos</h3>
                    </div>
                    <span class="text-[10px] text-gray-400 font-medium">Últimos 7 Días</span>
                </div>
                <div class="space-y-4">
                    @forelse($topSellers as $index => $seller)
                    <div class="flex justify-between items-center p-3 rounded-lg hover:bg-gray-50 transition-colors">
                        <div class="flex items-center gap-3">
                            <div class="w-8 h-8 rounded-full {{ $index == 0 ? 'bg-[#F39C12] text-white' : ($index == 1 ? 'bg-[#3498DB] text-white' : ($index == 2 ? 'bg-[#2D7D74] text-white' : 'bg-gray-200 text-gray-600')) }} flex items-center justify-center text-xs font-bold">{{ $index + 1 }}</div>
                            <span class="text-sm font-medium text-gray-800">{{ $seller->product->name }}</span>
                        </div>
                        <span class="text-xs text-primary font-bold">{{ $seller->total_quantity }} ud.</span>
                    </div>
                    @empty
                    <div class="text-sm text-gray-400 text-center py-4">No hay ventas recientes.</div>
                    @endforelse
                </div>
            </div>

        </div>
        
        <!-- Footer Info -->
        <div class="text-center text-[10px] text-gray-400 font-medium pb-4">
            &copy; 2026 — Dulce Tentación — Todos los derechos reservados
        </div>
    </div>

    <!-- Toast Notification -->
    <div id="toast" class="fixed bottom-4 right-4 bg-surface-container-high text-on-surface px-6 py-3 rounded-lg shadow-lg flex items-center gap-3 transform translate-y-20 opacity-0 transition-all duration-300 z-50">
        <span class="material-symbols-outlined text-primary">check_circle</span>
        <span class="text-sm font-medium">Crédito marcado como pagado correctamente</span>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        // Chart Initialization
        document.addEventListener('DOMContentLoaded', function() {
            const ctx = document.getElementById('salesChart').getContext('2d');
            
            const gradient = ctx.createLinearGradient(0, 0, 0, 300);
            gradient.addColorStop(0, 'rgba(3, 100, 92, 0.2)');
            gradient.addColorStop(1, 'rgba(3, 100, 92, 0)');

            const data = {
                labels: @json($chartLabels),
                datasets: [{
                    label: 'Ingresos diarios (S/)',
                    data: @json($chartData),
                    borderColor: '#03645c',
                    backgroundColor: gradient,
                    borderWidth: 2,
                    pointBackgroundColor: '#fff',
                    pointBorderColor: '#03645c',
                    pointBorderWidth: 2,
                    pointRadius: 4,
                    pointHoverRadius: 6,
                    fill: true,
                    tension: 0.4
                }]
            };

            const config = {
                type: 'line',
                data: data,
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        legend: {
                            display: false
                        },
                        tooltip: {
                            callbacks: {
                                label: function(context) {
                                    let label = context.dataset.label || '';
                                    if (label) {
                                        label += ': ';
                                    }
                                    if (context.parsed.y !== null) {
                                        label += new Intl.NumberFormat('es-PE', { style: 'currency', currency: 'PEN' }).format(context.parsed.y);
                                    }
                                    return label;
                                }
                            }
                        }
                    },
                    scales: {
                        y: {
                            beginAtZero: true,
                            border: {
                                display: false
                            },
                            grid: {
                                color: '#f3f4f6',
                                drawBorder: false,
                            },
                            ticks: {
                                callback: function(value, index, values) {
                                    return 'S/' + value;
                                },
                                color: '#9ca3af',
                                font: {
                                    size: 11
                                }
                            }
                        },
                        x: {
                            border: {
                                display: false
                            },
                            grid: {
                                display: false,
                                drawBorder: false,
                            },
                            ticks: {
                                color: '#9ca3af',
                                font: {
                                    size: 11
                                }
                            }
                        }
                    }
                }
            };

            new Chart(ctx, config);
        });

        // Mark as Paid Logic
        function markAsPaid(button, orderId) {
            // First, make AJAX request to update DB
            fetch(`/orders/${orderId}/mark-paid`, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                }
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    const row = button.closest('tr');
                    
                    // Fade out the row
                    row.style.opacity = '0';
                    
                    setTimeout(() => {
                        row.remove();
                        
                        // Update the badge count
                        const countSpan = document.getElementById('pending-count');
                        if (countSpan) {
                            let currentCount = parseInt(countSpan.innerText);
                            currentCount = Math.max(0, currentCount - 1);
                            countSpan.innerText = currentCount;
                        }
                        
                        // Check if table is empty
                        const tbody = document.querySelector('#pending-orders-table tbody');
                        if (tbody.children.length === 0 || document.getElementById('pending-count').innerText == '0') {
                            document.getElementById('pending-orders-table').classList.add('hidden');
                            document.getElementById('empty-orders-msg').classList.remove('hidden');
                        }
                        
                        // Show toast
                        const toast = document.getElementById('toast');
                        toast.classList.remove('translate-y-20', 'opacity-0');
                        
                        // Hide toast after 3 seconds
                        setTimeout(() => {
                            toast.classList.add('translate-y-20', 'opacity-0');
                        }, 3000);
                    }, 300);
                }
            })
            .catch(error => console.error('Error:', error));
        }
    </script>
</x-layouts.app>
