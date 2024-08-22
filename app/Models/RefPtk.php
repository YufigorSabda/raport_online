<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RefPtk extends Model
{
    use HasFactory;

    protected $table = 'ref_ptk';
    protected $fillable = [
        'nama_ptk'
    ];
    public $timestamps = false;

    public function ref_guru()
    {
        return $this->hasOne(RefGuru::class);
    }
}
