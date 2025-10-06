<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Post extends Model
{
    use HasFactory;

    // tabel sesuai migration
    protected $table = 'post_m';

    // PK auto-increment 'id' sudah default dari $table->id() → tidak perlu set $primaryKey

    protected $fillable = [
        'title',
        'body',
        'user_id',
        'status',
    ];

    /** Relasi: post_m.user_id → users.(id atau id_user) */
    public function user()
    {
        // ambil nama primary key dari model User kamu (bisa 'id' atau 'id_user')
        $ownerKey = (new User)->getKeyName();
        return $this->belongsTo(User::class, 'user_id', $ownerKey);
    }

    /** (opsional) scopes kecil */
    public function scopeStatus($q, string $status)
    {
        return $q->where('status', $status);
    }
}
