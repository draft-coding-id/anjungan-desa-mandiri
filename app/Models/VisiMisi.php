<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VisiMisi extends Model
{
    protected $table = "visi_misi";
    protected $fillable = [
        'judul', 
        'konten'
    ];

    protected $casts = [
        'konten' => 'array'
    ]; // di kolom tipe nya adalah json

    public function getPemimpinDesaAttribute($value)
    {
        // Jika sudah array, return as is
        if (is_array($value)) {
            return $value;
        }

        // Jika string JSON, decode ke array
        if (is_string($value)) {
            $decoded = json_decode($value, true);
            return $decoded ?: []; // Return empty array jika decode gagal
        }

        return [];
    }

    // Mutator untuk memastikan data tersimpan sebagai JSON
    public function setPemimpinDesaAttribute($value)
    {
        $this->attributes['konten'] = is_array($value) ? json_encode($value) : $value;
    }    
}
