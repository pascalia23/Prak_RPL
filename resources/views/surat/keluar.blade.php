@extends('layouts.app')

@section('content')
<div class="col-lg-12">
   @if (Session::has('message'))
   <div class="alert alert-{{ Session::get('message_type') }}" id="waktu2" style="margin-top:10px;">
      {{ Session::get('message') }}</div>
   @endif
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
                  <tr>
                     <th>No.</th>
                     <th>No. Surat</th>
                     <th>Tanggal Keluar</th>
                     <th>Pemohon</th>
                     <th>Jenis Surat</th>
                     <th>Kepentingan</th>
                     <th>Action</th>
                  </tr>
               </thead>
               <tbody>
                  @foreach ($surat as $surat)
                  @if ($surat->status == 1)
                  <tr>
                     <td>No.</td>
                     <td>{{ $surat->no_surat }}</td>
                     <td>{{ $surat->updated_at }}</td>
                     <td>{{ $surat->user->nama }}</td>
                     <td>{{ $surat->jenis->nama }}</td>
                     <td>{{ $surat->tujuan }}</td>
                     <td>
                        <div class="btn-group dropdown">
                           <button type="button" class="btn btn-success dropdown-toggle btn-sm"
                              data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Action
                           </button>
                           <div class="dropdown-menu" x-placement="bottom-start"
                                 style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(0px, 30px, 0px);">
                              <a class="dropdown-item" href="{{ route('surat.download',$surat) }}">Download surat</a>
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
                     </td>
                  </tr>
                  @endif
                  @endforeach
               </tbody>

            </table>

            </div>
         </div>

      </div>

   </div>
</div>

@endsection

@section('js')
<script type="text/javascript">
$(document).ready(function() {
   $('#table').DataTable();

});
</script>
@stop