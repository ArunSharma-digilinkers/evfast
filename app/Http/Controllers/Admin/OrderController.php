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

    // Update order status (requires serial numbers when dispatching)
   public function updateStatus(Request $request, Order $order)
{
    // ✅ Validate status
    $request->validate([
        'status' => 'required|in:pending,dispatched,completed,canceled',
    ]);

    if ($request->status === 'dispatched') {

        $order->load('items');

        // ✅ Validate dispatch fields
        $request->validate([
            'courier_name' => 'required|string|max:255',
            'tracking_number' => 'required|string|max:255',
            'dispatch_date' => 'required|date',

            'serial_numbers' => 'nullable|array',
            'serial_numbers.*' => 'nullable|string|max:255',
        ]);

        // ✅ SAVE EVERYTHING IN order_items
        foreach ($order->items as $item) {
            $item->update([
                // serial optional
                'serial_number'   => $request->serial_numbers[$item->id] ?? $item->serial_number,

                // dispatch fields (always save)
                'courier_name'    => $request->courier_name,
                'tracking_number' => $request->tracking_number,
                'dispatch_date'   => $request->dispatch_date,
            ]);
        }

        // ✅ update only status in orders table
        $order->update([
            'status' => 'dispatched'
        ]);

    } else {
        // ✅ other statuses
        $order->update([
            'status' => $request->status
        ]);
    }

    return redirect()
        ->route('admin.orders.show', $order->id)
        ->with('success', 'Order #' . $order->id . ' status updated to ' . ucfirst($request->status));
}
}