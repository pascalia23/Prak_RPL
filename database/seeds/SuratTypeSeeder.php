<?php

use App\SuratType;
use Illuminate\Database\Seeder;

class SuratTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        SuratType::insert([
            ['nama'=>'Surat Personalia & SK', 'kode'=>'A'],
            ['nama'=>'Surat Kegiatan Mahasiswa', 'kode'=>'B'],
            ['nama'=>'Surat Undagan/Daftar Hadir Kegiatan', 'kode'=>'C'],
            ['nama'=>'Surat Tugas', 'kode'=>'D'],
            ['nama'=>'Surat Berita Acara', 'kode'=>'E'],
        ]);
    }
}
