<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Attraction;
use Illuminate\Http\Request;
use App\Models\Booking;
use App\Models\News;
use App\Models\Umkm;

class DashboardController extends Controller
{
    public function index()
    {
        $latestBookings = Booking::latest()->take(5)->get();

        $totalBookings = Booking::count();

        $totalUmkm = Umkm::count();

        $totalBeritaAcara = News::count();

        $totalAtraksi = Attraction::count();

        return view('admin.dashboard', compact(
            'latestBookings',
            'totalBookings',
            'totalUmkm',
            'totalBeritaAcara',
            'totalAtraksi'
        ));
    }
}
