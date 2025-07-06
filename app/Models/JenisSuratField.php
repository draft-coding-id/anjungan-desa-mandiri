<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JenisSuratField extends Model
{
    use HasFactory;

    protected $fillable = [
        'jenis_surat_id',
        'form_field_template_id',
        'order',
        'is_required',
        'is_readonly',
        'custom_attributes'
    ];

    protected $casts = [
        'custom_attributes' => 'array',
        'is_required' => 'boolean',
        'is_readonly' => 'boolean'
    ];

    public function jenisSurat()
    {
        return $this->belongsTo(JenisSurat::class);
    }

    public function formFieldTemplate()
    {
        return $this->belongsTo(FormFieldTemplate::class);
    }
}
