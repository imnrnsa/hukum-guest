<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    /**
     * Constructor - Apply auth middleware to all methods
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Menampilkan dashboard utama
     */
    public function index()
    {
        $user = Auth::user();
        
        // Data statistik
        $stats = [
            'total_users' => 1250,
            'total_orders' => 856,
            'total_revenue' => 24580000,
            'growth_rate' => 12.5,
            'pending_orders' => 23,
            'completed_orders' => 789,
            'active_users' => 842,
            'new_customers' => 45
        ];

        // Data chart (dummy data)
        $chartData = [
            'labels' => ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun'],
            'revenue' => [12000000, 19000000, 15000000, 18000000, 22000000, 24580000],
            'users' => [650, 720, 800, 880, 950, 1020],
            'orders' => [450, 520, 610, 720, 800, 856]
        ];

        // Recent activities
        $activities = [
            [
                'icon' => 'user-plus',
                'color' => 'success',
                'title' => 'New user registered',
                'description' => 'John Doe joined the system',
                'time' => '2 minutes ago'
            ],
            [
                'icon' => 'shopping-cart',
                'color' => 'primary',
                'title' => 'New order received',
                'description' => 'Order #ORD-0012 has been placed',
                'time' => '45 minutes ago'
            ],
            [
                'icon' => 'alert-circle',
                'color' => 'warning',
                'title' => 'System update',
                'description' => 'Security patch applied successfully',
                'time' => '2 hours ago'
            ],
            [
                'icon' => 'trending-up',
                'color' => 'info',
                'title' => 'Performance improved',
                'description' => 'Server response time optimized',
                'time' => '5 hours ago'
            ]
        ];

        return view('dashboard.index', compact('user', 'stats', 'chartData', 'activities'));
    }

    // ... (method lainnya tetap sama)
}