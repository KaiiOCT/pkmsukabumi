<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Booking;

class DashboardController extends Controller
{
    public function index()
    {
        $latestBookings = Booking::latest()->take(5)->get();

        $totalBookings = Booking::count();

        return view('admin.dashboard', compact(
            'latestBookings',
            'totalBookings'
        ));
    }
}
