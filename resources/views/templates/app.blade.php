<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>School</title>
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet" />
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet" />
    <!-- MDB -->
    <link rel="short icon" href="https://smkwikrama.sch.id/assets2/wikrama-logo.png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />

     <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>

      {{-- CDN CSS databales --}}
    <link rel="stylesheet" href="https://cdn.datatables.net/2.3.4/css/dataTables.dataTables.min.css">



</head>

<body class="color-text-white">
    @yield('content')


    <!-- Footer Bootstrap -->

  @if(Auth::check() && Auth::user()->role == 'admin')

  @elseif(Auth::check() && Auth::user()->role == 'user')

    @else
        <footer class="footer py-3" style="background-color:#10316B; font-size:0.9rem;">
            <div class="container">
                <div class="row align-items-start">
                    <div class="col-md-4 mb-3 text-white">
                        <h6 class="fw-bold mb-2">Tentang Kami</h6>
                        <p class="mb-2">Website ini Dibuat Untuk Membantu dalam Mengelola Data & Menyimpan data</p>
                        <div class="social-icons mt-2">
                            <a href="#" class="text-white me-2"><i class="fab fa-facebook-f"></i></a>
                            <a href="#" class="text-white me-2"><i class="fab fa-twitter"></i></a>
                            <a href="#" class="text-white me-2"><i class="fab fa-instagram"></i></a>
                            <a href="#" class="text-white"><i class="fab fa-linkedin-in"></i></a>
                        </div>
                    </div>

                    <div class="col-md-4 mb-3 text-white">
                        <h6 class="fw-bold mb-2">Kontak</h6>
                        <p class="mb-1"><i class="fas fa-envelope me-2"></i>queentanaalleahasanath@smkwikrma.sch.id</p>
                        <p class="mb-1"><i class="fas fa-phone me-2"></i>(+62) 895-3210-73832</p>
                        <p class="mb-0"><i class="fas fa-map-marker-alt me-2"></i>Jl. Raya Wangun</p>
                    </div>

                    <div class="col-md-4 text-white">
                        <h6 class="fw-bold mb-2">SMK Wikrama Bogor</h6>
                        <p class="mb-0">Membangun karakter, menyiapkan masa depan.</p>
                    </div>
                </div>

                <div class="footer-bottom text-center pt-3 border-top border-light mt-3">
                    <p class="mb-0 text-white-50">&copy; 2025 SMK Wikrama Bogor. All Rights Reserved.</p>
                </div>
            </div>
        </footer>
    @endif

    <!-- MDB -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/9.2.0/mdb.umd.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

     {{-- CDN JS datatables --}}

    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdn.datatables.net/2.3.4/js/dataTables.min.js"></script>

    @stack('script')

</body>

</html>
