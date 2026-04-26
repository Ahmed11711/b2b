<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Posts;
use App\Models\Service;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function stats()
    {
        $totalRevenue = Posts::where('is_active', true)->sum('price_from');
        $totalBookings = Posts::count();
        $activeServices = Service::where('is_active', true)->count();
        $pendingBookings = Posts::where('is_active', false)->count();

        return response()->json([
            'stats' => [
                'totalRevenue'    => $totalRevenue,
                'totalBookings'   => $totalBookings,
                'activeServices'  => $activeServices,
                'pendingBookings' => $pendingBookings,
            ]
        ]);
    }
    public function recentBookings()
    {
        $bookings = Posts::with(['user'])
            ->latest()
            ->take(10)
            ->get()
            ->map(fn($p) => [
                'id'            => $p->id,
                'customer_name' => $p->user?->user_name ?? $p->user?->name ?? 'Guest',
                'service'       => ['service_name' => $p->title],
                'booking_date'  => $p->created_at,
                'status'        => $p->is_active ? 'confirmed' : 'pending',
                'total_price'   => $p->price_from,
            ]);

        return response()->json(['data' => $bookings]);
    }

    public function weeklyRevenue()
    {
        $days = ['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat'];

        $data = Posts::selectRaw('DAYOFWEEK(created_at) as day, SUM(price_from) as revenue')
            ->where('created_at', '>=', now()->subDays(7))
            ->groupBy('day')
            ->get()
            ->map(fn($item) => [
                'name'    => $days[$item->day - 1],
                'revenue' => (float) $item->revenue,
            ]);

        return response()->json(['data' => $data]);
    }
}
