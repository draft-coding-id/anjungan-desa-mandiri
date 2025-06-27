<?php

namespace App\Http\Controllers;

use App\Models\SejarahDesa;
use Illuminate\Http\Request;

class InformasiDesa extends Controller
{
    public function index(){
        $increment = 1;
        $sejarahDesa = SejarahDesa::paginate(5);
        return view('admin.informasi-desa.index' , [
            'sejarahDesa' => $sejarahDesa,
            'increment' => $increment,
        ]);
    }
    public function storeSejarahDesa(Request $request)
    {
        // Validasi input termasuk array pemimpin_desa
        $request->validate([
            'judul' => 'required|string|max:255',
            'content' => 'required|string',
            'pemimpin_desa' => 'required|array|min:1',
            'pemimpin_desa.*.nama' => 'required|string|max:255',
            'pemimpin_desa.*.mulai_jabat' => 'required|date',
            'pemimpin_desa.*.akhir_jabat' => 'required|date|after:pemimpin_desa.*.mulai_jabat',
        ], [
            'judul.required' => 'Judul informasi wajib diisi',
            'content.required' => 'Konten informasi wajib diisi',
            'pemimpin_desa.required' => 'Data pemimpin desa wajib diisi',
            'pemimpin_desa.min' => 'Minimal harus ada 1 data pemimpin desa',
            'pemimpin_desa.*.nama.required' => 'Nama pemimpin wajib diisi',
            'pemimpin_desa.*.mulai_jabat.required' => 'Tanggal mulai jabat wajib diisi',
            'pemimpin_desa.*.akhir_jabat.required' => 'Tanggal akhir jabat wajib diisi',
            'pemimpin_desa.*.akhir_jabat.after' => 'Tanggal akhir jabat harus setelah tanggal mulai jabat',
        ]);

        try {
            // Buat data sejarah desa
            SejarahDesa::create([
                'judul' => $request->judul,
                'content' => $request->content,
                'pemimpin_desa' => json_encode($request->pemimpin_desa), // Convert array to JSON
            ]);

            return redirect()->route('info-desa.index')
                ->with('success', 'Data sejarah desa berhasil disimpan');
        } catch (\Exception $e) {
            return redirect()->back()
                ->withInput()
                ->with('error', 'Gagal menyimpan data: ' . $e->getMessage());
        }
    }

    public function showSejarahDesa($id){
        $sejarahDesa = SejarahDesa::findOrFail($id);
        return view('admin.informasi-desa.show-sejarah-desa-modal' , [
            'sejarahDesa' => $sejarahDesa,
        ]);
    }

    public function editSejarahDesa($id){
        $sejarahDesa = SejarahDesa::findOrFail($id);
        return view('admin.informasi-desa.edit-sejarah-desa-modal', [
            'sejarahDesa' => $sejarahDesa,
        ]);
    }

    public function updateSejarahDesa(Request $request , $id){
        $sejarahDesa = SejarahDesa::findOrFail($id);
        $request->validate([
            'judul' => 'required',
            'content' => 'required',
            'pemimpin_desa' => 'required'
        ]);
        $sejarahDesa->update($request->all());
        return redirect()->route('info-desa.index');
    }

    public function deleteSejarahDesa($id){
        $data = SejarahDesa::findOrFail($id);
        $data->delete();
        return redirect()->route('info-desa.index');
    }
}
