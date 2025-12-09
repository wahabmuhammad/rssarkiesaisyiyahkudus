<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Promo extends Model
{
    use HasFactory;

    protected $table = 'promo_m';   // nama tabel sesuai migration

    // PK default 'id' dari $table->id() → tidak perlu atur $primaryKey

    protected $fillable = [
        'statusenabled',
        'judul',
        'deskripsi',
        'gambar',
        'tanggal_mulai',
        'tanggal_selesai',
    ];

    protected $casts = [
        'statusenabled'   => 'boolean',
        'tanggal_mulai'   => 'date',
        'tanggal_selesai' => 'date',
    ];

    /* ----- scopes opsional ----- */
    public function scopeAktif($q)
    {
        $today = now()->toDateString();
        return $q->where('statusenabled', true)
                 ->whereDate('tanggal_mulai', '<=', $today)
                 ->whereDate('tanggal_selesai', '>=', $today);
    }

    public function scopeMendatang($q)
    {
        return $q->whereDate('tanggal_mulai', '>', now());
    }

    public function scopeSelesai($q)
    {
        return $q->whereDate('tanggal_selesai', '<', now());
    }
}
