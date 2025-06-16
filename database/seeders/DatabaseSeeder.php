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
        $user = User::factory()->create(
            [
                'name' => 'Admin',
                'email' => 'admin@gmail.com',
                'username' => 'admin',
                'no_hp' => '012345678901',
                'akses' => 'Admin',
                'password' => Hash::make('123'),
            ]
        );
        $user->assignRole('admin');
        $this->call([
            WargaSeeder::class,
        ]);
    }
}
