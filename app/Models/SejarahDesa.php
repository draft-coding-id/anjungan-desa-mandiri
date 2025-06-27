<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SejarahDesa extends Model
{
    protected $table = "sejarah_desa";
    protected $fillable = [
        'judul', 
        'content',
        'pemimpin_desa',
    ];

    protected $casts = [
        'pemimpin_desa' => 'array',
    ];

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
        $this->attributes['pemimpin_desa'] = is_array($value) ? json_encode($value) : $value;
    }
}
