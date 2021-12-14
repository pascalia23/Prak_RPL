<!DOCTYPE html>
<html lang="en">

<head>
   <!-- Required meta tags -->
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
   <title>Sistem Surat Menyurat FTI</title>
   <!-- plugins:css -->
   <link rel="stylesheet" href="{{asset('vendors/iconfonts/mdi/css/materialdesignicons.min.css')}}">
   <link rel="stylesheet" href="{{asset('vendors/css/vendor.bundle.base.css')}}">
   <link rel="stylesheet" href="{{asset('vendors/css/vendor.bundle.addons.css')}}">
   <!-- endinject -->
   <!-- plugin css for this page -->
   <!-- End plugin css for this page -->
   <!-- inject:css -->
   <link rel="stylesheet" href="{{asset('css/style.css')}}">
   <link rel="stylesheet" href="{{asset('css/font-awesome.min.css')}}">
   <link rel="stylesheet" href="{{ asset('css/select2.css')}}">
   <link rel="stylesheet" href="{{ asset('css/dataTables.bootstrap4.min.css')}}">
   @section('css')

   @show
   <!-- endinject -->
   <link rel="shortcut icon" href="{{asset('favicon.ico')}}" />
</head>

<body>
   <div class="container-scroller">
      <!-- partial:partials/_navbar.html -->
      <nav class="navbar default-layout col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
         <div class="text-center navbar-brand-wrapper d-flex align-items-top justify-content-center">
            <a class="navbar-brand brand-logo" href="index.html" style="color: #2d2d2d">
               Surat
            </a>
            <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button"
               data-toggle="offcanvas">
               <span class="icon-menu"></span>
               <i class="fa fa-align-justify" style="color: #fff;"></i>
            </button>
         </div>

         <div class="navbar-menu-wrapper d-flex align-items-center">
            <ul class="navbar-nav navbar-nav-right">

               <li class="nav-item dropdown d-xl-inline-block">
                  <a class="nav-link dropdown-toggle" id="UserDropdown" href="#" data-toggle="dropdown"
                     aria-expanded="false">
                     <span class="profile-text">Hello, {{Auth::user()->name}} !</span>
                     @if(Auth::user()->gambar == '')
                     <img class="img-xs rounded-circle" src="{{asset('images/user/default.png')}}" alt="profile image">
                     @else
                     <img class="img-xs rounded-circle" src="{{asset('images/user/'.Auth::user()->gambar)}}"
                        alt="profile image">
                     @endif
                  </a>
                  <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="UserDropdown">
                     <a class="dropdown-item p-0">
                        <div class="d-flex border-bottom">

                        </div>
                     </a>
                     <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                        Sign Out

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                           {{ csrf_field() }}
                        </form>
                     </a>
                  </div>
               </li>
            </ul>

         </div>
      </nav>
      <!-- partial -->
      <div class="container-fluid page-body-wrapper">
         <!-- partial:partials/_sidebar.html -->
         <nav class="sidebar sidebar-offcanvas fixed" id="sidebar">
            <ul class="nav">
               <li class="nav-item nav-profile">
                  <div class="nav-link">
                     <div class="user-wrapper">
                        <div class="profile-image">
                           @if(Auth::user()->gambar == '')

                           <img src="{{asset('images/user/default.png')}}" alt="profile image">
                           @else

                           <img src="{{asset('images/user/'. Auth::user()->gambar)}}" alt="profile image">
                           @endif
                        </div>
                        <div class="text-wrapper">
                           <p class="profile-name">{{Auth::user()->nama}}</p>
                           <div>
                              <small class="designation text-muted"
                                 style="text-transform: uppercase;letter-spacing: 1px;">{{ Auth::user()->username }}</small>
                              <span class="status-indicator online"></span>
                           </div>
                        </div>
                     </div>
                  </div>
               </li>
               <li class="nav-item {{ setActive(['dashboard']) }}">
                  <a class="nav-link" href="{{ route('user.dashboard') }}">
                     <i class="menu-icon mdi mdi-bank"></i>
                     <span class="menu-title">Dashboard</span>
                  </a>
               </li>
               <li class="nav-item">
                  <a class="nav-link {{ setActive(['surat.*']) }}" href="{{ route('surat.masuk') }}">
                     <i class="menu-icon mdi mdi-inbox"></i>
                     <span class="menu-title">Surat masuk</span>
                  </a>
               </li>
               <li class="nav-item">
                  <a class="nav-link {{ setActive(['buat.surat']) }}" href="{{ route('buat.surat') }}">
                     <i class="menu-icon mdi mdi-book"></i>
                     <span class="menu-title">Buat surat</span>
                  </a>
               </li>
               @if (Auth::user()->role_id==1)
               <li class="nav-item">
                  <a class="nav-link {{ setActive(['surat.keluar']) }}" href="{{ route('surat.keluar') }}">
                     <i class="menu-icon mdi mdi-table"></i>
                     <span class="menu-title">Surat keluar</span>
                  </a>
               </li>
               <li class="nav-item">
                  <a class="nav-link {{ setActive(['signature.*']) }}" href="{{ route('signature.index') }}">
                     <i class="menu-icon mdi mdi-sign-direction"></i>
                     <span class="menu-title">Tanda Tangan</span>
                  </a>
               </li>
               <li class="nav-item">
                  <a class="nav-link {{ setActive(['admin.user']) }}" href="{{ route('admin.user') }}">
                     <i class="menu-icon mdi mdi-group"></i>
                     <span class="menu-title">List users</span>
                  </a>
               </li>
               @endif
               <li class="nav-item">
                  <a class="nav-link {{ setActive(['user.profile']) }}" href="{{ route('user.profile') }}">
                     <i class="menu-icon mdi mdi-account"></i>
                     <span class="menu-title">Profile</span>
                  </a>
               </li>
               <li class="nav-item">
                  <a class="nav-link" href="{{ url('logout') }}">
                     <i class="menu-icon mdi mdi-logout"></i>
                     <span class="menu-title">Logout</span>
                  </a>
               </li>
            </ul>
         </nav>
         <div class="main-panel">
            <div class="content-wrapper">
               @yield('content')

            </div>
            <footer class="footer">
               <div class="container-fluid clearfix">
                  <span class="text-muted d-block text-center text-sm-left d-sm-inline-block">Copyright © {{date('Y')}}
                     <a href="https://www.ukdw.ac.id/" target="_blank"> Sistem Surat Menyurat FTI</a>. All rights reserved.</span>
               </div>
            </footer>
            <!-- partial -->
         </div>
         <!-- main-panel ends -->
      </div>
      <!-- page-body-wrapper ends -->
   </div>
   <script src="{{asset('vendors/js/vendor.bundle.base.js')}}"></script>
   <script src="{{asset('vendors/js/vendor.bundle.addons.js')}}"></script>
   <script src="{{asset('js/off-canvas.js')}}"></script>
   <script src="{{asset('js/misc.js')}}"></script>
   <script src="{{asset('js/dashboard.js')}}"></script>
   <script src="{{asset('js/jquery.dataTables.min.js')}}"></script>
   <script src="{{asset('js/dataTables.bootstrap4.min.js')}}"></script>
   <script src="{{asset('js/select2.min.js')}}"></script>
   @section('js')

   @show
</body>

</html>