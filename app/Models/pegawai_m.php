<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pegawai_m extends Model
{
    use HasFactory;

    protected $table = 'pegawai_m';
    protected $fillable = [
        'nama',
        'nip',
        'agama',
        'tempat_lahir',
        'tanggal_lahir',
        'jenis_kelamin',
        'alamat',
        'no_telp',
        'jenis_pegawai',
        'status_pegawai',
        'jabatan',
        'unit_kerja',
        'golongan',
        'pendidikan_terakhir',
        'tgl_masuk',
        'tgl_keluar',
        'foto_pegawai'
    ];
    protected $hidden = [
        'created_at',
        'updated_at'
    ];
    
}
