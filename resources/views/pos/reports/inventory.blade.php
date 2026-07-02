<x-layouts.app active="reports" title="Reporte de Inventario">
    <!-- Canvas -->
    <div class="p-margin-page space-y-gutter">
            <!-- Header Section -->
            <div class="flex flex-col md:flex-row justify-between items-start md:items-center gap-4">
                <div>
                    <nav class="flex items-center gap-2 text-label-md text-on-surface-variant mb-2">
                        <span>Inventario</span>
                        <span class="material-symbols-outlined text-[14px]">chevron_right</span>
                        <span class="text-primary font-bold">Reportes</span>
                    </nav>
                    <div class="flex items-center gap-4">
                        <div class="p-3 bg-primary-container/10 rounded-2xl">
                            <span class="material-symbols-outlined text-primary text-3xl">inventory</span>
                        </div>
                        <h2 class="text-headline-xl font-headline-xl text-on-surface">Reporte de Inventario</h2>
                    </div>
                </div>
                <a href="/reports" class="px-6 py-2.5 rounded-xl border-2 border-primary text-primary font-bold text-label-md flex items-center gap-2 hover:bg-primary/5 transition-all">
                    <span class="material-symbols-outlined">arrow_back</span>
                    Volver al Menú
                </a>
            </div>

            <!-- Action Toolbar & Summary -->
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-gutter">
                <!-- Action Buttons -->
                <div class="lg:col-span-4 bg-white rounded-2xl shadow-[0px_4px_12px_rgba(0,0,0,0.05)] p-6 flex flex-col justify-center gap-4 hover:shadow-[0px_8px_24px_rgba(0,0,0,0.08)] transition-all">
                    <p class="text-label-md font-bold text-on-surface-variant uppercase tracking-wider">Acciones de Reporte</p>
                    <div class="grid grid-cols-3 gap-3">
                        <button onclick="printReport()" class="flex flex-col items-center justify-center p-4 bg-primary text-white rounded-xl hover:bg-primary/90 transition-all gap-2 group">
                            <span class="material-symbols-outlined text-2xl group-hover:scale-110 transition-transform">print</span>
                            <span class="text-label-sm font-bold">Imprimir</span>
                        </button>
                        <button onclick="exportExcelInventory()" class="flex flex-col items-center justify-center p-4 bg-[#1D6F42] text-white rounded-xl hover:opacity-90 transition-all gap-2 group">
                            <span class="material-symbols-outlined text-2xl group-hover:scale-110 transition-transform">description</span>
                            <span class="text-label-sm font-bold">Excel</span>
                        </button>
                        <button onclick="exportPdfInventory()" class="flex flex-col items-center justify-center p-4 bg-[#C41E3A] text-white rounded-xl hover:opacity-90 transition-all gap-2 group">
                            <span class="material-symbols-outlined text-2xl group-hover:scale-110 transition-transform">picture_as_pdf</span>
                            <span class="text-label-sm font-bold">PDF</span>
                        </button>
                    </div>
                </div>

                <!-- Highlighted Total Banner -->
                <div class="lg:col-span-8 bg-primary-container rounded-2xl shadow-[0px_4px_12px_rgba(0,0,0,0.05)] relative overflow-hidden p-8 flex flex-col justify-center hover:shadow-[0px_8px_24px_rgba(0,0,0,0.08)] transition-all">
                    <div class="absolute -right-12 -top-12 w-48 h-48 bg-white/10 rounded-full blur-3xl"></div>
                    <div class="absolute right-12 bottom-0 opacity-10">
                        <span class="material-symbols-outlined text-[180px] text-on-primary-container">payments</span>
                    </div>
                    <div class="relative z-10">
                        <p class="text-on-primary-container/80 text-headline-md font-headline-md mb-2">Valor Total del Inventario <span class="text-label-md opacity-70">(a precio de costo)</span></p>
                        <div class="flex items-baseline gap-4">
                            <h3 class="text-[56px] leading-none font-bold text-on-primary-container tracking-tighter">S/ 36,234.76</h3>
                            <div class="flex items-center gap-1 bg-white/20 px-3 py-1 rounded-full text-on-primary-container">
                                <span class="material-symbols-outlined text-sm">trending_up</span>
                                <span class="text-label-md">+4.2%</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Inventory Status Table Section -->
            <div id="printable-area" class="bg-white rounded-2xl shadow-[0px_4px_12px_rgba(0,0,0,0.05)] overflow-hidden hover:shadow-[0px_8px_24px_rgba(0,0,0,0.08)] transition-all">
                <div class="px-8 py-6 border-b border-outline-variant/30 flex justify-between items-center bg-surface-container-low/50">
                    <div>
                        <h3 class="text-headline-md font-headline-md text-on-surface">Estado Actual del Stock</h3>
                        <p class="text-body-md text-on-surface-variant">Monitoreo de niveles críticos y existencias totales</p>
                    </div>
                    <div class="flex gap-2">
                        <span class="flex items-center gap-1.5 px-3 py-1 bg-error-container text-on-error-container rounded-full text-label-sm font-bold">
                            <span class="w-2 h-2 bg-error rounded-full animate-pulse"></span>
                            3 Stock Crítico
                        </span>
                    </div>
                </div>
                <div class="overflow-x-auto custom-scrollbar">
                    <table class="w-full text-left border-collapse">
                        <thead>
                            <tr class="bg-surface-container-high/50 border-b border-outline-variant/30">
                                <th class="px-8 py-4 text-label-md font-bold text-on-surface-variant uppercase tracking-wider">Producto</th>
                                <th class="px-8 py-4 text-label-md font-bold text-on-surface-variant uppercase tracking-wider text-center">Stock Actual</th>
                                <th class="px-8 py-4 text-label-md font-bold text-on-surface-variant uppercase tracking-wider text-center">Stock Mínimo</th>
                                <th class="px-8 py-4 text-label-md font-bold text-on-surface-variant uppercase tracking-wider text-right">Precio Costo</th>
                                <th class="px-8 py-4 text-label-md font-bold text-on-surface-variant uppercase tracking-wider text-right">Precio Venta</th>
                                <th class="px-8 py-4 text-label-md font-bold text-on-surface-variant uppercase tracking-wider text-center">Estado</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-outline-variant/20">
                            <!-- Low Stock Item -->
                            <tr class="hover:bg-surface-container/50 transition-colors bg-error-container/5">
                                <td class="px-8 py-5">
                                    <div class="flex items-center gap-3">
                                        <div class="w-10 h-10 rounded-lg bg-surface-container-highest flex items-center justify-center">
                                            <span class="material-symbols-outlined text-primary">bakery_dining</span>
                                        </div>
                                        <div>
                                            <p class="text-body-md font-bold text-on-surface leading-tight">Camote rojo</p>
                                            <p class="text-label-sm text-on-surface-variant">Tubérculos frescos</p>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-8 py-5 text-center">
                                    <span class="text-headline-md font-bold text-error">2.30</span> <span class="text-label-sm text-on-surface-variant">kg</span>
                                </td>
                                <td class="px-8 py-5 text-center text-body-md text-on-surface-variant">1.00 kg</td>
                                <td class="px-8 py-5 text-right font-mono text-body-md">S/ 1.20</td>
                                <td class="px-8 py-5 text-right font-mono text-body-md">S/ 2.10</td>
                                <td class="px-8 py-5 text-center">
                                    <span class="px-3 py-1 bg-secondary-container text-on-secondary-container rounded-full text-label-sm font-bold">Bajo Stock</span>
                                </td>
                            </tr>
                            
                            <!-- Normal Stock Items -->
                            <tr class="hover:bg-surface-container/50 transition-colors">
                                <td class="px-8 py-5">
                                    <div class="flex items-center gap-3">
                                        <div class="w-10 h-10 rounded-lg bg-surface-container-highest flex items-center justify-center">
                                            <span class="material-symbols-outlined text-primary">fastfood</span>
                                        </div>
                                        <div>
                                            <p class="text-body-md font-bold text-on-surface leading-tight">Doritos</p>
                                            <p class="text-label-sm text-on-surface-variant">Snacks salados</p>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-8 py-5 text-center">
                                    <span class="text-headline-md font-bold text-on-surface">15</span> <span class="text-label-sm text-on-surface-variant">und</span>
                                </td>
                                <td class="px-8 py-5 text-center text-body-md text-on-surface-variant">5 und</td>
                                <td class="px-8 py-5 text-right font-mono text-body-md">S/ 1.20</td>
                                <td class="px-8 py-5 text-right font-mono text-body-md">S/ 2.00</td>
                                <td class="px-8 py-5 text-center">
                                    <span class="px-3 py-1 bg-primary-fixed text-on-primary-fixed-variant rounded-full text-label-sm font-bold">Saludable</span>
                                </td>
                            </tr>
                            
                            <tr class="hover:bg-surface-container/50 transition-colors">
                                <td class="px-8 py-5">
                                    <div class="flex items-center gap-3">
                                        <div class="w-10 h-10 rounded-lg bg-surface-container-highest flex items-center justify-center">
                                            <span class="material-symbols-outlined text-primary">cookie</span>
                                        </div>
                                        <div>
                                            <p class="text-body-md font-bold text-on-surface leading-tight">Galletas Oreo</p>
                                            <p class="text-label-sm text-on-surface-variant">Snacks dulces</p>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-8 py-5 text-center">
                                    <span class="text-headline-md font-bold text-on-surface">6</span> <span class="text-label-sm text-on-surface-variant">und</span>
                                </td>
                                <td class="px-8 py-5 text-center text-body-md text-on-surface-variant">5 und</td>
                                <td class="px-8 py-5 text-right font-mono text-body-md">S/ 1.00</td>
                                <td class="px-8 py-5 text-right font-mono text-body-md">S/ 2.00</td>
                                <td class="px-8 py-5 text-center">
                                    <span class="px-3 py-1 bg-secondary-container text-on-secondary-container rounded-full text-label-sm font-bold">Límite</span>
                                </td>
                            </tr>
                            
                            <tr class="hover:bg-surface-container/50 transition-colors">
                                <td class="px-8 py-5">
                                    <div class="flex items-center gap-3">
                                        <div class="w-10 h-10 rounded-lg bg-surface-container-highest flex items-center justify-center">
                                            <span class="material-symbols-outlined text-primary">egg</span>
                                        </div>
                                        <div>
                                            <p class="text-body-md font-bold text-on-surface leading-tight">Huevo</p>
                                            <p class="text-label-sm text-on-surface-variant">Abarrotes</p>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-8 py-5 text-center">
                                    <span class="text-headline-md font-bold text-on-surface">12.00</span> <span class="text-label-sm text-on-surface-variant">kg</span>
                                </td>
                                <td class="px-8 py-5 text-center text-body-md text-on-surface-variant">6.00 kg</td>
                                <td class="px-8 py-5 text-right font-mono text-body-md">S/ 4.00</td>
                                <td class="px-8 py-5 text-right font-mono text-body-md">S/ 5.20</td>
                                <td class="px-8 py-5 text-center">
                                    <span class="px-3 py-1 bg-primary-fixed text-on-primary-fixed-variant rounded-full text-label-sm font-bold">Saludable</span>
                                </td>
                            </tr>
                            
                            <!-- Large Scale Item -->
                            <tr class="hover:bg-surface-container/50 transition-colors">
                                <td class="px-8 py-5">
                                    <div class="flex items-center gap-3">
                                        <div class="w-10 h-10 rounded-lg bg-surface-container-highest flex items-center justify-center">
                                            <span class="material-symbols-outlined text-primary">grain</span>
                                        </div>
                                        <div>
                                            <p class="text-body-md font-bold text-on-surface leading-tight">Maiz entero</p>
                                            <p class="text-label-sm text-on-surface-variant">Granos y cereales</p>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-8 py-5 text-center">
                                    <span class="text-headline-md font-bold text-on-surface">30,000.00</span> <span class="text-label-sm text-on-surface-variant">kg</span>
                                </td>
                                <td class="px-8 py-5 text-center text-body-md text-on-surface-variant">1,000.00 kg</td>
                                <td class="px-8 py-5 text-right font-mono text-body-md">S/ 1.20</td>
                                <td class="px-8 py-5 text-right font-mono text-body-md">S/ 1.70</td>
                                <td class="px-8 py-5 text-center">
                                    <span class="px-3 py-1 bg-primary-fixed text-on-primary-fixed-variant rounded-full text-label-sm font-bold">Sobre-stock</span>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="px-8 py-6 bg-surface-container-low/30 border-t border-outline-variant/30 flex justify-between items-center">
                    <p class="text-label-md text-on-surface-variant">Mostrando 1-10 de 156 productos</p>
                    <div class="flex items-center gap-2">
                        <button class="w-10 h-10 rounded-lg flex items-center justify-center border border-outline-variant hover:bg-surface-container-high transition-colors">
                            <span class="material-symbols-outlined">chevron_left</span>
                        </button>
                        <button class="w-10 h-10 rounded-lg flex items-center justify-center bg-primary text-white font-bold">1</button>
                        <button class="w-10 h-10 rounded-lg flex items-center justify-center border border-outline-variant hover:bg-surface-container-high transition-colors">2</button>
                        <button class="w-10 h-10 rounded-lg flex items-center justify-center border border-outline-variant hover:bg-surface-container-high transition-colors">3</button>
                        <button class="w-10 h-10 rounded-lg flex items-center justify-center border border-outline-variant hover:bg-surface-container-high transition-colors">
                            <span class="material-symbols-outlined">chevron_right</span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/exceljs@4.4.0/dist/exceljs.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf-autotable/3.8.2/jspdf.plugin.autotable.min.js"></script>

    <!-- Print Styles -->
    <style>
        @media print {
            body * { visibility: hidden !important; }
            #print-inv-area, #print-inv-area * { visibility: visible !important; }
            #print-inv-area {
                position: fixed;
                top: 0; left: 0;
                width: 100%;
                background: white;
                padding: 24px 32px;
                font-family: Arial, sans-serif;
                font-size: 12px;
                color: #111;
            }
        }
    </style>

    <!-- Área de impresión (oculta en pantalla) -->
    <div id="print-inv-area" style="display:none;">
        <div style="display:flex; justify-content:space-between; font-size:11px; color:#555; margin-bottom:8px;">
            <span id="inv-datetime"></span>
            <span>GestionPRO — Sistema de Gestión</span>
        </div>
        <h2 style="font-size:20px; font-weight:bold; margin-bottom:4px;">📦 Reporte de Inventario</h2>
        <p style="font-size:11px; color:#03645c; margin-bottom:16px;">Generado el: <strong id="inv-gendate"></strong></p>

        <!-- Resumen rápido -->
        <h3 style="font-size:14px; font-weight:bold; margin-bottom:6px; border-bottom:2px solid #03645c; padding-bottom:3px;">Resumen del Inventario</h3>
        <table style="width:100%; border-collapse:collapse; margin-bottom:16px; font-size:12px;">
            <tr style="background:#f5f5f5;">
                <td style="border:1px solid #ccc; padding:5px 10px;">Valor Total (precio costo)</td>
                <td style="border:1px solid #ccc; padding:5px 10px; color:#03645c; font-weight:bold;">S/ 36,234.76</td>
            </tr>
            <tr>
                <td style="border:1px solid #ccc; padding:5px 10px;">Productos con Stock Crítico</td>
                <td style="border:1px solid #ccc; padding:5px 10px; color:#ba1a1a; font-weight:bold;">3</td>
            </tr>
            <tr style="background:#f5f5f5;">
                <td style="border:1px solid #ccc; padding:5px 10px;">Total de Productos</td>
                <td style="border:1px solid #ccc; padding:5px 10px;">156</td>
            </tr>
        </table>

        <!-- Estado del Stock -->
        <h3 style="font-size:14px; font-weight:bold; margin-bottom:6px; border-bottom:2px solid #03645c; padding-bottom:3px;">Estado Actual del Stock</h3>
        <table style="width:100%; border-collapse:collapse; margin-bottom:16px; font-size:11px;">
            <thead>
                <tr style="background:#03645c; color:#fff;">
                    <th style="border:1px solid #ccc; padding:5px 8px;">Producto</th>
                    <th style="border:1px solid #ccc; padding:5px 8px; text-align:center;">Categoría</th>
                    <th style="border:1px solid #ccc; padding:5px 8px; text-align:center;">Stock Actual</th>
                    <th style="border:1px solid #ccc; padding:5px 8px; text-align:center;">Stock Mínimo</th>
                    <th style="border:1px solid #ccc; padding:5px 8px; text-align:right;">Precio Costo</th>
                    <th style="border:1px solid #ccc; padding:5px 8px; text-align:right;">Precio Venta</th>
                    <th style="border:1px solid #ccc; padding:5px 8px; text-align:center;">Estado</th>
                </tr>
            </thead>
            <tbody>
                <tr style="background:#fff0f0;">
                    <td style="border:1px solid #ccc; padding:5px 8px;">Camote rojo</td>
                    <td style="border:1px solid #ccc; padding:5px 8px; text-align:center;">Tubérculos frescos</td>
                    <td style="border:1px solid #ccc; padding:5px 8px; text-align:center; color:#ba1a1a; font-weight:bold;">2.30 kg</td>
                    <td style="border:1px solid #ccc; padding:5px 8px; text-align:center;">1.00 kg</td>
                    <td style="border:1px solid #ccc; padding:5px 8px; text-align:right;">S/ 1.20</td>
                    <td style="border:1px solid #ccc; padding:5px 8px; text-align:right;">S/ 2.10</td>
                    <td style="border:1px solid #ccc; padding:5px 8px; text-align:center; color:#954912; font-weight:bold;">Bajo Stock</td>
                </tr>
                <tr>
                    <td style="border:1px solid #ccc; padding:5px 8px;">Doritos</td>
                    <td style="border:1px solid #ccc; padding:5px 8px; text-align:center;">Snacks salados</td>
                    <td style="border:1px solid #ccc; padding:5px 8px; text-align:center;">15 und</td>
                    <td style="border:1px solid #ccc; padding:5px 8px; text-align:center;">5 und</td>
                    <td style="border:1px solid #ccc; padding:5px 8px; text-align:right;">S/ 1.20</td>
                    <td style="border:1px solid #ccc; padding:5px 8px; text-align:right;">S/ 2.00</td>
                    <td style="border:1px solid #ccc; padding:5px 8px; text-align:center; color:#03645c; font-weight:bold;">Saludable</td>
                </tr>
                <tr style="background:#f5f5f5;">
                    <td style="border:1px solid #ccc; padding:5px 8px;">Galletas Oreo</td>
                    <td style="border:1px solid #ccc; padding:5px 8px; text-align:center;">Snacks dulces</td>
                    <td style="border:1px solid #ccc; padding:5px 8px; text-align:center;">6 und</td>
                    <td style="border:1px solid #ccc; padding:5px 8px; text-align:center;">5 und</td>
                    <td style="border:1px solid #ccc; padding:5px 8px; text-align:right;">S/ 1.00</td>
                    <td style="border:1px solid #ccc; padding:5px 8px; text-align:right;">S/ 2.00</td>
                    <td style="border:1px solid #ccc; padding:5px 8px; text-align:center; color:#954912; font-weight:bold;">Límite</td>
                </tr>
                <tr>
                    <td style="border:1px solid #ccc; padding:5px 8px;">Huevo</td>
                    <td style="border:1px solid #ccc; padding:5px 8px; text-align:center;">Abarrotes</td>
                    <td style="border:1px solid #ccc; padding:5px 8px; text-align:center;">12.00 kg</td>
                    <td style="border:1px solid #ccc; padding:5px 8px; text-align:center;">6.00 kg</td>
                    <td style="border:1px solid #ccc; padding:5px 8px; text-align:right;">S/ 4.00</td>
                    <td style="border:1px solid #ccc; padding:5px 8px; text-align:right;">S/ 5.20</td>
                    <td style="border:1px solid #ccc; padding:5px 8px; text-align:center; color:#03645c; font-weight:bold;">Saludable</td>
                </tr>
                <tr style="background:#f5f5f5;">
                    <td style="border:1px solid #ccc; padding:5px 8px;">Maiz entero</td>
                    <td style="border:1px solid #ccc; padding:5px 8px; text-align:center;">Granos y cereales</td>
                    <td style="border:1px solid #ccc; padding:5px 8px; text-align:center;">30,000.00 kg</td>
                    <td style="border:1px solid #ccc; padding:5px 8px; text-align:center;">1,000.00 kg</td>
                    <td style="border:1px solid #ccc; padding:5px 8px; text-align:right;">S/ 1.20</td>
                    <td style="border:1px solid #ccc; padding:5px 8px; text-align:right;">S/ 1.70</td>
                    <td style="border:1px solid #ccc; padding:5px 8px; text-align:center; color:#03645c; font-weight:bold;">Sobre-stock</td>
                </tr>
            </tbody>
        </table>
        <p style="font-size:10px; color:#aaa; text-align:center; margin-top:24px;">© 2026 Pastelería Dulce Corazón · Sistema de Gestión</p>
    </div>

    <script>
        // Init print area
        (function() {
            var el = document.getElementById('inv-datetime');
            if(el) el.textContent = new Date().toLocaleString('es-PE');
            var el2 = document.getElementById('inv-gendate');
            if(el2) el2.textContent = new Date().toLocaleDateString('es-PE');
        })();

        // ---------- Imprimir ----------
        function printReport() {
            var area = document.getElementById('print-inv-area');
            area.style.display = 'block';
            window.print();
            area.style.display = 'none';
        }

        // ---------- Exportar Excel (con estilos via ExcelJS) ----------
        async function exportExcelInventory() {
            var fecha  = new Date().toLocaleDateString('es-PE');
            var titulo = 'Reporte de Inventario — ' + fecha;

            var workbook = new ExcelJS.Workbook();
            workbook.creator = 'GestionPRO';
            var ws = workbook.addWorksheet('Inventario', { pageSetup: { paperSize: 9, orientation: 'landscape' } });

            ws.columns = [
                { width: 24 }, { width: 22 }, { width: 16 }, { width: 15 },
                { width: 14 }, { width: 14 }, { width: 14 }
            ];

            var GREEN  = { argb: 'FF03645C' };
            var GREEN_L= { argb: 'FFD7FFF8' };
            var ORANGE = { argb: 'FF954912' };
            var RED    = { argb: 'FFBA1A1A' };
            var RED_BG = { argb: 'FFFFDAD6' };
            var GRAY_H = { argb: 'FFF0F4F4' };
            var WHITE  = { argb: 'FFFFFFFF' };
            var MID    = { argb: 'FF6F7977' };
            var DARK   = { argb: 'FF005049' };

            var thin = {
                top:    { style: 'thin', color: { argb: 'FFBEC9C6' } },
                left:   { style: 'thin', color: { argb: 'FFBEC9C6' } },
                bottom: { style: 'thin', color: { argb: 'FFBEC9C6' } },
                right:  { style: 'thin', color: { argb: 'FFBEC9C6' } }
            };
            var med = {
                top:    { style: 'medium', color: { argb: 'FF03645C' } },
                left:   { style: 'medium', color: { argb: 'FF03645C' } },
                bottom: { style: 'medium', color: { argb: 'FF03645C' } },
                right:  { style: 'medium', color: { argb: 'FF03645C' } }
            };

            function secHdr(text, row, span) {
                var c = ws.getCell(row, 1);
                c.value = text;
                c.font  = { bold: true, size: 13, color: WHITE };
                c.fill  = { type: 'pattern', pattern: 'solid', fgColor: GREEN };
                c.alignment = { vertical: 'middle', horizontal: 'left', indent: 1 };
                c.border = med;
                ws.mergeCells(row, 1, row, span);
                ws.getRow(row).height = 22;
            }

            function colHdr(vals, row) {
                vals.forEach(function(v, i) {
                    var c = ws.getCell(row, i + 1);
                    c.value = v;
                    c.font  = { bold: true, size: 10, color: WHITE };
                    c.fill  = { type: 'pattern', pattern: 'solid', fgColor: ORANGE };
                    c.alignment = { vertical: 'middle', horizontal: 'center', wrapText: true };
                    c.border = thin;
                });
                ws.getRow(row).height = 18;
            }

            function dataR(vals, row, alt) {
                vals.forEach(function(v, i) {
                    var c = ws.getCell(row, i + 1);
                    c.value = v;
                    c.font  = { size: 9 };
                    c.fill  = { type: 'pattern', pattern: 'solid', fgColor: alt ? GRAY_H : WHITE };
                    c.alignment = { vertical: 'middle', wrapText: true };
                    c.border = thin;
                });
                ws.getRow(row).height = 16;
            }

            // === TÍTULO ===
            var tc = ws.getCell(1, 1);
            tc.value = titulo;
            tc.font  = { bold: true, size: 16, color: WHITE };
            tc.fill  = { type: 'pattern', pattern: 'solid', fgColor: DARK };
            tc.alignment = { vertical: 'middle', horizontal: 'left', indent: 1 };
            ws.mergeCells(1, 1, 1, 7);
            ws.getRow(1).height = 30;

            var sc = ws.getCell(2, 1);
            sc.value = 'Generado el: ' + fecha;
            sc.font  = { italic: true, size: 9, color: MID };
            sc.fill  = { type: 'pattern', pattern: 'solid', fgColor: GREEN_L };
            sc.alignment = { indent: 1 };
            ws.mergeCells(2, 1, 2, 7);
            ws.getRow(2).height = 14;

            ws.getRow(3).height = 8;

            // === RESUMEN ===
            secHdr('Resumen del Inventario', 4, 2);
            colHdr(['Concepto', 'Valor'], 5);
            dataR(['Valor Total (precio costo)', 'S/ 36,234.76'], 6, false);
            ws.getCell(6, 2).font = { bold: true, size: 9, color: GREEN };
            dataR(['Productos con Stock Crítico', '3'], 7, true);
            ws.getCell(7, 2).font = { bold: true, size: 9, color: RED };
            dataR(['Total de Productos', '156'], 8, false);

            ws.getRow(9).height = 8;

            // === ESTADO DEL STOCK ===
            secHdr('Estado Actual del Stock', 10, 7);
            colHdr(['Producto', 'Categoría', 'Stock Actual', 'Stock Mínimo', 'Precio Costo', 'Precio Venta', 'Estado'], 11);

            var stockData = [
                ['Camote rojo',  'Tubérculos frescos', '2.30 kg',       '1.00 kg',     'S/ 1.20', 'S/ 2.10', 'Bajo Stock',  'danger'],
                ['Doritos',      'Snacks salados',     '15 und',         '5 und',       'S/ 1.20', 'S/ 2.00', 'Saludable',   'ok'],
                ['Galletas Oreo','Snacks dulces',      '6 und',          '5 und',       'S/ 1.00', 'S/ 2.00', 'Límite',      'warn'],
                ['Huevo',        'Abarrotes',          '12.00 kg',       '6.00 kg',     'S/ 4.00', 'S/ 5.20', 'Saludable',   'ok'],
                ['Maiz entero',  'Granos y cereales',  '30,000.00 kg',   '1,000.00 kg', 'S/ 1.20', 'S/ 1.70', 'Sobre-stock', 'ok'],
            ];

            stockData.forEach(function(row, idx) {
                var rn = 12 + idx;
                var isAlt = idx % 2 !== 0;
                dataR(row.slice(0, 7), rn, isAlt);
                // Color estado
                var statusCell = ws.getCell(rn, 7);
                if (row[7] === 'danger') {
                    statusCell.font = { bold: true, size: 9, color: RED };
                    statusCell.fill = { type: 'pattern', pattern: 'solid', fgColor: RED_BG };
                } else if (row[7] === 'warn') {
                    statusCell.font = { bold: true, size: 9, color: ORANGE };
                } else {
                    statusCell.font = { bold: true, size: 9, color: GREEN };
                }
            });

            // === DESCARGAR ===
            var buffer = await workbook.xlsx.writeBuffer();
            var blob   = new Blob([buffer], { type: 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet' });
            var url    = URL.createObjectURL(blob);
            var a      = document.createElement('a');
            a.href     = url;
            a.download = 'reporte_inventario_' + new Date().toISOString().slice(0,10) + '.xlsx';
            a.click();
            URL.revokeObjectURL(url);
        }

        // ---------- Exportar PDF (estructurado) ----------
        function exportPdfInventory() {
            var { jsPDF } = window.jspdf;
            var doc = new jsPDF({ orientation: 'landscape', unit: 'mm', format: 'a4' });
            var pageW = doc.internal.pageSize.getWidth();

            // Cabecera
            doc.setFontSize(8);
            doc.setTextColor(120,120,120);
            doc.text(new Date().toLocaleString('es-PE'), 14, 10);
            doc.text('GestionPRO — Sistema de Gestión', pageW - 14, 10, { align: 'right' });

            // Título
            doc.setFontSize(20);
            doc.setFont('helvetica', 'bold');
            doc.setTextColor(30, 30, 30);
            doc.text('Reporte de Inventario', 14, 22);

            // Subtítulo
            doc.setFontSize(10);
            doc.setFont('helvetica', 'normal');
            doc.setTextColor(3, 100, 92);
            doc.text('Generado el: ' + new Date().toLocaleDateString('es-PE'), 14, 29);

            var y = 37;

            // Resumen
            doc.setFontSize(13);
            doc.setFont('helvetica', 'bold');
            doc.setTextColor(30,30,30);
            doc.text('Resumen del Inventario', 14, y); y += 2;

            doc.autoTable({
                startY: y,
                head: [],
                body: [
                    ['Valor Total (precio costo)', 'S/ 36,234.76'],
                    ['Productos con Stock Crítico', '3'],
                    ['Total de Productos', '156'],
                ],
                styles: { fontSize: 10, cellPadding: 3 },
                columnStyles: {
                    0: { cellWidth: 100 },
                    1: { cellWidth: 80, textColor: [3,100,92], fontStyle: 'bold' }
                },
                alternateRowStyles: { fillColor: [245,245,245] },
                theme: 'grid',
            });

            y = doc.lastAutoTable.finalY + 10;

            // Estado del Stock
            doc.setFontSize(13);
            doc.setFont('helvetica', 'bold');
            doc.setTextColor(30,30,30);
            doc.text('Estado Actual del Stock', 14, y); y += 2;

            doc.autoTable({
                startY: y,
                head: [['Producto', 'Categoría', 'Stock Actual', 'Stock Mín.', 'P. Costo', 'P. Venta', 'Estado']],
                body: [
                    ['Camote rojo',  'Tubérculos frescos', '2.30 kg',       '1.00 kg',     'S/ 1.20', 'S/ 2.10', 'Bajo Stock'],
                    ['Doritos',      'Snacks salados',     '15 und',         '5 und',       'S/ 1.20', 'S/ 2.00', 'Saludable'],
                    ['Galletas Oreo','Snacks dulces',      '6 und',          '5 und',       'S/ 1.00', 'S/ 2.00', 'Límite'],
                    ['Huevo',        'Abarrotes',          '12.00 kg',       '6.00 kg',     'S/ 4.00', 'S/ 5.20', 'Saludable'],
                    ['Maiz entero',  'Granos y cereales',  '30,000.00 kg',   '1,000.00 kg', 'S/ 1.20', 'S/ 1.70', 'Sobre-stock'],
                ],
                styles: { fontSize: 9, cellPadding: 3 },
                headStyles: { fillColor: [3, 100, 92], textColor: [255,255,255], fontStyle: 'bold', halign: 'center' },
                bodyStyles: { halign: 'center' },
                columnStyles: { 0: { halign: 'left' }, 1: { halign: 'left' } },
                didDrawCell: function(data) {
                    if (data.section === 'body' && data.column.index === 6) {
                        var val = data.cell.raw;
                        if (val === 'Bajo Stock' || val === 'Límite') {
                            doc.setTextColor(186, 26, 26);
                        } else {
                            doc.setTextColor(3, 100, 92);
                        }
                    }
                },
                theme: 'grid',
            });

            // Pie de página
            var totalPages = doc.internal.getNumberOfPages();
            for (var i = 1; i <= totalPages; i++) {
                doc.setPage(i);
                doc.setFontSize(8);
                doc.setTextColor(180,180,180);
                doc.text('© 2026 Pastelería Dulce Corazón · Sistema de Gestión', pageW / 2, 205, { align: 'center' });
                doc.text('Página ' + i + ' / ' + totalPages, pageW - 14, 205, { align: 'right' });
            }

            doc.save('reporte_inventario_' + new Date().toISOString().slice(0,10) + '.pdf');
        }
    </script>
</x-layouts.app>

