@section('js')
    <script type="text/javascript">
        function readURL() {
            var input = this;
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    $(input).prev().attr('src', e.target.result);
                }
                reader.readAsDataURL(input.files[0]);
            }
        }

        $(function () {
            $(".uploads").change(readURL)
            $("#f").submit(function(){
                // do ajax submit or just classic form submit
              //  alert("fake subminting")
                return false
            })
        })


var check = function() {
  if (document.getElementById('password').value ==
    document.getElementById('confirm_password').value) {
    document.getElementById('submit').disabled = false;
    document.getElementById('message').style.color = 'green';
    document.getElementById('message').innerHTML = 'matching';
  } else {
    document.getElementById('submit').disabled = true;
    document.getElementById('message').style.color = 'red';
    document.getElementById('message').innerHTML = 'not matching';
  }
}
    </script>
@stop

@extends('layouts.app')

@section('content')

<div class="row">
    <div class="col-12">
        @if (Session::has('success'))
        <div class="alert alert-success" id="waktu2" style="margin-top:10px;">
             <strong>{{ Session::get('success') }}</strong>
         </div>
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
<div class="row">
            <div class="col-md-6 d-flex align-items-stretch grid-margin">
              <div class="row flex-grow">
                <div class="col-12">
                  <div class="card">
                    <div class="card-body">
                      <h4 class="card-title">Account <b>{{$data->username}}</b></h4>
                        <form action="">
                            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                <label for="name" class="col-md-4 control-label">Name</label>
                                <div class="col-md-6">
                                    <input id="nama" type="text" class="form-control" name="nama" value="{{ $data->nama }}" required readonly>
                                    @if ($errors->has('nama'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('nama') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group{{ $errors->has('username') ? ' has-error' : '' }}">
                                <label for="username" class="col-md-4 control-label">{{ Auth::user()->role_id!=3?'NIM':'NIK' }}</label>
                                <div class="col-md-6">
                                    <input id="username" type="text" class="form-control" name="username" value="{{ $data->username }}" required readonly="">
                                    @if ($errors->has('username'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('username') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                <label for="email" class="col-md-4 control-label">E-Mail Address</label>
                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control" name="email" value="{{ $data->email }}" required readonly>
                                    @if ($errors->has('email'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                <label for="email" class="col-md-4 control-label">Phone</label>
                                <div class="col-md-6">
                                    <input id="no_telp" type="text" class="form-control" name="no_telp" value="{{ $data->no_telp }}" required readonly>
                                    @if ($errors->has('no_telp'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('no_telp') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                        </form>
                        {{-- <a href="{{route('user.index')}}" class="btn btn-light pull-right">Back</a> --}}
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <div class="card-title">Change Password</div>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('update.password') }}" method="POST">
                            {{ csrf_field() }}
                            {{ method_field('put') }}
                            <div class="form-group">
                                <label for="new-password">New Password</label>
                                <input type="password" name="password" required id="new-passwrod" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="new-password">Password Confirmation</label>
                                <input type="password" name="password_confirmation" required id="confirm-passwrod" class="form-control">
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">Update</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
</div>
@endsection