<?php

namespace App\Http\Controllers;

use App\Signature;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SignatureController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Signature::all();
        return view('signature.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'nama' => 'required',
            'jabatan' => 'required',
            'ttd' => 'required|image|mimes:jpeg,png,jpg,svg|max:2048',
        ]);

        $data['ttd'] = 'coba';
        $signature = Signature::create($data);
        if ($files = $request->file('ttd')) {
            $profileImage = $signature->id.'.png';
            $path = $files->storeAs('public/ttd', $profileImage);
            $url = Storage::url($path);
            $imgUrl = url($url);
            Signature::find($signature->id)->update(['ttd'=>$imgUrl]);
            return back()->with('success','Data berhasil ditambahkan');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Signature  $signature
     * @return \Illuminate\Http\Response
     */
    public function show(Signature $signature)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Signature  $signature
     * @return \Illuminate\Http\Response
     */
    public function edit(Signature $signature)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Signature  $signature
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Signature $signature)
    {
        $data = $request->validate([
            'nama' => 'required',
            'jabatan' => 'required',
            'ttd' => 'image|mimes:jpeg,png,jpg,svg|max:2048',
        ]);

        $data['ttd'] = $signature->ttd;

        Signature::find($signature->id)->update($data);
        if ($files = $request->file('ttd')) {
            $profileImage = $signature->id.'.png';
            $path = $files->storeAs('public/ttd', $profileImage);
            $url = Storage::url($path);
            $imgUrl = url($url);
            Signature::find($signature->id)->update(['ttd'=>$imgUrl]);
            return back()->with('success','Data berhasil diubah');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Signature  $signature
     * @return \Illuminate\Http\Response
     */
    public function destroy(Signature $signature)
    {
        Signature::destroy($signature->id);
        return back()->with('success','Data berhasil dihapus');
    }
}
