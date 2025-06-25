<?php

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
        Schema::create('lapak', function (Blueprint $table) {
            $table->id();
            $table->string('gambar');
            $table->foreignId('warga_id')->constrained('warga')->onDelete('cascade')->onUpdate('cascade');
            $table->string('nama');
            $table->text('deskripsi');
            $table->string('kategori');
            $table->unsignedBigInteger('harga');
            $table->string('no_hp');
            $table->string('link_gmaps')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lapak');
    }
};
