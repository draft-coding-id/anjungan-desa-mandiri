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
        'alasan_tolak',
        'no_surat',
        'status',
        'jenis_surat',
        'no_hp',
        'is_accepted',
        'is_approve_admin',
        'is_tanda_tangan_kades',
        'is_send_to_warga',
        'is_print',
        'is_diserahkan',
        'is_selesai',
        'isi_surat',
        'file_surat',
        'file'
    ];

    protected $casts = [
        'is_accepted' => 'boolean',
        'is_approve_admin' => 'boolean',
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
            'SKKTP' => 'SKKTP',
            'SKP' => 'SKP',
            'SKPP' => 'SKPP',
            'SPKK' => 'SPKK',
            'SKPG' => 'SKPG',
            'SIK' => 'SIK',
            'SKTM' => 'SKTM',
            'SKN' => 'SKN',
            'SKTM' => 'SKTM',
            'SKWH' => 'SKWH',
            'SKW' => 'SKW',
            'SKM' => 'SKM',
            'SKK' => 'SKK',
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
    public function countdown($row)
    {
        $created_at = $row->created_at;
        // Tambah 10 menit ke waktu created_at
        $targetTime = $created_at->addMinutes(10);

        // Hitung selisih waktu dengan sekarang
        $now = now();
        $distance = $targetTime->timestamp - $now->timestamp;

        if ($distance <= 0) {
            return "00:00";
        }

        // Konversi ke menit dan detik
        $minutes = floor($distance / 60);
        $seconds = $distance % 60;

        return sprintf("%02d:%02d", $minutes, $seconds);
    }
    public function scopeDalamProses($query)
    {
        return $query->where('is_accepted', true)->where('is_approve_admin' , false)->where('is_send_to_warga', false)->where('is_selesai', false);
    }
    public function scopeBelumDikirimkanKeWarga($query)
    {
        return $query->where('is_accepted', true)->where('is_approve_admin' , true)->where('is_diserahkan', false)->where('is_selesai', false);
    }
    public function scopesuratSelesai($query)
    {
        return $query->where('is_accepted', true)->where('is_approve_admin', true)->where('is_tanda_tangan_kades', true)->where('is_send_to_warga', true)->where('is_selesai', true);
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
