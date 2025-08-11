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

            <a class="carousel-control-prev" href="#heroCarousel" role="button" data-bs-slide="prev">
                <span class="carousel-control-prev-icon bi bi-chevron-left" aria-hidden="true"></span>
            </a>

            <a class="carousel-control-next" href="#heroCarousel" role="button" data-bs-slide="next">
                <span class="carousel-control-next-icon bi bi-chevron-right" aria-hidden="true"></span>
            </a>

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
                Chatbot RS Dummy
            </div>
            <div id="chatMessages" style="height: 300px; padding: 10px; overflow-y: auto; font-size: 14px;">
                <div><b>Bot:</b> Halo! Ada yang bisa saya bantu?</div>
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
                        <button type="submit" class="btn btn-teal text-white">Cari Dokter</button>
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

        {{-- Center Of Excellent --}}
        {{-- <div class="container">
            <div font-family="Lato" font-size="44px" font-weight="900" color="rgb(42, 37, 54)" id="custom-text"
                class="sc-36578ce2-0 hNejpO">
                <h2 class="fw-bold mb-3">Center of Excellence</h2>
            </div>
            <div class="slider-title flex max-sm:flex-col max-sm:gap-3 sm:justify-between sm:items-center mt-3">
                <div font-family="Lato" font-size="20px" font-weight="400" color="rgb(106, 109, 129)"
                    id="custom-text" class="sc-36578ce2-0 iIfcWw">
                    <p class="subheading-section">Telusuri lebih lanjut berbagai informasi seputar layanan kami, di
                        sini.</p>
                </div><a href="https://www.rspondokindah.co.id/id/center-of-excellence/aesthetic---skin-clinic">
                    <div class="see-all flex sm:items-center">
                        <div font-family="Lato" font-size="16px" font-weight="900" color="rgb(53, 136, 136)"
                            id="custom-text" class="sc-36578ce2-0 hAmyNV">
                            <p class="text-left sm:text-right">Lihat Semua Center of Excellence</p>
                        </div><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none"
                            viewBox="0 0 24 24" alt="arrow-right" class="svg-green ml-2">
                            <path stroke="#130F26" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                d="M19.75 11.726h-15M13.7 5.701l6.05 6.024-6.05 6.025"></path>
                        </svg>
                    </div>
                </a>
            </div>
        </div> --}}
        <div class="container mt-5">
            <h2>Center Of Excellence</h2>
            </span>
            <p style="font-size: 20px">Telusuri lebih lanjut berbagai informasi seputar layanan kami, di sini.</p>
            <span>
                <ul class="cards">
                    <li class="card">
                        <!-- Gambar di atas -->
                        <img src="{{ asset('assets/img/coe/pain-center.jpg') }}" alt="Pain Centre" class="card-img-top">

                        <!-- Konten card -->
                        <div>
                            <h3 class="card-title">Pain Centre</h3>
                            <div class="card-content">
                                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
                            </div>
                        </div>

                        <!-- Link -->
                        <div class="card-link-wrapper">
                            <a href="{{ route('pain-center') }}" class="text-info fw-bold">
                                Baca Selengkapnya →
                            </a>
                        </div>
                    </li>
                    <li class="card">
                        <img src="{{ asset('assets/img/coe/orthopedic-center.jpg') }}" alt="Orthopedic Centre" class="card-img-top">
                        <div>
                            <h3 class="card-title">Orthopedic Centre</h3>
                            <div class="card-content">
                                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ab repudiandae magnam harum
                                    natus fuga et repellat in maiores.</p>
                            </div>
                        </div>
                        <div class="card-link-wrapper">
                            <a href="{{ route('orthopedic-center') }}" class="text-info">Baca Selengkapnya →</a>
                        </div>
                    </li>
                    <li class="card">
                        <img src="{{ asset('assets/img/coe/klinik-kandungan.png') }}" alt="Klinik Kandungan dan Kebidanan" class="card-img-top">
                        <div>
                            <h3 class="card-title">Klinik Kandungan dan Kebidanan</h3>
                            <div class="card-content">
                                <p>Phasellus ultrices lorem vel bibendum ultricies. In hendrerit nulla a ante dapibus
                                    pulvinar eu eget quam.</p>
                            </div>
                        </div>
                        <div class="card-link-wrapper">
                            <a href="{{ route('klinik-kandungan') }}" class="text-info">Baca Selengkapnya →</a>
                        </div>
                    </li>
                    <li class="card">
                        <div>
                            <h3 class="card-title">Service 4</h3>
                            <div class="card-content">
                                <p>Aenean posuere mauris quam, pellentesque auctor mi bibendum nec. Sed scelerisque
                                    lacus
                                    nisi, quis auctor lorem ornare vel.</p>
                            </div>
                        </div>
                        <div class="card-link-wrapper">
                            <a href="">Baca Selengkapnya <span><i class="bi bi-arrow-right"></i></span></a>
                        </div>
                    </li>
                    <li class="card">
                        <div>
                            <h3 class="card-title">Service 5</h3>
                            <div class="card-content">
                                <p>Vestibulum pharetra fringilla felis sit amet tempor. Interdum et malesuada fames ac
                                    ante
                                    ipsum primis in faucibus. Cras et arcu sit amet est consequat feugiat. Nam ut sapien
                                    pulvinar.</p>
                            </div>
                        </div>
                        <div class="card-link-wrapper">
                            <a href="">Baca Selengkapnya <span><i class="bi bi-arrow-right"></i></span></a>
                        </div>
                    </li>
                    <li class="card">
                        <div>
                            <h3 class="card-title">Service 6</h3>
                            <div class="card-content">
                                <p>Donec ut tincidunt nisl. Vivamus eget eros id elit feugiat mollis. Nam sed sem quis
                                    libero finibus tempor.</p>
                            </div>
                        </div>
                        <div class="card-link-wrapper">
                            <a href="">Baca Selengkapnya <span><i class="bi bi-arrow-right"></i></span></a>
                        </div>
                    </li>
                    <li class="card">
                        <div>
                            <h3 class="card-title">Service 7</h3>
                            <div class="card-content">
                                <p>Aliquam eget nisl auctor, sollicitudin ipsum at, dignissim ligula. Donec tincidunt in
                                    elit et pellentesque. Integer posuere metus ac massa mollis euismod.</p>
                            </div>
                        </div>
                        <div class="card-link-wrapper">
                            <a href="">Baca Selengkapnya <span><i class="bi bi-arrow-right"></i></span></a>
                        </div>
                    </li>
                    <li class="card">
                        <div>
                            <h3 class="card-title">Service 8</h3>
                            <div class="card-content">
                                <p> Vivamus eget eros id elit feugiat mollis. Nam sed sem quis libero finibus tempor.
                                </p>
                            </div>
                        </div>
                        <div class="card-link-wrapper">
                            <a href="">Baca Selengkapnya <span><i class="bi bi-arrow-right"></i></span></a>
                        </div>
                    </li>
                    {{-- <li class="card">
                        <div>
                            <h3 class="card-title">Service 9</h3>
                            <div class="card-content">
                                <p>Duis id congue turpis. Donec sodales porta felis, nec ultricies ante. Nam placerat
                                    vitae
                                    metus sit amet tempor. Aliquam ac dictum est.</p>
                            </div>
                        </div>
                        <div class="card-link-wrapper">
                            <a href="" class="card-link">Learn More</a>
                        </div>
                    </li>
                    <li class="card">
                        <div>
                            <h3 class="card-title">Service 10</h3>
                            <div class="card-content">
                                <p>Pellentesque eget eros eget justo efficitur fermentum.</p>
                            </div>
                        </div>
                        <div class="card-link-wrapper">
                            <a href="" class="card-link">Learn More</a>
                        </div>
                    </li>
                    <li class="card">
                        <div>
                            <h3 class="card-title">Service 11</h3>
                            <div class="card-content">
                                <p>Phasellus posuere nec nibh ut tincidunt. Aenean mollis turpis non eros posuere, at
                                    luctus
                                    leo hendrerit. Integer non libero sapien.</p>
                            </div>
                        </div>
                        <div class="card-link-wrapper">
                            <a href="" class="card-link">Learn More</a>
                        </div>
                    </li>
                    <li class="card">
                        <div>
                            <h3 class="card-title">Service 12</h3>
                            <div class="card-content">
                                <p>Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia
                                    curae;
                                    Vestibulum ornare metus ac lectus scelerisque volutpat.</p>
                            </div>
                        </div>
                        <div class="card-link-wrapper">
                            <a href="" class="card-link">Learn More</a>
                        </div>
                    </li> --}}
                </ul>
        </div>
        {{-- End Center Of Excellent --}}

        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Fasilitas & Layanan</title>
            <script src="https://cdn.tailwindcss.com"></script>
            <script src="https://unpkg.com/alpinejs" defer></script>
        </head>
        <body class="bg-gray-50 text-gray-800">

        <div class="container mx-auto py-8 px-4">
            <h1 class="text-3xl font-bold mb-4">Fasilitas dan Layanan</h1>
            <p class="mb-8 text-gray-600">
                Menyediakan pelayanan kesehatan terdepan yang terintegrasi dengan dukungan tenaga medis profesional, 
                adopsi teknologi medis terkini, serta sistem informasi digital yang lebih efisien.
            </p>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                <!-- Left: Accordion -->
                <div class="space-y-4" x-data>
                    @php
                        $fasilitas = [
                            [
                                'title' => 'Diagnostic Center',
                                'desc' => 'Layanan endoskopi, laboratorium, dan radiologi dengan peralatan modern.',
                                'img'  => asset('images/diagnostic.jpg')
                            ],
                            [
                                'title' => 'Intensive Care',
                                'desc' => 'Perawatan intensif dengan monitoring 24 jam untuk pasien kritis.',
                                'img'  => asset('images/intensive.jpg')
                            ],
                            [
                                'title' => 'Rawat Inap',
                                'desc' => 'Kamar rawat inap yang nyaman dan fasilitas lengkap untuk pasien.',
                                'img'  => asset('images/rawat-inap.jpg')
                            ],
                            [
                                'title' => 'Rehabilitasi Medik & Fisioterapi',
                                'desc' => 'Program pemulihan fisik pasca cedera atau operasi.',
                                'img'  => asset('images/rehab.jpg')
                            ],
                            [
                                'title' => 'Farmasi',
                                'desc' => 'Layanan obat dengan resep dokter dan konsultasi farmasi.',
                                'img'  => asset('images/farmasi.jpg')
                            ],
                            [
                                'title' => 'Emergency',
                                'desc' => 'Layanan gawat darurat 24 jam dengan respon cepat.',
                                'img'  => asset('images/emergency.jpg')
                            ],
                        ];
                    @endphp

                    @foreach($fasilitas as $item)
                    <div x-data="{ open: false }" class="border rounded-lg overflow-hidden">
                        <button @click="open = !open; $dispatch('change-image', '{{ $item['img'] }}')" 
                                class="w-full flex justify-between items-center px-4 py-3 bg-gray-100 hover:bg-gray-200">
                            <span class="font-semibold">{{ $item['title'] }}</span>
                            <svg x-show="!open" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                            </svg>
                            <svg x-show="open" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 15l7-7 7 7" />
                            </svg>
                        </button>
                        <div x-show="open" x-collapse class="px-4 py-3 bg-white">
                            <p>{{ $item['desc'] }}</p>
                        </div>
                    </div>
                    @endforeach
                </div>

                <!-- Right: Image -->
                <div x-data="{ image: '{{ $fasilitas[0]['img'] }}' }" 
                    @change-image.window="image = $event.detail" 
                    class="flex items-start justify-center">
                    <img :src="image" alt="Fasilitas Image" class="rounded-lg shadow-lg max-w-full">
                </div>
            </div>
        </div>

        </body>
        </html>

        <!-- START: Carousel Berita & Artikel -->
        <section class="py-5 bg-light">
        <div class="container">
            <div class="d-flex justify-content-between align-items-center mb-4">
            <h2 class="fw-bold">Berita dan Artikel Kesehatan</h2>
            <a href="#" class="text-primary fw-bold">Lihat Semua →</a>
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
                        <a href="{{ $article['url'] }}" class="text-primary fw-bold">Lihat Detail →</a>
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



        <!-- ======= Featured Services Section ======= -->
        <section id="featured-services" class="featured-services">
            <div class="container" data-aos="fade-up">

                <div class="row">
                    <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0">
                        <div class="icon-box" data-aos="fade-up" data-aos-delay="100">
                            <div class="icon"><i class="fas fa-heartbeat"></i></div>
                            <h4 class="title"><a href="">Lorem Ipsum</a></h4>
                            <p class="description">Voluptatum deleniti atque corrupti quos dolores et quas molestias
                                excepturi</p>
                        </div>
                    </div>

                    <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0">
                        <div class="icon-box" data-aos="fade-up" data-aos-delay="200">
                            <div class="icon"><i class="fas fa-pills"></i></div>
                            <h4 class="title"><a href="">Sed ut perspiciatis</a></h4>
                            <p class="description">Duis aute irure dolor in reprehenderit in voluptate velit esse
                                cillum dolore</p>
                        </div>
                    </div>

                    <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0">
                        <div class="icon-box" data-aos="fade-up" data-aos-delay="300">
                            <div class="icon"><i class="fas fa-thermometer"></i></div>
                            <h4 class="title"><a href="">Magni Dolores</a></h4>
                            <p class="description">Excepteur sint occaecat cupidatat non proident, sunt in culpa qui
                                officia</p>
                        </div>
                    </div>

                    <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0">
                        <div class="icon-box" data-aos="fade-up" data-aos-delay="400">
                            <div class="icon"><i class="fas fa-dna"></i></div>
                            <h4 class="title"><a href="">Nemo Enim</a></h4>
                            <p class="description">At vero eos et accusamus et iusto odio dignissimos ducimus qui
                                blanditiis</p>
                        </div>
                    </div>

                </div>

            </div>
        </section><!-- End Featured Services Section -->


        <!-- ======= Counts Section ======= -->
        <section id="counts" class="counts">
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
                            <a href="#">Find out more &raquo;</a>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6 d-md-flex align-items-md-stretch">
                        <div class="count-box">
                            <i class="far fa-hospital"></i>
                            <span data-purecounter-start="0" data-purecounter-end="26" data-purecounter-duration="1"
                                class="purecounter"></span>
                            <p><strong>Fasilitas</strong> adipisci atque cum quia aut numquam delectus</p>
                            <a href="#">Find out more &raquo;</a>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6 d-md-flex align-items-md-stretch">
                        <div class="count-box">
                            <i class="fas fa-flask"></i>
                            <span data-purecounter-start="0" data-purecounter-end="14" data-purecounter-duration="1"
                                class="purecounter"></span>
                            <p><strong>Kamar</strong> aut commodi quaerat. Aliquam ratione</p>
                            <a href="#">Find out more &raquo;</a>
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
        <section id="fasilitas" class="services services">
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
                                    <li><i class="fas fa-check-circle text-success me-2"></i>1 Tempat Tidur Elektrik</li>
                                    <li><i class="fas fa-check-circle text-success me-2"></i>Meja Set Kabinet & Sofa Penunggu</li>
                                    <li><i class="fas fa-check-circle text-success me-2"></i>Kamar Mandi + Water Heater</li>
                                    <li><i class="fas fa-check-circle text-success me-2"></i>AC</li>
                                    <li><i class="fas fa-check-circle text-success me-2"></i>TV 32"</li>
                                    <li><i class="fas fa-check-circle text-success me-2"></i>Kulkas</li>
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
                                    <li><i class="fas fa-check-circle text-success me-2"></i>1 Tempat Tidur Elektrik</li>
                                    <li><i class="fas fa-check-circle text-success me-2"></i>Meja Set Kabinet</li>
                                    <li><i class="fas fa-check-circle text-success me-2"></i>Kamar Mandi + Water Heater</li>
                                    <li><i class="fas fa-check-circle text-success me-2"></i>AC</li>
                                    <li><i class="fas fa-check-circle text-success me-2"></i>TV 29"</li>
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
                                    <li><i class="fas fa-check-circle text-success me-2"></i>2 Tempat Tidur Manual</li>
                                    <li><i class="fas fa-check-circle text-success me-2"></i>Kamar Mandi</li>
                                    <li><i class="fas fa-check-circle text-success me-2"></i>AC</li>
                                    <li><i class="fas fa-check-circle text-success me-2"></i>TV</li>
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
                                    <li><i class="fas fa-check-circle text-success me-2"></i>3 Tempat Tidur Manual</li>
                                    <li><i class="fas fa-check-circle text-success me-2"></i>Kamar Mandi</li>
                                    <li><i class="fas fa-check-circle text-success me-2"></i>Kipas Angin</li>
                                    <li><i class="fas fa-check-circle text-success me-2"></i>TV</li>
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
                                    <li><i class="fas fa-check-circle text-success me-2"></i>4 Tempat Tidur Manual</li>
                                    <li><i class="fas fa-check-circle text-success me-2"></i>Kamar Mandi</li>
                                    <li><i class="fas fa-check-circle text-success me-2"></i>Kipas Angin</li>
                                    <li><i class="fas fa-check-circle text-success me-2"></i>TV</li>
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
                                    <li><i class="fas fa-check-circle text-success me-2"></i>Tempat Tidur Elektrik</li>
                                    <li><i class="fas fa-check-circle text-success me-2"></i>Monitor Pasien</li>
                                    <li><i class="fas fa-check-circle text-success me-2"></i>Ventilator</li>
                                    <li><i class="fas fa-check-circle text-success me-2"></i>AC</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </section>
        <!-- End Fasilitas Rawat Inap Section -->



        <!-- ======= Layanan Pengaduan Section ======= -->
        <section id="pengaduan" class="section-bg py-5">
            <div class="container" data-aos="fade-up">

                <div class="section-title text-center mb-5">
                    <h2 class="fw-bold">Layanan Pengaduan</h2>
                    <p class="text-muted">Kami menghargai setiap masukan Anda untuk menjadi lebih baik.</p>
                </div>

                <div class="row g-4">
                    <!-- Form Keluhan -->
                    <div class="col-lg-6">
                        <div class="card shadow-sm border-0 h-100">
                            <div class="card-body p-4">
                                <h5 class="fw-bold">Sampaikan Saran & Keluhan Anda</h5>
                                <p class="text-muted mb-4">
                                    Kepuasan Anda adalah prioritas kami. Silakan sampaikan masukan, saran, atau keluhan Anda melalui formulir di bawah ini.
                                </p>
                                <form action="forms/pengaduan.php" method="post" class="php-email-form">
                                    <div class="mb-3">
                                        <label for="nama" class="form-label">Nama Lengkap</label>
                                        <input type="text" name="nama" id="nama" class="form-control" placeholder="Nama Anda" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="telepon" class="form-label">Nomor Telepon</label>
                                        <input type="tel" name="telepon" id="telepon" class="form-control" placeholder="Contoh: 081234567890" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="pesan" class="form-label">Keluhan / Saran</label>
                                        <textarea name="pesan" id="pesan" rows="4" class="form-control" placeholder="Tulis keluhan atau saran Anda di sini..." required></textarea>
                                    </div>
                                    <button type="submit" class="btn btn-dark w-100">Kirim Pengaduan</button>
                                </form>
                            </div>
                        </div>
                    </div>

                    <!-- Kontak Langsung -->
                    <div class="col-lg-6">
                        <div class="card shadow-sm border-0 h-100">
                            <div class="card-body p-4">
                                <h5 class="fw-bold">Atau Hubungi Kami Langsung</h5>
                                <p class="text-muted mb-4">
                                    Anda juga bisa menghubungi kami melalui kanal-kanal berikut untuk respons lebih cepat.
                                </p>

                                <div class="d-flex align-items-start mb-4">
                                    <i class="bi bi-telephone-fill text-success fs-3 me-3"></i>
                                    <div>
                                        <strong>Hubungi Kami (Telepon)</strong>
                                        <p class="mb-0">Sampaikan langsung keluhan Anda melalui telepon ke bagian Humas kami.</p>
                                        <a href="tel:02914150501" class="text-success fw-bold">(0291) 4150501</a>
                                    </div>
                                </div>

                                <div class="d-flex align-items-start mb-4">
                                    <i class="bi bi-envelope-fill text-primary fs-3 me-3"></i>
                                    <div>
                                        <strong>Kirim Email</strong>
                                        <p class="mb-0">Jelaskan keluhan Anda secara rinci dan kirimkan ke alamat email kami.</p>
                                        <a href="mailto:𝑟𝑠𝑠𝑎𝑟𝑘𝑖𝑒𝑠.𝑘𝑢@𝑔𝑚𝑎𝑖𝑙.𝑐𝑜𝑚" class="fw-bold">𝑟𝑠𝑠𝑎𝑟𝑘𝑖𝑒𝑠.𝑘𝑢@𝑔𝑚𝑎𝑖𝑙.𝑐𝑜𝑚</a>
                                    </div>
                                </div>

                                <div class="d-flex align-items-start">
                                    <i class="bi bi-geo-alt-fill text-danger fs-3 me-3"></i>
                                    <div>
                                        <strong>Datang Langsung</strong>
                                        <p class="mb-0">Anda juga dapat mengunjungi bagian Humas & Pemasaran kami di rumah sakit untuk menyampaikan masukan secara langsung.</p>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </section>
        <!-- End Layanan Pengaduan Section -->


        <!-- ======= Doctors Section ======= -->
        <section id="doctors" class="doctors section-bg">
            <div class="container" data-aos="fade-up">

                <div class="section-title">
                    <h2>Doctors</h2>
                    <p>Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit
                        sint consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit alias
                        ea. Quia fugiat sit in iste officiis commodi quidem hic quas.</p>
                </div>

                <div class="row">

                    <div class="col-lg-3 col-md-6 d-flex align-items-stretch">
                        <div class="member" data-aos="fade-up" data-aos-delay="100">
                            <div class="member-img">
                                <img src="assets/img/doctors/doctors-1.jpg" class="img-fluid" alt="">
                                <div class="social">
                                    <a href=""><i class="bi bi-twitter"></i></a>
                                    <a href=""><i class="bi bi-facebook"></i></a>
                                    <a href=""><i class="bi bi-instagram"></i></a>
                                    <a href=""><i class="bi bi-linkedin"></i></a>
                                </div>
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
                                <div class="social">
                                    <a href=""><i class="bi bi-twitter"></i></a>
                                    <a href=""><i class="bi bi-facebook"></i></a>
                                    <a href=""><i class="bi bi-instagram"></i></a>
                                    <a href=""><i class="bi bi-linkedin"></i></a>
                                </div>
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
                                <div class="social">
                                    <a href=""><i class="bi bi-twitter"></i></a>
                                    <a href=""><i class="bi bi-facebook"></i></a>
                                    <a href=""><i class="bi bi-instagram"></i></a>
                                    <a href=""><i class="bi bi-linkedin"></i></a>
                                </div>
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
                                <div class="social">
                                    <a href=""><i class="bi bi-twitter"></i></a>
                                    <a href=""><i class="bi bi-facebook"></i></a>
                                    <a href=""><i class="bi bi-instagram"></i></a>
                                    <a href=""><i class="bi bi-linkedin"></i></a>
                                </div>
                            </div>
                            <div class="member-info">
                                <h4>Amanda Jepson</h4>
                                <span>Neurosurgeon</span>
                            </div>
                        </div>
                    </div>

                </div>

            </div>
        </section><!-- End Doctors Section -->


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
    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>


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
