<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class KabarPembangunan extends Model
{
    protected $table = 'kabar-pembangunan';
    protected $fillable = [
        'nama',
        'foto',
        'tahun', 
        'anggaran', 
        'link_gmaps', 
        'volume', 
        'sumber_dana', 
        'pelaksana', 
        'lokasi',
        'manfaat', 
        'keterangan',
    ];
}
