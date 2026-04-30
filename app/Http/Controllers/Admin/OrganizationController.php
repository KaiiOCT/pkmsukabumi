<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pengurus;
use Illuminate\Support\Facades\Storage;

class OrganizationController extends Controller
{
    public function index()
    {
        $pengurus = Pengurus::latest()->get();

        return view('admin.organization.index', compact('pengurus'));
    }

    public function create()
    {
        return view('admin.organization.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'jabatan' => 'required',
            'email' => 'required|email|unique:pengurus,email',
            'no_wa' => 'required',
            'tahun_bergabung' => 'required|digits:4',
            'photo' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        $photo = null;

        if ($request->hasFile('photo')) {
            $photo = $request->file('photo')->store('pengurus', 'public');
        }

        Pengurus::create([
            'nama' => $request->nama,
            'jabatan' => $request->jabatan,
            'email' => $request->email,
            'no_wa' => $request->no_wa,
            'tahun_bergabung' => $request->tahun_bergabung,
            'photo' => $photo,
        ]);

        return redirect()->route('admin.organizations.index')
            ->with('success', 'Pengurus berhasil ditambahkan');
    }

    public function show(string $id)
    {
        $pengurus = Pengurus::findOrFail($id);

        return view('admin.organizations.show', compact('pengurus'));
    }

    public function edit($id)
    {
        $pengurus = Pengurus::findOrFail($id);

        return view('admin.organizations.edit', compact('pengurus'));
    }

    public function update(Request $request, string $id)
    {
        $pengurus = Pengurus::findOrFail($id);

        $request->validate([
            'nama' => 'required',
            'jabatan' => 'required',
            'email' => 'required|email|unique:pengurus,email,' . $id,
            'no_wa' => 'required',
            'tahun_bergabung' => 'required|digits:4',
            'photo' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        $photo = $pengurus->photo;

        if ($request->hasFile('photo')) {

            if ($pengurus->photo && Storage::disk('public')->exists($pengurus->photo)) {
                Storage::disk('public')->delete($pengurus->photo);
            }

            $photo = $request->file('photo')->store('pengurus', 'public');
        }

        $pengurus->update([
            'nama' => $request->nama,
            'jabatan' => $request->jabatan,
            'email' => $request->email,
            'no_wa' => $request->no_wa,
            'tahun_bergabung' => $request->tahun_bergabung,
            'photo' => $photo,
        ]);

        return redirect()->route('admin.organizations.index')
            ->with('success', 'Pengurus berhasil diupdate');
    }

    public function destroy(string $id)
    {
        $pengurus = Pengurus::findOrFail($id);

        if ($pengurus->photo && Storage::disk('public')->exists($pengurus->photo)) {
            Storage::disk('public')->delete($pengurus->photo);
        }

        $pengurus->delete();

        return redirect()->route('admin.organizations.index')
            ->with('success', 'Pengurus berhasil dihapus');
    }
}
