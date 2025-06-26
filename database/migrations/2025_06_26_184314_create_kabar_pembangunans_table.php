<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('kabar-pembangunan', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('foto')->nullable(); // Kolom foto opsional
            $table->integer('tahun');
            $table->decimal('anggaran', 15, 2); // Format mata uang (contoh: 1.000.000,00)
            $table->string('link_gmaps')->nullable();
            $table->string('volume'); // Bisa berupa teks seperti "100 unit" atau angka
            $table->string('sumber_dana');
            $table->string('pelaksana');
            $table->string('lokasi');
            $table->text('manfaat'); // Teks panjang
            $table->text('keterangan')->nullable(); // Opsional
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('kabar-pembangunan');
    }
};
