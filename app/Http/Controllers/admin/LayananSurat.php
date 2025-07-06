<?php

namespace App\Http\Controllers\admin;

use App\Jobs\MakePdf;
use App\Models\Surat;
use App\Models\skDomisili;
use Illuminate\Http\Request;
use App\Models\KategoriSurat;
use App\Models\JenisSuratField;
use App\Models\FormFieldTemplate;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use App\Models\JenisSurat as JenisSuratModel;

class LayananSurat extends Controller
{
    public function index()
    {
        $dalamProses = surat::DalamProses()->paginate(10);
        $belumDikirimKeWarga = Surat::BelumDikirimkanKeWarga()->paginate(10);
        $increment = 1;
        $incrementForTableBelumDiserahkan = 1;
        return view('admin.layanan-surat.dalam-proses', [
            'dalamProses' => $dalamProses,
            'belumDikirimKeWarga' => $belumDikirimKeWarga,
            'increment' => $increment,
            'incrementForTableBelumDiserahkan' => $incrementForTableBelumDiserahkan,
        ]);
    }

    public function lihatSurat($id)
    {
        $surat = Surat::find($id);
        return $surat;
    }
    public function previewDokumen($id){
        $surat = Surat::find($id); 
        $fileUrl = asset('storage/' . $surat->file); // perhatikan perubahan ini

        return response()->json([
            'jenis_surat' => $surat->jenis_surat,
            'file' => $fileUrl,
        ]);
    }
    public function previewSurat($jenisSurat, $id)
    {
        $surat = Surat::find($id);
        $view = match ($jenisSurat) {
            "SKD" => 'admin.preview-surat.surat_ket_domisili',
            "SKP" => 'admin.preview-surat.surat_ket_pengantar',
            "SKWH" => 'admin.preview-surat.surat_ket_wali_hakim',
            "SKK" => 'admin.preview-surat.surat_ket_kematian',
            "SKCK" => 'surat.preview.skck',
            "SKKTPDP" => 'surat.preview.skktpdp',
            "SPKK" => 'surat.preview.spkk',
            "SPPKK" => 'surat.preview.sppkk'
        };
        return view($view, [
            'surat' => $surat,
        ]);
    }

    public function setujuiSurat($id)
    {
        $surat = Surat::find($id);
        $fileName = "surat-" . $surat->jenis_surat . $surat->id . "-" . $surat->warga->nik . "-" . date('hhmmss');
        $surat->update([
            'is_accepted' => true,
            'status' => 'Telah disetujui oleh ' . Auth::user()->akses,
            'updated_at' => now(),
            'is_approve_admin' => true,
            'file_surat' => $fileName,
        ]);
        Cache::forget('beranda');

        MakePdf::dispatch($surat, $fileName);
        return redirect()->route('layanan-surat-dalam-proses');
    }

    // Untuk meng Get surat yang sudah selesai
    public function suratSelesai($id)
    {
        $surat = Surat::find($id);
        return view('admin.layanan-surat.proses-surat.surat-selesai', [
            'surat' => $surat,
        ]);
    }
    public function kirimSurat($id, Request $request)
    {
        $message = urlencode($request->pesan_wa);
        $surat = Surat::findOrFail($id);
        $surat->update([
            'status' => 'Surat Telah Dikirim',
            'updated_at' => now(),
        ]);
        $url = "https://wa.me/+62" . $surat->no_hp . "?text=" . $message;
        return redirect($url);
    }

    public function tandaiDikirim($id)
    {
        $surat = Surat::find($id);
        $surat->update([
            'is_send_to_warga' => true,
            'is_selesai' => true,
            'status' => 'Surat telah dikirim',
            'updated_at' => now(),
        ]);
        return redirect()->route('layanan-surat-dalam-proses');
    }

    public function tandaiCetak($id)
    {
        $surat = Surat::find($id);
        $surat->update([
            'is_print' => true,
            'is_selesai' => true,
            'status' => 'Surat Telah Dicetak',
            'updated_at' => now(),
        ]);
        return redirect()->route('layanan-surat-dalam-proses');
    }

    public function tandaiDiserahkan($id)
    {
        $surat = Surat::find($id);
        $surat->update([
            'is_diserahkan' => true,
            'is_selesai' => true,
            'status' => 'Surat Telah diserahkan kepada warga',
            'updated_at' => now(),
        ]);
        return redirect()->route('layanan-surat-dalam-proses');
    }

    // Untuk Meng Get semua Surat yang di tolak
    public function getAllSuratDitolak()
    {
        $increment = 1;
        $surat = Surat::Ditolak()->get();
        return view('admin.layanan-surat.surat-ditolak', [
            'surat' => $surat,
            'increment' => $increment
        ]);
    }
    // Untuk Post Request
    public function suratDitolak($id,  Request $request)
    {
        $surat = Surat::findOrfail($id);
        $surat->update([
            'is_accepted' => false,
            'updated_at' => now(),
            'alasan_tolak' => $request->alasan,
            'status' => 'Surat Ditolak Oleh ' . Auth::user()->akses,
        ]);
        return redirect()->route('layanan-surat-ditolak');
    }

    // Untuk mendapatkan riwayat surat
    public function getRiwayatSurat()
    {
        $increment = 1;
        $surat = Surat::RiwayatSurat()->get();
        return view('admin.layanan-surat.riwayat-surat', [
            'surat' => $surat,
            'increment' => $increment
        ]);
    }
    // Search surat 
    public function searchSurat(Request $request)
    {
        $search = $request->search; 
        $surat = Surat::where('no_surat', 'LIKE', '%' . $search . '%')
            ->RiwayatSurat() // jika perlu filter sama seperti getRiwayatSurat
            ->get();

        return view('admin.layanan-surat.riwayat-surat', [
            'surat' => $surat,
            'increment' => 1,
            'search' => $search // untuk menampilkan kembali keyword pencarian
        ]);
    }

    // Index Kelola Surat 
    public function indexKelolaSurat(){
        $jenisSurats = JenisSuratModel::with('kategori')->paginate(10);
        $kategoris = KategoriSurat::all();

        // Group form field templates by category
        $formFieldTemplates = FormFieldTemplate::orderBy('category')
            ->orderBy('name')
            ->get()
            ->groupBy('category');

        return view('admin.layanan-surat.kelola-surat.index', compact('jenisSurats', 'kategoris', 'formFieldTemplates'));
    }

    // Store Jenis Surat 
    public function storeKelolaSurat(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'kode' => 'required|string|max:50|unique:jenis_surat,kode',
            'kategori_id' => 'required|exists:kategori_surat,id',
            'text_content' => 'nullable|array',
            'text_content.*' => 'string|max:500',
        ]);

        $jenisSurat = JenisSuratModel::create([
            'nama' => $request->nama,
            'kode' => $request->kode,
            'kategori_id' => $request->kategori_id,
            'text_content' => $request->text_content ? json_encode($request->text_content) : null,
        ]);

        // Save form fields
        if ($request->has('form_fields')) {
            $order = 1;
            foreach ($request->form_fields as $fieldTemplateId) {
                $template = FormFieldTemplate::find($fieldTemplateId);
                if ($template) {
                    JenisSuratField::create([
                        'jenis_surat_id' => $jenisSurat->id,
                        'form_field_template_id' => $fieldTemplateId,
                        'order' => $order++,
                        'is_required' => $template->is_required_default,
                        'is_readonly' => $template->category === 'Pemohon',
                    ]);
                }
            }
        }

        // Always add required fields
        $alwaysActiveFields = FormFieldTemplate::where('is_always_active', true)->get();
        foreach ($alwaysActiveFields as $field) {
            // Check if not already added
            $exists = JenisSuratField::where('jenis_surat_id', $jenisSurat->id)
                ->where('form_field_template_id', $field->id)
                ->exists();

            if (!$exists) {
                JenisSuratField::create([
                    'jenis_surat_id' => $jenisSurat->id,
                    'form_field_template_id' => $field->id,
                    'order' => $order++,
                    'is_required' => true
                ]);
            }
        }

        return redirect()->route('kelola-surat.index')
            ->with('success', 'Jenis surat berhasil ditambahkan');
    }

    public function editKelolaSurat($id)
    {
        $jenisSurat = JenisSuratModel::with(['kategori', 'jenisSuratFields.formFieldTemplate'])
            ->findOrFail($id);
    }

    public function showKelolaSurat($id)
    {
        $jenisSurat = JenisSuratModel::with(['kategori', 'jenisSuratFields.formFieldTemplate'])
            ->findOrFail($id);

        // Ambil semua field yang berhubungan dengan ttd_
        $ttdFields = $jenisSurat->jenisSuratFields
            ->filter(function ($field) {
                return isset($field->formFieldTemplate) &&
                    str_starts_with($field->formFieldTemplate->name, 'ttd_');
            });

        $html = view('admin.layanan-surat.kelola-surat.show', [
            'jenisSurat' => $jenisSurat,
            'ttdFields' => $ttdFields,
        ])->render();

        return response()->json(['html'=> $html]);
    }

    public function deleteKelolaSurat($id)
    {
        $jenisSurat = JenisSuratModel::findOrFail($id);
        $jenisSurat->delete();
        return redirect()->route('kelola-surat.index')->with('success', 'Jenis Surat berhasil dihapus.');
    }
}
