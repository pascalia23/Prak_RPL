@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 grid-margin stretch-card">
            <div class="card card-statistics">
                <div class="card-body">
                    <div class="clearfix">
                        <div class="float-left">
                            <i class="mdi mdi-poll-box text-info icon-lg"></i>
                        </div>
                        <div class="float-right">
                            <p class="mb-0 text-right">Semua Surat</p>
                            <div class="fluid-container">
                                <h3 class="font-weight-medium text-right mb-0">{{ $count }}</h3>
                            </div>
                        </div>
                    </div>
                    <p class="text-muted mt-3 mb-0">
                        <i class="mdi mdi-alert-octagon mr-1" aria-hidden="true"></i> Total seluruh surat
                    </p>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 grid-margin stretch-card">
            <div class="card card-statistics">
                <div class="card-body">
                    <div class="clearfix">
                        <div class="float-left">
                            <i class="mdi mdi-poll-box text-success icon-lg"></i>
                        </div>
                        <div class="float-right">
                            <p class="mb-0 text-right">Surat Tervalidasi</p>
                            <div class="fluid-container">
                                <h3 class="font-weight-medium text-right mb-0">{{ $count - $surat->count() }}</h3>
                            </div>
                        </div>
                    </div>
                    <p class="text-muted mt-3 mb-0">
                        <i class="mdi mdi-alert-octagon mr-1" aria-hidden="true"></i> Total seluruh surat tervalidasi
                    </p>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 grid-margin stretch-card">
            <div class="card card-statistics">
                <div class="card-body">
                    <div class="clearfix">
                        <div class="float-left">
                            <i class="mdi mdi-poll-box text-danger icon-lg"></i>
                        </div>
                        <div class="float-right">
                            <p class="mb-0 text-right">Surat Belum Tervalidasi</p>
                            <div class="fluid-container">
                                <h3 class="font-weight-medium text-right mb-0">{{ $surat->count() }}</h3>
                            </div>
                        </div>
                    </div>
                    <p class="text-muted mt-3 mb-0">
                        <i class="mdi mdi-alert-octagon mr-1" aria-hidden="true"></i> Total seluruh surat belum tervalidasi
                    </p>
                </div>
            </div>
        </div>
        @if (Auth::user()->role_id==1)
        <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 grid-margin stretch-card">
            <div class="card card-statistics">
                <div class="card-body">
                    <div class="clearfix">
                        <div class="float-left">
                            <i class="mdi mdi-poll-box text-warning icon-lg"></i>
                        </div>
                        <div class="float-right">
                            <p class="mb-0 text-right">Seluruh Surat Undagan/Daftar Hadir Kegiatan
                            </p>
                            <div class="fluid-container">
                                <h3 class="font-weight-medium text-right mb-0">{{ $sur->where('tipe_surat',4)->count() }}</h3>
                            </div>
                        </div>
                    </div>
                    <p class="text-muted mt-3 mb-0">
                        <i class="mdi mdi-alert-octagon mr-1" aria-hidden="true"></i> Total seluruh Surat Undagan/Daftar Hadir Kegiatan
                    </p>
                </div>
            </div>
        </div>
        @endif
    </div>
    @if (Auth::user()->role_id==1)
    <div class="row">
        <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 grid-margin stretch-card">
            <div class="card card-statistics">
                <div class="card-body">
                    <div class="clearfix">
                        <div class="float-left">
                            <i class="mdi mdi-poll-box text-primary icon-lg"></i>
                        </div>
                        <div class="float-right">
                            <p class="mb-0 text-right">Semua Surat Surat Personalia & SK</p>
                            <div class="fluid-container">
                                <h3 class="font-weight-medium text-right mb-0">{{ $sur->where('tipe_surat',1)->count() }}</h3>
                            </div>
                        </div>
                    </div>
                    <p class="text-muted mt-3 mb-0">
                        <i class="mdi mdi-alert-octagon mr-1" aria-hidden="true"></i> Total seluruh surat Surat Personalia & SK
                    </p>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 grid-margin stretch-card">
            <div class="card card-statistics">
                <div class="card-body">
                    <div class="clearfix">
                        <div class="float-left">
                            <i class="mdi mdi-poll-box text-gray icon-lg"></i>
                        </div>
                        <div class="float-right">
                            <p class="mb-0 text-right">Semua Surat Kegiatan Mahasiswa</p>
                            <div class="fluid-container">
                                <h3 class="font-weight-medium text-right mb-0">{{ $sur->where('tipe_surat',2)->count() }}</h3>
                            </div>
                        </div>
                    </div>
                    <p class="text-muted mt-3 mb-0">
                        <i class="mdi mdi-alert-octagon mr-1" aria-hidden="true"></i> Total seluruh Surat Kegiatan Mahasiswa
                    </p>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 grid-margin stretch-card">
            <div class="card card-statistics">
                <div class="card-body">
                    <div class="clearfix">
                        <div class="float-left">
                            <i class="mdi mdi-poll-box text-secondary icon-lg"></i>
                        </div>
                        <div class="float-right">
                            <p class="mb-0 text-right">Total Seluruh Surat Tugas</p>
                            <div class="fluid-container">
                                <h3 class="font-weight-medium text-right mb-0">{{ $sur->where('tipe_surat',4)->count() }}</h3>
                            </div>
                        </div>
                    </div>
                    <p class="text-muted mt-3 mb-0">
                        <i class="mdi mdi-alert-octagon mr-1" aria-hidden="true"></i> Total seluruh Surat Tugas
                    </p>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 grid-margin stretch-card">
            <div class="card card-statistics">
                <div class="card-body">
                    <div class="clearfix">
                        <div class="float-left">
                            <i class="mdi mdi-poll-box text-warning icon-lg"></i>
                        </div>
                        <div class="float-right">
                            <p class="mb-0 text-right">Semua Surat Berita Acara</p>
                            <div class="fluid-container">
                                <h3 class="font-weight-medium text-right mb-0">{{ $sur->where('tipe_surat',5)->count() }}</h3>
                            </div>
                        </div>
                    </div>
                    <p class="text-muted mt-3 mb-0">
                        <i class="mdi mdi-alert-octagon mr-1" aria-hidden="true"></i> Total seluruh Surat Berita Acara
                    </p>
                </div>
            </div>
        </div>
    </div>
    @endif
    <div class="row">
        <div class="col-12">
            <div class="card mt-5">
                <div class="card-header">Surat Belum di Validasi</div>
                <div class="card-body">
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
                                           <form action="{{ route('edit.surat') }}" class="pull-left" method="post">
                                              {{ csrf_field() }}
                                              <input type="hidden" name="idSurat" value="{{ $surat->id }}">
                                              <button class="dropdown-item" style="cursor: pointer;">Edit</button>
                                           </form>
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
                                                       <input type="text" name="nama_ttd" class="form-control">
                                                    </div>
                                                    <div class="form-group">
                                                       <label>Sebagai</label>
                                                       <input type="text" name="ttd_sebagai" class="form-control">
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

@section('js')
<script type="text/javascript">
    $(document).ready(function() {
       $('#table').DataTable();
    
    });
</script>
@endsection