<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use Razorpay\Api\Api;
use Illuminate\Support\Facades\DB;

class CheckoutController extends Controller
{
    public function index()
    {
        $cart = session()->get('cart', []);

        if (empty($cart)) {
            return redirect()->route('cart.index')
                ->with('error', 'Your cart is empty.');
        }

        return view('checkout.index', compact('cart'));
    }

    public function placeOrder(Request $request)
    {
        $cart = session()->get('cart', []);

        if (empty($cart)) {
            return redirect()->route('cart.index')
                ->with('error', 'Your cart is empty.');
        }

        // ✅ Razorpay-only validation
        $request->validate([
            'name'    => 'required|string|min:3',
            'email'   => 'required|email',
            'phone'   => 'required|digits:10',
            'pincode' => 'required|digits:6',
            'address' => 'required|min:10',
            'payment_method' => 'required|in:razorpay',
            'razorpay_payment_id' => 'required|string',
        ]);

        // ✅ Calculate total
        $total = 0;
        foreach ($cart as $item) {
            $total += $item['price'] * $item['quantity'];
        }

        DB::beginTransaction();

        try {
            // ✅ Verify Razorpay payment
            $api = new Api(
                config('services.razorpay.key'),
                config('services.razorpay.secret')
            );

            $payment = $api->payment->fetch($request->razorpay_payment_id);

         if (!in_array($payment->status, ['authorized', 'captured'])) {
    throw new \Exception('Payment not successful');
}

            // ✅ Create Order ONLY after payment success
            $order = Order::create([
                 'name' => $request->name,
                'email' => $request->email,
                'phone' => $request->phone,
                'address' => $request->address,
                'pincode' => $request->pincode, // ✅ REQUIRED
                'state' => $request->state, // ✅ REQUIRED
                'city' => $request->city, // ✅ REQUIRED
                'total_amount' => $total,
                'payment_method' => 'razorpay',
                'payment_status' => 'paid',
                'payment_id' => $payment->id,
            ]);

            // ✅ Save Order Items + Reduce Stock
            foreach ($cart as $slug => $item) {
                $product = Product::where('slug', $slug)->first();

                if ($product) {
                    OrderItem::create([
                        'order_id' => $order->id,
                        'product_id' => $product->id,
                        'quantity' => $item['quantity'],
                        'price' => $item['price'],
                    ]);

                    $product->decrement('quantity', $item['quantity']);
                }
            }

            DB::commit();

            // ✅ Clear cart
            session()->forget('cart');

            return redirect()->route('payment.success', $order->id);

        } catch (\Exception $e) {
            DB::rollBack();

            return redirect()->back()
                ->with('error', $e->getMessage());
        }
    }
}