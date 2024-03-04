<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="shortcut icon" type="text/css" href="{{ asset('assets/images/logo.png') }}">
  <title>SMKN 1 PAKISJAYA | @yield('title')</title>
  <link href="{{ asset('assets/admin/css/nucleo-icons.css') }}" rel="stylesheet" />
  <link href="{{ asset('assets/admin/css/nucleo-svg.css') }}" rel="stylesheet" />

  <link href="{{ asset('assets/admin/css/nucleo-svg.css') }}" rel="stylesheet" />
  <link rel="stylesheet" type="text/css" href="{{ asset('assets/fontawesome/css/all.min.css') }}">

  <link id="pagestyle" href="{{ asset('assets/admin/css/corporate-ui-dashboard.css?v=1.0.0') }}" rel="stylesheet" />
  
  <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/jquery.dataTables.min.css') }}">  
  <link rel="stylesheet" type="text/css" href="{{ asset('assets/iziToast/iziToast.min.css') }}">
  <script type="text/javascript" src="{{ asset('assets/js/jquery.min.js') }}"></script>
  <script src="{{ asset('assets/js/jquery.dataTables.min.js') }}"></script>
  <script src="{{ asset('assets/iziToast/iziToast.min.js') }}"></script>
  <style type="text/css">
    .close-button{
      cursor: pointer;
    }
  </style>
</head>

<body class="g-sidenav-show  bg-gray-100">
  <aside class="sidenav navbar navbar-warning navbar-vertical navbar-expand-xs border-0 bg-slate-900 fixed-start" id="sidenav-main">
    <div class="sidenav-header" >
      <i class="fas fa-times p-3 cursor-pointer text-secondary opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
      <a class="d-flex align-items-center justify-content-center m-0 mb-5 mt-3" href=" https://demos.creative-tim.com/corporate-ui-dashboard/pages/dashboard.html " target="_blank">
        <img src="{{ asset('assets/images/logo.png') }}" width="50%">
      </a>
    </div>
    <div class="collapse navbar-collapse px-4 w-auto mt-5" id="sidenav-collapse-main" style="min-height: 85vh;">
      <ul class="navbar-nav">
        <li class="nav-item mt-2">
          <a class="nav-link menu-side" href="{{ route('siswa.dashboard') }}">
            <i class="fas fa-dashboard"></i>
            <span class="nav-link-text ms-1">Dashboard</span>
          </a>
        </li>

        <li class="nav-item mt-2">
          <a href="javascript:;" class="d-flex align-items-center nav-link menu-side" name="user">
            <i class="fas fa-users"></i>
            <span class="nav-link-text ms-1">User</span>
            <i class="fas fa-caret-down ms-auto"></i>
          </a>
        </li>
        <div class="ms-4 down-menu" id="user">
          <li class="nav-item border-start my-0 pt-2">
            <a class="nav-link position-relative ms-0 ps-2 py-2 rounded-end menu-dropdown" href="{{ route('siswa.profil') }}">
              <span class="nav-link-text ms-1">Profil</span>
            </a>
          </li>
          <li class="nav-item border-start my-0 pt-2">
            <a class="nav-link position-relative ms-0 ps-2 py-2 rounded-end menu-dropdown" href="{{ route('siswa.userdata') }}">
              <span class="nav-link-text ms-1">User Data</span>
            </a>
          </li>
        </div>

        <li class="nav-item mt-2">
          <a href="javascript:;" class="d-flex align-items-center nav-link menu-side" name="product">
            <i class="fas fa-database"></i>
            <span class="nav-link-text ms-1">Data Laporan</span>
            <i class="fas fa-caret-down ms-auto"></i>
          </a>
        </li>
        <div class="ms-4 down-menu" id="product">
          <li class="nav-item border-start my-0 pt-2">
            <a class="nav-link position-relative ms-0 ps-2 py-2 rounded-end menu-dropdown" href="{{ route('siswa.absensi') }}">
              <span class="nav-link-text ms-1">Laporan Absensi</span>
            </a>
          </li>
          <li class="nav-item border-start my-0 pt-2">
            <a class="nav-link position-relative ms-0 ps-2 py-2 rounded-end menu-dropdown " href="{{ route('siswa.laporan') }}">
              <span class="nav-link-text ms-1">Laporan Kegiatan</span>
            </a>
          </li>
        </div>        

        <li class="nav-item mt-2">
          <a href="{{ route('siswa.penilaian') }}" class="d-flex align-items-center nav-link menu-side">
            <i class="fas fa-eye"></i>
            <span class="nav-link-text ms-1">Tinjau Penilaian</span>
          </a>
        </li>

        <li class="nav-item bg-danger rounded mt-2">
          <a class="nav-link" href="{{ route('logout.pkl') }}">
            <i class="fas fa-power-off"></i>
            <span class="nav-link-text ms-1">Logout</span>
          </a>
        </li>
      </ul>
    </div>
  </aside>

  <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">

    <nav class="navbar navbar-main navbar-expand-lg mx-5 px-0 shadow-none rounded position-sticky blur shadow-blur mt-4 left-auto top-1 z-index-sticky" id="navbarBlur" navbar-scroll="true">
      <div class="container-fluid py-1 px-2">
        <nav aria-label="breadcrumb">
          <h6 class="font-weight-bold mb-0">@yield('pageheader')</h6>
        </nav>
        <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
          <div class="ms-auto pe-md-3 d-flex align-items-center">
            <ul class="navbar-nav  justify-content-end">
              <li class="nav-item d-xl-none ps-3 d-flex align-items-center">
                <a href="javascript:;" class="nav-link text-body p-0" id="iconNavbarSidenav">
                  <div class="sidenav-toggler-inner">
                    <i class="sidenav-toggler-line"></i>
                    <i class="sidenav-toggler-line"></i>
                    <i class="sidenav-toggler-line"></i>
                  </div>
                </a>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </nav>

    <div class="container-fluid py-4 px-5">

      @yield('content')

      <footer class="footer pt-3  ">
        <div class="container-fluid">
          <div class="row align-items-center justify-content-lg-between">
            <div class="col-lg-6 mb-lg-0 mb-4">
              <div class="copyright text-center text-xs text-muted text-lg-start">
                Copyright
                © <script>
                  document.write(new Date().getFullYear())
                </script>
                SMKN 1 Pakisjaya
              </div>
            </div>
          </div>
        </div>
      </footer>
    </div>
  </main>

  <script src="{{ asset('assets/admin/js/core/popper.min.js') }}"></script>
  <script src="{{ asset('assets/admin/js/core/bootstrap.min.js') }}"></script>
  <script src="{{ asset('assets/admin/js/plugins/perfect-scrollbar.min.js') }}"></script>
  <script src="{{ asset('assets/admin/js/plugins/smooth-scrollbar.min.js') }}"></script>
  <script src="{{ asset('assets/admin/js/plugins/chartjs.min.js') }}"></script>
  <script src="{{ asset('assets/admin/js/plugins/swiper-bundle.min.js') }}" type="text/javascript"></script>
  <script>
    if (document.getElementsByClassName('mySwiper')) {
      var swiper = new Swiper(".mySwiper", {
        effect: "cards",
        grabCursor: true,
        initialSlide: 1,
        navigation: {
          nextEl: '.swiper-button-next',
          prevEl: '.swiper-button-prev',
        },
      });
    };
  </script>
  <script type="text/javascript">
    $('.down-menu').slideUp();
    $('.nav-link').on('click', function(e){
      $('#'+e.target.name).slideToggle();
    })

    var value = $('.menu-side.active').attr('name')
    $('#'+value).slideDown();
  </script>
  <script src="{{ asset('assets/admin/js/corporate-ui-dashboard.min.js?v=1.0.0') }}"></script>
  @if(Session::has('success'))
  <?=
    '<script type="text/javascript">
      iziToast.success({
              title : "Success",
              message: "'.Session::get('success').'",
              position: "topCenter"
          })
    </script>'
  ?>
  @endif
  @if(Session::has('error'))
  <?=
    '<script type="text/javascript">
      iziToast.error({
              title : "Error",
              message: "'.Session::get('error').'",
              position: "topCenter"
          })
    </script>'
  ?>
  @endif
</body>

</html>