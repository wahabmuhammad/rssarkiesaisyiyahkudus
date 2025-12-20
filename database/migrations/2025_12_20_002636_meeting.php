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
        Schema::create('meeting_t', function (Blueprint $table) {
            $table->id();
            $table->string('nama_meeting');
            $table->string('jenis_meeting');
            $table->date('tanggal');
            $table->string('jumlah_peserta')->nullable();
            $table->time('jam_mulai')->nullable();
            $table->time('jam_selesai')->nullable();
            $table->text('tempat')->nullable();
            $table->text('pembicara')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('meeting_t');
    }
};
