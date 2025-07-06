<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\JenisSurat;

class KelolaSurat extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            // Layanan Kependudukan
            [
                'kategori_surat' => 'Layanan Kependudukan',
                'nama_surat' => 'Surat Keterangan Domisili',
                'kode_surat' => 'SKD',
            ],
            [
                'kategori_surat' => 'Layanan Kependudukan',
                'nama_surat' => 'Surat Keterangan KTP dalam Proses',
                'kode_surat' => 'SKKTP',
            ],
            [
                'kategori_surat' => 'Layanan Kependudukan',
                'nama_surat' => 'Surat Keterangan Penduduk',
                'kode_surat' => 'SKP',
            ],
            [
                'kategori_surat' => 'Layanan Kependudukan',
                'nama_surat' => 'Surat Keterangan Pindah Penduduk',
                'kode_surat' => 'SKPP',
            ],
            [
                'kategori_surat' => 'Layanan Kependudukan',
                'nama_surat' => 'Surat Permohonan Kartu Keluarga',
                'kode_surat' => 'SPKK',
            ],
            [
                'kategori_surat' => 'Layanan Kependudukan',
                'nama_surat' => 'Surat Permohonan Perubahan KK',
                'kode_surat' => 'SPPKK',
            ],

            // Layanan Catatan Sipil
            [
                'kategori_surat' => 'Layanan Catatan Sipil',
                'nama_surat' => 'Surat Keterangan Kelahiran',
                'kode_surat' => 'SKK',
            ],
            [
                'kategori_surat' => 'Layanan Catatan Sipil',
                'nama_surat' => 'Surat Keterangan Kematian',
                'kode_surat' => 'SKK',
            ],
            [
                'kategori_surat' => 'Layanan Catatan Sipil',
                'nama_surat' => 'Surat Pernyataan Membuat Akta Kelahiran',
                'kode_surat' => 'SPMAK',
            ],

            // Layanan Pernikahan
            [
                'kategori_surat' => 'Layanan Pernikahan',
                'nama_surat' => 'Surat Keterangan Menikah',
                'kode_surat' => 'SKM',
            ],
            [
                'kategori_surat' => 'Layanan Pernikahan',
                'nama_surat' => 'Surat Keterangan Wali',
                'kode_surat' => 'SKW',
            ],
            [
                'kategori_surat' => 'Layanan Pernikahan',
                'nama_surat' => 'Surat Keterangan Wali Hakim',
                'kode_surat' => 'SKWH',
            ],
            [
                'kategori_surat' => 'Layanan Pernikahan',
                'nama_surat' => 'Surat Pengantar Nikah',
                'kode_surat' => 'SPN',
            ],
            [
                'kategori_surat' => 'Layanan Pernikahan',
                'nama_surat' => 'Surat Permohonan Cerai',
                'kode_surat' => 'SPC',
            ],
            [
                'kategori_surat' => 'Layanan Pernikahan',
                'nama_surat' => 'Surat Pernyataan Janda/Duda',
                'kode_surat' => 'SPJD',
            ],

            // Layanan Umum
            [
                'kategori_surat' => 'Layanan Umum',
                'nama_surat' => 'Surat Izin Keramaian',
                'kode_surat' => 'SIK',
            ],
            [
                'kategori_surat' => 'Layanan Umum',
                'nama_surat' => 'Surat Keterangan Pengantar',
                'kode_surat' => 'SKPG',
            ],
            [
                'kategori_surat' => 'Layanan Umum',
                'nama_surat' => 'Surat Keterangan Tidak Mampu',
                'kode_surat' => 'SKTM',
            ],
        ];

        foreach ($data as $item) {
            JenisSurat::create($item);
        }
    }
}
