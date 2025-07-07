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
        Schema::table('warga', function (Blueprint $table) {
            $table->string('no_kk', 16)->after('rw');
            $table->string('no_hp')->after('no_kk');
            $table->enum('status_kawin', ['Belum Kawin', 'Kawin', 'Cerai Hidup', 'Cerai Mati'])->after('no_hp');
            $table->string('pendidikan')->after('status_kawin');
            $table->enum('kewarganegaraan', ['WNI', 'WNA'])->after('pendidikan');
            $table->enum('golongan_darah', ['A', 'B', 'AB', 'O'])->after('kewarganegaraan');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('warga', function (Blueprint $table) {
            $table->dropColumn('no_kk');
            $table->dropColumn('no_hp');
            $table->dropColumn('status_kawin');
            $table->dropColumn('pendidikan');
            $table->dropColumn('kewarganegaraan');
            $table->dropColumn('golongan_darah');
        });
    }
};
