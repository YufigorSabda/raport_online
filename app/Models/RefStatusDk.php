<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RefStatusDk extends Model
{
    use HasFactory;
    protected $table = 'ref_status_dk';
    protected $fillable = [
        'nama_status_dk',
    ];
    public $timestamps = false;

    public function ref_siswa()
    {
        return $this->hasOne(RefSiswa::class);
    }
}
