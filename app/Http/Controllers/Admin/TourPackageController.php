<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\TourPackage;

class TourPackageController extends Controller
{
    public function index()
    {
        $packages = TourPackage::latest()->paginate(10);

        return view('admin.packages.index', compact('packages'));
    }

    public function create()
    {
        return view('admin.packages.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title_line1' => 'required',
            'title_line2' => 'required',
            'catchphrase' => 'required',
            'location_label' => 'required',
            'description' => 'required',
            'price' => 'required|numeric',
            'main_image' => 'required|image',
        ]);

        $mainImage = null;

        if ($request->hasFile('main_image')) {
            $mainImage = $request->file('main_image')
                ->store('tour-packages', 'public');
        }

        $gallery = [];

        if ($request->hasFile('gallery')) {
            foreach ($request->file('gallery') as $image) {
                $gallery[] = $image->store('tour-packages/gallery', 'public');
            }
        }

        TourPackage::create([
            'title_line1' => $request->title_line1,
            'title_line2' => $request->title_line2,
            'catchphrase' => $request->catchphrase,
            'location_label' => $request->location_label,
            'quote' => $request->quote,
            'description' => $request->description,
            'duration' => $request->duration,
            'group_size' => $request->group_size,
            'guide' => $request->guide,
            'activity_type' => $request->activity_type,
            'price' => $request->price,
            'price_strike' => $request->price_strike,
            'slots_left' => $request->slots_left,
            'status' => $request->status,
            'category' => $request->category,
            'included' => $request->included,
            'excluded' => $request->excluded,
            'main_image' => $mainImage,
            'gallery' => $gallery,
            'itinerary' => $request->itinerary,
            'is_bestseller' => $request->has('is_bestseller'),
        ]);

        return redirect()
            ->route('admin.packages.index')
            ->with('success', 'Paket wisata berhasil ditambahkan');
    }

    public function edit($id)
    {
        $package = TourPackage::findOrFail($id);

        return view('admin.packages.edit', compact('package'));
    }

    public function update(Request $request, $id)
    {
        $package = TourPackage::findOrFail($id);

        $mainImage = $package->main_image;

        if ($request->hasFile('main_image')) {
            $mainImage = $request->file('main_image')
                ->store('tour-packages', 'public');
        }

        $gallery = $package->gallery ?? [];

        if ($request->hasFile('gallery')) {
            $gallery = [];

            foreach ($request->file('gallery') as $image) {
                $gallery[] = $image->store('tour-packages/gallery', 'public');
            }
        }

        $package->update([
            'title_line1' => $request->title_line1,
            'title_line2' => $request->title_line2,
            'catchphrase' => $request->catchphrase,
            'location_label' => $request->location_label,
            'quote' => $request->quote,
            'description' => $request->description,
            'duration' => $request->duration,
            'group_size' => $request->group_size,
            'guide' => $request->guide,
            'activity_type' => $request->activity_type,
            'price' => $request->price,
            'price_strike' => $request->price_strike,
            'slots_left' => $request->slots_left,
            'status' => $request->status,
            'category' => $request->category,
            'included' => $request->included,
            'excluded' => $request->excluded,
            'main_image' => $mainImage,
            'gallery' => $gallery,
            'itinerary' => $request->itinerary,
            'is_bestseller' => $request->has('is_bestseller'),
        ]);

        return redirect()
            ->route('admin.packages.index')
            ->with('success', 'Paket wisata berhasil diperbarui');
    }

    public function destroy($id)
    {
        $package = TourPackage::findOrFail($id);

        $package->delete();

        return back()->with('success', 'Paket berhasil dihapus');
    }
}