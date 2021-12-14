@extends('layouts.app')

@section('content')

<form action="{{ route('buku.update', $data->id) }}" method="post" enctype="multipart/form-data">
        {{ csrf_field() }}
        {{ method_field('put') }}
<div class="row">
            <div class="col-md-12 d-flex align-items-stretch grid-margin">
              <div class="row flex-grow">
                <div class="col-12">
                  <div class="card">
                    <div class="card-body">
                      <h4 class="card-title">Edit Buku <b>{{$data->judul}}</b> </h4>
                      <div class="form-group{{ $errors->has('dari') ? ' has-error' : '' }}">
                        <label for="dari" class="col-md-4 control-label">Dari</label>
                        <div class="col-md-6">
                            <input id="dari" type="text" class="form-control" name="dari" value="{{ $data->dari }}" required>
                            @if ($errors->has('dari'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('dari') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group{{ $errors->has('untuk') ? ' has-error' : '' }}">
                        <label for="untuk" class="col-md-4 control-label">Untuk</label>
                        <div class="col-md-6">
                            <input id="untuk" type="text" class="form-control" name="untuk" value="{{ $data->untuk }}" required>
                            @if ($errors->has('untuk'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('untuk') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group{{ $errors->has('nomor') ? ' has-error' : '' }}">
                        <label for="nomor" class="col-md-4 control-label">Nomor</label>
                        <div class="col-md-6">
                            <input id="nomor" type="text" class="form-control" name="nomor_surat" value="{{ $data->nomor_surat }}" required>
                            @if ($errors->has('nomor'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('nomor') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group{{ $errors->has('perihal') ? ' has-error' : '' }}">
                        <label for="perihal" class="col-md-4 control-label">Perihal</label>
                        <div class="col-md-6">
                            <textarea name="perihal" id="perihal" cols="30" rows="10" class="form-control">{{ $data->perihal }}</textarea>
                            @if ($errors->has('perihal'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('perihal') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                        

                        <button type="submit" class="btn btn-primary" id="submit">
                                    Update
                        </button>
                        <a href="{{route('buku.index')}}" class="btn btn-light pull-right">Back</a>
                    </div>
                  </div>
                </div>
              </div>
            </div>

</div>
</form>
@endsection