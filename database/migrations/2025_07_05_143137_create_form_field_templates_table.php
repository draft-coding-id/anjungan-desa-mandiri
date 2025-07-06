<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('form_field_templates', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique(); // nama field seperti "Nama", "NIK", dll
            $table->string('label'); // label yang ditampilkan
            $table->string('type'); // text, select, file, date, textarea, dll
            $table->json('attributes')->nullable(); // attributes tambahan
            $table->string('category')->nullable(); // Primary, Secondary, Tambahan, dll
            $table->boolean('is_required_default')->default(false);
            $table->boolean('is_always_active')->default(false); // untuk field yang selalu aktif
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('form_field_templates');
    }
};
