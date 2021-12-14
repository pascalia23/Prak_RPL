@extends('layouts.app')

@section('content')
<div class="row">
   <div class="col-lg-12">
      @if (Session::has('message'))
      <div class="alert alert-{{ Session::get('message_type') }}" id="waktu2" style="margin-top:10px;">
         {{ Session::get('message') }}</div>
      @endif
   </div>
</div>
<div class="row" style="margin-top: 20px;">
   <div class="col-lg-12 grid-margin stretch-card">
      <div class="card">
         <div class="card-body">
            <div class="card-title">
               <h4>Edit Surat {{ $surat->jenis->nama }}</h4>
            </div>
            <div class="mt-5">
               @if($surat->tipe_surat == 1)
               <form action="{{ route('update.surat') }}" method="POST" id="formPersonal">
                  {{ csrf_field() }}
                  <input type="hidden" name="tipeSurat" value="1">
                  <input type="hidden" name="idSurat" value="{{ $surat->id }}">
                  <div class="form-group row">
                     <div class="col">
                        <label for="perihal">Perihal</label>
                        <input type="text" class="form-control" name="perihal" id="perihal" placeholder="Perihal"
                           value="{{ $surat->perihal }}" required>
                     </div>
                     <div class="col">
                        <label for="tujuan">Tujuan Surat</label>
                        <input type="text" class="form-control" name="tujuan" id="tujuan" placeholder="Tujuan"
                           value="{{ $surat->tujuan }}" required>
                     </div>
                  </div>
                  <div class="form-group row">
                     <div class="col">
                        <label for="nama">Nama Mitra</label>
                        <input type="text" class="form-control" name="nama" id="nama" placeholder="Nama Mitra"
                           value="{{ $surat->nama_mitra }}" required>
                     </div>
                     <div class="col">
                        <label for="alamat">Alamat Mitra</label>
                        <input type="text" class="form-control" name="alamat" id="alamat" placeholder="Alamat Mitra"
                           value="{{ $surat->alamat_mitra }}" required>
                     </div>
                  </div>
                  <div class="form-group row">
                     <div class="col">
                        <label for="keterangan">Keterangan</label>
                        <textarea class="form-control" name="keterangan" id="keterangan" rows="4"
                           required>{{ $surat->keterangan }}</textarea>
                     </div>
                  </div>
                  <button type="submit" class="btn btn-primary">Edit Surat</button>
               </form>
               @elseif($surat->tipe_surat == 2)
               <form action="{{ route('update.surat') }}" method="POST" id="formKegiatan">
                  {{ csrf_field() }}
                  <input type="hidden" name="tipeSurat" value="2">
                  <input type="hidden" name="idSurat" value="{{ $surat->id }}">
                  <div class="form-group row">
                     <div class="col">
                        <label for="perihal">Perihal</label>
                        <input type="text" class="form-control" name="perihal" id="perihal" placeholder="Perihal"
                           value="{{ $surat->perihal }}" required>
                     </div>
                     <div class="col">
                        <label for="tujuan">Tujuan Surat</label>
                        <input type="text" class="form-control" name="tujuan" id="tujuan" placeholder="Tujuan"
                           value="{{ $surat->tujuan }}" required>
                     </div>
                  </div>
                  <div class="form-group row">
                     <div class="col">
                        <label for="nama">Nama Mitra</label>
                        <input type="text" class="form-control" name="nama" id="nama" placeholder="Nama Mitra"
                           value="{{ $surat->nama_mitra }}" required>
                     </div>
                     <div class="col">
                        <label for="alamat">Alamat Mitra</label>
                        <input type="text" class="form-control" name="alamat" id="alamat" placeholder="Alamat Mitra"
                           value="{{ $surat->alamat_mitra }}" required>
                     </div>
                  </div>
                  <div class="form-group row">
                     <div class="col">
                        <label for="namakegiatan">Nama Kegiatan</label>
                        <input type="text" class="form-control" name="nama_kegiatan" id="namakegiatan" value="{{ $surat->nama_kegiatan }}" placeholder="Nama Kegiatan" required>
                     </div>
                     <div class="col">
                        <label for="lokasi">Lokasi Kegiatan</label>
                        <input type="text" class="form-control" name="lokasi" id="lokasi" value="{{ $surat->lokasi_kegiatan }}" placeholder="Lokasi Kegiatan"
                           required>
                     </div>
                     <div class="col">
                        <label for="tanggal">Tanggal Pelaksanaan</label>
                        <input type="datetime-local" class="form-control" name="tanggal" id="tanggal" value="{{ $surat->tgl_pelaksanaan_kegiatan }}" required>
                     </div>
                  </div>
                  <div class="form-group row">
                     <div class="col">
                        <label for="keterangan">Keterangan</label>
                        <textarea class="form-control" name="keterangan" id="keterangan" rows="4"
                           required>{{ $surat->keterangan }}</textarea>
                     </div>
                  </div>
                  <button type="submit" class="btn btn-primary">Edit Surat</button>
               </form>
               @elseif($surat->tipe_surat == 3)
               <!-- SUDAH -->
               <form action="{{ route('update.surat') }}" method="POST" id="formDaftar">
                  {{ csrf_field() }}
                  <input type="hidden" name="tipeSurat" value="3">
                  <input type="hidden" name="idSurat" value="{{ $surat->id }}">
                  <div class="form-group row">
                     <div class="col">
                        <label for="perihal">Perihal</label>
                        <input type="text" class="form-control" name="perihal" id="perihal" placeholder="Perihal"
                           value="{{ $surat->perihal }}" required>
                     </div>
                     <div class="col">
                        <label for="namakegiatan">Nama Kegiatan</label>
                        <input type="text" class="form-control" name="nama_kegiatan" id="namakegiatan"
                           value="{{ $surat->nama_kegiatan }}" placeholder="Nama Kegiatan" required>
                     </div>
                  </div>
                  <div class="form-group row">
                     <div class="col">
                        <label for="lokasi">Lokasi Kegiatan</label>
                        <input type="text" class="form-control" name="lokasi_kegiatan" id="lokasi"
                           value="{{ $surat->lokasi_kegiatan }}" placeholder="Lokasi Kegiatan" required>
                     </div>
                     <div class="col">
                        <label for="tanggal">Tanggal Pelaksanaan Kegiatan</label>
                        <input type="datetime-local" class="form-control" name="tgl_pelaksanaan_kegiatan" id="tanggal" value="{{ $surat->tgl_pelaksanaan_kegiatan }}" required>
                     </div>
                  </div>
                  <div class="form-group row">
                     <div class="col">
                        <label for="namamitra">Nama Mitra</label>
                        <input type="text" class="form-control" name="nama_mitra" id="namamitra"
                           value="{{ $surat->nama_mitra }}" placeholder="Nama Mitra" required>
                     </div>
                  </div>
                  <div class="form-group row">
                     @foreach ($daftarHadir as $anggota)
                     <div class="col mt-2" id="anggota">
                        <label for="anggota">Anggota</label>
                        <input type="text" class="form-control" name="anggota[]" value="{{ $anggota->nama_peserta }}" required>
                     </div>
                     @endforeach
                  </div>
                  <div id="response" class="form-group"></div>
                  <button id="addPeserta" class="btn btn-success btn-sm" type="button">Tambah Nama Peserta</button>
                  <button type="submit" class="btn btn-primary">Edit Surat</button>
               </form>
               <!-- SUDAH -->
               @elseif($surat->tipe_surat == 4)
               <form action="{{ route('update.surat') }}" method="POST" id="formSurat">
                  {{ csrf_field() }}
                  <input type="hidden" name="tipeSurat" value="4">
                  <input type="hidden" name="idSurat" value="{{ $surat->id }}">
                  <div class="form-group row">
                     <div class="col">
                        <label for="perihal">Perihal</label>
                        <input type="text" class="form-control" name="perihal" id="perihal" placeholder="Perihal"
                           value="{{ $surat->perihal }}" required>
                     </div>
                     <div class="col">
                        <label for="tujuan">Tujuan</label>
                        <input type="text" class="form-control" name="tujuan" id="tujuan" placeholder="Tujuan"
                           value="{{ $surat->tujuan }}" required>
                     </div>
                  </div>
                  <div class="form-group row">
                     <div class="col">
                        <label for="lokasi">Lokasi Kegiatan</label>
                        <input type="text" class="form-control" name="lokasi" id="lokasi" placeholder="Lokasi Kegiatan"
                           value="{{ $surat->lokasi_kegiatan }}" required>
                     </div>
                     <div class="col">
                        <label for="tanggal">Tanggal Pelaksanaan Kegiatan</label>
                        <input type="date" class="form-control" name="tanggal" id="tanggal"
                           value="{{ $surat->tgl_pelaksanaan_kegiatan }}" required>
                     </div>
                  </div>
                  <div class="form-group row">
                     <div class="col">
                        <label for="namamitra">Nama Mitra</label>
                        <input type="text" class="form-control" name="namamitra" id="namamitra" placeholder="Nama Mitra"
                           value="{{ $surat->nama_mitra }}" required>
                     </div>
                  </div>
                  <div class="form-group row">
                     <div class="col">
                        <label for="keterangan">Keterangan</label>
                        <textarea class="form-control" name="keterangan" id="keterangan" rows="4"
                           required>{{ $surat->keterangan }}</textarea>
                     </div>
                  </div>
                  <button type="submit" class="btn btn-primary">Edit Surat</button>
               </form>
               @else
               <form action="{{ route('update.surat') }}" method="POST" id="formBerita">
                  {{ csrf_field() }}
                  <input type="hidden" name="tipeSurat" value="5">
                  <input type="hidden" name="idSurat" value="{{ $surat->id }}">
                  <div class="form-group row">
                     <div class="col">
                        <label for="perihal">Perihal</label>
                        <input type="text" class="form-control" name="perihal" id="perihal"
                           value="{{ $surat->perihal }}" placeholder="Perihal" required>
                     </div>
                     <div class="col">
                        <label for="namakegiatan">Nama Kegiatan</label>
                        <input type="text" class="form-control" name="namakegiatan" id="namakegiatan"
                           placeholder="Nama Kegiatan" value="{{ $surat->nama_kegiatan }}" required>
                     </div>
                  </div>
                  <div class="form-group row">
                     <div class="col">
                        <label for="lokasi">Lokasi Kegiatan</label>
                        <input type="text" class="form-control" name="lokasi" id="lokasi" placeholder="Lokasi Kegiatan"
                           value="{{ $surat->lokasi_kegiatan }}" required>
                     </div>
                     <div class="col">
                        <label for="tanggal">Tanggal Pelaksanaan</label>
                        <input type="date" class="form-control" name="tanggal" id="tanggal"
                           value="{{ $surat->tgl_pelaksanaan_kegiatan }}" required>
                     </div>
                  </div>
                  <div class="form-group row">
                     <div class="col">
                        <label for="namamitra">Nama Mitra</label>
                        <input type="text" class="form-control" name="namamitra" id="namamitra" placeholder="Nama Mitra"
                           value="{{ $surat->nama_mitra }}" required>
                     </div>
                     <div class="col">
                        <label for="alamat">Alamat Mitra</label>
                        <input type="text" class="form-control" name="alamat" id="alamat" placeholder="Alamat Mitra"
                           value="{{ $surat->alamat_mitra }}" required>
                     </div>
                  </div>
                  <div class="form-group row">
                     <div class="col">
                        <label for="keterangan">Keterangan</label>
                        <textarea class="form-control" name="keterangan" id="keterangan" rows="4"
                           required>{{ $surat->keterangan }}</textarea>
                     </div>
                  </div>
                  <button type="submit" class="btn btn-primary">Edit Surat</button>
               </form>
               @endif
            </div>


         </div>
      </div>
   </div>
</div>
@endsection

@section('js')
<script>
$('#addPeserta').click(function() {
   let html = $('#anggota').html();
   $('#response').append(html);
});
</script>
@stop