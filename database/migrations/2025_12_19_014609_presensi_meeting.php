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
        Schema::create('presensi_meeting_t', function (Blueprint $table) {
            $table->id();
            $table->string('meeting_fk');
            $table->string('namalengkap');
            $table->string('jabatan');
            $table->date('tanggal');
            $table->string('nip')->nullable();
            $table->text('ttd');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('presensi_meeting_t');
    }
};
