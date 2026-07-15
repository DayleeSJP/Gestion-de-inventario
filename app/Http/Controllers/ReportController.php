<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ReportController extends Controller
{
    public function sales()
    {
        // 1. Total de ingresos (solo ordenes pagadas)
        $totalRevenue = \App\Models\Order::where('status', 'pagado')->sum('total_amount');
        
        // 2. Número de ventas (órdenes completadas)
        $totalSalesCount = \App\Models\Order::where('status', 'pagado')->count();

        // 3. Productos más vendidos
        $topProducts = \App\Models\OrderItem::select('product_id', \DB::raw('SUM(quantity) as total_quantity'), \DB::raw('SUM(subtotal) as total_revenue'))
            ->whereHas('order', function($q) {
                $q->where('status', 'pagado');
            })
            ->groupBy('product_id')
            ->orderBy('total_quantity', 'desc')
            ->with('product:id,name')
            ->take(5)
            ->get();

        // 4. Tendencia de ventas (últimos 7 días)
        $last7Days = collect(range(6, 0))->map(function($days) {
            $date = now()->subDays($days)->format('Y-m-d');
            $revenue = \App\Models\Order::where('status', 'pagado')
                ->whereDate('created_at', $date)
                ->sum('total_amount');
            return [
                'date' => now()->subDays($days)->format('d/m'),
                'revenue' => $revenue
            ];
        });

        return view('pos.reports.sales', compact('totalRevenue', 'totalSalesCount', 'topProducts', 'last7Days'));
    }

    public function inventory()
    {
        $products = Product::with('category')->get();

        $totalInventoryValue = $products->sum(function ($product) {
            return ($product->cost_price ?? 0) * ($product->stock ?? 0);
        });

        $lowStockCount = $products->filter(function ($product) {
            return isset($product->stock, $product->min_stock) && $product->stock <= $product->min_stock;
        })->count();

        return view('pos.reports.inventory', compact('products', 'totalInventoryValue', 'lowStockCount'));
    }
}
