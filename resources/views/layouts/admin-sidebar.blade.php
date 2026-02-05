<div class="d-flex sidebar-top">
    <!-- Sidebar -->
    <nav class="admin-sidebar bg-dark text-white p-4">
        <h4 class="text-center mb-4 fw-bold">
            <i class="fas fa-user-shield me-2"></i> Admin Panel
        </h4>

        <ul class="nav flex-column gap-1">
            <li class="nav-item">
                <a href="{{ route('admin.dashboard') }}" class="nav-link active">
                    <i class="fas fa-home me-2"></i> Dashboard
                </a>
            </li>

            <li class="nav-item">
                <a href="{{ route('admin.categories.index') }}" class="nav-link">
                    <i class="fas fa-layer-group me-2"></i> Product Categories
                </a>
            </li>

            <li class="nav-item">
                <a href="{{ route('admin.products.index') }}" class="nav-link">
                    <i class="fas fa-box-open me-2"></i> Products
                </a>
            </li>

            <li class="nav-item">
                <a href="{{ route('admin.orders.index') }}" class="nav-link">
                    <i class="fas fa-shopping-cart me-2"></i> Orders
                </a>
            </li>


            <li class="nav-item mt-4">
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="btn btn-danger w-100">
                        <i class="fas fa-sign-out-alt me-2"></i> Logout
                    </button>
                </form>
            </li>
        </ul>
    </nav>
</div>
