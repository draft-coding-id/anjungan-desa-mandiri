<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FormFieldTemplate extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'label',
        'type',
        'attributes',
        'category',
        'is_required_default',
        'is_always_active'
    ];

    protected $casts = [
        'attributes' => 'array',
        'is_required_default' => 'boolean',
        'is_always_active' => 'boolean'
    ];

    public function jenisSuratFields()
    {
        return $this->hasMany(JenisSuratField::class);
    }

    public function jenisSurats()
    {
        return $this->belongsToMany(JenisSurat::class, 'jenis_surat_fields')
            ->withPivot('order', 'is_required', 'custom_attributes')
            ->withTimestamps();
    }
}
