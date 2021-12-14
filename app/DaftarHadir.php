<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DaftarHadir extends Model
{
    protected $table = 'daftar_hadir';
    protected $fillable = [
        'nama_peserta',
        'surat'
    ];
}