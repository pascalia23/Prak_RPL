<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MahasiswaPageController extends Controller
{
    public function index()
    {
        return view('layouts.app');
    }
}
