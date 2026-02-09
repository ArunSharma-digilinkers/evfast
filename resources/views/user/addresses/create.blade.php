@extends('layouts.main')

@section('content')
<div class="main-wrapper">
    <div class="container py-4">

        <a href="{{ route('user.addresses.index') }}" class="text-decoration-none mb-3 d-inline-block">
            <i class="fas fa-arrow-left me-1"></i> Back to Addresses
        </a>

        <h4 class="fw-bold mb-4">Add New Address</h4>

        @if ($errors->any())
            <div class="alert alert-danger mb-4">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="border rounded p-4" style="max-width: 700px;">
            <form action="{{ route('user.addresses.store') }}" method="POST">
                @csrf

                <div class="row g-3">

                    <div class="col-md-6">
                        <label class="form-label fw-semibold">Label <span class="text-danger">*</span></label>
                        <input type="text" name="label" class="form-control" value="{{ old('label', 'Home') }}" placeholder="e.g. Home, Office" required>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label fw-semibold">Full Name <span class="text-danger">*</span></label>
                        <input type="text" name="name" class="form-control" value="{{ old('name', auth()->user()->name) }}" required>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label fw-semibold">Phone <span class="text-danger">*</span></label>
                        <input type="text" name="phone" class="form-control" maxlength="10" value="{{ old('phone', auth()->user()->phone) }}" required>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label fw-semibold">Pincode <span class="text-danger">*</span></label>
                        <input type="text" name="pincode" class="form-control" maxlength="6" value="{{ old('pincode') }}" required>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label fw-semibold">State <span class="text-danger">*</span></label>
                        <select name="state" class="form-select" required>
                            <option value="">Select State</option>
                            @foreach($states as $state)
                                <option value="{{ $state }}" {{ old('state') === $state ? 'selected' : '' }}>{{ $state }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label fw-semibold">City <span class="text-danger">*</span></label>
                        <input type="text" name="city" class="form-control" value="{{ old('city') }}" required>
                    </div>

                    <div class="col-12">
                        <label class="form-label fw-semibold">Full Address <span class="text-danger">*</span></label>
                        <textarea name="address" rows="3" class="form-control" required>{{ old('address') }}</textarea>
                    </div>

                    <div class="col-12">
                        <div class="form-check">
                            <input type="checkbox" name="is_default" value="1" class="form-check-input" id="is_default"
                                   {{ old('is_default') ? 'checked' : '' }}>
                            <label class="form-check-label" for="is_default">Set as default address</label>
                        </div>
                    </div>

                    <div class="col-12">
                        <button type="submit" class="btn-submit">Save Address</button>
                    </div>

                </div>
            </form>
        </div>

    </div>
</div>
@endsection
