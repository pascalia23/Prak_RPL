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

<div class="col-lg-12">
   @if (Session::has('message'))
   <div class="alert alert-{{ Session::get('message_type') }}" id="waktu2" style="margin-top:10px;">
      {{ Session::get('message') }}</div>
   @endif
</div>
</div>
<div class="row" style="margin-top: 20px;">
    <div class="col-lg-8 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <div class="card-title">
                <h4>List Penandatangan</h4>
                </div>
                <div class="table-responsive">
                <table class="table table-striped wrapper" id="table">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Nama Penandatangan</th>
                            <th>Jabatan</th>
                            <th>TTD</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($data as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->nama }}</td>
                            <td>{{ $item->jabatan }}</td>
                            <td><a href="{{ $item->ttd }}" target="d_blank"><img src="{{ $item->ttd }}" class="img-fluid"></a></td>
                            <td class="d-flex justify-content-between">
                                <form action="{{ route('signature.destroy',$item) }}" method="post">
                                    {{ csrf_field() }}
                                    {{ method_field('DELETE') }}
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </form>
                            <button type="button" onclick="return confirm('are you sure?')" class="btn btn-primary" data-toggle="modal" data-target="#ttd-{{ $item->id }}">
                                Edit
                            </button>
                            
                            <!-- Modal -->
                            <div class="modal fade" id="ttd-{{ $item->id }}" tabindex="-1" role="dialog" aria-labelledby="ttd-{{ $item->id }}Label" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <form action="{{ route('signature.update',$item) }}" method="POST" enctype="multipart/form-data">
                                        {{ csrf_field() }}
                                        {{ method_field('put') }}
                                        <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="surat-{{ $item->id }}Label">Edit data</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="form-group">
                                                <label>Nama penandatangan</label>
                                                <input type="text" name="nama" value="{{ $item->nama }}" class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label>Sebagai</label>
                                                <input type="text" name="jabatan" value="{{ $item->jabatan }}" class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label>TTD</label>
                                                <input type="file" name="ttd" class="form-control">
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-primary" onclick="return confirm('Are you sure?')">Update</button>
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
    <div class="col-lg-4">
        <div class="card">
            <div class="card-body">
                <form action="{{ route('signature.store') }}" method="POST" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label>Nama penandatangan</label>
                        <input type="text" name="nama" value="{{ old('nama') }}" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Sebagai</label>
                        <input type="text" name="jabatan" value="{{ old('jabatan') }}" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>TTD</label>
                        <input type="file" name="ttd" class="form-control">
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-success">Create</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection