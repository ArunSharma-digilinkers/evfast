@extends('layouts.admin')

@section('title', 'Add Addons Product')

@section('content')

<div class="main-wrapper">
    <div class="container">
        <div class="row">
            <div class="col-lg-10">
                <form method="POST" action="{{ route('admin.addons.store') }}">
    @csrf

    <div class="mb-3">
        <label>Add-on Name</label>
        <input type="text" name="name" class="form-control" required>
    </div>

    <div class="mb-3">
        <label>Price</label>
        <input type="number" name="price" class="form-control" required>
    </div>

    <div class="mb-3">
        <label>Status</label>
        <select name="status" class="form-select">
            <option value="1">Active</option>
            <option value="0">Inactive</option>
        </select>
    </div>

    <button class="btn btn-success">Save Add-on</button>
</form>

            </div>
        </div>
    </div>
</div>

@endsection