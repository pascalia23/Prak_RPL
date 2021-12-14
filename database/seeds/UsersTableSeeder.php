<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       \App\User::insert([
            [
              'id'  			=> 1,
              'role_id'  			=> 1,
              'nama'  			=> 'Admin',
              'username'		=> 'admin',
              'email' 			=> 'spydercode@gmail.com',
              'password'		=> bcrypt('admin123'),
              'no_telp'			=> '083857317946',
              'avatar'			=> NULL,
              'remember_token'	=> NULL,
              'created_at'      => \Carbon\Carbon::now(),
              'updated_at'      => \Carbon\Carbon::now()
            ],
            [
              'id'  			=> 2,
              'role_id'  			=> 2,
              'nama'  			=> 'Dosen',
              'username'		=> 'dosen',
              'email' 			=> 'spydercode@gmail.com',
              'password'		=> bcrypt('dosen123'),
              'no_telp'			=> '083857317946',
              'avatar'			=> NULL,
              'remember_token'	=> NULL,
              'created_at'      => \Carbon\Carbon::now(),
              'updated_at'      => \Carbon\Carbon::now()
            ],
            [
              'id'  			=> 3,
              'role_id'  			=> 3,
              'nama'  			=> 'Mahasiswa',
              'username'		=> 'mahasiswa',
              'email' 			=> 'spydercode@gmail.com',
              'password'		=> bcrypt('mahasiswa123'),
              'no_telp'			=> '083857317946',
              'avatar'			=> NULL,
              'remember_token'	=> NULL,
              'created_at'      => \Carbon\Carbon::now(),
              'updated_at'      => \Carbon\Carbon::now()
            ],
        ]);
    }
}
