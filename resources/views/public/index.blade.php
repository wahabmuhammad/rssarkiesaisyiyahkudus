@include('public.header')

<!DOCTYPE html>
<html lang="en">

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

<body>

    <!-- ======= Hero Section ======= -->
    <section id="hero">
        <div id="heroCarousel" data-bs-interval="5000" class="carousel slide carousel-fade" data-bs-ride="carousel">

            <ol class="carousel-indicators" id="hero-carousel-indicators"></ol>

            <div class="carousel-inner" role="listbox">

                <!-- Slide 1 -->
                <div class="carousel-item active" width="1440" height="500"
                    style="background-image: url({{ asset('assets/img/rssarkies/wasd.jpg') }})">
                    {{-- <div class="container">
                        <h2>Welcome to <span>Medicio</span></h2>
                        <p>Ut velit est quam dolor ad a aliquid qui aliquid. Sequi ea ut et est quaerat sequi nihil ut
                            aliquam. Occaecati alias dolorem mollitia ut. Similique ea voluptatem. Esse doloremque
                            accusamus repellendus deleniti vel.</p>
                        <a href="#about" class="btn-get-started scrollto">Read More</a>
                    </div> --}}
                </div>

                <!-- Slide 2 -->
                <div class="carousel-item" width="1440" height="500"
                    style="background-image: url({{ asset('assets/img/rssarkies/dr_ari.jpeg') }})">
                    {{-- <div class="container">
                        <h2>Lorem Ipsum Dolor</h2>
                        <p>Ut velit est quam dolor ad a aliquid qui aliquid. Sequi ea ut et est quaerat sequi nihil ut
                            aliquam. Occaecati alias dolorem mollitia ut. Similique ea voluptatem. Esse doloremque
                            accusamus repellendus deleniti vel.</p>
                        <a href="#about" class="btn-get-started scrollto">Read More</a>
                    </div> --}}
                </div>

                <!-- Slide 3 -->
                <div class="carousel-item" width="1440" height="500"
                    style="background-image: url({{ asset('assets/img/rssarkies/IMG_5548.jpg') }})">
                    {{-- <div class="container">
                        <h2>Sequi ea ut et est quaerat</h2>
                        <p>Ut velit est quam dolor ad a aliquid qui aliquid. Sequi ea ut et est quaerat sequi nihil ut
                            aliquam. Occaecati alias dolorem mollitia ut. Similique ea voluptatem. Esse doloremque
                            accusamus repellendus deleniti vel.</p>
                        <a href="#about" class="btn-get-started scrollto">Read More</a>
                    </div> --}}
                </div>

                <!-- Slide 4 -->
                <div class="carousel-item" width="1440" height="500"
                    style="background-image: url({{ asset('assets/img/rssarkies/berlima.jpg') }})">
                    {{-- <div class="container">
                        <h2>Sequi ea ut et est quaerat</h2>
                        <p>Ut velit est quam dolor ad a aliquid qui aliquid. Sequi ea ut et est quaerat sequi nihil ut
                            aliquam. Occaecati alias dolorem mollitia ut. Similique ea voluptatem. Esse doloremque
                            accusamus repellendus deleniti vel.</p>
                        <a href="#about" class="btn-get-started scrollto">Read More</a>
                    </div> --}}
                </div>

            </div>

        </div>
    </section><!-- End Hero -->
    
    <!-- Chatbot Section -->
    <div class="chatbot-container" style="position: fixed; bottom: 20px; right: 20px; z-index: 999;">
        <!-- Tombol Chat -->
        <button id="chatbotToggle" style="background-color: #007bff; color: white; padding: 12px 20px; border-radius: 50%; border: none; cursor: pointer;">
            💬
        </button>

        <!-- Box Chat -->
        <div id="chatbotBox" style="display: none; width: 300px; height: 400px; background: white; border: 1px solid #ccc; border-radius: 10px; box-shadow: 0 4px 12px rgba(0,0,0,0.2); overflow: hidden;">
            <div style="background: #007bff; color: white; padding: 10px; font-weight: bold;">
                Chatbot RS Sarkies 'Aisyiyah Kudus
            </div>
            <div id="chatMessages" style="height: 300px; padding: 10px; overflow-y: auto; font-size: 14px;">
                <div><b>Bot:</b> Assalamualaikum! Selamat datang di RS Sarkies 'Aisyiyah Kudus. Ada yang bisa saya bantu?</div>
            </div>
            <div style="display: flex; border-top: 1px solid #ccc;">
                <input type="text" id="chatInput" placeholder="Ketik pesan..." style="flex: 1; padding: 10px; border: none; outline: none;">
                <button id="sendChat" style="background: #007bff; color: white; border: none; padding: 10px;">Kirim</button>
            </div>
        </div>
    </div>

    <script>
        const toggleBtn = document.getElementById('chatbotToggle');
        const chatBox = document.getElementById('chatbotBox');
        const sendBtn = document.getElementById('sendChat');
        const chatInput = document.getElementById('chatInput');
        const chatMessages = document.getElementById('chatMessages');

        toggleBtn.addEventListener('click', () => {
            chatBox.style.display = chatBox.style.display === 'none' ? 'block' : 'none';
        });

        sendBtn.addEventListener('click', () => {
            let message = chatInput.value.trim();
            if(message){
                // Tampilkan pesan user
                chatMessages.innerHTML += `<div><b>Anda:</b> ${message}</div>`;

                // Balasan dummy dari bot
                setTimeout(() => {
                    chatMessages.innerHTML += `<div><b>Bot:</b> Maaf, saya masih chatbot dummy 😄</div>`;
                    chatMessages.scrollTop = chatMessages.scrollHeight;
                }, 500);

                chatInput.value = '';
            }
        });
    </script>

    <!-- Form Pencarian Dokter -->
    <section class="search-doctor py-5" style="background-color: #ffffff;">
        <div class="container">
            <div class="search-box p-4 bg-white rounded shadow">
                <div class="search-header bg-light p-2 px-3 rounded-top" style="margin:-1.5rem -1.5rem 1.5rem -1.5rem; background-color: #d0ebe7;">
                    <h5 class="m-0 text-teal fw-bold">Cari Dokter</h5>
                </div>
                <form class="row g-3 align-items-end">
                    <!-- Nama Dokter -->
                    <div class="col-md-4">
                        <label class="form-label fw-bold">Nama Dokter</label>
                        <div class="input-group">
                            <span class="input-group-text bg-white"><i class="fas fa-search text-muted"></i></span>
                            <input type="text" class="form-control" placeholder="Nama Dokter">
                        </div>
                    </div>

                    <!-- Spesialisasi -->
                    <div class="col-md-4">
                        <label class="form-label fw-bold">Spesialisasi</label>
                        <div class="input-group">
                            <span class="input-group-text bg-white"><i class="fas fa-search text-muted"></i></span>
                            <input type="text" class="form-control" placeholder="Pilih Spesialisasi">
                        </div>
                    </div>

                    <!-- Pilihan Hari -->
                    <div class="col-md-4">
                        <label class="form-label fw-bold">Pilihan Hari</label>
                        <div class="input-group">
                            <span class="input-group-text bg-white"><i class="fas fa-calendar-alt text-muted"></i></span>
                            <input type="date" class="form-control">
                        </div>
                    </div>

                    <!-- Tombol -->
                    <div class="col-12 d-flex gap-2 justify-content-end mt-3">
                        <button type="reset" class="btn btn-outline-secondary">Reset</button>
                        <a href="{{ route('cari-dokter') }}" class="btn btn-teal text-white">Cari Dokter</a>
                    </div>

                </form>
            </div>
        </div>
    </section>

    <!-- Custom Styles -->
    <style>
        .btn-teal {
            background-color: #1E88E5;
            border: none;
        }
        .btn-teal:hover {
            background-color: #226b68;
        }
    </style>

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <!-- ======= About Us Section ======= -->
    <section id="about" class="about-us py-5" style="background-color: #FFFFFF;">
        <div class="container" data-aos="fade-up">
            <div class="row align-items-center">
                
                <!-- Gambar Rumah Sakit (Kiri) -->
                <div class="col-lg-6 mb-4 mb-lg-0" data-aos="fade-right">
                    <img src="{{ asset('assets/img/about-content.jpg') }}" 
                        alt="Ilustrasi Rumah Sakit" 
                        class="img-fluid rounded shadow-sm">
                </div>

                <!-- Teks Detail (Kanan) -->
                <div class="col-lg-6" data-aos="fade-left">
                    <h2 class="fw-bold mb-3">Rumah Sakit Sarkies 'Aisyiyah Kudus</h2>
                    <p class="text-muted">
                        Sebagai bagian dari RS Pondok Indah Group, kami menghadirkan layanan kesehatan unggulan
                        dengan teknologi termutakhir & sistem akreditasi tingkat internasional.
                    </p>

                    <h5 class="mt-4 fw-semibold">Visi</h5>
                    <p class="text-muted">
                        Menjadi rumah sakit pilihan dengan layanan bermutu tinggi, aman, dan inovatif.
                    </p>

                    <h5 class="mt-4 fw-semibold">Misi</h5>
                    <ul class="list-unstyled text-muted">
                        <li class="mb-2">
                            <i class="bi bi-check-circle-fill text-primary me-2"></i>
                            Pelayanan terpadu & fokus pada pasien.
                        </li>
                        <li class="mb-2">
                            <i class="bi bi-check-circle-fill text-primary me-2"></i>
                            Pengembangan profesional berkelanjutan dalam tim.
                        </li>
                        <li>
                            <i class="bi bi-check-circle-fill text-primary me-2"></i>
                            Integritas, etika, inovasi, dan pembelajaran berkelanjutan.
                        </li>
                    </ul>

                </div>
            </div>
        </div>
    </section>
    <!-- End About Us Section -->



    <main id="main">

        {{-- Center of Excellence --}}
        <section class="section-bg py-5">
            <div class="container">
                <!-- Header -->
                <div class="d-flex justify-content-between align-items-center mb-4 flex-wrap">
                    <div>
                        <h2 class="fw-bold" style="color: #2A2536;">Center of Excellence</h2>
                        <p class="text-muted mb-0">Telusuri lebih lanjut berbagai informasi seputar layanan kami, di sini.</p>
                    </div>
                    <a href="#" class="fw-semibold" style="color: #1E88E5; text-decoration: none;">
                        Lihat Semua Center of Excellence →
                    </a>
                </div>

                <!-- Cards -->
                <div class="row g-4">
                    <!-- Card 1 -->
                    <div class="col-md-4">
                        <div class="card h-100 border-0 shadow-sm rounded-4 overflow-hidden">
                            <img src="{{ asset('assets/img/coe/pain-center.jpg') }}" class="card-img-top" alt="Pain Centre">
                            <div class="card-body">
                                <h5 class="fw-bold">Skin & Aesthetic Clinic</h5>
                                <p class="text-muted small mb-3">
                                    Klinik dan jadwal dokter spesialis perawatan estetika kulit dan wajah terdekat di Jakarta & Tangerang. Periksa kondisi kesehatan...
                                </p>
                                <a href="{{ route('pain-center') }}" class="fw-semibold" style="color: #1E88E5; text-decoration: none;">
                                    Baca Selengkapnya
                                </a>
                            </div>
                        </div>
                    </div>

                    <!-- Card 2 -->
                    <div class="col-md-4">
                        <div class="card h-100 border-0 shadow-sm rounded-4 overflow-hidden">
                            <img src="{{ asset('assets/img/coe/orthopedic-center.jpg') }}" class="card-img-top" alt="Orthopedic Centre">
                            <div class="card-body">
                                <h5 class="fw-bold">Orthopedic Centre</h5>
                                <p class="text-muted small mb-3">
                                    Klinik dan jadwal dokter spesialis tulang ortopedi terdekat di Jakarta & Tangerang. Dilengkapi MRI 3 Tesla Skyra...
                                </p>
                                <a href="{{ route('orthopedic-center') }}" class="fw-semibold" style="color: #1E88E5; text-decoration: none;">
                                    Baca Selengkapnya
                                </a>
                            </div>
                        </div>
                    </div>

                    <!-- Card 3 -->
                    <div class="col-md-4">
                        <div class="card h-100 border-0 shadow-sm rounded-4 overflow-hidden">
                            <img src="{{ asset('assets/img/coe/klinik-kandungan.png') }}" class="card-img-top" alt="Klinik Kebidanan & Kandungan">
                            <div class="card-body">
                                <h5 class="fw-bold">Klinik Kebidanan & Kandungan</h5>
                                <p class="text-muted small mb-3">
                                    Klinik dan jadwal dokter kandungan (Obgyn) terdekat di Jakarta & Tangerang. Periksa kondisi kesehatan Anda dan booking online...
                                </p>
                                <a href="{{ route('klinik-kandungan') }}" class="fw-semibold" style="color: #1E88E5; text-decoration: none;">
                                    Baca Selengkapnya
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        {{-- End Center of Excellence --}}


        <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Fasilitas & Layanan</title>
        <script src="https://cdn.tailwindcss.com"></script>
        <script src="https://unpkg.com/alpinejs" defer></script>
        </head>
        <body class="bg-gray-50 text-gray-800">

        <section class="section-bg py-5">
        <div class="container mx-auto py-8 px-4">
            <h1 class="text-3xl font-bold mb-4">Fasilitas dan Layanan</h1>
            <p class="mb-8 text-gray-600">
            Menyediakan pelayanan kesehatan terdepan yang terintegrasi dengan dukungan tenaga medis profesional,
            adopsi teknologi medis terkini, serta sistem informasi digital yang lebih efisien.
            </p>

            @php
            $fasilitas = [
                ['title' => 'Diagnostic Center', 'desc' => 'Layanan endoskopi, laboratorium, dan radiologi dengan peralatan modern.', 'img' => asset('images/diagnostic.jpg')],
                ['title' => 'Intensive Care', 'desc' => 'Perawatan intensif dengan monitoring 24 jam untuk pasien kritis.', 'img' => asset('images/intensive.jpg')],
                ['title' => 'Rawat Inap', 'desc' => 'Kamar rawat inap yang nyaman dan fasilitas lengkap untuk pasien.', 'img' => asset('images/rawat-inap.jpg')],
                ['title' => 'Rehabilitasi Medik & Fisioterapi', 'desc' => 'Program pemulihan fisik pasca cedera atau operasi.', 'img' => asset('images/rehab.jpg')],
                ['title' => 'Farmasi', 'desc' => 'Layanan obat dengan resep dokter dan konsultasi farmasi.', 'img' => asset('images/farmasi.jpg')],
                ['title' => 'Emergency', 'desc' => 'Layanan gawat darurat 24 jam dengan respon cepat.', 'img' => asset('images/emergency.jpg')],
            ];
            @endphp

            <!-- Parent state: hanya satu panel terbuka -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8"
                x-data="{ active: 0, image: '{{ $fasilitas[0]['img'] }}' }">

            <!-- Left: Accordion -->
            <div class="space-y-4">
                @foreach($fasilitas as $i => $item)
                <div class="border rounded-lg overflow-hidden">
                    <button
                    @click="active = (active === {{ $i }}) ? null : {{ $i }}; image='{{ $item['img'] }}'"
                    class="w-full flex justify-between items-center px-4 py-3 bg-gray-100 hover:bg-gray-200">
                    <span class="font-semibold">{{ $item['title'] }}</span>

                    <!-- icons -->
                    <svg x-show="active !== {{ $i }}" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                    </svg>
                    <svg x-show="active === {{ $i }}" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 15l7-7 7 7" />
                    </svg>
                    </button>

                    <div x-show="active === {{ $i }}" x-collapse class="px-4 py-3 bg-white">
                    <p>{{ $item['desc'] }}</p>
                    </div>
                </div>
                @endforeach
            </div>

            <!-- Right: Image -->
            <div class="flex items-start justify-center">
                <img :src="image" alt="Fasilitas Image" class="rounded-lg shadow-lg max-w-full">
            </div>
            </div>
        </div>
        </section>

        </body>
        </html>

        <!-- START: Carousel Berita & Artikel -->
        <section class="section-bg">
        <div class="container mt-5">
            <!-- Header -->
                <div class="d-flex justify-content-between align-items-center mb-4 flex-wrap">
                    <div>
                        <h2 class="fw-bold" style="color: #2A2536;">Berita dan Artikel Kesehatan</h2>
                        <p class="text-muted mb-0">Informasi terkini dan tips kesehatan terpercaya untuk Anda dan keluarga.</p>
                    </div>
                    <a href="#" class="fw-semibold" style="color: #1E88E5; text-decoration: none;">
                        Lihat Semua Berita dan Artikel Kesehatan →
                    </a>
                </div>

            <div id="newsCarousel" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                @php
                $articles = [
                    ['title'=>'Waspadai Serangan Jantung!','date'=>'28 Juli 2025','excerpt'=>'Serangan jantung bisa datang tiba-tiba…','img'=>asset('assets/img/news/jantung.jpg'),'url'=>'#'],
                    ['title'=>'Apakah Ambeien Bisa Sembuh?','date'=>'28 Juli 2025','excerpt'=>'Ambeien merupakan kondisi…','img'=>asset('assets/img/news/ambeien.jpg'),'url'=>'#'],
                    ['title'=>'ISK pada Ibu Hamil Bisa Sembuh?','date'=>'8 Agustus 2025','excerpt'=>'ISK pada ibu hamil bisa diatasi…','img'=>asset('assets/img/news/isk.jpg'),'url'=>'#'],
                    ['title'=>'Tips Pola Hidup Sehat Cegah Diabetes','date'=>'1 Agustus 2025','excerpt'=>'Diabetes dapat dicegah dengan…','img'=>asset('assets/img/news/diabetes.jpg'),'url'=>'#'],
                ];
                $chunks = array_chunk($articles, 3);
                @endphp

                @foreach($chunks as $i => $chunk)
                <div class="carousel-item {{ $i==0?'active':'' }}">
                <div class="row">
                    @foreach($chunk as $article)
                    <div class="col-md-4 mb-3">
                    <div class="card h-100 shadow-sm border-0">
                        <img src="{{ $article['img'] }}" class="card-img-top" alt="{{ $article['title'] }}">
                        <div class="card-body">
                        <h5 class="card-title">{{ $article['title'] }}</h5>
                        <p class="card-text text-muted"><small>{{ $article['date'] }}</small></p>
                        <p class="card-text">{{ $article['excerpt'] }}</p>
                        <a href="{{ $article['url'] }}" style="color: #1E88E5; class="fw-semibold">Lihat Detail</a>
                        </div>
                    </div>
                    </div>
                    @endforeach
                </div>
                </div>
                @endforeach
            </div>

            <button class="carousel-control-prev" type="button" data-bs-target="#newsCarousel" data-bs-slide="prev">
                <span class="carousel-control-prev-icon"></span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#newsCarousel" data-bs-slide="next">
                <span class="carousel-control-next-icon"></span>
            </button>
            </div>
        </div>
        </section>
        <!-- END: Carousel Berita & Artikel -->


        <!-- ======= Counts Section ======= -->
        <section id="counts" class="counts" style="background-color: #ffffff;">
            <div class="container" data-aos="fade-up">

                <div class="section-title">
                    <h2>Profil</h2>
                    <p>Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit
                        sint consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit alias
                        ea. Quia fugiat sit in iste officiis commodi quidem hic quas.</p>
                </div>
                <div class="row no-gutters">
                    <div class="col-lg-3 col-md-6 d-md-flex align-items-md-stretch">
                        <div class="count-box">
                            <i class="fas fa-user-md"></i>
                            <span data-purecounter-start="0" data-purecounter-end="85" data-purecounter-duration="1"
                                class="purecounter"></span>

                            <p><strong>Dokter</strong> consequuntur quae qui deca rode</p>
                            <a href="{{ route('jadwal-dokter') }}">Find out more &raquo;</a>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6 d-md-flex align-items-md-stretch">
                        <div class="count-box">
                            <i class="far fa-hospital"></i>
                            <span data-purecounter-start="0" data-purecounter-end="26" data-purecounter-duration="1"
                                class="purecounter"></span>
                            <p><strong>Fasilitas</strong> adipisci atque cum quia aut numquam delectus</p>
                            <a href="{{ route('fasilitas') }}">Find out more &raquo;</a>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6 d-md-flex align-items-md-stretch">
                        <div class="count-box">
                            <i class="fas fa-bed"></i>
                            <span data-purecounter-start="0" data-purecounter-end="14" data-purecounter-duration="1"
                                class="purecounter"></span>
                            <p><strong>Kamar</strong> aut commodi quaerat. Aliquam ratione</p>
                            <a href="{{ route('kamar') }}">Find out more &raquo;</a>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6 d-md-flex align-items-md-stretch">
                        <div class="count-box">
                            <i class="fas fa-award"></i>
                            <span data-purecounter-start="0" data-purecounter-end="150" data-purecounter-duration="1"
                                class="purecounter"></span>
                            <p><strong>Penghargaan</strong> rerum asperiores dolor molestiae doloribu</p>
                            <a href="#">Find out more &raquo;</a>
                        </div>
                    </div>

                </div>

            </div>
        </section><!-- End Counts Section -->


        <!-- ======= Fasilitas Rawat Inap Section ======= -->
        <section id="fasilitas" class="services services" style="background-color: #ffffff;">
            <div class="container" data-aos="fade-up">

                <div class="section-title">
                    <h2>Fasilitas Rawat Inap</h2>
                    <p>Kami menyediakan fasilitas rawat inap dengan kenyamanan dan kelengkapan terbaik bagi pasien dan keluarga.</p>
                </div>

                <div class="row">
                    <!-- VIP A -->
                    <div class="col-lg-4 col-md-6 mb-4" data-aos="zoom-in" data-aos-delay="100">
                        <div class="card h-100 shadow-sm border-0">
                            <img src="{{ asset('assets/img/kamar-vipa.jpg') }}" class="card-img-top" alt="Kamar VIP A">
                            <div class="card-body">
                                <h4 class="fw-bold">VIP A</h4>
                                <ul class="list-unstyled mt-3">
                                    <li><i class="fas fa-check-circle text-blue me-2"></i>1 Tempat Tidur Elektrik</li>
                                    <li><i class="fas fa-check-circle text-blue me-2"></i>Meja Set Kabinet & Sofa Penunggu</li>
                                    <li><i class="fas fa-check-circle text-blue me-2"></i>Kamar Mandi + Water Heater</li>
                                    <li><i class="fas fa-check-circle text-blue me-2"></i>AC</li>
                                    <li><i class="fas fa-check-circle text-blue me-2"></i>TV 32"</li>
                                    <li><i class="fas fa-check-circle text-blue me-2"></i>Kulkas</li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <!-- VIP B -->
                    <div class="col-lg-4 col-md-6 mb-4" data-aos="zoom-in" data-aos-delay="150">
                        <div class="card h-100 shadow-sm border-0">
                            <img src="{{ asset('assets/img/kamar-vipb.jpg') }}" class="card-img-top" alt="Kamar VIP B">
                            <div class="card-body">
                                <h4 class="fw-bold">VIP B</h4>
                                <ul class="list-unstyled mt-3">
                                    <li><i class="fas fa-check-circle text-blue me-2"></i>1 Tempat Tidur Elektrik</li>
                                    <li><i class="fas fa-check-circle text-blue me-2"></i>Meja Set Kabinet</li>
                                    <li><i class="fas fa-check-circle text-blue me-2"></i>Kamar Mandi + Water Heater</li>
                                    <li><i class="fas fa-check-circle text-blue me-2"></i>AC</li>
                                    <li><i class="fas fa-check-circle text-blue me-2"></i>TV 29"</li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <!-- Kelas 1 -->
                    <div class="col-lg-4 col-md-6 mb-4" data-aos="zoom-in" data-aos-delay="200">
                        <div class="card h-100 shadow-sm border-0">
                            <img src="{{ asset('assets/img/kamar-kelas1.jpg') }}" class="card-img-top" alt="Kamar Kelas 1">
                            <div class="card-body">
                                <h4 class="fw-bold">Kelas 1</h4>
                                <ul class="list-unstyled mt-3">
                                    <li><i class="fas fa-check-circle text-blue me-2"></i>2 Tempat Tidur Manual</li>
                                    <li><i class="fas fa-check-circle text-blue me-2"></i>Kamar Mandi</li>
                                    <li><i class="fas fa-check-circle text-blue me-2"></i>AC</li>
                                    <li><i class="fas fa-check-circle text-blue me-2"></i>TV</li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <!-- Kelas 2 -->
                    <div class="col-lg-4 col-md-6 mb-4" data-aos="zoom-in" data-aos-delay="250">
                        <div class="card h-100 shadow-sm border-0">
                            <img src="{{ asset('assets/img/kamar-kelas2.jpg') }}" class="card-img-top" alt="Kamar Kelas 2">
                            <div class="card-body">
                                <h4 class="fw-bold">Kelas 2</h4>
                                <ul class="list-unstyled mt-3">
                                    <li><i class="fas fa-check-circle text-blue me-2"></i>3 Tempat Tidur Manual</li>
                                    <li><i class="fas fa-check-circle text-blue me-2"></i>Kamar Mandi</li>
                                    <li><i class="fas fa-check-circle text-blue me-2"></i>Kipas Angin</li>
                                    <li><i class="fas fa-check-circle text-blue me-2"></i>TV</li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <!-- Kelas 3 -->
                    <div class="col-lg-4 col-md-6 mb-4" data-aos="zoom-in" data-aos-delay="300">
                        <div class="card h-100 shadow-sm border-0">
                            <img src="{{ asset('assets/img/kamar-kelas3.jpg') }}" class="card-img-top" alt="Kamar Kelas 3">
                            <div class="card-body">
                                <h4 class="fw-bold">Kelas 3</h4>
                                <ul class="list-unstyled mt-3">
                                    <li><i class="fas fa-check-circle text-blue me-2"></i>4 Tempat Tidur Manual</li>
                                    <li><i class="fas fa-check-circle text-blue me-2"></i>Kamar Mandi</li>
                                    <li><i class="fas fa-check-circle text-blue me-2"></i>Kipas Angin</li>
                                    <li><i class="fas fa-check-circle text-blue me-2"></i>TV</li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <!-- ICU -->
                    <div class="col-lg-4 col-md-6 mb-4" data-aos="zoom-in" data-aos-delay="350">
                        <div class="card h-100 shadow-sm border-0">
                            <img src="{{ asset('assets/img/kamar-icu.jpg') }}" class="card-img-top" alt="Kamar ICU">
                            <div class="card-body">
                                <h4 class="fw-bold">ICU</h4>
                                <ul class="list-unstyled mt-3">
                                    <li><i class="fas fa-check-circle text-blue me-2"></i>Tempat Tidur Elektrik</li>
                                    <li><i class="fas fa-check-circle text-blue me-2"></i>Monitor Pasien</li>
                                    <li><i class="fas fa-check-circle text-blue me-2"></i>Ventilator</li>
                                    <li><i class="fas fa-check-circle text-blue me-2"></i>AC</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </section>
        <!-- End Fasilitas Rawat Inap Section -->


        <!-- ======= Doctors Section ======= -->
        <section id="doctors" class="doctors section-bg">
            <div class="container" data-aos="fade-up">

                <div class="section-title">
                    <h2>Dokter</h2>
                    <p>Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit
                        sint consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit alias
                        ea. Quia fugiat sit in iste officiis commodi quidem hic quas.</p>
                </div>

                <div class="row">

                    <div class="col-lg-3 col-md-6 d-flex align-items-stretch">
                        <div class="member" data-aos="fade-up" data-aos-delay="100">
                            <div class="member-img">
                                <img src="assets/img/doctors/doctors-1.jpg" class="img-fluid" alt="">
                            </div>
                            <div class="member-info">
                                <h4>Walter White</h4>
                                <span>Chief Medical Officer</span>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6 d-flex align-items-stretch">
                        <div class="member" data-aos="fade-up" data-aos-delay="200">
                            <div class="member-img">
                                <img src="assets/img/doctors/doctors-2.jpg" class="img-fluid" alt="">
                            </div>
                            <div class="member-info">
                                <h4>Sarah Jhonson</h4>
                                <span>Anesthesiologist</span>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6 d-flex align-items-stretch">
                        <div class="member" data-aos="fade-up" data-aos-delay="300">
                            <div class="member-img">
                                <img src="assets/img/doctors/doctors-3.jpg" class="img-fluid" alt="">
                            </div>
                            <div class="member-info">
                                <h4>William Anderson</h4>
                                <span>Cardiology</span>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6 d-flex align-items-stretch">
                        <div class="member" data-aos="fade-up" data-aos-delay="400">
                            <div class="member-img">
                                <img src="assets/img/doctors/doctors-4.jpg" class="img-fluid" alt="">
                            </div>
                            <div class="member-info">
                                <h4>Amanda Jepson</h4>
                                <span>Neurosurgeon</span>
                            </div>
                        </div>
                    </div>

                </div>

                <!-- Tombol Selengkapnya -->
                <div class="text-center mt-4">
                    <a href="{{ route('jadwal-dokter') }}" class="btn btn-primary px-4 py-2 rounded-pill">
                        Jadwal Dokter
                    </a>
                </div>

            </div>
        </section>
        <!-- End Doctors Section -->



        <!-- ======= Pricing Section ======= -->
        @include('public.pricing')
        <!-- End Pricing Section -->

        <!-- ======= Frequently Asked Questioins Section ======= -->
        @include('public.faq')
        <!-- End Frequently Asked Questioins Section -->

        <!--Contact Section-->
        @include('public.contact')
        <!--End Contact Section-->

    </main>
    <!-- End #main -->

    @include('public.footer')

    <div id="preloader"></div>


    <!-- Vendor JS Files -->
    <script src="{{ asset('assets/vendor/purecounter/purecounter_vanilla.js') }}"></script>
    <script src="{{ asset('assets/vendor/aos/aos.js') }}"></script>
    <script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/glightbox/js/glightbox.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/swiper/swiper-bundle.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/php-email-form/validate.js') }}"></script>

    <!-- Template Main JS File -->
    <script src="{{ asset('assets/js/main.js') }}"></script>

</body>

</html>
