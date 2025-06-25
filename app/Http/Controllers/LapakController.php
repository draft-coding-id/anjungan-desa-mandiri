<?php

namespace App\Http\Controllers;

use App\Models\Lapak;
use App\Models\Warga;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class LapakController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $lapaks = Lapak::with('warga')->paginate(5);
        $wargas = Warga::all();
        return view('admin.lapak.index', ['lapaks' => $lapaks , 'wargas' => $wargas]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $wargas = Warga::all(); // Untuk dropdown pilih warga
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048', // max 2MB
            'nama' => 'required|string|max:255',
            'deskripsi' => 'required',
            'kategori' => 'required|string|max:255',
            'harga' => 'required|numeric',
            'link_gmaps' => 'nullable|url',
            'no_hp' => 'required|min:10',
            'warga_id' => 'required|exists:warga,id',
        ]);

        $data = $request->all();

        // Handle file upload
        if ($request->hasFile('gambar')) {
            $file = $request->file('gambar');
            $path = $file->store('lapak/gambar', 'public');
            $data['gambar'] = $path;
        }

        Lapak::create($data);

        return redirect()->route('lapaks.index')->with('success', 'Lapak berhasil ditambahkan!');
    }

    public function show(string $id)
    {
        $lapak = Lapak::with('warga')->findOrFail($id);
        return view('admin.lapak.show', ['lapak' => $lapak]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $lapak = Lapak::findOrFail($id);
        $wargas = Warga::where('id', '!=', $lapak->warga_id)->get();
        return view('admin.lapak.edit-modal', ['wargas' => $wargas, 'lapak' => $lapak]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $lapak = Lapak::findOrFail($id);

        $request->validate([
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048', // max 2MB
            'nama' => 'required|string|max:255',
            'deskripsi' => 'required',
            'kategori' => 'required|string|max:255',
            'harga' => 'required|numeric',
            'link_gmaps' => 'nullable|url',
            'no_hp' => 'required|min:10',
            'warga_id' => 'required|exists:warga,id',
        ]);

        $data = $request->all();

        // Handle file upload
        if ($request->hasFile('gambar')) {
            // Hapus gambar lama jika ada
            if ($lapak->gambar && Storage::disk('public')->exists($lapak->gambar)) {
                Storage::disk('public')->delete($lapak->gambar);
            }
            $file = $request->file('gambar');
            $path = $file->store('lapak/gambar', 'public');
            $data['gambar'] = $path;
        } else {
            // Jika tidak upload gambar baru, jangan update field gambar
            unset($data['gambar']);
        }

        $lapak->update($data);

        return redirect()->route('lapaks.index')->with('success', 'Lapak berhasil diupdate!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $lapak = Lapak::findOrFail($id);

        // Hapus gambar dari storage jika ada
        if ($lapak->gambar && Storage::disk('public')->exists($lapak->gambar)) {
            Storage::disk('public')->delete($lapak->gambar);
        }

        $lapak->delete();
        return redirect()->route('lapaks.index');
    }
}
