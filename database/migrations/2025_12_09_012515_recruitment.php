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
        Schema::create('recruitment_m', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('nik');
            $table->string('nama_lengkap');
            $table->string('tempat_lahir');
            $table->string('tanggal_lahir');
            $table->string('alamat');
            $table->int('formasi_fk');
            $table->string('asal_sekolah');
            $table->string('tahun_lulus');
            $table->integer('statusnikah_fk');
            $table->string('sertifikasi');
            $table->text('pengalaman_kerja');
            $table->text('file_pendukung');
            $table->string('no_hp');
            $table->string('email');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('recruitment_m');
    }
};
