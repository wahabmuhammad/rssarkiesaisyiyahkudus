<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Artikel extends Model
{
    use HasFactory;

    // nama tabel sesuai migration
    protected $table = 'artikel_m';

    // PK default 'id' dari $table->id() → tak perlu set $primaryKey

    protected $fillable = [
        'statusenabled',
        'judul',
        'konten',
        'gambar',
        'penulis',
        'kategori',
        'tgl_publish',
    ];

    protected $casts = [
        'statusenabled' => 'boolean',
        'tgl_publish'   => 'date',
    ];

    /* ====== scopes opsional ====== */

    // hanya artikel aktif & sudah terbit
    public function scopeTerbit($q)
    {
        return $q->where('statusenabled', true)
                 ->whereDate('tgl_publish', '<=', now());
    }

    // filter kategori
    public function scopeKategori($q, string $kategori)
    {
        return $q->where('kategori', $kategori);
    }

    // cari judul/konten
    public function scopeCari($q, string $keyword)
    {
        return $q->where(function ($qq) use ($keyword) {
            $qq->where('judul', 'like', "%{$keyword}%")
               ->orWhere('konten', 'like', "%{$keyword}%");
        });
    }
}
