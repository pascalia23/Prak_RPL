@extends('layouts.app')

@section('content')

<form method="POST" action="{{ route('buku.store') }}" enctype="multipart/form-data">
    {{ csrf_field() }}
<div class="row">
            <div class="col-md-12 d-flex align-items-stretch grid-margin">
              <div class="row flex-grow">
                <div class="col-12">
                  <div class="card">
                    <div class="card-body">
                      <h4 class="card-title">Tambah Arsip Baru</h4>
                      
                        <div class="form-group{{ $errors->has('dari') ? ' has-error' : '' }}">
                            <label for="dari" class="col-md-4 control-label">Dari</label>
                            <div class="col-md-6">
                                <input id="dari" type="text" class="form-control" name="dari" value="{{ old('dari') }}" required>
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
                                <input id="untuk" type="text" class="form-control" name="untuk" value="{{ old('untuk') }}" required>
                                @if ($errors->has('untuk'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('untuk') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('nomor_surat') ? ' has-error' : '' }}">
                            <label for="nomor_surat" class="col-md-4 control-label">Nomor Surat</label>
                            <div class="col-md-6">
                                <input id="nomor_surat" type="text" class="form-control" name="nomor_surat" value="{{ old('nomor_surat') }}" required>
                                @if ($errors->has('nomor_surat'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('nomor_surat') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('perihal') ? ' has-error' : '' }}">
                            <label for="perihal" class="col-md-4 control-label">Perihal</label>
                            <div class="col-md-6">
                                <textarea name="perihal" id="perihal" cols="30" rows="10" class="form-control">{{ old('perihal') }}</textarea>
                                @if ($errors->has('perihal'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('perihal') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('file') ? ' has-error' : '' }}">
                            <label for="file" class="col-md-4 control-label">File</label>
                            <div class="col-md-6">
                                <input type="file" name="file" >
                                @if ($errors->has('file'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('file') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary" id="submit">
                                    Submit
                        </button>
                        <button type="reset" class="btn btn-danger">
                                    Reset
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