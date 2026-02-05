<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class FrontProductController extends Controller
{

    public function show($slug)
{
    // Fetch product by slug
    $product = Product::where('slug', $slug)
                      ->where('status', 1)
                      ->firstOrFail();

    return view('products.show', compact('product'));
}
}
