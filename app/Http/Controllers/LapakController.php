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
        ], [
            'gambar.image' => 'Gambar harus berupa file gambar.',
            'gambar.mimes' => 'Gambar harus berformat jpeg, png, jpg, gif, atau svg.',
            'gambar.max' => 'Gambar tidak boleh lebih dari 2MB.',
            'nama.required' => 'Nama lapak harus diisi.',
            'nama.string' => 'Nama lapak harus berupa teks.',
            'nama.max' => 'Nama lapak tidak boleh lebih dari 255 karakter.',
            'deskripsi.required' => 'Deskripsi harus diisi.',
            'kategori.required' => 'Kategori harus diisi.',
            'kategori.string' => 'Kategori harus berupa teks.',
            'kategori.max' => 'Kategori tidak boleh lebih dari 255 karakter.',
            'harga.required' => 'Harga harus diisi.',
            'harga.numeric' => 'Harga harus berupa angka.',
            'link_gmaps.url' => 'Link Google Maps tidak valid.',
            'no_hp.required' => 'Nomor HP harus diisi.',
            'no_hp.min' => 'Nomor HP harus terdiri dari minimal 10 digit.',
            'warga_id.required' => 'Warga harus dipilih.',
            'warga_id.exists' => 'Warga yang dipilih tidak valid.',
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
        ], [
            'gambar.image' => 'Gambar harus berupa file gambar.',
            'gambar.mimes' => 'Gambar harus berformat jpeg, png, jpg, gif, atau svg.',
            'gambar.max' => 'Gambar tidak boleh lebih dari 2MB.',
            'nama.required' => 'Nama lapak harus diisi.',
            'nama.string' => 'Nama lapak harus berupa teks.',
            'nama.max' => 'Nama lapak tidak boleh lebih dari 255 karakter.',
            'deskripsi.required' => 'Deskripsi harus diisi.',
            'kategori.required' => 'Kategori harus diisi.',
            'kategori.string' => 'Kategori harus berupa teks.',
            'kategori.max' => 'Kategori tidak boleh lebih dari 255 karakter.',
            'harga.required' => 'Harga harus diisi.',
            'harga.numeric' => 'Harga harus berupa angka.',
            'link_gmaps.url' => 'Link Google Maps tidak valid.',
            'no_hp.required' => 'Nomor HP harus diisi.',
            'no_hp.min' => 'Nomor HP harus terdiri dari minimal 10 digit.',
            'warga_id.required' => 'Warga harus dipilih.',
            'warga_id.exists' => 'Warga yang dipilih tidak valid.',
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
}
