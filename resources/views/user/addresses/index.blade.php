@extends('layouts.main')

@section('content')
<div class="main-wrapper">
    <div class="container py-4">

        {{-- User Header --}}
        <div class="d-flex align-items-center gap-3 mb-4">
            <img src="{{ auth()->user()->avatar_url }}" alt="{{ auth()->user()->name }}"
                 class="rounded-circle" style="width: 60px; height: 60px; object-fit: cover;">
            <div>
                <h4 class="fw-bold mb-0">{{ auth()->user()->name }}</h4>
                <span class="text-muted">{{ auth()->user()->email }}</span>
            </div>
        </div>

        {{-- Nav Tabs --}}
        <ul class="nav nav-tabs mb-4">
            <li class="nav-item">
                <a class="nav-link" href="{{ route('user.dashboard') }}">My Orders</a>
            </li>
            <li class="nav-item">
                <a class="nav-link active" href="{{ route('user.addresses.index') }}">Addresses</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('profile.edit') }}">Profile</a>
            </li>
        </ul>

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <div class="d-flex justify-content-between align-items-center mb-4">
            <h5 class="fw-bold mb-0">Saved Addresses</h5>
            <a href="{{ route('user.addresses.create') }}" class="btn-submit">
                <i class="fas fa-plus me-1"></i> Add New Address
            </a>
        </div>

        @if($addresses->count())
            <div class="row g-4">
                @foreach($addresses as $address)
                <div class="col-md-6">
                    <div class="border rounded p-4 h-100 {{ $address->is_default ? 'border-success' : '' }}">
                        <div class="d-flex justify-content-between align-items-start mb-2">
                            <div>
                                <span class="badge bg-secondary">{{ $address->label }}</span>
                                @if($address->is_default)
                                    <span class="badge bg-success ms-1">Default</span>
                                @endif
                            </div>
                            <div class="d-flex gap-2">
                                <a href="{{ route('user.addresses.edit', $address->id) }}" class="text-muted" title="Edit">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <form action="{{ route('user.addresses.destroy', $address->id) }}" method="POST"
                                      onsubmit="return confirm('Delete this address?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-link text-danger p-0" title="Delete">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                            </div>
                        </div>

                        <p class="fw-semibold mb-1">{{ $address->name }}</p>
                        <p class="mb-1">{{ $address->address }}</p>
                        <p class="mb-1">{{ $address->city }}, {{ $address->state }} - {{ $address->pincode }}</p>
                        <p class="mb-0 text-muted">Phone: {{ $address->phone }}</p>
                    </div>
                </div>
                @endforeach
            </div>
        @else
            <div class="text-center py-5">
                <i class="fas fa-map-marker-alt fa-3x text-muted mb-3"></i>
                <h5 class="text-muted">No saved addresses</h5>
                <p class="text-muted">Add an address for faster checkout.</p>
            </div>
        @endif

    </div>
</div>
@endsection
