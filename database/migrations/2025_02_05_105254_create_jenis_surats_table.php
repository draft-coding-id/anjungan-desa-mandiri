<?php

use App\Models\KategoriSurat;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('jenis_surat', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(KategoriSurat::class, 'kategori_id')
                ->constrained('kategori_surat')
                ->onDelete('cascade')->onUpdate('cascade');
            $table->string('kode')->unique();
            $table->string('nama');
            $table->json('text_content')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jenis_surat');
    }
};
