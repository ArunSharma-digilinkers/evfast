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
            <div class="col-xl-8 col-lg-10">
                <div class="card shadow-sm">
                    <div class="card-body">

                        <form method="POST" action="{{ route('admin.products.store') }}" enctype="multipart/form-data">
                            @csrf

                            <!-- Category -->
                            <div class="mb-3">
                                <label class="form-label fw-semibold">
                                    Category
                                </label>
                                <select name="category_id" class="form-select" required>
                                    <option value="">Select Category</option>
                                    @foreach($categories as $cat)
                                    <option value="{{ $cat->id }}">
                                        {{ $cat->name }}
                                    </option>
                                    @endforeach
                                </select>
                            </div>
                            <!-- Product Images -->
                            <div class="mb-4">
                                <label class="form-label fw-semibold">
                                    Product Images
                                </label>

                                <!-- Main Image -->
                                <input type="file" name="image" class="form-control mb-2" accept="image/*" required>

                                <!-- Gallery Images (Optional) -->
                                <small class="text-muted">You can select multiple images</small>
                                <input type="file" name="gallery[]" class="form-control" accept="image/*" multiple>
                            </div>


                            <!-- Product Name -->
                            <div class="mb-3">
                                <label class="form-label fw-semibold">
                                    Product Name
                                </label>
                                <input type="text" name="name" class="form-control" placeholder="Enter product name"
                                    required>
                            </div>

                            <!-- Price & Quantity -->
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label class="form-label fw-semibold">
                                        Price (₹)
                                    </label>
                                    <input type="number" name="price" class="form-control" placeholder="Enter price"
                                        required>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label class="form-label fw-semibold">
                                        Quantity
                                    </label>
                                    <input type="number" name="quantity" class="form-control"
                                        placeholder="Enter quantity" required>
                                </div>
                            </div>

                            <!-- Description -->
                            <div class="mb-3">
                                <label class="form-label fw-semibold">
                                    Description
                                </label>
                                <textarea name="description" class="form-control" rows="4"
                                    placeholder="Product description"></textarea>
                            </div>

                            <!-- Status -->
                            <div class="mb-4">
                                <label class="form-label fw-semibold">
                                    Status
                                </label>
                                <select name="status" class="form-select">
                                    <option value="1" selected>Active</option>
                                    <option value="0">Inactive</option>
                                </select>
                            </div>

                            <!-- Buttons -->
                            <div class="d-flex justify-content-end gap-2">
                                <a href="{{ route('admin.products.index') }}" class="btn btn-light">
                                    Cancel
                                </a>

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