@extends('layouts.admin')

@section('title', 'Add Product')

@section('content')

<div class="main-wrapper py-4">
    <div class="container-fluid">

        <!-- Page Header -->
        <div class="d-flex justify-content-between align-items-center mb-4">
            <div>
                <h2 class="fw-bold mb-0">Add Product</h2>
                <small class="text-muted">Create a new product</small>
            </div>

            <a href="{{ route('admin.products.index') }}" class="btn btn-outline-secondary">
                <i class="fas fa-arrow-left me-2"></i> Back
            </a>
        </div>

        <!-- Form Card -->
        <div class="row justify-content-center">
            <div class="col-xl-10 col-lg-12">
                <div class="card shadow-sm">
                    <div class="card-body">

                        <form method="POST" action="{{ route('admin.products.store') }}" enctype="multipart/form-data">
                            @csrf

                            <div class="row">
                                <div class="col-md-6">
                                    <!-- Category -->
                                    <div class="mb-3">
                                        <label class="form-label fw-semibold">Category</label>
                                        <select name="category_id" class="form-select" required>
                                            <option value="">Select Category</option>
                                            @foreach($categories as $cat)
                                            <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label class="form-label fw-semibold">Product Name</label>
                                    <input type="text" name="name" class="form-control" placeholder="Enter product name"
                                        required>
                                </div>

                            </div>

                            <!-- Name & Quantity -->
                            <div class="row">
                                <div class="col-md-6">

                                    <!-- Product Images -->
                                    <div class="mb-4">
                                        <label class="form-label fw-semibold">Product Images</label>
                                        <input type="file" name="image" class="form-control mb-2" accept="image/*"
                                            required>
                                        <small class="text-muted d-block mb-1">Gallery Images (Optional)</small>
                                        <input type="file" name="gallery[]" class="form-control" accept="image/*"
                                            multiple>
                                    </div>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label class="form-label fw-semibold">Quantity</label>
                                    <input type="number" name="quantity" class="form-control"
                                        placeholder="Enter quantity" required>
                                </div>
                            </div>

                            <!-- Price -->
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label class="form-label fw-semibold">Sales Price (₹)</label>
                                    <input type="number" name="sale_price" class="form-control"
                                        placeholder="Enter sales price" required>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label fw-semibold">Price (₹)</label>
                                    <input type="number" name="price" class="form-control" placeholder="Enter MRP price"
                                        required>
                                </div>

                                <!-- Add-on Products -->
                                <div class="mb-3">
                                    <label class="form-label fw-semibold">Add-on Products</label>

                                    <select name="addons[]" class="form-select" multiple>
                                        @foreach ($products as $addon)
                                        <option value="{{ $addon->id }}">
                                            {{ $addon->name }} (₹{{ $addon->price }})
                                        </option>
                                        @endforeach
                                    </select>

                                    <small class="text-muted">
                                        Hold <b>Ctrl</b> to select multiple add-ons.
                                    </small>
                                </div>

                            </div>

                            <!-- Descriptions -->
                            <div class="mb-3">
                                <label class="form-label fw-semibold">Short Description</label>
                                <textarea name="short_description" class="form-control ckeditor" rows="3"></textarea>
                            </div>

                            <div class="mb-3">
                                <label class="form-label fw-semibold">Long Description</label>
                                <textarea name="description" class="form-control ckeditor" rows="4"></textarea>
                            </div>

                            <div class="mb-3">
                                <label class="form-label fw-semibold">Technical Features</label>
                                <textarea name="technical_features" class="form-control ckeditor" rows="4"></textarea>
                            </div>

                            <div class="mb-3">
                                <label class="form-label fw-semibold">Product Warranty</label>
                                <textarea name="warranty" class="form-control ckeditor" rows="3"></textarea>
                            </div>
                            <div class="mb-3">
                                <label class="form-label fw-semibold">YouTube Video URL</label>
                                <input type="url" name="youtube_url" class="form-control"
                                    placeholder="https://www.youtube.com/embed/VIDEO_ID">
                                <small class="text-muted">
                                    Use embed URL (recommended)
                                </small>
                            </div>

                            <!-- Status -->
                            <div class="mb-4">
                                <label class="form-label fw-semibold">Status</label>
                                <select name="status" class="form-select">
                                    <option value="1" selected>Active</option>
                                    <option value="0">Inactive</option>
                                </select>
                            </div>

                            <!-- Actions -->
                            <div class="d-flex justify-content-end gap-2">
                                <a href="{{ route('admin.products.index') }}" class="btn btn-light">Cancel</a>
                                <button type="submit" class="btn btn-success px-4">
                                    <i class="fas fa-save me-2"></i> Save Product
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