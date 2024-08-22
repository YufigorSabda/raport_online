<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RefSekolahKepala extends Model
{
    use HasFactory;

    protected $table = 'ref_sekolah_kepala';
    protected $fillable = [
        'id_sekolah',
        'nip',
        'gelar_depan',
        'gelar_belakang',
        'nama'
    ];
    public $timestamps = false;

    public function ref_sekolah()
    {
        return $this->belongsTo(RefSekolah::class, 'id_sekolah');
    }
}
