<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RefSekolahAlamat extends Model
{
    use HasFactory;

    protected $table = 'ref_sekolah_alamat';
    protected $fillable = [
        'id_sekolah',
        'jalan',
        'desa',
        'kecamatan',
        'kabupaten',
        'provinsi',
        'kode_pos'
    ];
    public $timestamps = false;

    public function ref_sekolah()
    {
        return $this->belongsTo(RefSekolah::class, 'id_sekolah');
    }
}
