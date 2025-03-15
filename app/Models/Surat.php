<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Surat extends Model
{
    use HasFactory;

    protected $table = "surat";
    protected $fillable = [
        'warga_id',
        'no_surat',
        'status',
        'jenis_surat',
        'no_hp',
        'is_accepted',
        'is_verify_admin',
        'is_tanda_tangan_kades',
        'is_send_to_warga',
        'is_print',
        'is_diserahkan',
        'is_selesai',
        'isi_surat',
        'file_surat',
    ];

    protected $casts = [
        'is_accepted' => 'boolean',
        'is_verify_admin' => 'boolean',
        'is_tanda_tangan_kades' => 'boolean',
        'is_send_to_warga' => 'boolean',
        'is_selesai' => 'boolean',
        'isi_surat' => 'array',
    ];
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($surat) {
            $surat->no_surat = $surat->generateNomorSurat();
        });
    }

    public function generateNomorSurat()
    {
        // Tentukan kode jenis surat
        $kodeJenis = [
            'SKD' => 'SKD',
            'SKP' => 'SKP',
            'SKN' => 'SKN',
            'SKTM' => 'SKTM',
        ][$this->jenis_surat] ?? 'UNK';

        // Ambil bulan & tahun saat ini
        $bulan = date('m');
        $tahun = date('Y');

        // Hitung jumlah surat bulan ini
        $count = Surat::where('jenis_surat', $this->jenis_surat)
            ->whereMonth('created_at', $bulan)
            ->whereYear('created_at', $tahun)
            ->count() + 1;

        // Format nomor surat (003/SKD/03/2025)
        return str_pad($count, 3, '0', STR_PAD_LEFT) . "/$kodeJenis/$bulan/$tahun";
    }
    public function warga()
    {
        return $this->belongsTo(Warga::class);
    }

    public function scopeBelumDiverifikasiAdmin($query)
    {
        return $query->where('is_accepted', true)->where('is_verify_admin', false);
    }
    public function scopeBelumDiverifikasiKades($query)
    {
        return $query->where('is_accepted', true)->where('is_verify_admin', true)->where('is_tanda_tangan_kades', false);
    }
    public function scopeBelumDikirimkanKeWarga($query)
    {
        return $query->where('is_accepted', true)->where('is_verify_admin', true)->where('is_tanda_tangan_kades', true)->where('is_diserahkan', false)->where('is_selesai' , false);
    }

    public function scopesuratSelesai($query)
    {
        return $query->where('is_accepted', true)->where('is_verify_admin', true)->where('is_tanda_tangan_kades', true)->where('is_send_to_warga', true)->where('is_selesai', true);
    }

    public function scopeDitolak($query)
    {
        return $query->where('is_accepted', false);
    }

    public function scopeRiwayatSurat($query)
    {
        return $query->where('is_selesai', true);
    }
}