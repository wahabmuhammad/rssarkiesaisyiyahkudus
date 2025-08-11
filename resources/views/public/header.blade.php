
<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Rumah Sakit Sarkies 'Aisyiyah Kudus</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="{{ asset('assets/img/Logo_RSSA.png') }}" rel="icon">
    <link href="{{ asset('assets/img/Logo_RSSA.png') }}" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Roboto:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="{{ asset('/assets/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet">
    <link href="{{ asset('/assets/vendor/animate.css/animate.min.css') }}" rel="stylesheet">
    <link href="{{ asset('/assets/vendor/aos/aos.css') }}" rel="stylesheet">
    <link href="{{ asset('/assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('/assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('/assets/vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet">
    <link href="{{ asset('/assets/vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">
    <link href="{{ asset('/assets/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet">
    <script type="application/ld+json">
        {
        "@context": "https://schema.org",
        "@type": "Organization",
        "name": "Rumah Sakit Sarkies 'Aisyiyah Kudus",
        "url": "https://rssarkiesaisiyyahkudus.co.id",
        "logo": "https://rssarkiesaisyiyahkudus.co.id/assets/img/Logo_RSSA.png"
        }
    </script>

</head>

<!-- ======= Top Bar ======= --> 
<div id="topbar" class="d-flex align-items-center" style="background-color: #2d8b84; color: white; height: 40px;">
    <div class="container-fluid d-flex align-items-center justify-content-between">

        <!-- Kiri -->
        <div class="d-flex align-items-center">
            <a class="nav-link scrollto text-white fw-bold me-3 p-0" href="{{ url('/') }}#contact">Hubungi Kami</a>
        </div>

        <!-- Kanan -->
        <div class="d-flex align-items-center">
            <i class="bi bi-instagram me-1"></i> <span>@rssarkiesaisyiyahkudus</span>
            <i class="bi bi-whatsapp p-1 ms-3"></i> 0858-1415-0000
            <i class="bi bi-phone p-1 ms-3"></i> Call us (0291) 4150501
        </div>
    </div>
</div>

<!-- ======= Header ======= -->
<header id="header" class="fixed-top" style="background-color: white; border-bottom: 1px solid #ddd;">
    <div class="container-fluid d-flex align-items-center justify-content-between">

        <!-- Logo -->
        <a href="{{ url('/') }}" class="logo me-auto">
            <img src="{{ asset('/assets/img/logo_sarkies.png') }}" alt="">
        </a>

        <!-- Menu -->
        <nav id="navbar" class="navbar order-last order-lg-0 me-3">
            <ul class="d-flex align-items-center mb-0">
                <li><a class="nav-link scrollto text-dark fw-bold" href="{{ url('/') }}#hero">Beranda</a></li>
                <li><a class="nav-link scrollto text-dark fw-bold" href="{{ url('/') }}#about">Rumah Sakit Kami</a></li>
                <li class="dropdown">
                    <a href="#" class="text-dark fw-bold"><span>Center Of Excellence</span> <i class="bi bi-chevron-down"></i></a>
                    <ul>
                        <li><a href="{{ route('pain-center') }}">Pain Center</a></li>
                        <li><a href="{{ route('orthopedic-center') }}">Orthopedic Center</a></li>
                        <li><a href="{{ route('klinik-kandungan') }}">Klinik Kandungan dan Kebidanan</a></li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="#" class="text-dark fw-bold"><span>Fasilitas dan Layanan</span> <i class="bi bi-chevron-down"></i></a>
                    <ul>
                        <li><a href="{{ route('diagnostic-center') }}">Diagnostic Center</a></li>
                        <li><a href="{{ route('intensive-care') }}">Intensive Care</a></li>
                        <li><a href="{{ route('rawat-inap') }}">Rawat Inap</a></li>
                        <li><a href="{{ route('rehabilitasi') }}">Rehabilitasi Medik & Fisioterapi</a></li>
                        <li><a href="{{ route('farmasi') }}">Farmasi</a></li>
                        <li><a href="{{ route('emergency') }}">Emergency</a></li>
                    </ul>
                </li>
                <li><a class="nav-link scrollto text-dark fw-bold" href="#doctors">Cari Dokter</a></li>
                <li><a class="nav-link scrollto text-dark fw-bold" href="#">Karir</a></li>
                <li><a class="nav-link scrollto text-dark fw-bold" href="#">Jadwal Dokter</a></li>
            </ul>
        </nav>

        <!-- Tombol -->
        <a href="#pengaduan" class="btn fw-bold" style="background-color: #1E88E5; color: white; border-radius: 5px; padding: 8px 16px; white-space: nowrap;">
            Layanan Pengaduan
        </a>
    </div>
</header>