<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class JadwalDokterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('jadwaldokter_m')->insert([
            [
                'pegawai_fk' => 1,           // ID Dokter
                'hari' => 1,                 // 1 = Senin
                'jam_mulai' => '08:00:00',
                'jam_selesai' => '12:00:00',
                'ruangan_fk' => 3,           // ID ruangan
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'pegawai_fk' => 1,
                'hari' => 3,                 // 3 = Rabu
                'jam_mulai' => '09:00:00',
                'jam_selesai' => '13:00:00',
                'ruangan_fk' => 3,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'pegawai_fk' => 2,
                'hari' => 2,                 // 2 = Selasa
                'jam_mulai' => '10:00:00',
                'jam_selesai' => '14:00:00',
                'ruangan_fk' => 5,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'pegawai_fk' => 3,
                'hari' => 5,                 // 5 = Jumat
                'jam_mulai' => '08:00:00',
                'jam_selesai' => '11:00:00',
                'ruangan_fk' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
