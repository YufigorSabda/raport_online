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
        'id_tahun_ajaran',
    ];


    protected $primaryKey = 'id';
}
