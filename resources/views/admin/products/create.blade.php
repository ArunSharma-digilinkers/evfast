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

                            @if ($errors->any())
                                <div class="alert alert-danger mb-4">
                                    <ul class="mb-0">
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif

                            <form method="POST" action="{{ route('admin.products.store') }}" enctype="multipart/form-data">
                                @csrf

                                <div class="row">
                                    <div class="col-md-6">
                                        <!-- Category -->
                                        <div class="mb-3">
                                            <label class="form-label">Category <span class="text-danger">*</span></label>
                                            <select name="category_id" class="form-select" required>
                                                <option value="">Select Category</option>
                                                @foreach ($categories as $cat)
                                                    <option value="{{ $cat->id }}"
                                                        {{ old('category_id') == $cat->id ? 'selected' : '' }}>
                                                        {{ $cat->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Product Name <span class="text-danger">*</span></label>
                                        <input type="text" name="name" class="form-control"
                                            placeholder="Enter product name" value="{{ old('name') }}" required>
                                    </div>

                                </div>

                                <!-- Product Images and quantity -->
                                <div class="row">

                                    <div class="col-md-4">
                                        <label class="form-label">Product Image <span class="text-danger">*</span></label>
                                        <input type="file" name="image" class="form-control mb-2" accept="image/*"
                                            required>
                                    </div>
                                    <div class="col-md-4">
                                        <label class="form-label">Gallery Images</label>
                                        <input type="file" name="images[]" class="form-control" accept="image/*"
                                            multiple>
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label class="form-label">Quantity <span class="text-danger">*</span></label>
                                        <input type="number" name="quantity" class="form-control"
                                            placeholder="Enter quantity" value="{{ old('quantity') }}" required>
                                    </div>

                                </div>

                                <!-- Price -->
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">MRP (₹) <span class="text-danger">*</span></label>
                                        <input type="number" name="sale_price" class="form-control" placeholder="Enter MRP"
                                            value="{{ old('sale_price') }}" required>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Price (₹) <span class="text-danger">*</span></label>
                                        <input type="number" name="price" class="form-control"
                                            placeholder="Enter sale price" value="{{ old('price') }}" required>
                                    </div>

                                    <div class="col-md-4 mb-3">
                                        <label class="form-label">GST Percentage (%)</label>
                                        <input type="number" name="gst_percentage" class="form-control" step="0.01"
                                            min="0" value="{{ old('gst_percentage', 0) }}" placeholder="e.g. 18">
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label class="form-label">GST Type</label>
                                        <select name="gst_type" class="form-select">
                                            <option value="inclusive"
                                                {{ old('gst_type') === 'inclusive' ? 'selected' : '' }}>Inclusive (Price
                                                includes GST)</option>
                                            <option value="extra" {{ old('gst_type') === 'extra' ? 'selected' : '' }}>
                                                Extra
                                                (GST added on top)</option>
                                        </select>
                                    </div>

                                    <div class="col-md-4 mb-3">
                                        <label class="form-label">Shipping Type</label>
                                        <select name="shipping_type" class="form-select">
                                            <option value="free" {{ old('shipping_type') === 'free' ? 'selected' : '' }}>
                                                Free Shipping</option>
                                            <option value="zone" {{ old('shipping_type') === 'zone' ? 'selected' : '' }}>
                                                Zone-based Shipping</option>
                                        </select>
                                    </div>

                                    <!-- Add-on Products -->
                                    <div class="mb-3">
                                        <label class="form-label">Add-on Products</label>

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
                                    <label class="form-label">Short Description</label>
                                    <textarea name="short_description" class="form-control ckeditor" rows="3"></textarea>
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">Long Description</label>
                                    <textarea name="description" class="form-control ckeditor" rows="4"></textarea>
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">Technical Features</label>
                                    <textarea name="technical_features" class="form-control ckeditor" rows="4"></textarea>
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">Product Warranty</label>
                                    <textarea name="warranty" class="form-control ckeditor" rows="3"></textarea>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">YouTube Video URL</label>
                                    <input type="url" name="youtube_url" class="form-control"
                                        placeholder="https://www.youtube.com/embed/VIDEO_ID"
                                        value="{{ old('youtube_url') }}">
                                    <small class="text-muted">
                                        Use embed URL (recommended)
                                    </small>
                                </div>

                                <!-- Status -->
                                <div class="mb-4">
                                    <label class="form-label">Status</label>
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
