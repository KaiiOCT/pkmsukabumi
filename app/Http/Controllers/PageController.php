<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;
use App\Models\Pengelola;
use App\Models\Umkm;

class PageController extends Controller
{
    public function umkm(Request $request)
    {
        $query = Umkm::query();

        if ($request->search) {
            $query->where(function ($q) use ($request) {
                $q->where('name', 'like', '%' . $request->search . '%')
                    ->orWhere('owner_highlight', 'like', '%' . $request->search . '%')
                    ->orWhere('description', 'like', '%' . $request->search . '%');
            });
        }

        if ($request->category) {
            $query->where('category', $request->category);
        }

        $umkms = $query->latest()->get();

        if ($request->ajax()) {
            return view('pages.partials.umkm-grid', compact('umkms'))->render();
        }

        return view('pages.umkm', compact('umkms'));
    }

    public function umkmDetail($id)
    {
        $umkm = Umkm::findOrFail($id);

        return view('pages.umkm-detail', compact('umkm'));
    }

    public function atraksi()
    {
        return view('pages.atraksi');
    }

    public function atraksiDetail()
    {
        return view('pages.atraksi-detail');
    }

    public function berita(Request $request)
    {
        $query = News::where('status', 'publish');

        if ($request->filled('search')) {
            $query->where('title', 'like', '%' . $request->search . '%');
        }

        $news = $query->latest()->get();

        return view('pages.berita', [
            'news' => $news
        ]);
    }

    public function beritaDetail($slug)
    {
        $news = News::where('status', 'publish')
            ->where('slug', $slug)
            ->firstOrFail();

        $related = News::where('status', 'publish')
            ->where('id', '!=', $news->id)
            ->latest()
            ->take(2)
            ->get();

        return view('pages.berita-detail', compact('news', 'related'));
    }

    public function paketWisata()
    {
        return view('pages.paket-wisata');
    }

    public function paketWisataDetail()
    {
        return view('pages.paket-wisata-detail');
    }

    public function profil()
    {
        return view('pages.profil');
    }
}
