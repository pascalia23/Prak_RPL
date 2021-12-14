@section('js')
<script type="text/javascript">
$(document).ready(function() {
   $('#table').DataTable();

});
</script>
@stop
@extends('layouts.app')

@section('content')
<div class="row">

   {{-- <div class="col-lg-2">
    <div class="d-sm-flex">
      <a href="{{ route('buku.create') }}" class="btn btn-primary btn-rounded m-1"><i class="fa fa-plus"></i> Tambah
   Buku</a>
   <a href="{{ route('export.excel',['name'=>$type]) }}" class="btn btn-success btn-rounded m-1"><i
         class="fa fa-download"></i> Export Excel</a>
   @if ($type==4)
   <a href="{{ route('export.doc.custom',['from' =>$from ,'to'=>$to]) }}" class="btn btn-info btn-rounded m-1"><i
         class="fa fa-download"></i> Export Word</a>
   @else
   <a href="{{ route('export.doc',['name' =>$type]) }}" class="btn btn-info btn-rounded m-1"><i
         class="fa fa-download"></i> Export Word</a>
   @endif
</div>
</div> --}}
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
               <h4>Surat Masuk</h4>
            </div>
            <div class="table-responsive">
               <table class="table table-striped wrapper" id="table">
                  <thead>
                     <!-- mahasiswa -->
                     <tr>
                        <th>No.</th>
                        @if (Auth::user()->role_id==1)
                        <th>Pemohon</th>
                        @endif
                        <th>Tanggal</th>
                        <th>Jenis Surat</th>
                        <th>Kepentingan Surat</th>
                        <th>Status</th>
                        <th>Action</th>
                     </tr>
                  </thead>
                  <tbody>
                     @foreach($surat as $surat)
                     <tr>
                        <td>{{ $loop->iteration }}</td>
                        @if (Auth::user()->role_id==1)
                        <td>{{ $surat->user->nama }}</td>
                        @endif
                        <td>{{ date('d/m/Y', strtotime($surat->created_at)) }}</td>
                        <td>{{ $surat->jenis->nama }}</td>
                        <td>{{ $surat->perihal }}</td>
                        <td class="alert {{ $surat->status==0?'alert-warning':'alert-success' }}"><strong>{{ $surat->status==0?'Menunggu Validasi':'Sudah divalidasi' }}</strong></td>
                        <td>
                           <div class="btn-group dropdown">
                              <button type="button" class="btn btn-success dropdown-toggle btn-sm"
                                 data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                 Action
                              </button>
                              <div class="dropdown-menu" x-placement="bottom-start"
                                 style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(0px, 30px, 0px);">
                                 @if ($surat->status==1)
                                    <a class="dropdown-item" href="{{ route('surat.download', $surat) }}"> Download surat
                                 </a>
                                 @endif
                                 @if ($surat->status!=1)
                                 <form action="{{ route('edit.surat') }}" class="pull-left" method="post">
                                    {{ csrf_field() }}
                                    <input type="hidden" name="idSurat" value="{{ $surat->id }}">
                                    <button class="dropdown-item" style="cursor: pointer;">Edit</button>
                                 </form>
                                 @endif
                                 <form action="{{ route('hapus.surat') }}" class="pull-left" method="post">
                                    {{ csrf_field() }}
                                    {{ method_field('delete') }}
                                    <input type="hidden" name="idSurat" value="{{ $surat->id }}">
                                    <button class="dropdown-item" style="cursor: pointer;"
                                       onclick="return confirm('Anda yakin ingin menghapus {{ $surat->jenis->nama}} ini?')">
                                       Delete
                                    </button>
                                 </form>
                              </div>
                           </div>
                           @if (Auth::user()->role_id==1)
                           <button type="button" class="btn btn-primary ml-2" data-toggle="modal" data-target="#surat-{{ $surat->id }}">
                              Validasi
                           </button>
                           
                           <!-- Modal -->
                           <div class="modal fade" id="surat-{{ $surat->id }}" tabindex="-1" role="dialog" aria-labelledby="surat-{{ $surat->id }}Label" aria-hidden="true">
                              <div class="modal-dialog" role="document">
                                 <form action="{{ route('validasi.surat') }}" method="POST">
                                    {{ csrf_field() }}
                                    {{ method_field('put') }}
                                    <input type="hidden" name="idSurat" value="{{ $surat->id }}">
                                    <div class="modal-content">
                                       <div class="modal-header">
                                          <h5 class="modal-title" id="surat-{{ $surat->id }}Label">Validasi Surat</h5>
                                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                          <span aria-hidden="true">&times;</span>
                                          </button>
                                       </div>
                                       <div class="modal-body">
                                          <div class="form-group">
                                             <label>Nama penandatangan</label>
                                             <select name="ttd" class="form-control">
                                                @foreach ($ttd as $item_ttd)
                                                   <option value="{{ $item_ttd->id }}">{{ $item_ttd->nama }}</option>
                                                @endforeach
                                             </select>
                                          </div>
                                       </div>
                                       <div class="modal-footer">
                                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                          <button type="submit" class="btn btn-primary" onclick="return confirm('Are you sure?')">Validasi</button>
                                       </div>
                                    </div>
                                 </form>
                              </div>
                           </div>
                           @endif
                        </td>
                     </tr>
                     @endforeach
                  </tbody>
               </table>
            </div>
         </div>
      </div>
   </div>
</div>
@endsection