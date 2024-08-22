<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RefGender extends Model
{
    use HasFactory;
    protected $table = 'ref_gender';
    protected $fillable = [
        'nama_gender',
    ];
    public $timestamps = false;

    public function ref_siswa()
    {
        return $this->hasOne(RefSiswa::class);
    }
}
