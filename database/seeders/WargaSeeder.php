<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Warga;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\Hash;

class WargaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     */
    public function run(): void
    {
        Warga::create(
            [
                'nik' => '1234567890123456',
                'pin' => Hash::make('123456'), // Enkripsi PIN untuk keamanan
                'nama_lengkap' => 'John Doe',
                'tempat_lahir' => 'Jakarta',
                'tanggal_lahir' => '1990-01-01',
                'kecamatan' => 'Bojonggede',
                'desa' => 'Rawapanjang',
                'alamat' => 'Jl. Kebun Raya No. 1',
                'rt' => '1',
                'rw' => '2',
                'jenis_kelamin' => "Laki-laki",
                'pekerjaan' => 'PNS',
                'usia' => 30,
                'agama' => 'Islam',

            ],
        );
        $faker = Faker::create('id_ID');
        for ($i = 0; $i < 30; $i++) {
            Warga::create(
                [
                    'nik' => $faker->nik,
                    'pin' => bcrypt($faker->randomNumber(6, true)), // Enkripsi PIN untuk keamanan
                    'nama_lengkap' => $faker->name,
                    'tempat_lahir' => $faker->city,
                    'tanggal_lahir' => $faker->date,
                    'kecamatan' => $faker->city,
                    'desa' => $faker->state,
                    'alamat' => $faker->address,
                    'rt' => $faker->numberBetween(1,20),
                    'rw' => $faker->numberBetween(1,20),
                    'jenis_kelamin' => $faker->randomElement(['Laki-laki', 'Perempuan']),
                    'pekerjaan' => $faker->jobTitle,
                    'usia' => $faker->numberBetween(20, 60),
                    'agama' => $faker->randomElement(['Islam', 'Kristen', 'Katolik', 'Hindu', 'Budha', 'Konghucu']),
                ]
            );
        }
    }
}
