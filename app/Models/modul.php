<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Modul extends Model
{
    use HasFactory;

    // Nama tabel non-standar (bukan "moduls")
    protected $table = 'modul';

    // PK sudah 'id' dari $table->id() → tidak perlu set $primaryKey

    protected $fillable = [
        'namamodul',
    ];

    /* ===== Relasi (opsional) ===== */

    // Jika kamu mapping user ↔ modul di tabel mapusertomodul_t
    public function userMappings()
    {
        return $this->hasMany(MapUserToModul::class, 'namamodul', 'namamodul');
        // Atau kalau nanti map tabelnya pakai FK modul_id,
        // ganti jadi: hasMany(MapUserToModul::class, 'modul_id', 'id')
    }

    /* ===== Scopes opsional ===== */
    public function scopeCari($q, string $keyword)
    {
        return $q->where('namamodul', 'like', "%{$keyword}%");
    }
}
