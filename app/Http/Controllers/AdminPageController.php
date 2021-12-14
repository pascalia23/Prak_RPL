<?php

namespace App\Http\Controllers;

use App\Imports\UsersImport;
use App\User;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class AdminPageController extends Controller
{
    public function index()
    {
        return view('layouts.app');
    }

    public function user()
    {
        $data = User::all();
        return view('user.index', compact('data'));
    }

    public function destroyUser(User $user)
    {
        User::destroy($user->id);
        return back()->with('success','User berhasil dihapus');
    }

    public function updateUser(User $user, Request $request)
    {
        User::find($user->id)->update($request->all());
        return back()->with('success','User berhasil diupdate');
    }

    public function importUser(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:csv,xls,xlsx'
        ]);

        if($request->file('file')){
            Excel::import(new UsersImport, $request->file);
            return back()->with('success','Data berhasil diimport!');
        }else{
            return back()->with('danger', 'Import gagal');
        }
        
    }
}
