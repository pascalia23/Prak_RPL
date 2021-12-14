<?php

namespace App\Http\Controllers;

use App\DaftarHadir;
use App\Signature;
use App\Surat;
use App\SuratType;
use App\TugasAnggota;
use App\User;
use Barryvdh\DomPDF\PDF;
use Barryvdh\DomPDF\Facade;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class PageController extends Controller
{
   public function suratMasuk()
   {
      if (Auth::user()->role_id==1) {
         $surat = Surat::all()->where('status',0);
      } else {
         $surat = Surat::all()->where('pemohon',Auth::id());
      }
      $ttd = Signature::all(); 
      return view('surat.index', compact('surat','ttd'));
   }

   public function buatSurat()
   {
      $tipeSurat = SuratType::all();
      $user = User::all()->where('role_id',3);
      return view('surat.buat', compact('tipeSurat','user'));
   }

   public function kirimSurat(Request $request)
   {
      switch ($request->idSurat) {
         case '1':
            $request->validate([
               'perihal'   => 'required|max:255',
               'tujuan' => 'required|max:255',
               'nama'  => 'required|max:255',
               'alamat'  => 'required|max:255',
               'keterangan'  => 'required|max:255',
            ]);
            $surat = new Surat();
            $surat->pemohon = Auth::id();
            $surat->tipe_surat = $request->idSurat;
            $surat->perihal = $request->perihal;
            $surat->tujuan = $request->tujuan;
            $surat->nama_mitra = $request->nama;
            $surat->alamat_mitra = $request->alamat;
            $surat->keterangan = $request->keterangan;
            $surat->save();
            return redirect('surat-masuk')->with('message', 'Surat Personalia & SK Berhasil Dikirim');
         case '2':
            $request->validate([
               'perihal'   => 'required|max:255',
               'tujuan' => 'required|max:255',
               'nama'  => 'required|max:255',
               'alamat'  => 'required|max:255',
               'nama_kegiatan'  => 'required|max:255',
               'lokasi'  => 'required|max:255',
               'tanggal'  => 'required|date',
               'keterangan'  => 'required|max:255',
            ]);
            $surat = new Surat();
            $surat->pemohon = Auth::id();
            $surat->tipe_surat = $request->idSurat;
            $surat->perihal = $request->perihal;
            $surat->tujuan = $request->tujuan;
            $surat->nama_mitra = $request->nama;
            $surat->alamat_mitra = $request->alamat;
            $surat->nama_kegiatan = $request->nama_kegiatan;
            $surat->lokasi_kegiatan = $request->lokasi;
            $surat->tgl_pelaksanaan_kegiatan = $request->tanggal;
            $surat->keterangan = $request->keterangan;
            $surat->save();
            return redirect('surat-masuk')->with('message', 'Surat Kegiatan Mahasiswa Berhasil Dikirim');
         case '3':
            $validate = $request->validate([
               'perihal'   => 'required|max:255',
               'nama_kegiatan' => 'required|max:255',
               'lokasi_kegiatan'  => 'required|max:255',
               'tgl_pelaksanaan_kegiatan'  => 'required|date',
               'nama_mitra'  => 'required|max:255',
               'tipe_surat'  => 'required',
            ]);
            $validate['no_surat'] = 'invalid';
            $validate['pemohon'] =  Auth::id();
            $surat = Surat::create($validate);
            foreach ($request->anggota as $item) {
               DaftarHadir::create([
                  'surat' => $surat->id,
                  'nama_peserta' => $item,
               ]);
            }
            return redirect('surat-masuk')->with('message', 'Surat Undangan/Daftar Hadir Kegiatan Berhasil Dikirim');
         case '4':
            $request->validate([
               'perihal'   => 'required|max:255',
               'tujuan' => 'required|max:255',
               'lokasi'  => 'required|max:255',
               'tanggal'  => 'required|date',
               'namamitra'  => 'required|max:255',
               'keterangan'  => 'required|max:255',
            ]);
            $surat = new Surat();
            $surat->pemohon = Auth::id();
            $surat->tipe_surat = $request->idSurat;
            $surat->perihal = $request->perihal;
            $surat->tujuan = $request->tujuan;
            $surat->lokasi_kegiatan = $request->lokasi;
            $surat->tgl_pelaksanaan_kegiatan = $request->tanggal;
            $surat->nama_mitra = $request->namamitra;
            $surat->keterangan = $request->keterangan;
            $surat->save();
            if (count($request->anggota_tugas)>0) {
               foreach ($request->anggota_tugas as $item ) {
                  TugasAnggota::create([
                     'surat_id' => $surat->id,
                     'user_id' => $item
                  ]);
               }
            }
            return redirect('surat-masuk')->with('message', 'Surat Tugas Berhasil Dikirim');
         case '5':
            $request->validate([
               'perihal'   => 'required|max:255',
               'namakegiatan' => 'required|max:255',
               'lokasi'  => 'required|max:255',
               'tanggal'  => 'required|date',
               'namamitra'  => 'required|max:255',
               'alamat'  => 'required|max:255',
               'keterangan'  => 'required|max:255',
            ]);
            $surat = new Surat();
            $surat->pemohon = Auth::id();
            $surat->tipe_surat = $request->idSurat;
            $surat->perihal = $request->perihal;
            $surat->nama_kegiatan = $request->namakegiatan;
            $surat->lokasi_kegiatan = $request->lokasi;
            $surat->tgl_pelaksanaan_kegiatan = $request->tanggal;
            $surat->nama_mitra = $request->namamitra;
            $surat->alamat_mitra = $request->alamat;
            $surat->keterangan = $request->keterangan;
            $surat->save();
            return redirect('surat-masuk')->with('message', 'Surat Berita Acara Berhasil Dikirim');
         default:
            return redirect('surat-masuk')->with('message', 'Pastikan Data Terinput Dengan Benar');
      }
   }

   public function validasiSurat(Request $request)
   {
      $request->validate([
         'idSurat'   => 'required',
      ]);
      $surat = Surat::find($request->idSurat);
      $no = Surat::all()->where('tipe_surat', $surat->tipe_surat)->where('status', 1)->count();
      Surat::find($request->idSurat)->update([
         'ttd' => $request->ttd,
      ]);
      Surat::find($request->idSurat)->update(['status' => 1, 'no_surat' => ($no+1).'/'.$surat->jenis->kode.'/FTI/'.date('Y')]);
      return back()->with('message', 'Surat Berhasil Divalidasi');
   }
   
   public function hapusSurat(Request $request)
   {
      $request->validate([
         'idSurat'   => 'required',
      ]);
      Surat::find($request->idSurat)->delete();
      return back()->with('message', 'Surat Berhasil Dihapus');
   }
   
   public function editSurat(Request $request)
   {
      $request->validate([
         'idSurat'   => 'required',
      ]);
      $surat = Surat::find($request->idSurat);
      $daftarHadir = DaftarHadir::where('surat', $request->idSurat)->get();
      $url = str_replace(url('/'), '', url()->previous()); // /surat-keluar
      session()->put('url', $url);
      return view('surat.edit_baru', compact('surat', 'daftarHadir'));
   }
   
   public function updateSurat(Request $request)
   {
      switch ($request->tipeSurat) {
         case '1':
            $request->validate([
               'perihal'   => 'required|max:255',
               'tujuan' => 'required|max:255',
               'nama'  => 'required|max:255',
               'alamat'  => 'required|max:255',
               'keterangan'  => 'required|max:255',
            ]);
            $surat = Surat::find($request->idSurat);
            $surat->perihal = $request->perihal;
            $surat->tujuan = $request->tujuan;
            $surat->nama_mitra = $request->nama;
            $surat->alamat_mitra = $request->alamat;
            $surat->keterangan = $request->keterangan;
            $surat->save();
            return redirect(Session::get('url')=='/surat-keluar'?'/surat-keluar':'/surat-masuk')->with('message', 'Surat Personalia & SK Berhasil Diperbarui');
         case '2':
            $request->validate([
               'perihal'   => 'required|max:255',
               'tujuan' => 'required|max:255',
               'nama'  => 'required|max:255',
               'alamat'  => 'required|max:255',
               'nama_kegiatan'  => 'required|max:255',
               'lokasi'  => 'required|max:255',
               'tanggal'  => 'required|date',
               'keterangan'  => 'required|max:255',
            ]);
            $surat = Surat::find($request->idSurat);
            $surat->perihal = $request->perihal;
            $surat->tujuan = $request->tujuan;
            $surat->nama_mitra = $request->nama;
            $surat->alamat_mitra = $request->alamat;
            $surat->nama_kegiatan = $request->nama_kegiatan;
            $surat->lokasi_kegiatan = $request->lokasi;
            $surat->tgl_pelaksanaan_kegiatan = $request->tanggal;
            $surat->keterangan = $request->keterangan;
            $surat->save();
            return redirect(Session::get('url'))->with('message', 'Surat Kegiatan Mahasiswa Berhasil Diperbarui');
         case '3':
            $validate = $request->validate([
               'perihal'   => 'required|max:255',
               'nama_kegiatan' => 'required|max:255',
               'lokasi_kegiatan'  => 'required|max:255',
               'tgl_pelaksanaan_kegiatan'  => 'required|date',
               'nama_mitra'  => 'required|max:255',
               'tipe_surat'  => 'required',
            ]);
            $validate['no_surat'] = 'invalid';
            $validate['pemohon'] =  Auth::id();
            $surat = Surat::create($validate);
            foreach ($request->anggota as $item) {
               DaftarHadir::create([
                  'surat' => $surat->id,
                  'nama_peserta' => $item,
               ]);
            }
            return back()->with('message', 'Surat Undangan/Daftar Hadir Kegiatan Berhasil Dikirim');
         case '4':
            $request->validate([
               'perihal'   => 'required|max:255',
               'tujuan' => 'required|max:255',
               'lokasi'  => 'required|max:255',
               'tanggal'  => 'required|date',
               'namamitra'  => 'required|max:255',
               'keterangan'  => 'required|max:255',
            ]);
            $surat = Surat::find($request->idSurat);
            $surat->perihal = $request->perihal;
            $surat->tujuan = $request->tujuan;
            $surat->lokasi_kegiatan = $request->lokasi;
            $surat->tgl_pelaksanaan_kegiatan = $request->tanggal;
            $surat->nama_mitra = $request->namamitra;
            $surat->keterangan = $request->keterangan;
            $surat->save();
            return redirect(Session::get('url'))->with('message', 'Surat Tugas Berhasil Diperbarui');
         case '5':
            $request->validate([
               'perihal'   => 'required|max:255',
               'namakegiatan' => 'required|max:255',
               'lokasi'  => 'required|max:255',
               'tanggal'  => 'required|date',
               'namamitra'  => 'required|max:255',
               'alamat'  => 'required|max:255',
               'keterangan'  => 'required|max:255',
            ]);
            $surat = Surat::find($request->idSurat);
            $surat->perihal = $request->perihal;
            $surat->nama_kegiatan = $request->namakegiatan;
            $surat->lokasi_kegiatan = $request->lokasi;
            $surat->nama_mitra = $request->namamitra;
            $surat->alamat_mitra = $request->alamat;
            $surat->keterangan = $request->keterangan;
            $surat->save();
            return redirect(Session::get('url'))->with('message', 'Surat Berita Acara Berhasil Diperbarui');
         default:
            return redirect(Session::get('url'))->with('message', 'Pastikan Data Terinput Dengan Benar');
      }
   }
   
   public function download(Surat $surat)
   {
      if($surat->tipe_surat==1){
         $pdf = Facade::loadView('pdf.personalia', compact('surat'));
      }else if($surat->tipe_surat==2){
         $pdf = Facade::loadView('pdf.surat_kegiatan', compact('surat'));
      }else if($surat->tipe_surat==3){
         $anggota = DaftarHadir::all()->where('surat',$surat->id);
         $pdf = Facade::loadView('pdf.daftar_hadir', compact('surat','anggota'));
      }else if($surat->tipe_surat==4){
         $anggota = TugasAnggota::all()->where('surat_id',$surat->id);
         $pdf = Facade::loadView('pdf.surat_tugas', compact('surat','anggota'));
      }else if($surat->tipe_surat==5){
         $pdf = Facade::loadView('pdf.berita_acara', compact('surat'));
      }
      $pdf->getDomPDF()->setHttpContext(
         stream_context_create([
               'ssl' => [
                  'allow_self_signed'=> TRUE,
                  'verify_peer' => FALSE,
                  'verify_peer_name' => FALSE,
               ]
            ])
      );
      return $pdf->download($surat->jenis->nama.'.pdf');
   }

   public function suratKeluar()
   {
      $surat = Surat::all();
      return view('surat.keluar', compact('surat'));
   }

   public function profile()
   {
      $data = User::find(Auth::id());
      return view('auth.show', compact('data'));
   }

   public function dashboard()
   {
      if (Auth::user()->role_id==1) {
         $surat = Surat::all()->where('status',0);
         $count = Surat::all()->count();
         $sur = Surat::all();
      } else {
         $surat = Surat::all()->where('pemohon',Auth::id())->where('status',0);
         $count = Surat::all()->where('pemohon',Auth::id())->count();
         $sur = null;
      }
      return view('dashboar', compact('surat','count','sur'));
   }

   public function updatePassword(Request $request)
   {
      $request->validate([
         'password' => 'required|string|min:6|confirmed',
      ]);

      User::find(Auth::id())->update(['password'=>Hash::make($request->password)]);
      return back()->with('success','Password berhasil diubah!');
   }

}