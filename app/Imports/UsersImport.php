<?php

namespace App\Imports;

use App\User;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithStartRow;

class UsersImport implements ToModel, WithStartRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        $role_name = strtolower($row[4]);
        if($role_name=='admin'){
            $role = 1;
        }else if($role_name=='dosen'){
            $role = 2;
        }else{
            $role = 3;
        }
        return new User([
            'username' => $row[0],
            'nama' => $row[1],
            'email' => $row[2],
            'no_telp' => $row[3],
            'role_id' => $role,
            'password' => Hash::make($row[0]),
        ]);
    }

    public function startRow(): int
    {
        return 2;
    }
}
