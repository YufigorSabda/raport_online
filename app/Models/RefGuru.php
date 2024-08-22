<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RefGuru extends Model
{
    use HasFactory;

    protected $table = 'ref_guru';
    protected $fillable = [
        'user_id',
        'gelar_depan',
        'gelar_belakang',
        'id_ptk',
    ];
    public $timestamps = false;

    public function ref_ptk()
    {
        return $this->belongsTo(RefPtk::class, 'id_ptk');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
