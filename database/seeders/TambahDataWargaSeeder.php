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
        TambahDataWarga::factory(35)->create();
    }
}