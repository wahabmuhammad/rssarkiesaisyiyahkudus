<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Kamar extends Model
{
    use HasFactory;

    protected $table = 'kamar_m';   // sesuai migration

    // PK sudah 'id' dari $table->id() → tidak perlu set $primaryKey

    protected $fillable = [
        'statusenabled',
        'ruanganfk',
        'namakamar',
        'kapasitas',
        'statuskamar',
    ];

    protected $casts = [
        'statusenabled' => 'boolean',
        'kapasitas'     => 'integer',
    ];

    /** Relasi: kamar_m.ruanganfk -> ruangan_m.id */
    public function ruangan()
    {
        return $this->belongsTo(Ruangan::class, 'ruanganfk', 'id');
        // Jika suatu saat PK ruangan_m bukan 'id' (mis. 'id_ruangan'), ganti argumen ke-3.
    }
}
