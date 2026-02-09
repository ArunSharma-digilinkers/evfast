<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;

class FrontProductController extends Controller
{
    public function category($slug)
    {
        $category = Category::where('slug', $slug)->firstOrFail();

        $products = Product::where('status', 1)
            ->where('category_id', $category->id)
            ->orderBy('id', 'asc')
            ->get();

        $categories = Category::all();

        return view('products.category', compact('products', 'categories', 'category'));
    }

    public function show($slug)
    {
        $product = Product::with('addons')
                          ->where('slug', $slug)
                          ->where('status', 1)
                          ->firstOrFail();

        return view('products.show', compact('product'));
    }
}
