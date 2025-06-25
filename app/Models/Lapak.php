<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Warga;
class Lapak extends Model
{
    protected $table = "lapak" ;
    protected $fillable = [
        'nama',
        'deskripsi',
        'kategori',
        'harga',
        'link_gmaps',
        'no_hp',
        'warga_id'
    ];
    public function warga()
    {
        return $this->belongsTo(Warga::class, 'warga_id');
    }
}
