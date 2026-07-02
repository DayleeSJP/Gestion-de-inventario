<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PosController extends Controller
{
    public function index()
    {
        $categories = \App\Models\Category::where('status', true)->get();
        $products = \App\Models\Product::where('status', '!=', 'agotado')->with('category')->get();
        
        $topProductIds = \Illuminate\Support\Facades\DB::table('order_items')
            ->select('product_id')
            ->groupBy('product_id')
            ->orderByRaw('COUNT(id) DESC')
            ->limit(5)
            ->pluck('product_id');

        $frequentProducts = \App\Models\Product::where('status', '!=', 'agotado')
            ->whereIn('id', $topProductIds)
            ->get();
            
        // Fallback if no frequent products
        if ($frequentProducts->isEmpty()) {
            $frequentProducts = $products->take(5);
        }
        
        return view('pos.checkout', compact('categories', 'products', 'frequentProducts'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'customer_name' => 'nullable|string|max:255',
            'payment_method' => 'required|string',
            'items' => 'required|array|min:1',
            'items.*.id' => 'required|exists:products,id',
            'items.*.quantity' => 'required|integer|min:1',
        ]);

        try {
            \DB::beginTransaction();

            $totalAmount = 0;
            $totalCost = 0;

            // Pre-calculate totals to prevent tampering
            foreach ($request->items as $item) {
                $product = \App\Models\Product::find($item['id']);
                $totalAmount += $product->selling_price * $item['quantity'];
                $totalCost += $product->cost_price * $item['quantity'];
            }

            $order = \App\Models\Order::create([
                'user_id' => auth()->id() ?? 1, // Fallback for testing
                'customer_name' => $request->customer_name,
                'total_amount' => $totalAmount,
                'total_cost' => $totalCost,
                'payment_method' => strtolower($request->payment_method),
                'status' => 'pagado',
            ]);

            foreach ($request->items as $item) {
                $product = \App\Models\Product::find($item['id']);
                \App\Models\OrderItem::create([
                    'order_id' => $order->id,
                    'product_id' => $product->id,
                    'quantity' => $item['quantity'],
                    'unit_price' => $product->selling_price,
                    'unit_cost' => $product->cost_price,
                    'subtotal' => $product->selling_price * $item['quantity'],
                ]);
            }

            \DB::commit();

            return response()->json([
                'success' => true,
                'message' => 'Venta procesada correctamente',
                'order_id' => $order->id
            ]);
        } catch (\Exception $e) {
            \DB::rollBack();
            return response()->json([
                'success' => false,
                'message' => 'Error al procesar la venta: ' . $e->getMessage()
            ], 500);
        }
    }
}
