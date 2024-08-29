<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RefKelas extends Model
{
    use HasFactory;

    protected $table = 'ref_kelas';
    protected $fillable = [
        'nama_kelas',
        'id_tingkat',
        'id_guru',
        'id_tahun_ajaran'
    ];
    public $timestamps = false;

    public function ref_tingkat()
    {
        return $this->belongsTo(RefTingkat::class, 'id_tingkat');
    }

    public function ref_guru()
    {
        return $this->belongsTo(RefGuru::class, 'id_guru');
    }

    public function ref_tahun_ajaran()
    {
        return $this->belongsTo(RefTahunAjaran::class, 'id_tahun_ajaran');
    }
}
