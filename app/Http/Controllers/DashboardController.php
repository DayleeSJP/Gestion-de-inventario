<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        // Top Cards Metrics
        $ventasHoy = \App\Models\Order::whereDate('created_at', today())->where('status', '!=', 'cancelado')->count();
        $ingresosMes = \App\Models\Order::whereMonth('created_at', today()->month)->where('status', '!=', 'cancelado')->sum('total_amount');
        $productosActivos = \App\Models\Product::where('status', '!=', 'agotado')->count();
        $categoriasActivas = \App\Models\Category::where('status', true)->count();

        // Pending Orders Table
        $pendingOrders = \App\Models\Order::where('status', 'pendiente')
            ->orderBy('created_at', 'desc')
            ->take(5)
            ->get();
            
        // Top Sellers (from order items) - Últimos 7 días
        $topSellers = \App\Models\OrderItem::select('product_id', \DB::raw('SUM(quantity) as total_quantity'))
            ->whereHas('order', function($query) {
                $query->where('created_at', '>=', now()->subDays(7))
                      ->where('status', '!=', 'cancelado');
            })
            ->groupBy('product_id')
            ->orderByDesc('total_quantity')
            ->take(5)
            ->with('product')
            ->get();

        // Chart Data: Last 7 Days Revenue
        $chartLabels = [];
        $chartData = [];
        for ($i = 6; $i >= 0; $i--) {
            $date = now()->subDays($i);
            $chartLabels[] = $date->translatedFormat('D j'); // e.g., 'lun 26'
            
            $dailyTotal = \App\Models\Order::whereDate('created_at', $date->toDateString())
                ->where('status', '!=', 'cancelado')
                ->sum('total_amount');
            $chartData[] = (float) $dailyTotal;
        }

        return view('pos.index', compact(
            'ventasHoy', 'ingresosMes', 'productosActivos', 'categoriasActivas',
            'pendingOrders', 'topSellers', 'chartLabels', 'chartData'
        ));
    }
}
