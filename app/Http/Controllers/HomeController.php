<?php

namespace App\Http\Controllers;

use App\Models\News;
use App\Models\TourPackage;
use App\Models\Umkm;
use App\Models\Attraction;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $latestNews = News::where('status', 'publish')
            ->whereNotNull('published_at')
            ->orderBy('published_at', 'desc')
            ->take(3)
            ->get();

        // Data untuk section card/home yang sudah ada
        $umkms = Umkm::latest()->take(3)->get();
        $tourPackages = TourPackage::latest()->take(3)->get();

        // Data khusus untuk marker peta di beranda
        $mapAttractions = Attraction::whereNotNull('latitude')
            ->whereNotNull('longitude')
            ->latest()
            ->get();

        $mapUmkms = Umkm::whereNotNull('latitude')
            ->whereNotNull('longitude')
            ->latest()
            ->get();

        return view('home', compact(
            'latestNews',
            'umkms',
            'tourPackages',
            'mapAttractions',
            'mapUmkms'
        ));
    }

    public function showNews($slug)
    {
        $news = News::where('status', 'publish')
            ->where('slug', $slug)
            ->firstOrFail();

        $related = News::where('status', 'publish')
            ->where('id', '!=', $news->id)
            ->latest()
            ->take(3)
            ->get();

        return view('pages.berita-detail', compact('news', 'related'));
    }
}