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
    <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 grid-margin stretch-card">
            <div class="card card-statistics">
                <div class="card-body">
                  <div class="clearfix">
                    <div class="float-left">
                      <i class="mdi mdi-poll-box text-danger icon-lg"></i>
                    </div>
                    <div class="float-right">
                      <p class="mb-0 text-right">Semua Arsip</p>
                      <div class="fluid-container">
                        <h3 class="font-weight-medium text-right mb-0">{{ $datas->count() }}</h3>
                      </div>
                    </div>
                  </div>
                  <p class="text-muted mt-3 mb-0">
                    <i class="mdi mdi-alert-octagon mr-1" aria-hidden="true"></i> Total seluruh arsip
                  </p>
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 grid-margin stretch-card">
              <div class="card card-statistics">
                <div class="card-body">
                  <div class="clearfix">
                    <div class="float-left">
                      <i class="mdi mdi-receipt text-warning icon-lg"></i>
                    </div>
                    <div class="float-right">
                      <p class="mb-0 text-right">Arsip minggu ini</p>
                      <div class="fluid-container">
                        <h3 class="font-weight-medium text-right mb-0">{{ $bookWeek->count() }}</h3>
                      </div>
                    </div>
                  </div>
                  <p class="text-muted mt-3 mb-0">
                    <i class="mdi mdi-calendar mr-1" aria-hidden="true"></i> Minggu ini
                  </p>
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 grid-margin stretch-card">
              <div class="card card-statistics">
                <div class="card-body">
                  <div class="clearfix">
                    <div class="float-left">
                      <i class="mdi mdi-book text-success icon-lg" style="width: 40px;height: 40px;"></i>
                    </div>
                    <div class="float-right">
                      <p class="mb-0 text-right">Arsip bulan ini</p>
                      <div class="fluid-container">
                        <h3 class="font-weight-medium text-right mb-0">{{count($bookMonth)}}</h3>
                      </div>
                    </div>
                  </div>
                  <p class="text-muted mt-3 mb-0">
                    <i class="mdi mdi-book mr-1" aria-hidden="true"></i> Bulan ini
                  </p>
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 grid-margin stretch-card">
              <div class="card card-statistics">
                <div class="card-body">
                  <div class="clearfix">
                    <div class="float-left">
                      <i class="mdi mdi-book-multiple text-info icon-lg"></i>
                    </div>
                    <div class="float-right">
                      <p class="mb-0 text-right">Arsip tahun ini</p>
                      <div class="fluid-container">
                        <h3 class="font-weight-medium text-right mb-0">{{ count($bookYear) }}</h3>
                      </div>
                    </div>
                  </div>
                  <p class="text-muted mt-3 mb-0">
                    <i class="mdi mdi-book-multiple mr-1" aria-hidden="true"></i> Tahun ini
                  </p>
                </div>
              </div>
            </div>
</div>
<div class="row" >
<div class="col-lg-12 grid-margin stretch-card">
              <div class="card">

                <div class="card-body">
                  <h4 class="card-title">Data Arsip Minggu Ini</h4>
                  
                  <div class="table-responsive">
                    <table class="table table-striped" id="table">
                      <thead>
                        <tr>
                          <th>No</th>
                          <th>Dari</th>
                          <th>Untuk</th>
                          <th>Nomor</th>
                          <th>Perihal</th>
                          <th>Tanggal masuk</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>
                      @foreach($bookWeek as $item)
                      <tr>
                        <td class="py-1">
                          <a href="{{url('surat/'.$item->id)}}" target="d_blank"> 
                            {{$item->no}}
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
                        <td>{{$item->tahun}}</td>
                        <td>{{date('d/m/y', strtotime($item->created_at))}}</td>
                        <td>
                          <div class="btn-group dropdown">
                            <button type="button" class="btn btn-success dropdown-toggle btn-sm" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                              Action
                            </button>
                            <div class="dropdown-menu" x-placement="bottom-start" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(0px, 30px, 0px);">
                              <a class="dropdown-item" href="{{url($item->file)}}"> Download surat </a>
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
