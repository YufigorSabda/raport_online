<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RefSiswa extends Model
{
    use HasFactory;

    protected $table = 'ref_siswa';
    protected $fillable = [
        'nama_siswa',
        'nis',
        'nisn',
        'nik',
        'telp_rumah',
        'telp_seluler',
        'alamat',
        'tempat_lahir',
        'tgl_lahir',
        'berat_badan',
        'tinggi_badan',
        'id_gender',
        'id_agama',
        'id_status_dk',
        'anak_ke',
        'sekolah_asal',
        'tgl_masuk',
        'id_tingkat',
        'is_active'
    ];
    public $timestamps = false;

    public function ref_siswa_ortu()
    {
        return $this->hasOne(RefSiswaOrtu::class, 'id_siswa');
    }

    public function ref_gender()
    {
        return $this->belongsTo(RefGender::class, 'id_gender');
    }

    public function ref_agama()
    {
        return $this->belongsTo(RefAgama::class, 'id_agama');
    }

    public function ref_status_dk()
    {
        return $this->belongsTo(RefStatusDk::class, 'id_status_dk');
    }

    public function ref_tingkat()
    {
        return $this->belongsTo(RefTingkat::class, 'id_tingkat');
    }
}
