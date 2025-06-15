<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create(
            [
                'name' => 'Admin',
                'email' => 'admin@gmail.com',
                'username' => 'admin',
                'password' => Hash::make('123'),
                'role' => 'admin',
            ]
        );
        User::factory()->create(
            [
                'name' => 'Kades',
                'email' => 'kades@gmail.com',
                'username' => 'kades',
                'password' => Hash::make('123'),
                'role' => 'kades'
            ]
        );

        $this->call([
            WargaSeeder::class,
        ]);
    }
}
