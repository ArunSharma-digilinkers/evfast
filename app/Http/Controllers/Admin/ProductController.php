<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::with(['category', 'addons'])->latest()->get();

        return view('admin.products.index', compact('products'));
    }

    public function create()
    {
        $categories = Category::orderBy('name')->get();
        $products = Product::orderBy('name')->get();

        return view('admin.products.create', compact('categories', 'products'));
    }

    public function store(Request $request)
    {
        $data = $this->validateProduct($request);
        $data['slug'] = $this->uniqueSlug($data['name']);
        $data['status'] = $request->boolean('status');
        $data['is_new_arrival'] = $request->boolean('is_new_arrival');
        $data['gst_percentage'] = $data['gst_percentage'] ?? 0;
        $data['shipping_rate'] = $data['shipping_type'] === 'zone'
            ? ($data['shipping_rate'] ?? 0)
            : 0;

        $addons = $data['addons'] ?? [];
        unset($data['addons'], $data['images'], $data['removed_images']);

        $mainImage = $request->file('image')->hashName();
        $request->file('image')->storeAs('products', $mainImage, 'public');

        $gallery = [];
        foreach ($request->file('images', []) as $image) {
            $name = $image->hashName();
            $image->storeAs('products/gallery', $name, 'public');
            $gallery[] = $name;
        }

        $data['image'] = $mainImage;
        $data['images'] = $gallery;

        try {
            DB::transaction(function () use ($data, $addons) {
                $product = Product::create($data);
                $product->addons()->sync($addons);
            });
        } catch (\Throwable $e) {
            Storage::disk('public')->delete('products/' . $mainImage);
            $this->deleteGalleryImages($gallery);

            throw $e;
        }

        return redirect()
            ->route('admin.products.index')
            ->with('success', 'Product created successfully.');
    }

    public function edit(Product $product)
    {
        $product->load('addons');
        $categories = Category::orderBy('name')->get();
        $products = Product::whereKeyNot($product->id)->orderBy('name')->get();

        return view('admin.products.edit', compact('product', 'categories', 'products'));
    }

    public function update(Request $request, Product $product)
    {
        $data = $this->validateProduct($request, $product);
        $data['slug'] = $this->uniqueSlug($data['name'], $product);
        $data['status'] = $request->boolean('status');
        $data['is_new_arrival'] = $request->boolean('is_new_arrival');
        $data['gst_percentage'] = $data['gst_percentage'] ?? 0;
        $data['shipping_rate'] = $data['shipping_type'] === 'zone'
            ? ($data['shipping_rate'] ?? 0)
            : 0;

        $addons = $data['addons'] ?? [];
        unset($data['addons'], $data['images'], $data['removed_images']);

        $oldMainImage = null;
        $newMainImage = null;
        $newGalleryImages = [];
        $removedImages = [];

        if ($request->hasFile('image')) {
            $oldMainImage = $product->image;
            $newMainImage = $request->file('image')->hashName();
            $request->file('image')->storeAs('products', $newMainImage, 'public');
            $data['image'] = $newMainImage;
        }

        $gallery = $product->images ?? [];

        if ($request->filled('removed_images')) {
            $requestedRemovals = array_filter(array_map(
                'trim',
                explode(',', $request->string('removed_images')->toString())
            ));
            $removedImages = array_values(array_intersect($gallery, $requestedRemovals));
            $gallery = array_values(array_diff($gallery, $removedImages));
        }

        foreach ($request->file('images', []) as $image) {
            $name = $image->hashName();
            $image->storeAs('products/gallery', $name, 'public');
            $newGalleryImages[] = $name;
            $gallery[] = $name;
        }

        $data['images'] = array_values($gallery);

        try {
            DB::transaction(function () use ($product, $data, $addons) {
                $product->update($data);
                $product->addons()->sync($addons);
            });
        } catch (\Throwable $e) {
            if ($newMainImage) {
                Storage::disk('public')->delete('products/' . $newMainImage);
            }
            $this->deleteGalleryImages($newGalleryImages);

            throw $e;
        }

        if ($oldMainImage) {
            Storage::disk('public')->delete('products/' . $oldMainImage);
        }
        $this->deleteGalleryImages($removedImages);

        return redirect()
            ->route('admin.products.index')
            ->with('success', 'Product updated successfully.');
    }

    public function destroy(Product $product)
    {
        if ($product->image) {
            Storage::disk('public')->delete('products/' . $product->image);
        }

        $this->deleteGalleryImages($product->images ?? []);
        $product->addons()->detach();
        $product->delete();

        return redirect()
            ->route('admin.products.index')
            ->with('success', 'Product deleted successfully.');
    }

    private function validateProduct(Request $request, ?Product $product = null): array
    {
        return $request->validate([
            'category_id' => ['required', 'integer', 'exists:categories,id'],
            'name' => [
                'required',
                'string',
                'max:255',
                Rule::unique('products', 'name')->ignore($product?->id),
            ],
            'price' => ['required', 'numeric', 'min:0'],
            'sale_price' => ['required', 'numeric', 'gte:price'],
            'quantity' => ['required', 'integer', 'min:0'],
            'image' => [$product ? 'nullable' : 'required', 'image', 'mimes:jpg,jpeg,png,webp', 'max:5120'],
            'images' => ['nullable', 'array', 'max:10'],
            'images.*' => ['image', 'mimes:jpg,jpeg,png,webp', 'max:5120'],
            'gst_percentage' => ['nullable', 'numeric', 'min:0', 'max:100'],
            'gst_type' => ['required', Rule::in(['inclusive', 'extra'])],
            'shipping_type' => ['required', Rule::in(['free', 'zone'])],
            'shipping_rate' => ['nullable', 'numeric', 'min:0', 'required_if:shipping_type,zone'],
            'hsn_code' => ['nullable', 'string', 'max:20', 'regex:/^[A-Za-z0-9.-]+$/'],
            'short_description' => ['nullable', 'string'],
            'description' => ['nullable', 'string'],
            'technical_features' => ['nullable', 'string'],
            'warranty' => ['nullable', 'string'],
            'youtube_url' => ['nullable', 'url', 'max:2048'],
            'status' => ['required', 'boolean'],
            'is_new_arrival' => ['nullable', 'boolean'],
            'addons' => ['nullable', 'array'],
            'addons.*' => [
                'integer',
                'distinct',
                'exists:products,id',
                Rule::notIn(array_filter([$product?->id])),
            ],
            'removed_images' => ['nullable', 'string'],
        ]);
    }

    private function uniqueSlug(string $name, ?Product $product = null): string
    {
        $baseSlug = Str::slug($name) ?: 'product';
        $slug = $baseSlug;
        $suffix = 2;

        while (
            Product::where('slug', $slug)
                ->when($product, fn ($query) => $query->whereKeyNot($product->id))
                ->exists()
        ) {
            $slug = $baseSlug . '-' . $suffix++;
        }

        return $slug;
    }

    private function deleteGalleryImages(array $images): void
    {
        if ($images === []) {
            return;
        }

        Storage::disk('public')->delete(
            array_map(fn ($image) => 'products/gallery/' . $image, $images)
        );
    }
}
