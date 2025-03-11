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
        Schema::create('surat', function (Blueprint $table) {
            $table->id();
            $table->foreignId('warga_id')->constrained('warga');
            $table->string('no_surat');
            $table->string('status')->default('Menunggu Verifikasi Admin');
            $table->string('jenis_surat');
            $table->boolean('is_accepted')->default(true);
            $table->boolean('is_verify_admin')->default(false);
            $table->boolean('is_tanda_tangan_kades')->default(false);
            $table->boolean('is_send_to_warga')->default(false);
            $table->boolean('is_selesai')->default(false);
            $table->string('no_hp');
            $table->json('isi_surat');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('layanan_surats');
    }
};
