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
            $table->string('no_kk', 16); 
            $table->string('no_hp'); 
            $table->ask('status_kawin'); // tipe data belum ditentukan
            $table->ask('pendidikan'); // tipe data belum ditentukan
            $table->boolean('kewarganegaraan');
            $table->ask('golongan_darah'); // tipe data belum ditentukan
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
