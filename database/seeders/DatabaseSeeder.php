<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $permission = ['akses daftar akun', 'lihat data warga', 'detail warga', 'detail surat', 'lihat surat', 'tolak surat', 'setujui surat', 'lihat surat ditolak', 'lihat riwayat surat'];
        foreach($permission as $perm){
            Permission::create(['name' => $perm]);
        }
        $admin = Role::create(['name' => 'admin']);
        $rt = Role::create(['name' => 'rt']);
        $rw = Role::create(['name' => 'rw']);
        $kades = Role::create(['name' => 'kades']);
        $admin->givePermissionTo('akses daftar akun' , 'lihat data warga', 'detail warga', 'detail surat', 'lihat surat', 'tolak surat', 'setujui surat', 'lihat surat ditolak', 'lihat riwayat surat');
        $rt->givePermissionTo('lihat data warga' , 'detail warga' , 'detail surat' ,'lihat surat' , 'tolak surat' , 'setujui surat' , 'lihat surat ditolak' , 'lihat riwayat surat');
        $rw->givePermissionTo('lihat data warga' , 'lihat surat' , 'lihat surat ditolak' , 'lihat riwayat surat');
        $kades->givePermissionTo('lihat data warga' , 'lihat surat' , 'lihat surat ditolak' , 'lihat riwayat surat');

        // Membuat Admin
        $adminUser = User::factory()->create([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'username' => 'admin',
            'no_hp' => '012345678901',
            'akses' => 'Admin 1',
            'password' => Hash::make('123'),
        ]);
        $adminUser->assignRole('admin');

        $kadesUser = User::factory()->create([
            'name' => 'Kepala Desa',
            'email' => 'kades@gmail.com',
            'username' => 'kades',
            'no_hp' => '081234567890',
            'akses' => 'Kades',
            'password' => Hash::make('123'),
        ]);
        $kadesUser->assignRole('kades');

        for ($i = 1; $i <= 2; $i++) {
            $rtUser = User::factory()->create([
                'name' => "RT $i",
                'email' => "rt" . sprintf('%02d', $i) . "@gmail.com",
                'username' => "rt" . sprintf('%02d', $i),
                'no_hp' => "08123456789" . $i,
                'akses' => "RT $i - RW $i" ,
                'password' => Hash::make('123'),
            ]);
            $rtUser->assignRole('rt');
        }

        for ($i = 1; $i <= 2; $i++) {
            $rwUser = User::factory()->create([
                'name' => "RW $i",
                'email' => "rw" . sprintf('%02d', $i) . "@gmail.com",
                'username' => "rw" . sprintf('%02d', $i),
                'no_hp' => "08123456789" . ($i + 2),
                'akses' => "RW $i",
                'password' => Hash::make('123'),
            ]);
            $rwUser->assignRole('rw');
        }
        $this->call([
            WargaSeeder::class,
            SejarahDesaSeeder::class,
            VisiMisiSeeder::class,
            KategoriSuratSeeder::class,
            FormFieldTemplateSeeder::class,
        ]);
    }
}
