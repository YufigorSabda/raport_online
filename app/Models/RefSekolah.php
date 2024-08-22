<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RefSekolah extends Model
{
    use HasFactory;

    protected $table = 'ref_sekolah';
    protected $fillable = [
        'jenjang',
        'npsn',
        'nss',
        'nama_sekolah'
    ];
    public $timestamps = false;

    public function ref_sekolah_alamat()
    {
        return $this->hasOne(RefSekolahAlamat::class, 'id_sekolah');
    }

    public function ref_sekolah_kontak()
    {
        return $this->hasOne(RefSekolahKontak::class, 'id_sekolah');
    }
}
