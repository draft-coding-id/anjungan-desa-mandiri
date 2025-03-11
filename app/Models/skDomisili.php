<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class skDomisili extends Model
{
    use HasFactory;

    protected $table = 'sk_domisili';

    protected $fillable = [
        'nama_lengkap', 'nik', 'tempat_lahir', 'tanggal_lahir', 'kewarganegaraan',
        'alamat', 'rt', 'rw', 'no_hp' ,'desa', 'keperluan','status'
    ];

    public function scopeBelumDiverifikasiAdmin($query)
    {
        return $query->where('status', 'Belum diverifikasi Admin');
    }
    public function scopeBelumDiverifikasiKades($query)
    {
        return $query->where('status', 'Diverifikasi');
    }
}