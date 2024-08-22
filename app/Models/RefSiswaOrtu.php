<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RefSiswaOrtu extends Model
{
    use HasFactory;

    protected $table = 'ref_siswa_ortu';
    protected $fillable = [
        'id_siswa',
        'nama_ayah',
        'pekerjaan_ayah',
        'nama_ibu',
        'pekerjaan_ibu',
        'telp_ortu',
        'alamat_ortu',
        'nama_wali',
        'pekerjaan_wali',
        'telp_wali',
        'alamat_wali'
    ];
    public $timestamps = false;

    public function ref_siswa()
    {
        return $this->belongsTo(RefSiswa::class, 'id_siswa');
    }
}
