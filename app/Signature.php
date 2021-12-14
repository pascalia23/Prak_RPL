<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Signature extends Model
{
    protected $fillable = [
        'nama',
        'ttd',
        'jabatan'
    ];
}
