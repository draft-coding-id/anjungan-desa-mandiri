<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Warga;

class WargaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Warga::create([
            [
                'nik' => '1234567890123456',
                'pin' => bcrypt('123456'), // Enkripsi PIN untuk keamanan
                'nama_lengkap' => 'John Doe',
                'tempat_lahir' => 'Jakarta',
                'tanggal_lahir' => '1990-01-01',
                'alamat' => 'Jl. Kebun Raya No. 1',
                'rt' => '001',
                'rw' => '002'
            ],
            [
                'nik' => '1234123412341234',
                'pin' => bcrypt('123123'), // Enkripsi PIN untuk keamanan
                'nama_lengkap' => 'Jane Smith',
                'tempat_lahir' => 'Bogor',
                'tanggal_lahir' => '1992-02-02',
                'alamat' => 'Jl. Merdeka No. 2',
                'rt' => '010',
                'rw' => '012'
            ],
            [
                'nik' => '1234567812345678',
                'pin' => bcrypt('121212'), // Enkripsi PIN untuk keamanan
                'nama_lengkap' => 'Syarifuddin',
                'tempat_lahir' => 'Tangerang',
                'tanggal_lahir' => '1989-08-05',
                'alamat' => 'Jl. Rajawali No. 3',
                'rt' => '001',
                'rw' => '002'
            ],
        ]);
    }
}
