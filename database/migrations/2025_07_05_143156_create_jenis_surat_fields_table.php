<?php

use App\Models\JenisSurat;
use App\Models\FormFieldTemplate;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('jenis_surat_fields', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(JenisSurat::class, 'jenis_surat_id')
                ->constrained('jenis_surat')
                ->onDelete('cascade')->onUpdate('cascade');
            $table->foreignIdFor(FormFieldTemplate::class, 'form_field_template_id')
                ->constrained('form_field_templates')
                ->onDelete('cascade')->onUpdate('cascade');
            $table->integer('order')->default(0); // urutan field
            $table->boolean('is_required')->default(false); // override requirement
            $table->boolean('is_readonly')->default(false); // override requirement
            $table->json('custom_attributes')->nullable(); // custom attributes per jenis surat
            $table->timestamps();

            // Unique constraint untuk mencegah duplikasi
            $table->unique(['jenis_surat_id', 'form_field_template_id']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('jenis_surat_fields');
    }
};
