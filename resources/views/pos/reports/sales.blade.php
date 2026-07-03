<x-layouts.app active="reports" title="Reporte de Ventas">
    <!-- Cargar librerías JS para gráficos y exportación PDF/Excel -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js"></script>
    
    <div class="p-margin-page">
        <div class="max-w-7xl mx-auto space-y-stack-lg" id="report-content">
            
            <!-- Page Header con Botones de Exportación -->
            <div class="flex flex-col md:flex-row md:items-center justify-between gap-4 mb-6">
                <div>
                    <div class="flex items-center gap-3 mb-1">
                        <div class="p-2 bg-primary-fixed text-primary rounded-lg" data-html2canvas-ignore>
                            <a href="{{ route('reports.index') }}" class="hover:text-primary-container"><span class="material-symbols-outlined text-[24px]">arrow_back</span></a>
                        </div>
                        <h2 class="text-headline-lg font-headline-lg text-on-surface">Reporte de Ventas</h2>
                    </div>
                    <p class="text-body-md text-on-surface-variant">Análisis de ingresos, productos populares y tendencias de los últimos 7 días.</p>
                </div>
                
                <div class="flex items-center gap-2" data-html2canvas-ignore>
                    <button onclick="window.print()" class="px-4 py-2 border border-outline-variant text-on-surface font-bold rounded-lg hover:bg-surface-container-low transition-colors flex items-center gap-2">
                        <span class="material-symbols-outlined text-[20px]">print</span>
                        Imprimir
                    </button>
                    <button onclick="exportExcel()" class="px-4 py-2 bg-secondary text-on-secondary font-bold rounded-lg hover:bg-secondary/90 transition-colors flex items-center gap-2">
                        <span class="material-symbols-outlined text-[20px]">table_view</span>
                        Excel
                    </button>
                    <button onclick="exportPDF()" class="px-4 py-2 bg-primary text-on-primary font-bold rounded-lg hover:bg-primary/90 transition-colors flex items-center gap-2">
                        <span class="material-symbols-outlined text-[20px]">picture_as_pdf</span>
                        PDF
                    </button>
                </div>
            </div>

            <!-- Stats Overview -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-gutter">
                <!-- Total Revenue -->
                <div class="bg-surface-container-lowest p-6 rounded-2xl shadow-sm border border-outline-variant/30 flex items-center gap-6">
                    <div class="w-16 h-16 rounded-full bg-primary-fixed/20 flex items-center justify-center text-primary flex-shrink-0">
                        <span class="material-symbols-outlined text-[32px]">payments</span>
                    </div>
                    <div>
                        <h3 class="text-label-lg font-bold text-on-surface-variant uppercase tracking-wider mb-1">Ingresos Totales</h3>
                        <p class="text-display-sm font-display-sm text-on-surface font-bold">S/ {{ number_format($totalRevenue, 2) }}</p>
                    </div>
                </div>
                
                <!-- Total Sales Count -->
                <div class="bg-surface-container-lowest p-6 rounded-2xl shadow-sm border border-outline-variant/30 flex items-center gap-6">
                    <div class="w-16 h-16 rounded-full bg-secondary-fixed/20 flex items-center justify-center text-secondary flex-shrink-0">
                        <span class="material-symbols-outlined text-[32px]">shopping_bag</span>
                    </div>
                    <div>
                        <h3 class="text-label-lg font-bold text-on-surface-variant uppercase tracking-wider mb-1">Ventas Completadas</h3>
                        <p class="text-display-sm font-display-sm text-on-surface font-bold">{{ $totalSalesCount }}</p>
                    </div>
                </div>
            </div>

            <!-- Charts and Data -->
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-gutter mt-8">
                
                <!-- Trend Chart -->
                <div class="lg:col-span-2 bg-surface-container-lowest p-6 rounded-2xl shadow-sm border border-outline-variant/30">
                    <h3 class="text-title-lg font-title-lg text-on-surface mb-6">Tendencia de Ingresos (Últimos 7 días)</h3>
                    <div class="relative h-72 w-full">
                        <canvas id="salesChart"></canvas>
                    </div>
                </div>

                <!-- Top Products -->
                <div class="bg-surface-container-lowest p-6 rounded-2xl shadow-sm border border-outline-variant/30">
                    <h3 class="text-title-lg font-title-lg text-on-surface mb-6">Top 5 Productos</h3>
                    
                    <div class="space-y-4">
                        @forelse($topProducts as $item)
                        <div class="flex items-center justify-between p-3 rounded-xl hover:bg-surface-container-low transition-colors">
                            <div class="flex items-center gap-3">
                                <div class="w-10 h-10 rounded-lg bg-tertiary-fixed/30 flex items-center justify-center text-tertiary font-bold text-sm">
                                    {{ substr($item->product->name ?? '?', 0, 1) }}
                                </div>
                                <div>
                                    <p class="font-bold text-body-lg text-on-surface">{{ $item->product->name ?? 'Producto Eliminado' }}</p>
                                    <p class="text-label-sm text-on-surface-variant">{{ $item->total_quantity }} unidades vendidas</p>
                                </div>
                            </div>
                            <div class="text-right">
                                <p class="font-bold text-body-lg text-primary">S/ {{ number_format($item->total_revenue, 2) }}</p>
                            </div>
                        </div>
                        @empty
                        <div class="p-4 text-center text-on-surface-variant bg-surface-container-low rounded-xl">
                            No hay datos de ventas para mostrar.
                        </div>
                        @endforelse
                    </div>
                </div>
            </div>
            
        </div>
    </div>

    <!-- Scripts for Charts and Exports -->
    <script>
        // Data from Controller
        const chartData = @json($last7Days);
        
        // Initialize Chart
        document.addEventListener('DOMContentLoaded', function() {
            const ctx = document.getElementById('salesChart').getContext('2d');
            
            // Extract labels and values
            const labels = chartData.map(item => item.date);
            const data = chartData.map(item => item.revenue);

            new Chart(ctx, {
                type: 'line',
                data: {
                    labels: labels,
                    datasets: [{
                        label: 'Ingresos Diarios (S/)',
                        data: data,
                        borderColor: '#6750A4', // Primary color
                        backgroundColor: 'rgba(103, 80, 164, 0.1)',
                        borderWidth: 3,
                        pointBackgroundColor: '#6750A4',
                        pointBorderColor: '#fff',
                        pointBorderWidth: 2,
                        pointRadius: 5,
                        pointHoverRadius: 7,
                        fill: true,
                        tension: 0.4 // Smooth curves
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        legend: { display: false },
                        tooltip: {
                            backgroundColor: '#1C1B1F',
                            padding: 12,
                            titleFont: { size: 14, family: "'Inter', sans-serif" },
                            bodyFont: { size: 14, family: "'Inter', sans-serif" },
                            displayColors: false,
                            callbacks: {
                                label: function(context) {
                                    return 'S/ ' + context.parsed.y.toFixed(2);
                                }
                            }
                        }
                    },
                    scales: {
                        y: {
                            beginAtZero: true,
                            grid: { color: 'rgba(0,0,0,0.05)' },
                            ticks: {
                                callback: function(value) { return 'S/ ' + value; }
                            }
                        },
                        x: {
                            grid: { display: false }
                        }
                    }
                }
            });
        });

        // PDF Export using html2pdf
        function exportPDF() {
            const element = document.getElementById('report-content');
            
            // Add a temporary class to fix Chart.js canvas width during PDF generation
            const canvas = document.getElementById('salesChart');
            const originalWidth = canvas.style.width;
            const originalHeight = canvas.style.height;
            canvas.style.width = '600px';
            canvas.style.height = '300px';

            const opt = {
                margin:       10,
                filename:     'Reporte_Ventas_DulceCorazon.pdf',
                image:        { type: 'jpeg', quality: 0.98 },
                html2canvas:  { scale: 2, useCORS: true },
                jsPDF:        { unit: 'mm', format: 'a4', orientation: 'landscape' }
            };

            html2pdf().set(opt).from(element).save().then(() => {
                // Restore canvas sizes
                canvas.style.width = originalWidth;
                canvas.style.height = originalHeight;
            });
        }

        // Simple Excel/CSV Export
        function exportExcel() {
            let csvContent = "data:text/csv;charset=utf-8,";
            
            // Add Header
            csvContent += "REPORTE DE VENTAS - DULCE CORAZON\r\n\r\n";
            csvContent += `Ingresos Totales,S/ {{ number_format($totalRevenue, 2) }}\r\n`;
            csvContent += `Ventas Completadas,{{ $totalSalesCount }}\r\n\r\n`;
            
            // Add Trend Data
            csvContent += "TENDENCIA DE ULTIMOS 7 DIAS\r\n";
            csvContent += "Fecha,Ingresos\r\n";
            chartData.forEach(function(row) {
                csvContent += `${row.date},${row.revenue}\r\n`;
            });

            // Trigger Download
            const encodedUri = encodeURI(csvContent);
            const link = document.createElement("a");
            link.setAttribute("href", encodedUri);
            link.setAttribute("download", "Reporte_Ventas_DulceCorazon.csv");
            document.body.appendChild(link);
            link.click();
            document.body.removeChild(link);
        }
    </script>
    
    <style>
        @media print {
            body { background: white !important; }
            .bg-surface-container-lowest { box-shadow: none !important; border: 1px solid #ccc !important; }
            .p-margin-page { padding: 0 !important; }
            #report-content { max-width: 100% !important; margin: 0 !important; }
        }
    </style>
</x-layouts.app>
