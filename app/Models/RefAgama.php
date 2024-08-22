<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RefAgama extends Model
{
    use HasFactory;

    protected $table = 'ref_agama';
    protected $fillable = [
        'nama_agama',
    ];
    public $timestamps = false;

    public function ref_siswa()
    {
        return $this->hasOne(RefSiswa::class);
    }
}
