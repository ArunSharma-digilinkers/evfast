<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Order;
use App\Models\Product;
use App\Models\Category;
use App\Models\AbandonedCheckout;

class DashboardController extends Controller
{
    public function index()
    {
        $totalUsers = User::where('role', 'user')->count();
        $totalOrders = Order::count();
        $pendingOrders = Order::where('status', 'pending')->count();
        $revenue = Order::where('payment_status', 'paid')->sum('total_amount');
        $totalProducts = Product::count();
        $totalCategories = Category::count();
        $abandonedCheckouts = AbandonedCheckout::where('recovered', false)->count();

        $recentOrders = Order::with('user')
            ->latest()
            ->take(10)
            ->get();

        return view('admin.dashboard', compact(
            'totalUsers',
            'totalOrders',
            'pendingOrders',
            'revenue',
            'totalProducts',
            'totalCategories',
            'abandonedCheckouts',
            'recentOrders'
        ));
    }
}
