
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('panel/home.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
</head>
<body>
    <div class="">
        <div class="first-section ">
            <nav class="navbar navbar-expand-lg bg-body-tertiary fixed-top desktop">
                <div class="container-fluid">
                  <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                  </button>
                  <div class="collapse justify-content-center navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav gap-5 text-black">
                        <li class="nav-item lh-1">
                          <i class="fa-sharp fa-solid fa-house fs-3 ms-3 text-secondary"></i>
                            <a class="nav-link text-black" href="#">Home</a>
                          </li>
                        <li class="nav-item lh-1">
                           <i class="fa-solid fa-envelope fs-3 ms-3 text-secondary"></i>
                            <a class="nav-link text-black" href="#">Wallet</a>
                          </li>
                          <li class="nav-item lh-1" data-bs-toggle="modal" data-bs-target="#exampleModal">
                            <img class="w-25 ms-5" src="{{ asset('panel/images/bitcoin.png') }}" alt="">
                            <a class="nav-link text-black" href="#">Mining Rings</a>
                          </li>
                          <li class="nav-item lh-1">
                            <span class="material-symbols-outlined fs-3 ms-4 text-secondary">
                              paid
                              </span>
                            <a class="nav-link text-black">Transaction</a>
                          </li>
                          <li class="nav-item lh-1">
                            <span class="material-symbols-outlined fs-3 ms-3 text-secondary">
                              menu
                              </span>
                            <a class="nav-link text-black">Menu</a>
                          </li>
                    </ul>
                  </div>
                </div>
              </nav>

              {{ $slot }}

        <!-- Refer -->
        <div class="refer bg-dark p-5 mt-3">
            <div class="col-lg-4 text-white">
                <h5>Invite friends and earn more</h5>
                <p class="text-secondary">refer and earn $100</p>
                <button class="btn btn-white text-danger">invite friends</button>
            </div>
        </div>




        <!-- phone screen nav -->
        <nav class="navba fixed-bottom bg-body-tertiary phone">
            <div class="" style="margin-left: -25px;">
              <div class="" id="navbarNav">
                <ul class="d-flex justify-content-between gap-2" >
                  <li class="nav-item lh-1">
                    <i class="fa-sharp fa-solid fa-house fs-3 ms-2 text-secondary"></i>
                      <a class="nav-link text-black" href="#">Home</a>
                    </li>
                  <li class="nav-item lh-1">
                     <i class="fa-solid fa-envelope fs-3 ms-3 text-secondary"></i>
                      <a class="nav-link text-black" href="#">Wallet</a>
                    </li>
                    <li class="nav-item lh-1" data-bs-toggle="modal" data-bs-target="#exampleModal">
                      <img class="w-25 ms-4" src="{{ asset('panel/images/bitcoin.png') }}" alt="">
                      <a class="nav-link text-black" href="#">Mining Rings</a>
                    </li>
                    <li class="nav-item lh-1">
                      <span class="material-symbols-outlined fs-3 ms-4 text-secondary">
                        paid
                        </span>
                      <a class="nav-link text-black">Transaction</a>
                    </li>
                    <li class="nav-item lh-1">
                      <span class="material-symbols-outlined fs-3 ms-3 text-secondary">
                        menu
                        </span>
                      <a class="nav-link text-black">Menu</a>
                    </li>
                </ul>
              </div>
            </div>
          </nav>


          <!-- Button trigger modal -->
{{-- <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
  Launch demo modal
</button> --}}

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="2" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog fixed-bottom">
    <div class="modal-content">
      <div class="modal-header">
        <!-- <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1> -->
        <div class="text-center">
          <h3>Miner method</h3>
          <p class="text-secondary">Choose New Miner To Mine Your Mining Method</p>
      </div>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="p-4">
          <ul class="container ">
              <li class="d-flex gap-3">
                  <span class="material-symbols-outlined fs-3" style="color: rgb(236,159,68);">
                      person_apron
                      </span>
                  <a href="" class="nav-link text-black"><b>Add Worker</b></a>
              </li>
              <li class="d-flex gap-3">
                  <span class="material-symbols-outlined fs-3" style="color: rgb(236,159,68);">
                      fingerprint
                      </span>
                  <a href="" class="nav-link text-black"><b>Scan QR code</b></a>
              </li>
              <li class="d-flex gap-3">
                  <span class="material-symbols-outlined fs-3" style="color: rgb(236,159,68);">
                      desktop_mac
                      </span>
                  <a href="" class="nav-link text-black"><b>Add computer</b></a>
              </li>
          </ul>
        </div>
      </div>

    </div>
  </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js" integrity="sha384-fbbOQedDUMZZ5KreZpsbe1LCZPVmfTnH7ois6mU1QK+m14rQ1l2bGBq41eYeM/fS" crossorigin="anonymous"></script>
<script src="https://kit.fontawesome.com/ef57372cfc.js" crossorigin="anonymous"></script>
</body>
</html>
{{-- <!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>{{ config('app.name', 'Laravel') }}</title>
  <meta content="" name="description">
  <meta content="" name="keywords">
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/quill/quill.snow.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/quill/quill.bubble.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/remixicon/remixicon.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/simple-datatables/style.css') }}" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet">
</head>

<body>
    <style>
        .error {
            color: red;
            /* padding: 0px; */
        }
    </style>
    @include('sweetalert::alert')
  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top d-flex align-items-center">

   @include('layouts.admin.nav')

  </header><!-- End Header -->

@include('layouts.admin.sidebar')

  <main id="main" class="main">
        <!-- Page Heading -->
        @if (isset($header))
                {{ $header }}
        @endif

    {{ $slot }}
  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer" class="footer">
    <div class="copyright">
      &copy; Copyright <strong><span>Cointik</span></strong>. All Rights Reserved
    </div>
    <div class="credits">
      Developed by <a href="https://itlab.com.bd/">Tomal Sen</a>
    </div>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <!-- Vendor JS Files -->
  <script src="{{ asset('assets/vendor/apexcharts/apexcharts.min.js') }}"></script>
  <script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('assets/vendor/chart.js/chart.umd.js') }}"></script>
  <script src="{{ asset('assets/vendor/echarts/echarts.min.js') }}"></script>
  <script src="{{ asset('assets/vendor/quill/quill.min.js') }}"></script>
  <script src="{{ asset('assets/vendor/simple-datatables/simple-datatables.js') }}"></script>
  <script src="{{ asset('assets/vendor/tinymce/tinymce.min.js') }}"></script>
  <script src="{{ asset('assets/vendor/php-email-form/validate.js') }}"></script>
  <script src="{{ asset('vendor/jquery-numeric/jquery.numeric.min.js') }}"></script>
  <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.5/dist/jquery.validate.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script src="https://cdn.jsdelivr.net/npm/clipboard@2.0.11/dist/clipboard.min.js"></script>
  <!-- Template Main JS File -->
  <script src="{{ asset('assets/js/main.js') }}"></script>
  <script>
    const showLoading = function() {
        Swal.fire({
    title: 'Now loading',
    allowEscapeKey: false,
    allowOutsideClick: false,
    //timer: 2000,
    didOpen: () => {
        Swal.showLoading();
    }
  })
};
  </script>
  <script>
     $('.amount').numeric(
                {negative: false,decimalPlaces: 8},
                function () {
                    alert('Positive integers only');
                    this.value = '';
                    this.focus();
                }
            );
  </script>
  @yield('scripts')

</body>

</html> --}}

{{-- <!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100 dark:bg-gray-900">
            @include('layouts.navigation')

            <!-- Page Heading -->
            @if (isset($header))
                <header class="bg-white dark:bg-gray-800 shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endif

            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>
        </div>
    </body>
</html> --}}
