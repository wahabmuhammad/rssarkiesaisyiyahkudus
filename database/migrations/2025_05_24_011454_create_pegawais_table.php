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
        Schema::create('pegawai_m', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('nip')->unique();
            $table->string('agama');
            $table->string('tempat_lahir');
            $table->date('tanggal_lahir');
            $table->string('jenis_kelamin');
            $table->string('alamat')->nullable();
            $table->string('no_telp')->nullable();
            $table->string('jenis_pegawai');
            $table->string('status_pegawai');
            $table->string('jabatan')->nullable();
            $table->string('unit_kerja')->nullable();
            $table->string('golongan')->nullable();
            $table->string('pendidikan_terakhir');
            $table->string('tgl_masuk')->nullable();
            $table->string('tgl_keluar')->nullable();
            $table->text('foto_pegawai')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pegawai_m');
    }
};
