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
            $table->id();
            $table->string('nik', 16)->unique();
            $table->string('pin'); // PIN untuk login
            $table->string('nama_lengkap');
            $table->string('jenis_kelamin');
            $table->string('pekerjaan'); 
            $table->integer('usia'); // kolom ini mau dihapus
            $table->string('agama'); 
            $table->string('tempat_lahir'); 
            $table->date('tanggal_lahir'); 
            $table->string('kecamatan'); 
            $table->string('desa');
            $table->text('alamat');
            $table->string('rt', 3);
            $table->string('rw', 3);
            $table->rememberToken();
            $table->timestamps(); 
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
