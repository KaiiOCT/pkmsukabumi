<?php

namespace App\Http\Controllers;

use App\Models\News;
use App\Models\Umkm;
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

        $umkms = Umkm::latest()->take(3)->get();

        return view('home', compact('latestNews', 'umkms'));
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