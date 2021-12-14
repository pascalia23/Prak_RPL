@extends('layouts.app')

@section('content')
<div class="row">
   <div class="col-lg-12">
      @if (Session::has('message'))
      <div class="alert alert-{{ Session::get('message_type') }}" id="waktu2" style="margin-top:10px;">
         {{ Session::get('message') }}</div>
      @endif
      @if ($errors->any())
      <div class="alert alert-danger">
         <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
         </ul>
      </div>
      @endif
   </div>
</div>
<div class="row" style="margin-top: 20px;">
   <div class="col-lg-12 grid-margin stretch-card">
      <div class="card">
         <div class="card-body">
            <div class="card-title">
               <h4>Buat Surat</h4>
            </div>
            <div>
               <select class="form-control" id="opsiSurat">
                  <option></option>
                  @foreach ($tipeSurat as $ts)
                  @if (auth()->user()->role->nama == 'Admin')
                  <option value="{{ $ts->id }}">{{ $ts->nama }}</option>
                  @elseif (auth()->user()->role->nama == 'Mahasiswa')
                  @if ( $ts->id == 2 || $ts->id == 3 || $ts->id == 5 || $ts->id == 4)
                  <option value="{{ $ts->id }}">{{ $ts->nama }}</option>
                  @endif
                  @else
                  @if ($ts->id == 1 || $ts->id == 4 || $ts->id == 5)
                  <option value="{{ $ts->id }}">{{ $ts->nama }}</option>
                  @endif
                  @endif
                  @endforeach
               </select>
            </div>
            <div class="mt-5">
               <form action="{{ route('kirim.surat') }}" method="POST" id="formPersonal" style="display: none;">
                  {{ csrf_field() }}
                  <input type="hidden" name="idSurat" value="1">
                  <div class="form-group row">
                     <div class="col">
                        <label for="perihal">Perihal</label>
                        <input type="text" class="form-control" name="perihal" id="perihal" placeholder="Perihal"
                           required>
                     </div>
                     <div class="col">
                        <label for="tujuan">Tujuan Surat</label>
                        <input type="text" class="form-control" name="tujuan" id="tujuan" placeholder="Tujuan" required>
                     </div>
                  </div>
                  <div class="form-group row">
                     <div class="col">
                        <label for="nama">Nama Mitra</label>
                        <input type="text" class="form-control" name="nama" id="nama" placeholder="Nama Mitra" required>
                     </div>
                     <div class="col">
                        <label for="alamat">Alamat Mitra</label>
                        <input type="text" class="form-control" name="alamat" id="alamat" placeholder="Alamat Mitra"
                           required>
                     </div>
                  </div>
                  <div class="form-group row">
                     <div class="col">
                        <label for="keterangan">Keterangan</label>
                        <textarea class="form-control" name="keterangan" id="keterangan" rows="4"></textarea>
                     </div>
                  </div>
                  <button type="submit" class="btn btn-primary">Submit</button>
               </form>

               <form action="{{ route('kirim.surat') }}" method="POST" id="formKegiatan" style="display: none;">
                  {{ csrf_field() }}
                  <input type="hidden" name="idSurat" value="2">
                  <div class="form-group row">
                     <div class="col">
                        <label for="perihal">Perihal</label>
                        <input type="text" class="form-control" name="perihal" id="perihal" placeholder="Perihal"
                           required>
                     </div>
                     <div class="col">
                        <label for="tujuan">Tujuan Surat</label>
                        <input type="text" class="form-control" name="tujuan" id="tujuan" placeholder="Tujuan" required>
                     </div>
                  </div>
                  <div class="form-group row">
                     <div class="col">
                        <label for="nama">Nama Mitra</label>
                        <input type="text" class="form-control" name="nama" id="nama" placeholder="Nama Mitra" required>
                     </div>
                     <div class="col">
                        <label for="alamat">Alamat Mitra</label>
                        <input type="text" class="form-control" name="alamat" id="alamat" placeholder="Alamat Mitra"
                           required>
                     </div>
                  </div>
                  <div class="form-group row">
                     <div class="col">
                        <label for="namakegiatan">Nama Kegiatan</label>
                        <input type="text" class="form-control" name="nama_kegiatan" id="namakegiatan" placeholder="Nama Mitra" required>
                     </div>
                     <div class="col">
                        <label for="lokasi">Lokasi Kegiatan</label>
                        <input type="text" class="form-control" name="lokasi" id="lokasi" placeholder="Lokasi Kegiatan"
                           required>
                     </div>
                     <div class="col">
                        <label for="tanggal">Tanggal Pelaksanaan</label>
                        <input type="datetime-local" class="form-control" name="tanggal" id="tanggal" required>
                     </div>
                  </div>
                  <div class="form-group row">
                     <div class="col">
                        <label for="keterangan">Keterangan</label>
                        <textarea class="form-control" name="keterangan" id="keterangan" rows="4" required></textarea>
                     </div>
                  </div>
                  <button type="submit" class="btn btn-primary">Submit</button>
               </form>

               <!-- SUDAH -->
               <form action="{{ route('kirim.surat') }}" method="POST" id="formDaftar" style="display: none;">
                  {{ csrf_field() }}
                  <input type="hidden" name="idSurat" value="3">
                  <input type="hidden" name="tipe_surat" value="3">
                  <div class="form-group row">
                     <div class="col">
                        <label for="perihal">Perihal</label>
                        <input type="text" class="form-control" name="perihal" id="perihal" placeholder="Perihal"
                           required>
                     </div>
                     <div class="col">
                        <label for="namakegiatan">Nama Kegiatan</label>
                        <input type="text" class="form-control" name="nama_kegiatan" id="namakegiatan"
                           placeholder="Nama Kegiatan" required>
                     </div>
                  </div>
                  <div class="form-group row">
                     <div class="col">
                        <label for="lokasi">Lokasi Kegiatan</label>
                        <input type="text" class="form-control" name="lokasi_kegiatan" id="lokasi"
                           placeholder="Lokasi Kegiatan" required>
                     </div>
                     <div class="col">
                        <label for="tanggal">Tanggal Pelaksanaan Kegiatan</label>
                        <input type="datetime-local" class="form-control" name="tgl_pelaksanaan_kegiatan" id="tanggal" required>
                     </div>
                  </div>
                  <div class="form-group row">
                     <div class="col">
                        <label for="namamitra">Nama Mitra</label>
                        <input type="text" class="form-control" name="nama_mitra" id="namamitra"
                           placeholder="Nama Mitra" required>
                     </div>
                  </div>
                  <div class="form-group row">
                     <div class="col mt-2" id="anggota">
                        <label for="anggota">Anggota</label>
                        <input type="text" class="form-control" name="anggota[]" required>
                     </div>
                  </div>
                  <div id="response" class="form-group"></div>
                  <button id="addPeserta" class="btn btn-success btn-sm" type="button">Tambah Nama Peserta</button>
                  <button type="submit" class="btn btn-primary">Submit</button>
               </form>
               <!-- SUDAH -->

               <form action="{{ route('kirim.surat') }}" method="POST" id="formSurat" style="display: none;">
                  {{ csrf_field() }}
                  <input type="hidden" name="idSurat" value="4">
                  <div class="form-group row">
                     <div class="col">
                        <label for="perihal">Perihal</label>
                        <input type="text" class="form-control" name="perihal" id="perihal" placeholder="Perihal"
                           required>
                     </div>
                     <div class="col">
                        <label for="tujuan">Tujuan</label>
                        <input type="text" class="form-control" name="tujuan" id="tujuan" placeholder="Tujuan" required>
                     </div>
                  </div>
                  <div class="form-group row">
                     <div class="col">
                        <label for="lokasi">Lokasi Kegiatan</label>
                        <input type="text" class="form-control" name="lokasi" id="lokasi" placeholder="Lokasi Kegiatan"
                           required>
                     </div>
                     <div class="col">
                        <label for="tanggal">Tanggal Pelaksanaan Kegiatan</label>
                        <input type="datetime-local" class="form-control" name="tanggal" id="tanggal" required>
                     </div>
                  </div>
                  <div class="form-group row">
                     <div class="col">
                        <label for="namamitra">Nama Mitra</label>
                        <input type="text" class="form-control" name="namamitra" id="namamitra" placeholder="Nama Mitra"
                           required>
                     </div>
                     <div class="col">
                        <label for="namamitra">Tipe</label>
                        <select name="tipe_tugas" class="form-control" id="tipe_tugas">
                           <option value="1" selected>Pribadi</option>
                           <option value="2">Kelompok</option>
                        </select>
                     </div>
                  </div>
                  <div class="form-group row" id="form_anggota">
                     <div class="col-12" id="html">
                        <label for="namamitra">Jumlah Anggota</label>
                        <input type="number" id="jumlah_anggota" class="form-control">
                     </div>
                  </div>
                  <div id="response-tugas" class="form-group row">

                  </div>
                  <div class="form-group row">
                     <div class="col">
                        <label for="keterangan">Keterangan</label>
                        <textarea class="form-control" name="keterangan" id="keterangan" rows="4" required></textarea>
                     </div>
                  </div>
                  <button type="submit" class="btn btn-primary">Submit</button>
               </form>

               <form action="{{ route('kirim.surat') }}" method="POST" id="formBerita" style="display: none;">
                  {{ csrf_field() }}
                  <input type="hidden" name="idSurat" value="5">
                  <div class="form-group row">
                     <div class="col">
                        <label for="perihal">Perihal</label>
                        <input type="text" class="form-control" name="perihal" id="perihal" placeholder="Perihal"
                           required>
                     </div>
                     <div class="col">
                        <label for="namakegiatan">Nama Kegiatan</label>
                        <input type="text" class="form-control" name="namakegiatan" id="namakegiatan"
                           placeholder="Nama Kegiatan" required>
                     </div>
                  </div>
                  <div class="form-group row">
                     <div class="col">
                        <label for="lokasi">Lokasi Kegiatan</label>
                        <input type="text" class="form-control" name="lokasi" id="lokasi" placeholder="Lokasi Kegiatan"
                           required>
                     </div>
                     <div class="col">
                        <label for="tanggal">Tanggal Pelaksanaan</label>
                        <input type="datetime-local" class="form-control" name="tanggal" id="tanggal" required>
                     </div>
                  </div>
                  <div class="form-group row">
                     <div class="col">
                        <label for="namamitra">Nama Mitra</label>
                        <input type="text" class="form-control" name="namamitra" id="namamitra" placeholder="Nama Mitra"
                           required>
                     </div>
                     <div class="col">
                        <label for="alamat">Alamat Mitra</label>
                        <input type="text" class="form-control" name="alamat" id="alamat" placeholder="Alamat Mitra"
                           required>
                     </div>
                  </div>
                  <div class="form-group row">
                     <div class="col">
                        <label for="keterangan">Keterangan</label>
                        <textarea class="form-control" name="keterangan" id="keterangan" rows="4" required></textarea>
                     </div>
                  </div>
                  <button type="submit" class="btn btn-primary">Submit</button>
               </form>



            </div>


         </div>
      </div>
   </div>
</div>
@endsection

@section('js')
<script>
$('#opsiSurat').change(function() {
   let id = $(this).children(':selected').attr('value');
   if (id == 1) {
      $('#formPersonal').show();
      $('#formKegiatan').hide();
      $('#formDaftar').hide();
      $('#formSurat').hide();
      $('#formBerita').hide();
   } else if (id == 2) {
      $('#formPersonal').hide();
      $('#formKegiatan').show();
      $('#formDaftar').hide();
      $('#formSurat').hide();
      $('#formBerita').hide();
   } else if (id == 3) {
      $('#formPersonal').hide();
      $('#formKegiatan').hide();
      $('#formDaftar').show();
      $('#formSurat').hide();
      $('#formBerita').hide();
   } else if (id == 4) {
      $('#formPersonal').hide();
      $('#formKegiatan').hide();
      $('#formDaftar').hide();
      $('#formSurat').show();
      $('#formBerita').hide();
   } else {
      $('#formPersonal').hide();
      $('#formKegiatan').hide();
      $('#formDaftar').hide();
      $('#formSurat').hide();
      $('#formBerita').show();
   }
});

$('#addPeserta').click(function() {
   let html = $('#anggota').html();
   $('#response').append(html);
});

$('#response-tugas').hide();
$('#form_anggota').hide();

$('#tipe_tugas').change(function (e) { 
   var val = $(this).val();
   if(val==2){
      $('#response-tugas').show();
      $('#form_anggota').show();
   }else{
      $('#form_anggota').hide();
      $('#response-tugas').hide();
   }
});

$('#jumlah_anggota').change(function (e) {
   $('#response-tugas').html('');
   var num = $('#jumlah_anggota').val();
   for (let i = 1; i <= num; i++) {
      var html = '<div class="col-12" id="html"><label for="namamitra">Anggota '+i+'</label><select name="anggota_tugas[]"class="form-control"><option value=""></option>@foreach ($user as $item)<option value="{{ $item->id }}">{{$item->username }} - {{ $item->nama }}</option>@endforeach </select></div>';
      $('#response-tugas').append(html);
   }
});


</script>
@stop