<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class JadwalDokter extends Model
{
    use HasFactory;

    // Nama tabel sesuai migration
    protected $table = 'jadwaldokter_m';

    // PK sudah default 'id' dari $table->id() → tidak perlu set $primaryKey/$incrementing

    protected $fillable = [
        'pegawai_fk',
        'hari',
        'jam_mulai',
        'jam_selesai',
        'ruangan_fk',
    ];

    protected $casts = [
        'hari' => 'integer',
        'statusenabled' => 'boolean',
    ];

    /* ===================== RELASI ===================== */

    // Sesuaikan target key di parameter ke-3 dengan PK tabel pegawai_m-mu
    public function pegawai()
    {
        // Jika PK di pegawai_m = 'id'
        return $this->belongsTo(Pegawai::class, 'pegawai_fk', 'id');

        // Kalau PK di pegawai_m = 'id_pegawai', pakai ini:
        // return $this->belongsTo(Pegawai::class, 'pegawai_fk', 'id_pegawai');
    }

    // ruangan_m dari migration kamu sebelumnya pakai $table->id() → PK 'id'
    public function ruangan()
    {
        return $this->belongsTo(Ruangan::class, 'ruangan_fk', 'id');
    }

    /* ===================== SCOPE OPSIONAL ===================== */

    // filter per hari (1..7)
    public function scopeHari($query, int $hari)
    {
        return $query->where('hari', $hari);
    }

    // ambil jadwal beririsan waktu
    public function scopeOverlap($query, string $start, string $end)
    {
        return $query->where(function ($q) use ($start, $end) {
            $q->whereBetween('jam_mulai', [$start, $end])
              ->orWhereBetween('jam_selesai', [$start, $end])
              ->orWhere(function ($qq) use ($start, $end) {
                  $qq->where('jam_mulai', '<=', $start)
                     ->where('jam_selesai', '>=', $end);
              });
        });
    }
}
