<?php

namespace App\Http\Controllers;

use App\Models\Attraction;

class AttractionControllers extends Controller
{
    public function show($slug)
    {
        $attraction = Attraction::where('slug', $slug)->firstOrFail();

        return view('pages.atraksi-detail', compact('attraction'));
    }

    public function atraksi()
    {
        $attractions = Attraction::latest()->get();

        return view('pages.atraksi', compact('attractions'));
    }

    public function atraksiDetail($slug)
    {
        $attraction = Attraction::where('slug', $slug)->firstOrFail();

        return view('pages.atraksi-detail', compact('attraction'));
    }
}