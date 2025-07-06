<?php

use App\Models\JenisSurat;
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
            $table->foreignIdFor(JenisSurat::class , 'jenis_surat_id')
                ->constrained('jenis_surat')
                ->onDelete('cascade')->onUpdate('cascade')->onUpdate('cascade');
            $table->string('no_surat');
            $table->string('status')->default('Menunggu Verifikasi Admin');
            $table->string('alasan_tolak')->nullable();
            $table->boolean('is_accepted')->default(true);
            $table->boolean('is_approve_admin')->default(false);
            $table->boolean('is_tanda_tangan_kades')->default(false);
            $table->boolean('is_send_to_warga')->default(false);
            $table->boolean('is_selesai')->default(false);
            $table->boolean('is_print')->default(false);
            $table->boolean('is_diserahkan')->default(false);
            $table->string('file_surat')->nullable();
            $table->string('file')->nullable();
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