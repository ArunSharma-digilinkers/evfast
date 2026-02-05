<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;

class PagesController extends Controller
{
   public function index()
{
    // Get active products in ASC order
    $products = Product::where('status', 1)
        ->orderBy('id', 'desc')   // ASCENDING ORDER
        ->limit(8)
        ->get();

    // Get all categories
    $categories = Category::all();

    return view('pages.index', compact('products', 'categories'));
}


    public function about()
    {
        return view('pages.about-us');
    }

    public function contact()
    {
        return view('pages.contact-us');
    }

    // Products

    public function portableevchargers()
    {
        // Get category
        $category = Category::where('name', 'Portable EV Charger')->firstOrFail();

        // Get products in ASC order
        $products = Product::where('status', 1)
            ->where('category_id', $category->id)
            ->orderBy('id', 'asc') // ASCENDING ORDER
            ->get();

        // All categories (for menu/sidebar)
        $categories = Category::all();

        return view('products.portable-ev-chargers', compact(
            'products',
            'categories',
            'category'
        ));
    }
    public function wallmount()
    {
          // Get category
        $category = Category::where('name', 'Wall Mount Ev Charger')->firstOrFail();

        // Get products in ASC order
        $products = Product::where('status', 1)
            ->where('category_id', $category->id)
            ->orderBy('id', 'asc') // ASCENDING ORDER
            ->get();

        // All categories (for menu/sidebar)
        $categories = Category::all();

        return view('products.wall-mount-ev-chargers', compact(
            'products',
            'categories',
            'category'
        ));
    }

    public function acchargers()
    {
   // Get category
        $category = Category::where('name', 'AC Charger')->firstOrFail();

        // Get products in ASC order
        $products = Product::where('status', 1)
            ->where('category_id', $category->id)
            ->orderBy('id', 'asc') // ASCENDING ORDER
            ->get();

        // All categories (for menu/sidebar)
        $categories = Category::all();

        return view('products.ac-chargers', compact(
            'products',
            'categories',
            'category'
        ));
    }

    public function dcchargers()
    {
      // Get category
        $category = Category::where('name', 'DC Charger')->firstOrFail();

        // Get products in ASC order
        $products = Product::where('status', 1)
            ->where('category_id', $category->id)
            ->orderBy('id', 'asc') // ASCENDING ORDER
            ->get();

        // All categories (for menu/sidebar)
        $categories = Category::all();

        return view('products.dc-chargers', compact(
            'products',
            'categories',
            'category'
        ));
    }

    public function gunholders()
    {
         // Get category
        $category = Category::where('name', 'Gun Holder')->firstOrFail();

        // Get products in ASC order
        $products = Product::where('status', 1)
            ->where('category_id', $category->id)
            ->orderBy('id', 'asc') // ASCENDING ORDER
            ->get();

        // All categories (for menu/sidebar)
        $categories = Category::all();

        return view('products.gun-holders', compact(
            'products',
            'categories',
            'category'
        ));
    }

    public function accessories()
    {
          // Get category
        $category = Category::where('name', 'Accessories')->firstOrFail();

        // Get products in ASC order
        $products = Product::where('status', 1)
            ->where('category_id', $category->id)
            ->orderBy('id', 'asc') // ASCENDING ORDER
            ->get();

        // All categories (for menu/sidebar)
        $categories = Category::all();

        return view('products.accessories', compact(
            'products',
            'categories',
            'category'
        ));
    }
}