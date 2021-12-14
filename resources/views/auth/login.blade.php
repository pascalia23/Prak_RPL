<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Sistem Surat Menyurat FTI</title>

  <meta name="csrf-token" content="{{ csrf_token() }}">
  <link rel="stylesheet" href="{{asset('vendors/iconfonts/mdi/css/materialdesignicons.min.css')}}">
  <link rel="stylesheet" href="{{asset('vendors/iconfonts/puse-icons-feather/feather.css')}}">
  <link rel="stylesheet" href="{{asset('vendors/css/vendor.bundle.base.css')}}">
  <link rel="stylesheet" href="{{asset('vendors/css/vendor.bundle.addons.css')}}">
  <link rel="stylesheet" href="{{asset('css/style.css')}}">
  <!-- endinject -->
  <link href="{{ asset('images/kominfo.png') }}" rel="icon">
  <link href="{{ asset('images/kominfo.png') }}" rel="apple-touch-icon">
</head>

<body class="bg-danger">
<form method="POST" action="{{ route('login') }}">
{{ csrf_field() }}
  <div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper auth-page">
      <div class="content-wrapper d-flex align-items-center auth theme-one">
        <div class="row w-100">
        <div class="col-lg mx-auto d-flex">
          <img src="{{ asset('images/fti.png') }}" class="img-fluid">
        </div>
        <div class="col-lg my-auto">
          <h2> Sistem Surat Menyurat</h2>
            <div class="auto-form-wrapper" style="width: 500px">
                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                  <label class="label">NIM/NIK/Email</label>
                  <div class="input-group">
                    <input id="email" type="text" class="form-control" name="email" value="{{ old('email') }}" required autofocus>
                    <div class="input-group-append">
                      <span class="input-group-text">
                        <i class="mdi mdi-check-circle-outline"></i>
                      </span>
                    </div>
                  </div>
                    @if ($errors->has('email'))
                        <span class="help-block">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                  <label class="label">Password</label>
                  <div class="input-group">
                    <input id="password" type="password" class="form-control" name="password" required>
                    <div class="input-group-append">
                      <span class="input-group-text">
                        <i class="mdi mdi-check-circle-outline"></i>
                      </span>
                    </div>
                    @if ($errors->has('password'))
                        <span class="help-block">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                    @endif
                  </div>
                </div>
                <div class="form-group">
                  <button class="btn btn-primary submit-btn btn-block" type="submit">Login</button>
                </div>
            </div>
            <p class="footer-text" style="margin-top: 20px;color: #308ee0">Copyright © {{date('Y')}} Sistem Surat Menyurat Fakultas Teknologi Informasi Universitas Kristen Duta Wacana</p>
          </div>
        </div>
      </div>
    </div>
  </div>
  </form>
  <script src="{{asset('vendors/js/vendor.bundle.base.js')}}"></script>
  <script src="{{asset('vendors/js/vendor.bundle.addons.js')}}"></script>
</body>

</html>