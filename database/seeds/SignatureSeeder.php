<?php

use App\Signature;
use Illuminate\Database\Seeder;

class SignatureSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Signature::create([
            'nama' => 'Muhammad Aziz Almi',
            'jabatan' => 'Dekan',
            'ttd' => 'default.png'
        ]);
    }
}
