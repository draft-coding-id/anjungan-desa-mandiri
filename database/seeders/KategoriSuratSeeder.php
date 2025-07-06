<?php

namespace Database\Seeders;

use App\Models\KategoriSurat;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class KategoriSuratSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $kategoriSura = [
            'Layanan Kependudukan',
            'Layanan Catatan Sipil',
            'Layanan Pernikahan',
            'Layanan Umum',
            'Layanan Usaha'
        ];
        foreach ($kategoriSura as $nama) {
            KategoriSurat::insert([
                'nama' => $nama,
            ]);
        }
    }
}
