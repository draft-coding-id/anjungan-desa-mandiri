<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class sk_Domisili extends Model
{
    use HasFactory;

    protected $table = 'sk_domisili';

    protected $fillable = [
        'nama_lengkap', 'nik', 'tempat_lahir', 'tanggal_lahir', 'kewarganegaraan', 
        'alamat', 'rt', 'rw', 'desa', 'keperluan'
    ];
}
