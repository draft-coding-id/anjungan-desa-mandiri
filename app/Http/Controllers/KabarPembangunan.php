<?php

namespace App\Http\Controllers;

use App\Models\KabarPembangunan as ModelsKabarPembangunan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Exception;

class KabarPembangunan extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pembangunan = ModelsKabarPembangunan::all();
        return view('admin.pembangunan.index', [
            'pembangunan' => $pembangunan,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            // Validasi input
            $request->validate([
                'nama' => 'required|string|max:255',
                'foto' => 'nullable',
                'tahun' => 'required|integer|min:1900|max:' . (date('Y') + 10),
                'anggaran' => 'required|numeric|min:0',
                'link_gmaps' => 'nullable|url',
                'volume' => 'nullable|string|max:255',
                'sumber_dana' => 'required|string|max:255',
                'pelaksana' => 'required|string|max:255',
                'lokasi' => 'required|string|max:255',
                'manfaat' => 'nullable|string',
                'keterangan' => 'nullable|string',
            ]);

            $data = $request->all();
            
            // Handle file upload
            if ($request->hasFile('foto')) {
                $file = $request->file('foto');
                $fileName = time() . "-" . $file->getClientOriginalName();
                $path = $file->storeAs('kabar-pembangunan/', $fileName, 'public');
                $data['foto'] = $path;
            }
            // Create new record
            ModelsKabarPembangunan::create($data);

            return redirect()->route('pembangunan-desa.index')
                ->with('success', 'Data kabar pembangunan berhasil ditambahkan.');
        } catch (Exception $e) {

            return redirect()->back()
                ->with('error', 'Terjadi kesalahan: ' . $e->getMessage())
                ->withInput();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
       $pembangunan = ModelsKabarPembangunan::findOrFail($id);
       return view('admin.pembangunan.show' , [
            'pembangunan' => $pembangunan,
       ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        try {
            $pembangunan = ModelsKabarPembangunan::findOrFail($id);
            return view('admin.pembangunan.edit', [
                'pembangunan' => $pembangunan,
            ]);
        } catch (Exception $e) {
            return redirect()->route('pembangunan-desa.index')
                ->with('error', 'Data tidak ditemukan.');
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        try {
            // Find the record
            $pembangunan = ModelsKabarPembangunan::findOrFail($id);

            // Validasi input
            $request->validate([
                'nama' => 'required|string|max:255',
                'foto' => 'nullable',
                'tahun' => 'required|integer|min:1900|max:' . (date('Y') + 10),
                'anggaran' => 'required|numeric|min:0',
                'link_gmaps' => 'nullable|url',
                'volume' => 'nullable|string|max:255',
                'sumber_dana' => 'required|string|max:255',
                'pelaksana' => 'required|string|max:255',
                'lokasi' => 'required|string|max:255',
                'manfaat' => 'nullable|string',
                'keterangan' => 'nullable|string',
            ]);

            $data = $request->all();
            $oldPhoto = $pembangunan->foto;

            // Handle file upload
            if ($request->hasFile('foto')) {
                $file = $request->file('foto');
                $filename = time() . '_' . $file->getClientOriginalName();
                $path = $file->storeAs('kabar-pembangunan', $filename, 'public');
                $data['foto'] = $path;

                // Delete old photo if exists
                if ($oldPhoto && Storage::disk('public')->exists($oldPhoto)) {
                    Storage::disk('public')->delete($oldPhoto);
                }
            } else {
                // Keep the old photo if no new photo is uploaded
                unset($data['foto']);
            }

            // Update the record
            $pembangunan->update($data);

            return redirect()->route('pembangunan-desa.index')
                ->with('success', 'Data kabar pembangunan berhasil diperbarui.');
        } catch (Exception $e) {
            // Delete uploaded file if exists and there's an error
            if (isset($path) && Storage::disk('public')->exists($path)) {
                Storage::disk('public')->delete($path);
            }

            return redirect()->back()
                ->with('error', 'Terjadi kesalahan: ' . $e->getMessage())
                ->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $pembangunan = ModelsKabarPembangunan::findOrFail($id);

            // Delete associated photo if exists
            if ($pembangunan->foto && Storage::disk('public')->exists($pembangunan->foto)) {
                Storage::disk('public')->delete($pembangunan->foto);
            }

            // Delete the record
            $pembangunan->delete();

            return redirect()->route('pembangunan-desa.index')
                ->with('success', 'Data kabar pembangunan berhasil dihapus.');
        } catch (Exception $e) {
            return redirect()->route('pembangunan-desa.index')
                ->with('error', 'Terjadi kesalahan saat menghapus data: ' . $e->getMessage());
        }
    }
}
