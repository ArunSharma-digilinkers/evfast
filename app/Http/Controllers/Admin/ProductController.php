<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::with('category')->latest()->get();
        return view('admin.products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::where('status', 1)->get();
        return view('admin.products.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'category_id' => 'required',
            'name'        => 'required|unique:products,name',
            'price'       => 'required|numeric',
            'quantity'    => 'required|integer',
            'image'       => 'required|image|mimes:jpg,jpeg,png,webp',
            'images.*'    => 'nullable|image|mimes:jpg,jpeg,png,webp',
        ]);

        /* ---------- Main Image ---------- */
        $mainImage = null;
        if ($request->hasFile('image')) {
            $mainImage = time() . '.' . $request->image->extension();
            $request->image->storeAs('products', $mainImage, 'public');
        }

        /* ---------- Multiple Images ---------- */
        $gallery = [];
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $img) {
                $name = uniqid() . '.' . $img->extension();
                $img->storeAs('products/gallery', $name, 'public');
                $gallery[] = $name;
            }
        }

        Product::create([
            'category_id' => $request->category_id,
            'name'        => $request->name,
            'slug'        => Str::slug($request->name),
            'price'       => $request->price,
            'quantity'    => $request->quantity,
            'description' => $request->description,
            'status'      => $request->status ?? 1,
            'image'       => $mainImage,
            'images'      => $gallery,
        ]);

        return redirect()
            ->route('admin.products.index')
            ->with('success', 'Product created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        return view('admin.products.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        $categories = Category::where('status', 1)->get();
        return view('admin.products.edit', compact('product', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        $request->validate([
            'category_id' => 'required',
            'name'        => 'required|unique:products,name,' . $product->id,
            'price'       => 'required|numeric',
            'quantity'    => 'required|integer',
            'image'       => 'nullable|image|mimes:jpg,jpeg,png,webp',
            'images.*'    => 'nullable|image|mimes:jpg,jpeg,png,webp',
        ]);

        $data = [
            'category_id' => $request->category_id,
            'name'        => $request->name,
            'slug'        => Str::slug($request->name),
            'price'       => $request->price,
            'quantity'    => $request->quantity,
            'description' => $request->description,
            'status'      => $request->status,
        ];

        /* ---------- Replace Main Image ---------- */
        if ($request->hasFile('image')) {
            if ($product->image) {
                Storage::disk('public')->delete('products/' . $product->image);
            }

            $mainImage = time() . '.' . $request->image->extension();
            $request->image->storeAs('products', $mainImage, 'public');
            $data['image'] = $mainImage;
        }

        /* ---------- Add More Gallery Images ---------- */
        if ($request->hasFile('images')) {
            $gallery = $product->images ?? [];

            foreach ($request->file('images') as $img) {
                $name = uniqid() . '.' . $img->extension();
                $img->storeAs('products/gallery', $name, 'public');
                $gallery[] = $name;
            }

            $data['images'] = $gallery;
        }

        $product->update($data);

        return redirect()
            ->route('admin.products.index')
            ->with('success', 'Product updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        if ($product->image) {
            Storage::disk('public')->delete('products/' . $product->image);
        }

        if ($product->images) {
            foreach ($product->images as $img) {
                Storage::disk('public')->delete('products/gallery/' . $img);
            }
        }

        $product->delete();

        return redirect()
            ->route('admin.products.index')
            ->with('success', 'Product deleted successfully');
    }
}
