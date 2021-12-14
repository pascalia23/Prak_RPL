@section('js')
<script type="text/javascript">
  $(document).ready(function() {
    $('#table').DataTable({
      "iDisplayLength": 50
    });

} );
</script>
@stop
@extends('layouts.app')

@section('content')
<div class="row">

  <div class="col-lg-2">
    {{-- <div class="d-flex">
      <a href="{{ route('buku.create') }}" class="btn btn-primary btn-rounded mx-3"><i class="fa fa-plus"></i> Tambah Buku</a>
      <a href="{{ route('export.excel',['name'=>$type]) }}" class="btn btn-success btn-rounded mx-3"><i class="fa fa-download"></i> Export Excel</a>
      @if ($type==4)
        <a href="{{ route('export.doc.custom',['from' =>$from ,'to'=>$to]) }}" class="btn btn-info btn-rounded mx-3"><i class="fa fa-download"></i> Export Word</a>
      @else
        <a href="{{ route('export.doc',['name' =>$type]) }}" class="btn btn-info btn-rounded mx-3"><i class="fa fa-download"></i> Export Word</a>
      @endif
    </div> --}}
    <div class="col-lg-12">
                  @if (Session::has('message'))
                  <div class="alert alert-{{ Session::get('message_type') }}" id="waktu2" style="margin-top:10px;">{{ Session::get('message') }}</div>
                  @endif
                  </div>
</div>
<div class="row" style="margin-top: 20px;">
<div class="col-lg-12 grid-margin stretch-card">
              <div class="card">

                <div class="card-body">
                  <h4 class="card-title pull-left">Surat Masuk {{ $title }} ini</h4>
                  <div class="table-responsive">
                    <table class="table table-striped" id="table">
                      <thead>
                        <tr>
                          <th>No.</th>
                          <th>Dari</th>
                          <th>Untuk</th>
                          <th>Nomor</th>
                          <th>Perihal</th>
                          <th>Tanggal masuk</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>
                      @foreach($datas as $item)
                        <tr>
                          <td class="py-1">
                            <a href="{{route('buku.show', $item->id)}}"> 
                              {{$item->id}}
                            </a>
                          </td>
                          <td>{{ $item->dari }}</td>
                          <td>{{ $item->untuk }}</td>
                          <td>
                            <a href="{{url('surat/'.$item->id)}}" target="d_blank"> 
                              {{$item->nomor_surat}}
                            </a>
                          </td>
                          <td>
                            <a href="{{url('surat/'.$item->id)}}" target="d_blank"> 
                              {{str_limit($item->perihal,30)}}
                            </a>
                          </td>
                          <td>{{date('d/m/y', strtotime($item->created_at))}}</td>
                          <td>
                            <div class="btn-group dropdown">
                              <button type="button" class="btn btn-success dropdown-toggle btn-sm" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Action
                              </button>
                              <div class="dropdown-menu" x-placement="bottom-start" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(0px, 30px, 0px);">
                                <a class="dropdown-item" href="{{route('buku.edit', $item->id)}}"> Edit </a>
                                <form action="{{ route('buku.destroy', $item->id) }}" class="pull-left"  method="post">
                                {{ csrf_field() }}
                                {{ method_field('delete') }}
                                <button class="dropdown-item" onclick="return confirm('Anda yakin ingin menghapus data ini?')"> Delete
                                </button>
                              </form>
                              
                              </div>
                            </div>
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