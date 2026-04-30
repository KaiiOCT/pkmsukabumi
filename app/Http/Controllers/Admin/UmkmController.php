<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Umkm;
use Illuminate\Support\Facades\Storage;

class UmkmController extends Controller
{
    public function index(Request $request)
    {
        $query = Umkm::query();

        if ($request->search) {
            $query->where(function ($q) use ($request) {
                $q->where('name', 'like', '%' . $request->search . '%')
                    ->orWhere('owner_highlight', 'like', '%' . $request->search . '%');
            });
        }

        if ($request->category) {
            $query->where('category', $request->category);
        }

        $umkms = $query->latest()->get();

        if ($request->ajax()) {
            return view('admin.umkm.table', compact('umkms'))->render();
        }

        return view('admin.umkm.index', compact('umkms'));
    }

    public function create()
    {
        return view('admin.umkm.create');
    }

    public function store(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'name' => 'required',
            'owner_highlight' => 'required',
            'slogan' => 'required',
            'category' => 'required',
            'description' => 'required',
            'open_time' => 'required',
            'close_time' => 'required',
            'price_start' => 'required|numeric',
            'address' => 'required',
            'whatsapp' => 'required',
            'main_image' => 'required|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        $mainImage = $request->file('main_image')->store('umkm/main', 'public');

        $gallery = [];

        if ($request->hasFile('gallery')) {
            foreach ($request->file('gallery') as $file) {
                $gallery[] = $file->store('umkm/gallery', 'public');
            }
        }

        $menu = [];

        if ($request->menu) {
            foreach ($request->menu as $item) {
                if (!empty($item['name']) && !empty($item['price'])) {
                    $menu[] = [
                        'name' => $item['name'],
                        'price' => $item['price'],
                        'desc' => $item['desc'] ?? null,
                    ];
                }
            }
        }

        Umkm::create([
            'name' => $request->name,
            'owner_highlight' => $request->owner_highlight,
            'slogan' => $request->slogan,
            'category' => $request->category,
            'description' => $request->description,
            'is_open' => $request->is_open,
            'open_time' => $request->open_time,
            'close_time' => $request->close_time,
            'price_start' => $request->price_start,
            'address' => $request->address,
            'gmaps_url' => $request->gmaps_url,
            'whatsapp' => $request->whatsapp,
            'main_image' => $mainImage,
            'gallery' => $gallery,
            'menu' => $menu,
        ]);

        return redirect()->route('admin.umkm.index')
            ->with('success', 'UMKM berhasil ditambahkan');
    }

    public function show(string $id)
    {
        $umkm = Umkm::findOrFail($id);
        return view('admin.umkm.show', compact('umkm'));
    }

    public function edit($id)
    {
        $umkm = Umkm::findOrFail($id);
        return view('admin.umkm.edit', compact('umkm'));
    }

    public function update(Request $request, string $id)
    {
        $umkm = Umkm::findOrFail($id);

        $mainImage = $umkm->main_image;

        if ($request->hasFile('main_image')) {

            if ($umkm->main_image && Storage::disk('public')->exists($umkm->main_image)) {
                Storage::disk('public')->delete($umkm->main_image);
            }

            $mainImage = $request->file('main_image')->store('umkm/main', 'public');
        }

        $gallery = $umkm->gallery ?? [];

        if ($request->hasFile('gallery')) {
            foreach ($request->file('gallery') as $file) {
                $gallery[] = $file->store('umkm/gallery', 'public');
            }
        }

        $menu = [];

        if ($request->menu) {
            foreach ($request->menu as $item) {
                if (!empty($item['name']) && !empty($item['price'])) {
                    $menu[] = [
                        'name' => $item['name'],
                        'price' => $item['price'],
                        'desc' => $item['desc'] ?? null,
                    ];
                }
            }
        }

        $umkm->update([
            'name' => $request->name,
            'owner_highlight' => $request->owner_highlight,
            'slogan' => $request->slogan,
            'category' => $request->category,
            'description' => $request->description,
            'is_open' => $request->is_open,
            'open_time' => $request->open_time,
            'close_time' => $request->close_time,
            'price_start' => $request->price_start,
            'address' => $request->address,
            'gmaps_url' => $request->gmaps_url,
            'whatsapp' => $request->whatsapp,
            'main_image' => $mainImage,
            'gallery' => $gallery,
            'menu' => $menu,
        ]);

        return redirect()->route('admin.umkm.index')
            ->with('success', 'UMKM berhasil diupdate');
    }

    public function destroy(string $id)
    {
        $umkm = Umkm::findOrFail($id);

        if ($umkm->main_image && Storage::disk('public')->exists($umkm->main_image)) {
            Storage::disk('public')->delete($umkm->main_image);
        }

        if ($umkm->gallery) {
            foreach ($umkm->gallery as $img) {
                if (Storage::disk('public')->exists($img)) {
                    Storage::disk('public')->delete($img);
                }
            }
        }

        $umkm->delete();

        return redirect()->route('admin.umkm.index')
            ->with('success', 'UMKM berhasil dihapus');
    }
}
