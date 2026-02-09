<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;

class OrderController extends Controller
{
     // List all orders
    public function index()
    {
        $orders = Order::latest()->with('items.product')->get();
        return view('admin.orders.index', compact('orders'));
    }

    // View single order details
    public function show(Order $order)
    {
        $order->load('items.product');
        return view('admin.orders.show', compact('order'));
    }

    // Optional: update order status
    public function updateStatus(Request $request, Order $order)
    {
        $order->update(['status' => $request->status]);
        return redirect()->route('admin.orders.index')->with('success', 'Order #' . $order->id . ' status updated to ' . ucfirst($request->status));
    }
}