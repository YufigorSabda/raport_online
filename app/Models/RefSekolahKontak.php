<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RefSekolahKontak extends Model
{
    use HasFactory;

    protected $table = 'ref_sekolah_kontak';
    protected $fillable = [
        'id_sekolah',
        'nomor_telepon',
        'nomor_fax',
        'email',
        'website'
    ];
    public $timestamps = false;

    public function ref_sekolah()
    {
        return $this->belongsTo(RefSekolah::class, 'id_sekolah');
    }
}
