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

   <div class="col-lg-2">
    <div class="d-flex">
        <form action="{{ route('admin.user.import') }}" method="post" enctype="multipart/form-data" class="d-flex">
            {{ csrf_field() }}
            <input type="file" name="file" class="form-control mr-4" style="width: 200px" required>
            <button type="submit" class="btn btn-primary btn-rounded m-1"><i class="fa fa-plus"></i> Tambah
                User</button>
        </form>
   <a href="{{ asset('template_import_user.xlsx') }}" class="btn btn-success btn-rounded m-1"><i
         class="fa fa-download"></i> Download Template Excel</a>
   {{-- @if ($type==4)
   <a href="" class="btn btn-info btn-rounded m-1"><i
         class="fa fa-download"></i> Export Word</a>
   @else
   <a href="" class="btn btn-info btn-rounded m-1"><i
         class="fa fa-download"></i> Export Word</a>
   @endif --}}
</div>
</div>
<div class="col-lg-12">
   @if (Session::has('message'))
   <div class="alert alert-{{ Session::get('message_type') }}" id="waktu2" style="margin-top:10px;">
      {{ Session::get('message') }}</div>
   @endif
   @if (Session::has('success'))
   <div class="alert alert-success" id="waktu2" style="margin-top:10px;">
        <strong>{{ Session::get('success') }}</strong>
    </div>
   @endif
</div>
</div>
<div class="row" style="margin-top: 20px;">
   <div class="col-lg-12 grid-margin stretch-card">
      <div class="card">
         <div class="card-body">
            <div class="card-title">
               <h4>List User</h4>
            </div>
            <div class="table-responsive">
               <table class="table table-striped wrapper" id="table">
                  <thead>
                     <!-- mahasiswa -->
                     <tr>
                        <th>No.</th>
                        <th>Nama</th>
                        <th>NIM/NIK</th>
                        <th>Role</th>
                        <th>Phone</th>
                        <th>Action</th>
                     </tr>
                  </thead>
                  <tbody>
                     @foreach($data as $item)
                     <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->nama }}</td>
                        <td>{{ $item->username }}</td>
                        <td>{{ $item->role->nama}}</td>
                        <td>{{ $item->no_telp}}</td>
                        <td class="d-flex justify-content-between">
                            <form action="{{ route('admin.user.destroy',$item) }}" class="pull-left" method="post">
                                {{ csrf_field() }}
                                {{ method_field('delete') }}
                                <button class="btn btn-danger btn-sm" style="cursor: pointer;"
                                   onclick="return confirm('Anda yakin ingin menghapus user {{ $item->name}} ini?')">
                                   Delete
                                </button>
                             </form>
                           <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#user-{{ $item->id }}">
                              Edit
                           </button>
                           
                           <!-- Modal -->
                           <div class="modal fade" id="user-{{ $item->id }}" tabindex="-1" role="dialog" aria-labelledby="user-{{ $item->id }}Label" aria-hidden="true">
                              <div class="modal-dialog" role="document">
                                 <form action="{{ route('admin.user.update',$item) }}" method="POST">
                                    {{ csrf_field() }}
                                    {{ method_field('put') }}
                                    <div class="modal-content">
                                       <div class="modal-header">
                                          <h5 class="modal-title" id="surat-{{ $item->id }} Label">Edit data user</h5>
                                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                          <span aria-hidden="true">&times;</span>
                                          </button>
                                       </div>
                                       <div class="modal-body">
                                          <div class="form-group">
                                             <label>Nama user</label>
                                             <input type="text" name="nama" class="form-control" value="{{ $item->nama }}" required>
                                          </div>
                                          <div class="form-group">
                                             <label>NIM/NIK</label>
                                             <input type="text" name="username" class="form-control" value="{{ $item->username }}" required>
                                          </div>
                                          <div class="form-group">
                                             <label>No. Telp</label>
                                             <input type="text" name="no_telp" class="form-control" value="{{ $item->no_telp }}" required>
                                          </div>
                                          <div class="form-group">
                                             <label>Role</label>
                                             <select name="role_id" class="form-control">
                                                 <option value="1" {{ $item->role_id==1?'selected':'' }}>Admin</option>
                                                 <option value="2" {{ $item->role_id==2?'selected':'' }}>Dosen</option>
                                                 <option value="3" {{ $item->role_id==3?'selected':'' }}>Mahasiswa</option>
                                             </select>
                                          </div>
                                       </div>
                                       <div class="modal-footer">
                                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                          <button type="submit" class="btn btn-primary" onclick="return confirm('Are you sure?')">Update data</button>
                                       </div>
                                    </div>
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