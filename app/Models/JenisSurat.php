<?php
// app/Models/JenisSurat.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JenisSurat extends Model
{
    use HasFactory;

    protected $table = 'jenis_surat';

    protected $fillable = [
        'kategori_id',
        'kode',
        'nama',
        'form_fields', // keep this for backward compatibility if needed
        'text_content'
    ];

    protected $casts = [
        'text_content' => 'array'
    ];

    public function kategori()
    {
        return $this->belongsTo(KategoriSurat::class, 'kategori_id');
    }

    public function jenisSuratFields()
    {
        return $this->hasMany(JenisSuratField::class)->orderBy('order');
    }

    public function formFieldTemplates()
    {
        return $this->belongsToMany(FormFieldTemplate::class, 'jenis_surat_fields')
            ->withPivot('order', 'is_required', 'custom_attributes')
            ->withTimestamps()
            ->orderBy('pivot_order');
    }

    // Helper method untuk mendapatkan form fields yang sudah diurutkan
    public function getOrderedFormFields()
    {
        return $this->jenisSuratFields()->with('formFieldTemplate')->get();
    }
}
