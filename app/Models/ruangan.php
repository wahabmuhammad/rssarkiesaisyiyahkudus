<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Ruangan extends Model
{
    use HasFactory;

    // Nama tabel non-standar
    protected $table = 'ruangan_m';

    // PK sudah "id" (auto-increment) dari $table->id() → tidak perlu set $primaryKey

    protected $fillable = [
        'statusenabled',
        'namaruangan',
        'departemen_fk',
    ];

    protected $casts = [
        'statusenabled' => 'boolean',
    ];

    /** Relasi: ruangan_m.departemen_fk -> departemen_m.id */
    public function departemen_m()
    {
        return $this->belongsTo(Departemen::class, 'departemen_fk', 'id');
        // Jika di project-mu PK departemen adalah 'id_departemen',
        // ganti 'id' di atas menjadi 'id_departemen'.
    }

    /** Contoh relasi lain yang kamu punya di ERD */
    public function kamar_m()
    {
        return $this->hasMany(Kamar::class, 'ruanganfk', 'id');
    }

    public function jadwal_m()
    {
        return $this->hasMany(JadwalDokter::class, 'ruangan_fk', 'id');
    }
}
