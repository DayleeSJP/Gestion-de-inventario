<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ticket #{{ $order->id }}</title>
    <style>
        body {
            font-family: 'Courier New', Courier, monospace;
            margin: 0;
            padding: 20px;
            background-color: #f0f0f0;
            display: flex;
            flex-direction: column;
            align-items: center;
        }
        .ticket {
            width: 300px;
            background-color: white;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
            color: #000;
        }
        .header {
            text-align: center;
            margin-bottom: 20px;
        }
        .header h1 {
            margin: 0;
            font-size: 24px;
            font-weight: normal;
        }
        .header p {
            margin: 5px 0 0 0;
            font-size: 14px;
        }
        .divider {
            border-top: 1px solid #000;
            margin: 15px 0;
        }
        .info {
            font-size: 14px;
            line-height: 1.5;
            margin-bottom: 15px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            font-size: 14px;
        }
        th, td {
            padding: 5px 0;
            text-align: left;
        }
        th {
            border-bottom: 1px solid #000;
        }
        th.right, td.right {
            text-align: right;
        }
        .total-section {
            margin-top: 15px;
            text-align: right;
            font-size: 16px;
        }
        .footer {
            text-align: center;
            margin-top: 20px;
            font-size: 14px;
        }
        .actions {
            margin-top: 20px;
            display: flex;
            gap: 10px;
            flex-wrap: wrap;
            justify-content: center;
        }
        .btn {
            padding: 10px 15px;
            border: none;
            color: white;
            cursor: pointer;
            font-family: inherit;
            font-size: 14px;
            border-radius: 4px;
        }
        .btn-print { background-color: #0d6efd; }
        .btn-pos { background-color: #6c757d; }
        .btn-history { background-color: #0dcaf0; color: #000;}

        @media print {
            body {
                background-color: white;
                padding: 0;
                align-items: flex-start;
            }
            .ticket {
                box-shadow: none;
                width: 80mm;
                padding: 0;
            }
            .actions {
                display: none;
            }
        }
    </style>
</head>
<body>

    <div class="ticket">
        <div class="header">
            <h1>Dulce Corazón</h1>
            <p>Ticket de Venta #: {{ $order->id }}</p>
        </div>

        <div class="divider"></div>

        <div class="info">
            Fecha: {{ $order->created_at->format('d/m/Y H:i:s') }}<br><br>
            Cajero: {{ $order->user->name ?? 'Sistema' }}<br><br>
            Cliente: {{ $order->customer_name ?? 'Público en General' }}
        </div>

        <div class="divider"></div>

        <table>
            <thead>
                <tr>
                    <th>Cant.</th>
                    <th>Producto</th>
                    <th class="right">Subtotal</th>
                </tr>
            </thead>
            <tbody>
                @foreach($order->items as $item)
                <tr>
                    <td>{{ number_format($item->quantity, 2) }}</td>
                    <td>{{ $item->product->name ?? 'Producto Eliminado' }}</td>
                    <td class="right">S/ {{ number_format($item->subtotal, 2) }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>

        <div class="divider"></div>

        <div class="total-section">
            TOTAL: S/ {{ number_format($order->total_amount, 2) }}
        </div>

        <div class="footer">
            ¡Gracias por su compra!
        </div>
    </div>

    <div class="actions">
        <button class="btn btn-print" onclick="window.print()">Imprimir Ticket</button>
        <button class="btn btn-pos" onclick="window.location.href='/pos'">Volver al POS</button>
        <button class="btn btn-history" onclick="window.location.href='/history'">Volver al Historial</button>
    </div>

    <script>
        // Auto print on load
        window.onload = function() {
            setTimeout(() => {
                window.print();
            }, 500);
        }
    </script>
</body>
</html>
