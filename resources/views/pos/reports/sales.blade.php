<x-layouts.app active="reports" title="Reporte de Ventas">
        <!-- Content Canvas -->
        <div class="p-gutter">
            <!-- Title and Action Bar -->
            <div class="flex justify-between items-center mb-stack-lg">
                <div class="flex items-center gap-3">
                    <span class="material-symbols-outlined text-primary text-3xl">analytics</span>
                    <h2 class="text-headline-xl font-bold text-on-surface tracking-tight">Reporte de Ventas</h2>
                </div>
                <a href="/reports" class="px-6 py-2 border border-outline text-on-surface-variant font-label-md rounded-lg hover:bg-surface-container-high transition-colors flex items-center gap-2">
                    <span class="material-symbols-outlined text-[18px]">arrow_back</span>
                    Volver al Menú
                </a>
            </div>

            <!-- Date Selectors & Filters -->
            <section class="bg-surface-container-lowest rounded-xl shadow-[0px_4px_12px_rgba(0,0,0,0.05)] p-6 mb-stack-lg border border-outline-variant/30">
                <div class="flex flex-col lg:flex-row items-end gap-gutter">
                    <div class="flex-1 w-full lg:w-auto">
                        <label class="block text-label-md text-on-surface-variant mb-2 ml-1">FECHA DE INICIO</label>
                        <div class="relative">
                            <input class="w-full bg-surface-bright border border-outline-variant rounded-lg px-4 py-3 focus:border-primary focus:ring-1 focus:ring-primary transition-all text-body-md outline-none" type="date" value="2026-07-01"/>
                        </div>
                    </div>
                    <div class="flex-1 w-full lg:w-auto">
                        <label class="block text-label-md text-on-surface-variant mb-2 ml-1">FECHA DE FIN</label>
                        <div class="relative">
                            <input class="w-full bg-surface-bright border border-outline-variant rounded-lg px-4 py-3 focus:border-primary focus:ring-1 focus:ring-primary transition-all text-body-md outline-none" type="date" value="2026-07-31"/>
                        </div>
                    </div>
                    <button class="bg-primary text-on-primary font-bold px-8 py-3.5 rounded-lg hover:brightness-110 active:scale-[0.98] transition-all shadow-md flex items-center gap-2 w-full lg:w-auto justify-center">
                        <span class="material-symbols-outlined">refresh</span>
                        Generar Reporte
                    </button>
                </div>
            </section>

            <!-- Export Actions -->
            <div class="flex flex-wrap gap-3 mb-stack-lg">
                <button onclick="printReport()" class="bg-[#1EA7FD] text-white px-5 py-2.5 rounded-lg font-bold flex items-center gap-2 text-label-md shadow-sm hover:opacity-90 transition-opacity">
                    <span class="material-symbols-outlined text-[18px]">print</span>
                    Imprimir
                </button>
                <button onclick="exportExcelSales()" class="bg-[#21A366] text-white px-5 py-2.5 rounded-lg font-bold flex items-center gap-2 text-label-md shadow-sm hover:opacity-90 transition-opacity">
                    <span class="material-symbols-outlined text-[18px]">table_view</span>
                    Exportar a Excel
                </button>
                <button onclick="exportPdfSales()" class="bg-[#E53935] text-white px-5 py-2.5 rounded-lg font-bold flex items-center gap-2 text-label-md shadow-sm hover:opacity-90 transition-opacity">
                    <span class="material-symbols-outlined text-[18px]">picture_as_pdf</span>
                    Exportar a PDF
                </button>
            </div>

            <!-- Dashboard Summary Grid (Bento Style) -->
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-gutter mb-stack-lg">
                <!-- Resumen General -->
                <div class="lg:col-span-4 bg-surface-container-lowest rounded-xl p-card-padding shadow-[0px_4px_12px_rgba(0,0,0,0.05)] border border-outline-variant/30">
                    <div class="flex items-center gap-3 mb-6">
                        <div class="p-2 bg-primary/10 rounded-lg text-primary">
                            <span class="material-symbols-outlined">leaderboard</span>
                        </div>
                        <h3 class="text-headline-md font-bold text-on-surface">Resumen General</h3>
                    </div>
                    <div class="space-y-4">
                        <div class="flex justify-between items-center py-2 border-b border-outline-variant/20">
                            <span class="text-on-surface-variant font-medium">Total Ingresos:</span>
                            <span class="text-headline-md font-bold text-primary">S/ 0.00</span>
                        </div>
                        <div class="flex justify-between items-center py-2 border-b border-outline-variant/20">
                            <span class="text-on-surface-variant font-medium">Total Costos:</span>
                            <span class="text-headline-md font-bold text-error">S/ 0.00</span>
                        </div>
                        <div class="flex justify-between items-center py-2 border-b border-outline-variant/20">
                            <span class="text-on-surface-variant font-medium">Ganancia Neta:</span>
                            <span class="text-headline-md font-bold text-primary">S/ 0.00</span>
                        </div>
                        <div class="mt-6 pt-4 flex items-center gap-2">
                            <span class="text-body-lg text-on-surface-variant">Número de Ventas:</span>
                            <span class="text-headline-md font-bold text-on-surface">0</span>
                        </div>
                    </div>
                </div>

                <!-- Top 5 Productos -->
                <div class="lg:col-span-4 bg-surface-container-lowest rounded-xl p-card-padding shadow-[0px_4px_12px_rgba(0,0,0,0.05)] border border-outline-variant/30 flex flex-col">
                    <div class="flex items-center gap-3 mb-6">
                        <div class="p-2 bg-secondary/10 rounded-lg text-secondary">
                            <span class="material-symbols-outlined">stars</span>
                        </div>
                        <h3 class="text-headline-md font-bold text-on-surface">Top 5 Productos</h3>
                    </div>
                    <div class="flex-1 flex flex-col items-center justify-center text-center p-8 bg-surface-container/30 rounded-lg border border-dashed border-outline-variant">
                        <span class="material-symbols-outlined text-4xl text-on-surface-variant/30 mb-2">inventory</span>
                        <p class="text-on-surface-variant italic">No hay datos suficientes para el período seleccionado.</p>
                    </div>
                </div>

                <!-- Margen de Ganancia -->
                <div class="lg:col-span-4 bg-surface-container-lowest rounded-xl p-card-padding shadow-[0px_4px_12px_rgba(0,0,0,0.05)] border border-outline-variant/30 flex flex-col items-center justify-center relative overflow-hidden">
                    <div class="absolute top-4 left-4 p-2 bg-primary/10 rounded-lg text-primary">
                        <span class="material-symbols-outlined">pie_chart</span>
                    </div>
                    <div class="text-center">
                        <h3 class="text-label-md font-bold text-on-surface-variant uppercase tracking-widest mb-2">Margen de Ganancia</h3>
                        <div class="text-[64px] font-extrabold text-primary leading-none mb-4">0.0%</div>
                        <p class="text-label-md text-on-surface-variant max-w-[200px]">Porcentaje de ganancia sobre ingresos totales del período.</p>
                    </div>
                    <!-- Decorative Element -->
                    <div class="absolute -bottom-6 -right-6 opacity-5 pointer-events-none">
                        <span class="material-symbols-outlined text-[120px]">percent</span>
                    </div>
                </div>
            </div>

            <!-- Detailed Sales Table -->
            <section id="printable-area" class="bg-surface-container-lowest rounded-xl shadow-[0px_4px_12px_rgba(0,0,0,0.05)] border border-outline-variant/30 overflow-hidden">
                <div class="px-6 py-5 border-b border-outline-variant/30 bg-surface-container-low flex items-center gap-3">
                    <span class="material-symbols-outlined text-primary">list_alt</span>
                    <h3 class="text-headline-md font-bold text-on-surface">Detalle de Ventas — Costo vs. Venta</h3>
                </div>
                <div class="overflow-x-auto custom-scrollbar">
                    <table class="w-full text-left border-collapse">
                        <thead>
                            <tr class="bg-surface-container-high/50 text-label-md text-on-surface-variant uppercase tracking-wider">
                                <th class="px-6 py-4 font-semibold"># VENTA</th>
                                <th class="px-6 py-4 font-semibold">FECHA</th>
                                <th class="px-6 py-4 font-semibold">PRODUCTO</th>
                                <th class="px-6 py-4 font-semibold">CANT.</th>
                                <th class="px-6 py-4 font-semibold text-right">P. COSTO</th>
                                <th class="px-6 py-4 font-semibold text-right">P. VENTA</th>
                                <th class="px-6 py-4 font-semibold text-right">SUBTOTAL COSTO</th>
                                <th class="px-6 py-4 font-semibold text-right">SUBTOTAL VENTA</th>
                                <th class="px-6 py-4 font-semibold text-right">GANANCIA</th>
                                <th class="px-6 py-4 font-semibold">MÉTODO</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-outline-variant/20">
                            <!-- Empty State Table -->
                            <tr>
                                <td class="px-6 py-20 text-center" colspan="10">
                                    <div class="flex flex-col items-center">
                                        <span class="material-symbols-outlined text-5xl text-on-surface-variant/20 mb-4">search_off</span>
                                        <p class="text-body-lg text-on-surface-variant/60 font-medium">No hay ventas registradas en este período.</p>
                                        <p class="text-label-md text-on-surface-variant/40 mt-1">Intente cambiar los filtros de fecha para visualizar información.</p>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <!-- Table Footer/Pagination placeholder -->
                <div class="px-6 py-4 bg-surface-container-lowest border-t border-outline-variant/30 flex justify-between items-center">
                    <p class="text-label-md text-on-surface-variant">Mostrando 0 de 0 registros</p>
                    <div class="flex gap-2">
                        <button class="p-2 rounded hover:bg-surface-container text-on-surface-variant/30 transition-colors" disabled>
                            <span class="material-symbols-outlined">chevron_left</span>
                        </button>
                        <button class="p-2 rounded hover:bg-surface-container text-on-surface-variant/30 transition-colors" disabled>
                            <span class="material-symbols-outlined">chevron_right</span>
                        </button>
                    </div>
                </div>
            </section>
        </div>

        <!-- Footer -->
        <footer class="mt-stack-lg px-gutter py-8 text-center border-t border-outline-variant/20">
            <p class="text-label-md text-on-surface-variant/50">© 2026 Artisan POS — Sistema de Gestión Panadera. Todos los derechos reservados.</p>
        </footer>

    <!-- Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/exceljs@4.4.0/dist/exceljs.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf-autotable/3.8.2/jspdf.plugin.autotable.min.js"></script>

    <!-- Print Styles: solo muestra el contenido del reporte, igual a la referencia -->
    <style>
        @media print {
            /* Ocultar todo */
            body * { visibility: hidden !important; }
            /* Mostrar solo el area de impresión */
            #print-report-area, #print-report-area * { visibility: visible !important; }
            #print-report-area {
                position: fixed;
                top: 0; left: 0;
                width: 100%;
                background: white;
                padding: 24px 32px;
                font-family: Arial, sans-serif;
                font-size: 12px;
                color: #111;
            }
            #print-report-area .no-print { display: none !important; }
        }
    </style>

    <!-- Area de impresión (oculta en pantalla, visible al imprimir) -->
    <div id="print-report-area" style="display:none;">
        <div style="display:flex; justify-content:space-between; font-size:11px; color:#555; margin-bottom:8px;">
            <span id="pr-datetime"></span>
            <span>GestionPRO — Sistema de Gestión</span>
        </div>
        <h2 style="font-size:20px; font-weight:bold; margin-bottom:4px;">📊 Reporte de Ventas</h2>
        <div style="display:flex; gap:12px; margin-bottom:16px;">
            <span style="font-size:11px; color:#555;">Fecha de Inicio: <strong id="pr-from"></strong></span>
            <span style="font-size:11px; color:#555;">Fecha de Fin: <strong id="pr-to"></strong></span>
        </div>

        <!-- Resumen General -->
        <h3 style="font-size:14px; font-weight:bold; margin-bottom:6px; border-bottom:2px solid #03645c; padding-bottom:3px;">Resumen General</h3>
        <table style="width:100%; border-collapse:collapse; margin-bottom:16px; font-size:12px;">
            <tr style="background:#f5f5f5;">
                <td style="border:1px solid #ccc; padding:5px 10px;">Total de Ingresos</td>
                <td style="border:1px solid #ccc; padding:5px 10px; color:#03645c; font-weight:bold;">S/0.00</td>
            </tr>
            <tr>
                <td style="border:1px solid #ccc; padding:5px 10px;">Total de Costos</td>
                <td style="border:1px solid #ccc; padding:5px 10px; color:#ba1a1a; font-weight:bold;">S/0.00</td>
            </tr>
            <tr style="background:#f5f5f5;">
                <td style="border:1px solid #ccc; padding:5px 10px;">Ganancia Neta</td>
                <td style="border:1px solid #ccc; padding:5px 10px; color:#03645c; font-weight:bold;">S/0.00</td>
            </tr>
            <tr>
                <td style="border:1px solid #ccc; padding:5px 10px;">Numero de Ventas</td>
                <td style="border:1px solid #ccc; padding:5px 10px;">0</td>
            </tr>
        </table>

        <!-- Top 5 -->
        <h3 style="font-size:14px; font-weight:bold; margin-bottom:6px; border-bottom:2px solid #03645c; padding-bottom:3px;">Top 5 Productos Mas Vendidos</h3>
        <table style="width:100%; border-collapse:collapse; margin-bottom:16px; font-size:12px;">
            <thead>
                <tr style="background:#03645c; color:#fff;">
                    <th style="border:1px solid #ccc; padding:5px 10px; text-align:center;">Producto</th>
                    <th style="border:1px solid #ccc; padding:5px 10px; text-align:center;">Cantidad Vendida</th>
                </tr>
            </thead>
            <tbody>
                <tr><td colspan="2" style="border:1px solid #ccc; padding:10px; text-align:center; color:#888;">No hay datos para este período.</td></tr>
            </tbody>
        </table>

        <!-- Detalle de Ventas -->
        <h3 style="font-size:14px; font-weight:bold; margin-bottom:6px; border-bottom:2px solid #03645c; padding-bottom:3px;">Detalle de Ventas — Costo vs. Venta</h3>
        <table style="width:100%; border-collapse:collapse; margin-bottom:16px; font-size:11px;">
            <thead>
                <tr style="background:#03645c; color:#fff;">
                    <th style="border:1px solid #ccc; padding:4px 6px;"># Venta</th>
                    <th style="border:1px solid #ccc; padding:4px 6px;">Fecha</th>
                    <th style="border:1px solid #ccc; padding:4px 6px;">Producto</th>
                    <th style="border:1px solid #ccc; padding:4px 6px;">Cant.</th>
                    <th style="border:1px solid #ccc; padding:4px 6px;">P. Costo</th>
                    <th style="border:1px solid #ccc; padding:4px 6px;">P. Venta</th>
                    <th style="border:1px solid #ccc; padding:4px 6px;">Subtotal Costo</th>
                    <th style="border:1px solid #ccc; padding:4px 6px;">Subtotal Venta</th>
                    <th style="border:1px solid #ccc; padding:4px 6px;">Ganancia</th>
                    <th style="border:1px solid #ccc; padding:4px 6px;">Metodo Pago</th>
                </tr>
            </thead>
            <tbody>
                <tr><td colspan="10" style="border:1px solid #ccc; padding:10px; text-align:center; color:#888;">No hay ventas registradas en este período.</td></tr>
            </tbody>
        </table>
        <p style="font-size:10px; color:#aaa; text-align:center; margin-top:24px;">© 2026 Pastelería Dulce Corazón · Sistema de Gestión</p>
    </div>

    <script>
        // Rellenar fechas del area de impresión
        (function() {
            var inputs = document.querySelectorAll('input[type=date]');
            var from = inputs[0] ? inputs[0].value : '';
            var to   = inputs[1] ? inputs[1].value : '';
            var el = document.getElementById('pr-from'); if(el) el.textContent = from;
            var el2 = document.getElementById('pr-to');  if(el2) el2.textContent = to;
            var el3 = document.getElementById('pr-datetime');
            if(el3) el3.textContent = new Date().toLocaleString('es-PE');
        })();

        // Actualizar fechas al cambiar inputs
        document.querySelectorAll('input[type=date]').forEach(function(input, idx) {
            input.addEventListener('change', function() {
                var inputs2 = document.querySelectorAll('input[type=date]');
                var f = document.getElementById('pr-from');
                var t = document.getElementById('pr-to');
                if(f) f.textContent = inputs2[0] ? inputs2[0].value : '';
                if(t) t.textContent = inputs2[1] ? inputs2[1].value : '';
            });
        });

        // ---------- Imprimir ----------
        function printReport() {
            var area = document.getElementById('print-report-area');
            area.style.display = 'block';
            window.print();
            area.style.display = 'none';
        }

        // ---------- Exportar Excel (con estilos via ExcelJS) ----------
        async function exportExcelSales() {
            var inputs = document.querySelectorAll('input[type=date]');
            var from = inputs[0] ? inputs[0].value : '';
            var to   = inputs[1] ? inputs[1].value : '';
            var titulo = 'Reporte de Ventas (' + from + ' al ' + to + ')';
            var fecha  = new Date().toLocaleDateString('es-PE');

            var workbook  = new ExcelJS.Workbook();
            workbook.creator = 'GestionPRO';
            var ws = workbook.addWorksheet('Reporte de Ventas', { pageSetup: { paperSize: 9, orientation: 'portrait' } });

            // Anchos de columna
            ws.columns = [
                { width: 32 }, { width: 20 }, { width: 22 }, { width: 12 },
                { width: 13 }, { width: 13 }, { width: 17 }, { width: 17 }, { width: 13 }, { width: 15 }
            ];

            var GREEN  = { argb: 'FF03645C' };
            var GREEN_L= { argb: 'FFD7FFF8' };
            var ORANGE = { argb: 'FF954912' };
            var RED    = { argb: 'FFBA1A1A' };
            var RED_L  = { argb: 'FFFFDAD6' };
            var GRAY_H = { argb: 'FFF0F4F4' };
            var WHITE  = { argb: 'FFFFFFFF' };
            var DARK   = { argb: 'FF1F1B18' };
            var MID    = { argb: 'FF6F7977' };

            var thinBorder = {
                top:    { style: 'thin', color: { argb: 'FFBEC9C6' } },
                left:   { style: 'thin', color: { argb: 'FFBEC9C6' } },
                bottom: { style: 'thin', color: { argb: 'FFBEC9C6' } },
                right:  { style: 'thin', color: { argb: 'FFBEC9C6' } }
            };
            var medBorder = {
                top:    { style: 'medium', color: { argb: 'FF03645C' } },
                left:   { style: 'medium', color: { argb: 'FF03645C' } },
                bottom: { style: 'medium', color: { argb: 'FF03645C' } },
                right:  { style: 'medium', color: { argb: 'FF03645C' } }
            };

            function sectionHeader(text, row, span) {
                var cell = ws.getCell(row, 1);
                cell.value = text;
                cell.font  = { bold: true, size: 13, color: WHITE };
                cell.fill  = { type: 'pattern', pattern: 'solid', fgColor: GREEN };
                cell.alignment = { vertical: 'middle', horizontal: 'left', indent: 1 };
                cell.border = medBorder;
                ws.mergeCells(row, 1, row, span);
                ws.getRow(row).height = 22;
            }

            function colHeader(values, row) {
                values.forEach(function(val, i) {
                    var cell = ws.getCell(row, i + 1);
                    cell.value = val;
                    cell.font  = { bold: true, size: 10, color: WHITE };
                    cell.fill  = { type: 'pattern', pattern: 'solid', fgColor: ORANGE };
                    cell.alignment = { vertical: 'middle', horizontal: 'center', wrapText: true };
                    cell.border = thinBorder;
                });
                ws.getRow(row).height = 18;
            }

            function dataRow(values, row, isAlt) {
                values.forEach(function(val, i) {
                    var cell = ws.getCell(row, i + 1);
                    cell.value = val;
                    cell.font  = { size: 9, color: { argb: 'FF1F1B18' } };
                    cell.fill  = { type: 'pattern', pattern: 'solid', fgColor: isAlt ? GRAY_H : WHITE };
                    cell.alignment = { vertical: 'middle', wrapText: true };
                    cell.border = thinBorder;
                });
                ws.getRow(row).height = 16;
            }

            // ===== FILA 1: TÍTULO PRINCIPAL =====
            var titleRow = ws.getRow(1);
            var titleCell = ws.getCell(1, 1);
            titleCell.value = titulo;
            titleCell.font  = { bold: true, size: 16, color: WHITE };
            titleCell.fill  = { type: 'pattern', pattern: 'solid', fgColor: { argb: 'FF005049' } };
            titleCell.alignment = { vertical: 'middle', horizontal: 'left', indent: 1 };
            ws.mergeCells(1, 1, 1, 10);
            titleRow.height = 30;

            // Subtítulo fecha
            var subCell = ws.getCell(2, 1);
            subCell.value = 'Generado el: ' + fecha;
            subCell.font  = { italic: true, size: 9, color: MID };
            subCell.fill  = { type: 'pattern', pattern: 'solid', fgColor: GREEN_L };
            subCell.alignment = { indent: 1 };
            ws.mergeCells(2, 1, 2, 10);
            ws.getRow(2).height = 14;

            ws.getRow(3).height = 8; // espacio

            // ===== RESUMEN GENERAL =====
            sectionHeader('Resumen General', 4, 2);
            colHeader(['Concepto', 'Valor'], 5);
            dataRow(['Total de Ingresos', 'S/ 0.00'], 6, false);
            ws.getCell(6, 2).font = { bold: true, size: 9, color: GREEN };
            dataRow(['Total de Costos', 'S/ 0.00'], 7, true);
            ws.getCell(7, 2).font = { bold: true, size: 9, color: RED };
            dataRow(['Ganancia Neta', 'S/ 0.00'], 8, false);
            ws.getCell(8, 2).font = { bold: true, size: 9, color: GREEN };
            dataRow(['Número de Ventas', '0'], 9, true);

            ws.getRow(10).height = 8; // espacio

            // ===== TOP 5 PRODUCTOS =====
            sectionHeader('Top 5 Productos Más Vendidos', 11, 2);
            colHeader(['Producto', 'Cantidad Vendida'], 12);
            var top5Cell = ws.getCell(13, 1);
            top5Cell.value = 'No hay datos para este período.';
            top5Cell.font  = { italic: true, size: 9, color: MID };
            top5Cell.fill  = { type: 'pattern', pattern: 'solid', fgColor: WHITE };
            top5Cell.border = thinBorder;
            ws.getCell(13, 2).border = thinBorder;
            ws.getCell(13, 2).fill = { type: 'pattern', pattern: 'solid', fgColor: WHITE };
            ws.getRow(13).height = 16;

            ws.getRow(14).height = 8; // espacio

            // ===== DETALLE DE VENTAS =====
            sectionHeader('Detalle de Ventas — Costo vs. Venta', 15, 10);
            colHeader(['# Venta', 'Fecha', 'Producto', 'Cantidad', 'P. Costo', 'P. Venta', 'Subtotal Costo', 'Subtotal Venta', 'Ganancia', 'Metodo Pago'], 16);
            var detCell = ws.getCell(17, 1);
            detCell.value = 'No hay ventas registradas en este período.';
            detCell.font  = { italic: true, size: 9, color: MID };
            detCell.fill  = { type: 'pattern', pattern: 'solid', fgColor: WHITE };
            detCell.border = thinBorder;
            ws.mergeCells(17, 1, 17, 10);
            ws.getRow(17).height = 16;

            // ===== DESCARGAR =====
            var buffer = await workbook.xlsx.writeBuffer();
            var blob   = new Blob([buffer], { type: 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet' });
            var url    = URL.createObjectURL(blob);
            var a      = document.createElement('a');
            a.href     = url;
            a.download = 'reporte_ventas_' + new Date().toISOString().slice(0,10) + '.xlsx';
            a.click();
            URL.revokeObjectURL(url);
        }

        // ---------- Exportar PDF (estructurado como referencia) ----------
        function exportPdfSales() {
            var { jsPDF } = window.jspdf;
            var doc = new jsPDF({ orientation: 'portrait', unit: 'mm', format: 'a4' });
            var inputs = document.querySelectorAll('input[type=date]');
            var from = inputs[0] ? inputs[0].value : '';
            var to   = inputs[1] ? inputs[1].value : '';
            var pageW = doc.internal.pageSize.getWidth();

            // --- Cabecera superior ---
            doc.setFontSize(8);
            doc.setTextColor(120,120,120);
            doc.text(new Date().toLocaleString('es-PE'), 14, 10);
            doc.text('GestionPRO — Sistema de Gestión', pageW - 14, 10, { align: 'right' });

            // --- Título ---
            doc.setFontSize(20);
            doc.setFont('helvetica', 'bold');
            doc.setTextColor(30, 30, 30);
            doc.text('Reporte de Ventas', 14, 24);

            // --- Periodo ---
            doc.setFontSize(10);
            doc.setFont('helvetica', 'normal');
            doc.setTextColor(3, 100, 92);
            doc.text('Periodo: ' + from + ' al ' + to, 14, 31);

            var y = 40;

            // --- Resumen General ---
            doc.setFontSize(13);
            doc.setFont('helvetica', 'bold');
            doc.setTextColor(30,30,30);
            doc.text('Resumen General', 14, y); y += 2;

            doc.autoTable({
                startY: y,
                head: [],
                body: [
                    ['Total de Ingresos', 'S/0.00'],
                    ['Total de Costos',   'S/0.00'],
                    ['Ganancia Neta',     'S/0.00'],
                    ['Numero de Ventas',  '0'],
                ],
                styles: { fontSize: 9, cellPadding: 3 },
                columnStyles: {
                    0: { cellWidth: 120 },
                    1: { cellWidth: 60, textColor: [3,100,92], fontStyle: 'bold' }
                },
                alternateRowStyles: { fillColor: [245,245,245] },
                theme: 'grid',
            });

            y = doc.lastAutoTable.finalY + 10;

            // --- Top 5 Productos ---
            doc.setFontSize(13);
            doc.setFont('helvetica', 'bold');
            doc.setTextColor(30,30,30);
            doc.text('Top 5 Productos Mas Vendidos', 14, y); y += 2;

            doc.autoTable({
                startY: y,
                head: [['Producto', 'Cantidad Vendida']],
                body: [['No hay datos para este período.', '']],
                styles: { fontSize: 9, cellPadding: 3 },
                headStyles: { fillColor: [3, 100, 92], textColor: [255,255,255], fontStyle: 'bold', halign: 'center' },
                theme: 'grid',
            });

            y = doc.lastAutoTable.finalY + 10;

            // --- Detalle de Ventas ---
            doc.setFontSize(13);
            doc.setFont('helvetica', 'bold');
            doc.setTextColor(30,30,30);
            doc.text('Detalle de Ventas — Costo vs. Venta', 14, y); y += 2;

            doc.autoTable({
                startY: y,
                head: [['# Venta', 'Fecha', 'Producto', 'Cant.', 'P. Costo', 'P. Venta', 'Subt. Costo', 'Subt. Venta', 'Ganancia', 'Metodo']],
                body: [['', '', 'No hay ventas registradas en este período.', '', '', '', '', '', '', '']],
                styles: { fontSize: 8, cellPadding: 2 },
                headStyles: { fillColor: [3, 100, 92], textColor: [255,255,255], fontStyle: 'bold', halign: 'center', fontSize: 8 },
                theme: 'grid',
            });

            // --- Pie de página ---
            var totalPages = doc.internal.getNumberOfPages();
            for (var i = 1; i <= totalPages; i++) {
                doc.setPage(i);
                doc.setFontSize(8);
                doc.setTextColor(180,180,180);
                doc.text('© 2026 Pastelería Dulce Corazón · Sistema de Gestión', pageW / 2, 290, { align: 'center' });
                doc.text('Página ' + i + ' / ' + totalPages, pageW - 14, 290, { align: 'right' });
            }

            doc.save('reporte_ventas_' + new Date().toISOString().slice(0,10) + '.pdf');
        }
    </script>
</x-layouts.app>

