<?php

namespace App\Exports;

use App\Buku;
use Carbon\Carbon;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class BukuExport implements FromView
{
    protected $type;

    function __construct($type) {
            $this->type = $type;
    }

    public function view(): View
    {
        $type = $this->type;
        if ($type==0) {
            $data = Buku::all();
        }
        if ($type==1) {
            $data   = Buku::whereBetween('created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])->get();
        }
        if ($type==2) {
            $data  = Buku::whereMonth('created_at', date('m'))->whereYear('created_at', date('Y'))->get();
        }
        if ($type==3) {
            $data   = Buku::whereYear('created_at', date('Y'))->get();
        }
        return view('exports.book',compact('data'));
    }
}
