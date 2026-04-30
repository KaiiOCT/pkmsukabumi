<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class NewsController extends Controller
{
    public function index(Request $request)
    {
        $query = News::query();

        if ($request->filled('search')) {
            $query->where('title', 'like', '%' . $request->search . '%');
        }

        $listNews = $query->latest()->paginate(10);

        if ($request->ajax()) {
            return view('admin.news.partials.table', compact('listNews'))->render();
        }
        
        return view('admin.news.index', [
            'listNews' => $listNews
        ]);
    }

    public function create()
    {
        return view('admin.news.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title'           => 'required|max:255',
            'category'        => 'required|max:100',
            'status'          => 'required|in:publish,draft',
            'main_image'      => 'required|image|mimes:jpg,jpeg,png,webp|max:2048',
            'excerpt'         => 'required',
            'content'         => 'required',
            'image_caption'   => 'nullable',
            'quote_text'      => 'nullable',
            'quote_author'    => 'nullable',
            'has_event'       => 'nullable',
            'event_date'      => 'nullable',
            'event_time'      => 'nullable',
            'event_location'  => 'nullable',
            'event_price'     => 'nullable',
        ]);

        $imagePath = null;

        if ($request->hasFile('main_image')) {
            $imagePath = $request->file('main_image')->store('news', 'public');
        }

        News::create([
            'title'           => $request->title,
            'slug'            => Str::slug($request->title . '-' . time()),
            'category'        => $request->category,
            'status'          => $request->status,
            'is_featured'     => $request->is_featured ? 1 : 0,
            'image'           => $imagePath,
            'image_caption'   => $request->image_caption,
            'excerpt'         => $request->excerpt,
            'content'         => $request->content,
            'quote_text'      => $request->quote_text,
            'quote_author'    => $request->quote_author,
            'has_event'       => $request->has_event ? 1 : 0,
            'event_date'      => $request->has_event ? $request->event_date : null,
            'event_time'      => $request->has_event ? $request->event_time : null,
            'event_location'  => $request->has_event ? $request->event_location : null,
            'event_price'     => $request->has_event ? $request->event_price : null,
            'published_at'    => now(),
        ]);

        return redirect()
            ->route('admin.news.index')
            ->with('success', 'Berita berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $news = News::findOrFail($id);

        return view('admin.news.edit', compact('news'));
    }

    public function update(Request $request, $id)
    {
        $news = News::findOrFail($id);

        $request->validate([
            'title'           => 'required|max:255',
            'category'        => 'required|max:100',
            'status'          => 'required|in:publish,draft',
            'main_image'      => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'excerpt'         => 'required',
            'content'         => 'required',
            'image_caption'   => 'nullable',
            'quote_text'      => 'nullable',
            'quote_author'    => 'nullable',
            'has_event'       => 'nullable',
            'event_date'      => 'nullable',
            'event_time'      => 'nullable',
            'event_location'  => 'nullable',
            'event_price'     => 'nullable',
        ]);

        $imagePath = $news->image;

        if ($request->hasFile('main_image')) {

            if ($news->image && Storage::disk('public')->exists($news->image)) {
                Storage::disk('public')->delete($news->image);
            }

            $imagePath = $request->file('main_image')->store('news', 'public');
        }

        $news->update([
            'title'           => $request->title,
            'slug'            => Str::slug($request->title . '-' . time()),
            'category'        => $request->category,
            'status'          => $request->status,
            'is_featured'     => $request->is_featured ? 1 : 0,
            'image'           => $imagePath,
            'image_caption'   => $request->image_caption,
            'excerpt'         => $request->excerpt,
            'content'         => $request->content,
            'quote_text'      => $request->quote_text,
            'quote_author'    => $request->quote_author,
            'has_event'       => $request->has_event ? 1 : 0,
            'event_date'      => $request->has_event ? $request->event_date : null,
            'event_time'      => $request->has_event ? $request->event_time : null,
            'event_location'  => $request->has_event ? $request->event_location : null,
            'event_price'     => $request->has_event ? $request->event_price : null,
        ]);

        return redirect()
            ->route('admin.news.index')
            ->with('success', 'Berita berhasil diupdate.');
    }

    public function destroy($id)
    {
        $news = News::findOrFail($id);

        if ($news->image && Storage::disk('public')->exists($news->image)) {
            Storage::disk('public')->delete($news->image);
        }

        $news->delete();

        return redirect()
            ->route('admin.news.index')
            ->with('success', 'Berita berhasil dihapus.');
    }
}
