<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class recruitment extends Model
{
    use HasFactory;
    protected $table = 'recruitment_m';
    protected $fillable = [
        'nik',
        'nama_lengkap',
        'tempat_lahir',
        'tanggal_lahir',
        'alamat',
        'formasi_fk',
        'asal_sekolah',
        'tahun_lulus',
        'statusnikah_fk',
        'sertifikasi',
        'pengalaman_kerja',
        'file_pendukung',
        'no_hp',
        'email'
    ];
    protected $hidden = [
        'created_at',
        'updated_at'
    ];
    public $timestamps =false;
}
