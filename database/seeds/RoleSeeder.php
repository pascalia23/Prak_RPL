<?php

use App\Role;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::insert([
            ['nama'=> 'Admin'],
            ['nama'=> 'Dosen'],
            ['nama'=> 'Mahasiswa'],
        ]);
    }
}
