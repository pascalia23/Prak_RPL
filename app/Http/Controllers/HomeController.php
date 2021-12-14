<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Buku;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $role_id = Auth::user()->role_id;
        if ($role_id==1) {
            return redirect(route('user.dashboard'));
        } else if($role_id == 2) {
            return redirect(route('user.dashboard'));
        }else{
            return redirect(route('user.dashboard'));
        }
        
    }
}
