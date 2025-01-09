<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProsesSurat extends Model
{
    use HasFactory;

    protected $table = 'proses_surat';

    protected $fillable = [
        'surat',
        'nik',
        'pin',
        'nama_lengkap',
        'tempat_lahir',
        'tanggal_lahir',
        'alamat',
        'rt',
        'rw',
        'keperluan'
    ];
}
