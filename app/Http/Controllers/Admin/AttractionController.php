<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Attraction;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class AttractionController extends Controller
{
    /**
     * LIST DATA
     */
    public function index()
    {
        $attractions = Attraction::latest()->get();

        return view(
            'admin.attractions.index',
            compact('attractions')
        );
    }

    /**
     * FORM CREATE
     */
    public function create()
    {
        return view('admin.attractions.create');
    }

    /**
     * SIMPAN DATA
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'excerpt' => 'required',
            'description' => 'required',
            'category' => 'required',
            'main_image' => 'required|image',
            'latitude' => 'nullable|numeric|between:-90,90',
            'longitude' => 'nullable|numeric|between:-180,180',
        ]);

        $imagePath = null;

        if ($request->hasFile('main_image')) {
            $imagePath = $request
                ->file('main_image')
                ->store('attractions', 'public');
        }

        Attraction::create([
            'name' => $request->name,
            'slug' => Str::slug($request->name),
            'excerpt' => $request->excerpt,
            'description' => $request->description,
            'category' => $request->category,

            'location_label' => $request->location_label,
            'special_badge' => $request->special_badge,

            'operational_days' => $request->operational_days,
            'open_time' => $request->open_time,
            'close_time' => $request->close_time,

            'ticket_price' => $request->ticket_price,
            'facilities' => $request->facilities,

            'google_maps_url' => $request->google_maps_url,

            'latitude' => $request->latitude,
            'longitude' => $request->longitude,

            'main_image' => $imagePath,
        ]);

        return redirect()
            ->route('admin.attractions.index')
            ->with('success', 'Atraksi berhasil ditambahkan');
    }

    public function edit($id)
    {
        $attraction = Attraction::findOrFail($id);

        return view('admin.attractions.edit', compact('attraction'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'excerpt' => 'required',
            'description' => 'required',
            'category' => 'required',
            'main_image' => 'nullable|image',
            'latitude' => 'nullable|numeric|between:-90,90',
            'longitude' => 'nullable|numeric|between:-180,180',
        ]);

        $attraction = Attraction::findOrFail($id);

        if ($request->hasFile('main_image')) {
            if ($attraction->main_image && Storage::disk('public')->exists($attraction->main_image)) {
                Storage::disk('public')->delete($attraction->main_image);
            }

            $imagePath = $request->file('main_image')->store('attractions', 'public');
            $attraction->main_image = $imagePath;
        }

        $attraction->name = $request->name;
        $attraction->slug = Str::slug($request->name);
        $attraction->excerpt = $request->excerpt;
        $attraction->description = $request->description;
        $attraction->location_label = $request->location_label;
        $attraction->special_badge = $request->special_badge;
        $attraction->category = $request->category;
        $attraction->operational_days = $request->operational_days;
        $attraction->open_time = $request->open_time;
        $attraction->close_time = $request->close_time;
        $attraction->ticket_price = $request->ticket_price;
        $attraction->facilities = $request->facilities;
        $attraction->google_maps_url = $request->google_maps_url;

        $attraction->latitude = $request->latitude;
        $attraction->longitude = $request->longitude;

        $attraction->save();

        if ($request->hasFile('gallery')) {
            foreach ($request->file('gallery') as $file) {
                $path = $file->store('attraction-gallery', 'public');

                $attraction->galleries()->create([
                    'image' => $path
                ]);
            }
        }

        return redirect()
            ->route('admin.attractions.index')
            ->with('success', 'Data berhasil diupdate');
    }

    public function destroy($id)
    {
        $attraction = Attraction::findOrFail($id);

        // hapus gallery dulu kalau ada
        if ($attraction->galleries) {
            foreach ($attraction->galleries as $gallery) {

                // hapus file gambar gallery
                if (\Storage::disk('public')->exists($gallery->image)) {
                    \Storage::disk('public')->delete($gallery->image);
                }

                $gallery->delete();
            }
        }

        // hapus gambar utama
        if ($attraction->main_image &&
            \Storage::disk('public')->exists($attraction->main_image)) {

            \Storage::disk('public')->delete($attraction->main_image);
        }

        // hapus data attraction
        $attraction->delete();

        return redirect()
            ->route('admin.attractions.index')
            ->with('success', 'Atraksi berhasil dihapus');
    }
}