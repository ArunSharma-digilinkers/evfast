<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class CartController extends Controller
{
    // Add to cart
 public function add($slug)
{
    $product = Product::where('slug', $slug)->firstOrFail();

    $cart = session()->get('cart', []);

    if (isset($cart[$slug])) {
        $cart[$slug]['quantity']++;
    } else {
        $cart[$slug] = [
            'name'     => $product->name,
            'price'    => $product->price,
            'quantity' => 1,
            'image'    => $product->image,
        ];
    }

    session()->put('cart', $cart);

    return redirect()->route('cart.index')
        ->with('success', 'Product added to cart');
}


    // View cart
    public function index()
    {
        $cart = session()->get('cart', []);
        return view('cart.index', compact('cart'));
    }

    // Update quantity
    public function update(Request $request, $slug)
    {
        $cart = session()->get('cart');

        if (isset($cart[$slug])) {
            $cart[$slug]['quantity'] = $request->quantity;
            session()->put('cart', $cart);
        }

        return redirect()->back();
    }

    // Remove item
    public function remove($slug)
    {
        $cart = session()->get('cart');

        if (isset($cart[$slug])) {
            unset($cart[$slug]);
            session()->put('cart', $cart);
        }

        return redirect()->back();
    }
}