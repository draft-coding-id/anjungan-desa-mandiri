<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Warga extends Model
{
    use HasFactory;

    protected $table = 'warga';

    protected $fillable = [
        'nik',
        'pin',
        'nama_lengkap',
        'agama',
        'tempat_lahir',
        'tanggal_lahir',
        'usia',
        'pekerjaan',
        'jenis_kelamin',
        'alamat',
        'rt',
        'rw',
    ];
}
