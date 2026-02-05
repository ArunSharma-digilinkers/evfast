@include('layouts.admin-header')

@include('layouts.admin-navigation')

{{-- Main Content --}}
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-3 col-md-4 admin-sidebar mt-4">
            @include('layouts.admin-sidebar')
        </div>
        <div class="col-lg-9 col-md-8 admin-content">
            @yield('content')
        </div>
    </div>
</div>

@include('layouts.admin-footer')
