<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RefTingkat extends Model
{
    use HasFactory;
    protected $table = 'ref_tingkat';
    protected $fillable = [
        'nama_tingkat',
    ];
    public $timestamps = false;

    public function ref_siswa()
    {
        return $this->hasOne(RefSiswa::class);
    }
}
