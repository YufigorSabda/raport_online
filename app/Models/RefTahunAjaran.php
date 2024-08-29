<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RefTahunAjaran extends Model
{
    use HasFactory;

    protected $table = 'ref_tahun_ajaran';
    protected $fillable = [
        'nama_tahun_ajaran',
    ];
    public $timestamps = false;

    public function ref_kelas()
    {
        return $this->hasMany(RefKelas::class, 'id_tahun_ajaran');
    }
}
