<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Departemen extends Model
{
    protected $table = 'departemen_m';
    protected $primaryKey = 'id'; 

    // default $incrementing = true (tidak perlu didefinisikan)
    // default $keyType = 'int' (tidak perlu didefinisikan)

    protected $fillable = ['namadepartemen', 'statusenabled'];

    protected $casts = [
        'statusenabled' => 'boolean',
    ];

    // relasi contoh (ruangan_m.departemen_fk → departemen_m.id_departemen)
    public function ruangan_m()
    {
        return $this->hasMany(Ruangan::class, 'departemen_fk', $this->getKeyName());
    }
}
