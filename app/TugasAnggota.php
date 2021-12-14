<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TugasAnggota extends Model
{
    protected $table = 'tugas_anggota';
    protected $fillable = [
        'surat_id',
        'user_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function surat()
    {
        return $this->belongsTo(Surat::class,'surat_id');
    }
}
