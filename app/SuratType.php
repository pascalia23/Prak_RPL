<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SuratType extends Model
{
    protected $table = 'tipe_surat';
    protected $fillable = [
        'nama',
        'kode',
    ];
}
