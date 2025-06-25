<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Lapak;
use App\Models\Warga;
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
            'nama' => 'required|string|max:255',
            'deskripsi' => 'required',
            'kategori' => 'required|string|max:255',
            'harga' => 'required|numeric',
            'link_gmaps' => 'nullable|url',
            'no_hp' => 'required|min:10',
            'warga_id' => 'required|exists:warga,id',
        ]);

        Lapak::create($request->all());
        return redirect()->route('lapaks.index')->with('success', 'Lapak berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $lapak = Lapak::with('warga')->findOrFail($id);
        return view('admin.lapak.show' , ['lapak' => $lapak]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $lapak = Lapak::findOrFail($id);
        $wargas = Warga::where('id' , '!=' ,$lapak->warga_id)->get();
        return view('admin.lapak.edit-modal' , ['wargas' => $wargas , 'lapak' => $lapak]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $lapak = Lapak::findOrFail($id);

        $request->validate([
            'nama' => 'required|string|max:255',
            'deskripsi' => 'required',
            'kategori' => 'required|string|max:255',
            'harga' => 'required|numeric',
            'link_gmaps' => 'nullable|url',
            'no_hp' => 'required|min:10',
            'warga_id' => 'required|exists:warga,id',
        ]);

        $lapak->update($request->all());

        return redirect()->route('lapaks.index')->with('success', 'Lapak berhasil diupdate!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $lapak = Lapak::findOrFail($id);
        $lapak->delete();
        return redirect()->route('lapaks.index');
    }
}
