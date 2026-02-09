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
        @if(auth()->user()->role === 'user')
        <ul class="nav nav-tabs mb-4">
            <li class="nav-item">
                <a class="nav-link" href="{{ route('user.dashboard') }}">My Orders</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('user.addresses.index') }}">Addresses</a>
            </li>
            <li class="nav-item">
                <a class="nav-link active" href="{{ route('profile.edit') }}">Profile</a>
            </li>
        </ul>
        @endif

        @if (session('status') === 'profile-updated')
            <div class="alert alert-success mb-4">Profile updated successfully.</div>
        @endif

        @if (session('status') === 'password-updated')
            <div class="alert alert-success mb-4">Password updated successfully.</div>
        @endif

        @if ($errors->any() && !$errors->updatePassword->any() && !$errors->userDeletion->any())
            <div class="alert alert-danger mb-4">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="row g-4">

            {{-- Profile Information --}}
            <div class="col-lg-6">
                <div class="border rounded p-4">
                    <h5 class="fw-bold mb-3">Profile Information</h5>
                    <p class="text-muted small mb-3">Update your name, email and profile photo.</p>

                    <form method="POST" action="{{ route('profile.update') }}" enctype="multipart/form-data">
                        @csrf
                        @method('patch')

                        <div class="mb-3">
                            <label class="form-label fw-semibold">Profile Photo</label>
                            <div class="d-flex align-items-center gap-3">
                                <img src="{{ auth()->user()->avatar_url }}" alt="Avatar"
                                     class="rounded-circle" style="width: 50px; height: 50px; object-fit: cover;" id="avatar-preview">
                                <input type="file" name="image" class="form-control" accept="image/*"
                                       onchange="document.getElementById('avatar-preview').src = URL.createObjectURL(this.files[0])">
                            </div>
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-semibold">Name <span class="text-danger">*</span></label>
                            <input type="text" name="name" class="form-control" value="{{ old('name', $user->name) }}" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-semibold">Email <span class="text-danger">*</span></label>
                            <input type="email" name="email" class="form-control" value="{{ old('email', $user->email) }}" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-semibold">Phone</label>
                            <input type="text" name="phone" class="form-control" maxlength="10" value="{{ old('phone', $user->phone) }}">
                        </div>

                        <button type="submit" class="btn-submit">Save Changes</button>
                    </form>
                </div>
            </div>

            {{-- Update Password --}}
            <div class="col-lg-6">
                <div class="border rounded p-4">
                    <h5 class="fw-bold mb-3">Update Password</h5>
                    <p class="text-muted small mb-3">Use a strong password to keep your account secure.</p>

                    <form method="POST" action="{{ route('password.update') }}">
                        @csrf
                        @method('put')

                        <div class="mb-3">
                            <label class="form-label fw-semibold">Current Password</label>
                            <input type="password" name="current_password" class="form-control" autocomplete="current-password">
                            @if($errors->updatePassword->has('current_password'))
                                <div class="text-danger small mt-1">{{ $errors->updatePassword->first('current_password') }}</div>
                            @endif
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-semibold">New Password</label>
                            <input type="password" name="password" class="form-control" autocomplete="new-password">
                            @if($errors->updatePassword->has('password'))
                                <div class="text-danger small mt-1">{{ $errors->updatePassword->first('password') }}</div>
                            @endif
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-semibold">Confirm Password</label>
                            <input type="password" name="password_confirmation" class="form-control" autocomplete="new-password">
                        </div>

                        <button type="submit" class="btn-submit">Update Password</button>
                    </form>
                </div>

                {{-- Logout --}}
                <div class="border rounded p-4 mt-4">
                    <h5 class="fw-bold mb-3">Logout</h5>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="btn btn-outline-danger" style="border-radius: 50px;">Logout</button>
                    </form>
                </div>
            </div>

        </div>

    </div>
</div>
@endsection
