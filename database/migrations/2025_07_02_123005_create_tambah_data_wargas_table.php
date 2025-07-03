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
        Schema::create('tambah_data_warga', function (Blueprint $table) {
            $table->id();
            $table->foreignId('warga_id')->constrained('warga')->onDelete('cascade')->onUpdate('cascade');
            $table->string('no_kk', 16); 
            $table->string('no_hp'); 
            $table->enum('status_kawin', ['Belum Kawin', 'Kawin', 'Cerai Hidup', 'Cerai Mati']);
            $table->string('pendidikan');
            $table->enum('kewarganegaraan', ['WNI', 'WNA']);
            $table->enum('golongan_darah', ['A', 'B', 'AB', 'O']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tambah_data_warga');
    }
};
