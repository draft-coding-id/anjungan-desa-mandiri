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
        Schema::create('warga', function (Blueprint $table) {
            $table->id(); // Primary key
            $table->string('nik', 16)->unique(); // NIK sebagai unique identifier
            $table->string('pin'); // PIN untuk login
            $table->string('nama_lengkap'); // Nama lengkap warga
            $table->string('jenis_kelamin'); // Jenis kelamin
            $table->string('pekerjaan'); // Pekerjaan
            $table->integer('usia'); // Usia
            $table->string('agama'); // Agama
            $table->string('tempat_lahir'); // Tempat lahir
            $table->date('tanggal_lahir'); // Tanggal lahir
            $table->text('alamat'); // Alamat lengkap
            $table->string('rt', 3); // RT
            $table->string('rw', 3); // RW
            $table->timestamps(); // Created at dan updated at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('warga');
    }
};
