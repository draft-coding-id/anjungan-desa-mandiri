<?php

namespace Database\Seeders;

use App\Models\TambahDataWarga;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TambahDataWargaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Perintah ini akan membuat 20 data baru
        // menggunakan resep dari TambahDataWargaFactory
        TambahDataWarga::factory(20)->create();
    }
}