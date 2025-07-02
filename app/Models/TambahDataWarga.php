<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TambahDataWarga extends Model
{
    use HasFactory;

    protected $table = 'tambah_data_warga';

    protected $fillable = [
        'no_kk',
        'no_hp',
        'status_kawin',
        'pendidikan',
        'kewarganegaraan',
        'golongan_darah',

        // ... tambah lagi dengan nama kolom lainnya kalo diperlukan
    ];
}