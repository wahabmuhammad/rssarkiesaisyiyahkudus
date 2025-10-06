<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class MapUserToModul extends Model
{
    use HasFactory;

    protected $table = 'mapusertomodul_t'; // sesuai migration

    // PK default 'id' dari $table->id()

    protected $fillable = [
        'namamodul',
        'userfk',
    ];

    /** Relasi: mapusertomodul_t.userfk -> users.(id atau id_user) */
    public function user()
    {
        // otomatis cocok dengan PK di model User kamu
        $ownerKey = (new User)->getKeyName(); // 'id' atau 'id_user'
        return $this->belongsTo(User::class, 'userfk', $ownerKey);
    }

    /* ----- scopes opsional ----- */

    // filter berdasarkan nama modul (case-insensitive LIKE)
    public function scopeModul($q, string $keyword)
    {
        return $q->where('namamodul', 'like', "%{$keyword}%");
    }
}
