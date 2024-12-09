<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Sistem Arsip Surat DPM4KB</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Inter:wght@100..900&family=Roboto:wght@400;500;700;900&display=swap"
        rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link rel="stylesheet" href="{{ URL::asset('landing') }}/lib/animate/animate.min.css" />
    <link href="{{ URL::asset('landing') }}/lib/lightbox/css/lightbox.min.css" rel="stylesheet">
    <link href="{{ URL::asset('landing') }}/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

    {{-- font awesome --}}
    <script src="https://kit.fontawesome.com/35e083d87e.js" crossorigin="anonymous"></script>

    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{ URL::asset('landing') }}/css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="{{ URL::asset('landing') }}/css/style.css" rel="stylesheet">
</head>

<body>

    <div class="container-fluid position-relative p-0">
        <nav class="navbar navbar-expand-lg navbar-light px-4 px-lg-5 py-3 py-lg-0">
            <a href="" class="navbar-brand p-0 d-flex gap-4">
                <img src="{{ URL::asset('img') }}/logo.png" alt="Logo">
                <h3 class="text-primary my-auto"> Sistem Arsip Surat</h3>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                <span class="fa fa-bars"></span>
            </button>


            <div class="collapse navbar-collapse" id="navbarCollapse">
                <div class="navbar-nav ms-auto py-0">
                    <a href="index.html" class="nav-item nav-link">Beranda</a>
                    <a href="{{ route('surat.index') }}" class="nav-item nav-link">Surat</a>
                    <a href="service.html" class="nav-item nav-link">Services</a>
                    <a href="contact.html" class="nav-item nav-link">Contact Us</a>
                </div>
                @auth
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link" data-bs-toggle="dropdown">
                            <span class="dropdown-toggle">{{ auth()->user()->nama }}</span>
                        </a>
                        <div class="dropdown-menu m-0">
                            <a href="{{ route('logout') }}" class="dropdown-item">Logout</a>
                        </div>
                    </div>
                @else
                    <a href="{{ route('login') }}"
                        class="btn btn-primary rounded-pill py-2 px-4 my-3 my-lg-0 flex-shrink-0">Login</a>
                @endauth
            </div>
        </nav>
    </div>


    @yield('content')

    <!-- Copyright Start -->
    <div class="container-fluid copyright py-4">
        <div class="container">
            <div class="row g-4 align-items-center">
                <div class="col-md-6 text-center text-md-start mb-md-0">
                    <span class="text-body">Sistem Arsip Surat, All right reserved.</span>
                </div>
            </div>
        </div>
    </div>
    <!-- Copyright End -->


    <!-- Back to Top -->
    <a href="#" class="btn btn-primary btn-lg-square rounded-circle back-to-top"><i
            class="fa fa-arrow-up"></i></a>


    <!-- JavaScript Libraries -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ URL::asset('landing') }}/lib/wow/wow.min.js"></script>
    <script src="{{ URL::asset('landing') }}/lib/easing/easing.min.js"></script>
    <script src="{{ URL::asset('landing') }}/lib/waypoints/waypoints.min.js"></script>
    <script src="{{ URL::asset('landing') }}/lib/counterup/counterup.min.js"></script>
    <script src="{{ URL::asset('landing') }}/lib/lightbox/js/lightbox.min.js"></script>
    <script src="{{ URL::asset('landing') }}/lib/owlcarousel/owl.carousel.min.js"></script>


    <!-- Template Javascript -->
    <script src="{{ URL::asset('landing') }}/js/main.js"></script>
</body>

</html>
