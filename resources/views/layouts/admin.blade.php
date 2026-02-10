@include('layouts.admin-header')

@include('layouts.admin-navigation')

{{-- Sidebar --}}
@include('layouts.admin-sidebar')

{{-- Main Content --}}
<div class="admin-main-content">
    @yield('content')
</div>

@include('layouts.admin-footer')
