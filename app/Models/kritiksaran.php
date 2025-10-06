<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class KritikSaran extends Model
{
    use HasFactory;

    protected $table = 'kritiksaran_m'; // sesuai migration

    // PK auto-increment 'id' dari $table->id() → tidak perlu set $primaryKey

    protected $fillable = [
        'nama_pengunjung',
        'email',
        'no_hp',
        'pesan',
    ];

    /* ---- opsional: helper & scopes ---- */

    // Alias 'tanggal' seperti di ERD (mengacu created_at)
    public function getTanggalAttribute()
    {
        return $this->created_at;
    }

    // Urutkan yang terbaru dulu
    public function scopeTerbaru($q)
    {
        return $q->orderByDesc('created_at');
    }
}
