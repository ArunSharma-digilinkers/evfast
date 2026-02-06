@extends('layouts.admin')

@section('title', 'Edit Product')

@section('content')

<div class="main-wrapper py-4">
    <div class="container-fluid">

        <!-- Page Header -->
        <div class="d-flex justify-content-between align-items-center mb-4">
            <div>
                <h2 class="fw-bold mb-0">Edit Product</h2>
                <small class="text-muted">Update product information</small>
            </div>

            <a href="{{ route('admin.products.index') }}" class="btn btn-outline-secondary">
                <i class="fas fa-arrow-left me-2"></i> Back
            </a>
        </div>

        <!-- Form Card -->
        <div class="row justify-content-center">
            <div class="col-xl-8 col-lg-10">
                <div class="card shadow-sm">
                    <div class="card-body">

                        <form method="POST"
                              action="{{ route('admin.products.update', $product->id) }}"
                              enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <div class="row">
                                <div class="col-md-6">
                                       <!-- Category -->
                            <div class="mb-3">
                                <label class="form-label fw-semibold">Category</label>
                                <select name="category_id" class="form-select" required>
                                    @foreach($categories as $cat)
                                        <option value="{{ $cat->id }}"
                                            {{ $product->category_id == $cat->id ? 'selected' : '' }}>
                                            {{ $cat->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                                </div>
                                <div class="col-md-6">
                                     <!-- Product Name -->
                            <div class="mb-3">
                                <label class="form-label fw-semibold">Product Name</label>
                                <input type="text"
                                       name="name"
                                       value="{{ old('name', $product->name) }}"
                                       class="form-control"
                                       required>
                            </div>

                                </div>
                            </div>
                           
                            <!-- Price & Quantity -->
                            <div class="row">
                                <div class="col-md-4 mb-3">
                                    <label class="form-label fw-semibold">Price (₹)</label>
                                    <input type="number"
                                           name="price"
                                           value="{{ old('price', $product->price) }}"
                                           class="form-control"
                                           required>
                                </div>

                                <div class="col-md-4 mb-3">
                                    <label class="form-label fw-semibold">Sales Price (₹)</label>
                                    <input type="number"
                                           name="sale_price"
                                           value="{{ old('sale_price', $product->sale_price) }}"
                                           class="form-control"
                                           required>
                                </div>
                               


                                <div class="col-md-4 mb-3">
                                    <label class="form-label fw-semibold">Quantity</label>
                                    <input type="number"
                                           name="quantity"
                                           value="{{ old('quantity', $product->quantity) }}"
                                           class="form-control"
                                           required>
                                </div>
                            </div>

                             <hr>

<h6 class="fw-bold">Optional Add-ons</h6>

@foreach($addons as $addon)
    <div class="form-check">
        <input type="checkbox"
               name="addons[]"
               value="{{ $addon->id }}"
               class="form-check-input"
               @if(isset($product) && $product->addons->contains($addon->id)) checked @endif>

        <label class="form-check-label">
            {{ $addon->name }} (+₹{{ $addon->price }})
        </label>
    </div>
@endforeach

                            <!-- Description -->
                            <div class="mb-3">
                                <label class="form-label fw-semibold">Short Description</label>
                                <textarea name="short_description"
                                          class="form-control ckeditor"
                                          rows="3">{{ old('short_description', $product->short_description) }}</textarea>
                            </div>

                            <!-- Description -->
                            <div class="mb-3">
                                <label class="form-label fw-semibold">Long Description</label>
                                <textarea name="description"
                                          class="form-control ckeditor"
                                          rows="3">{{ old('description', $product->description) }}</textarea>
                            </div>

                               <!-- Description -->
                            <div class="mb-3">
                                <label class="form-label fw-semibold">Technical Features</label>
                                <textarea name="technical_features"
                                          class="form-control ckeditor"
                                          rows="3">{{ old('technical_features', $product->technical_features) }}</textarea>
                            </div>

                            <!-- Status -->
                            <div class="mb-4">
                                <label class="form-label fw-semibold">Status</label>
                                <select name="status" class="form-select">
                                    <option value="1" {{ $product->status ? 'selected' : '' }}>Active</option>
                                    <option value="0" {{ !$product->status ? 'selected' : '' }}>Inactive</option>
                                </select>
                            </div>

                            <!-- Main Image -->
                            <div class="mb-4">
                                <label class="form-label fw-semibold">Main Image</label>
                                <input type="file" name="image" class="form-control mb-2">

                                @if($product->image)
                                    <img src="{{ asset('storage/products/'.$product->image) }}"
                                         class="img-thumbnail"
                                         width="150">
                                @endif
                            </div>

                            <!-- Gallery Images -->
                            <div class="mb-4">
                                <label class="form-label fw-semibold">Gallery Images</label>
                                <input type="file" name="images[]" class="form-control mb-3" multiple>

                                @if($product->images)
                                    <div class="row">
                                        @foreach($product->images as $img)
                                            <div class="col-3 mb-2">
                                                <img src="{{ asset('storage/products/gallery/'.$img) }}"
                                                     class="img-thumbnail">
                                            </div>
                                        @endforeach
                                    </div>
                                @endif
                            </div>

                            <!-- Buttons -->
                            <div class="d-flex justify-content-end gap-2">
                                <a href="{{ route('admin.products.index') }}" class="btn btn-light">
                                    Cancel
                                </a>

                                <button type="submit" class="btn btn-primary px-4">
                                    <i class="fas fa-save me-2"></i> Update Product
                                </button>
                            </div>

                        </form>

                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

@endsection
