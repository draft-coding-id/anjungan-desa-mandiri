<?php

namespace Database\Factories;

use App\Models\Warga;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\TambahDataWarga>
 */
class TambahDataWargaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            // Ambil ID acak dari tabel warga yang sudah ada
            'warga_id' => Warga::inRandomOrder()->first()->id,
            'no_kk' => $this->faker->unique()->numerify('################'), // 16 digit angka
            'no_hp' => $this->faker->phoneNumber(),
            'status_kawin' => $this->faker->randomElement(['Belum Kawin', 'Kawin', 'Cerai Hidup', 'Cerai Mati']),
            'pendidikan' => $this->faker->randomElement(['SD', 'SMP', 'SMA', 'D3', 'S1', 'S2']),
            'kewarganegaraan' => 'WNI',
            'golongan_darah' => $this->faker->randomElement(['A', 'B', 'AB', 'O']),
        ];
    }
}