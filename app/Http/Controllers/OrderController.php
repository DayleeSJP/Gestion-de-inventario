<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index(Request $request)
    {
        $query = \App\Models\Order::with('items.product', 'user');

        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('id', 'like', "%{$search}%")
                  ->orWhere('customer_name', 'like', "%{$search}%")
                  ->orWhere('payment_method', 'like', "%{$search}%")
                  ->orWhereHas('user', function($qUser) use ($search) {
                      $qUser->where('name', 'like', "%{$search}%");
                  });
            });
        }

        if ($request->filled('date_from')) {
            $query->whereDate('created_at', '>=', $request->date_from);
        }

        if ($request->filled('date_to')) {
            $query->whereDate('created_at', '<=', $request->date_to);
        }

        $orders = $query->orderBy('created_at', 'desc')->paginate(10)->withQueryString();
            
        return view('pos.history', compact('orders'));
    }

    public function showTicket(\App\Models\Order $order)
    {
        $order->load('items.product', 'user');
        return view('pos.ticket', compact('order'));
    }

    public function cancel(\App\Models\Order $order)
    {
        $order->update(['status' => 'cancelado']);
        return redirect()->back()->with('success', 'Venta anulada correctamente.');
    }

    public function markPaid(\App\Models\Order $order)
    {
        $order->update(['status' => 'pagado']);
        return response()->json(['success' => true]);
    }
}
