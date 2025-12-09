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
                <div class="carousel-item active"
                    style="background-image:url({{ asset('assets/img/rssarkies/wasd.jpg') }})">
                </div>

                <!-- Slide 2 -->
                <div class="carousel-item"
                    style="background-image:url({{ asset('assets/img/rssarkies/dr_ari.jpeg') }})">
                </div>

                <!-- Slide 3 -->
                <div class="carousel-item"
                    style="background-image:url({{ asset('assets/img/rssarkies/IMG_5548.jpg') }})">
                </div>

                <!-- Slide 4 -->
                <div class="carousel-item"
                    style="background-image:url({{ asset('assets/img/rssarkies/berlima.jpg') }})">
                </div>


            </div>

        </div>
    </section><!-- End Hero -->

    @include('public.popup-dokter')
    
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

        <!-- Header: Judul & Deskripsi (center) -->
        <div class="row justify-content-center text-center">
        <div class="col-lg-10 col-xl-9">
            <h2 class="fw-bold mb-3 text-dark">Rumah Sakit Sarkies 'Aisyiyah Kudus</h2>
            <p class="text-muted mb-0">
            Rumah Sakit Sarkies 'Aisyiyah Kudus merupakan pusat kesehatan modern dan
            Rumah Sakit swasta terbesar di area Kudus. Berlokasi di kawasan Purwosari di
            Jl. Mas Sirin No. 79 Kudus. Dengan tenaga medis yang berpengalaman dan
            fasilitas yang lengkap, kami siap memberikan pelayanan 24 jam.
            </p>
        </div>
        </div>

        <!-- Content: 2 kolom -->
        <div class="row align-items-start g-4 mt-4">
        <!-- Gambar kiri -->
        <div class="col-lg-6" data-aos="fade-right">
            <img src="{{ asset('assets/img/rssarkies/wasd.jpg') }}"
                class="img-fluid rounded-3 shadow-lg" alt="Gedung Rumah Sakit">
        </div>

        <!-- Visi, Misi, Motto kanan -->
        <div class="col-lg-6" data-aos="fade-left">
            <!-- Visi -->
            <h5 class="mt-2 fw-semibold text-primary">Visi</h5>
            <p class="text-muted mb-3">
            Terwujudnya Rumah Sakit Pilihan Masyarakat dengan Layanan Profesional, Modern,
            dan Berbasis Nilai ke-Islam-an dan ke Muhammadiyah-an.
            </p>

            <!-- Misi -->
            <h5 class="fw-semibold text-primary">Misi</h5>
            <ul class="list-unstyled text-muted mb-3">
            <li class="mission-item d-flex align-items-center gap-3 mb-2">
                <i class="bi bi-check-circle-fill text-primary fs-4 flex-shrink-0"></i>
                <span>Mengembangkan layanan prima yang fokus pada kebutuhan pasien dengan
                didukung teknologi tepat guna sesuai standar pelayanan.</span>
            </li>
            <li class="mission-item d-flex align-items-center gap-3 mb-2">
                <i class="bi bi-check-circle-fill text-primary fs-4 flex-shrink-0"></i>
                <span>Membangun Sumber Daya Insani yang terampil, profesional, dan kompeten
                berdasar nilai budaya Islami dengan berorientasi pada pelayanan konsumen.</span>
            </li>
            <li class="mission-item d-flex align-items-center gap-3">
                <i class="bi bi-check-circle-fill text-primary fs-4 flex-shrink-0"></i>
                <span>Mewujudkan layanan yang premium, modern, syariah dengan memperhatikan
                kesejahteraan seluruh shareholder dan stakeholder.</span>
            </li>
            </ul>

            <!-- Motto -->
            <h5 class="fw-semibold text-primary">Motto</h5>
            <p class="text-muted mb-0">The Ultimate Islamic Healthcare</p>
        </div>
        </div>
    </div>
    </section>
    <!-- End About Us Section -->



    <main id="main">

        {{-- Center of Excellence --}}
        <section class="section-bg py-5">
        <div class="container" data-aos="fade-up">
            <!-- Header -->
            <div class="d-flex justify-content-between align-items-center mb-4 flex-wrap">
            <div>
                <h2 class="fw-bold" style="color: #2A2536;">Center of Excellence</h2>
                <p class="text-muted mb-0">Telusuri lebih lanjut berbagai informasi seputar layanan kami, di sini.</p>

            <!-- Cards: dibuat horizontal scroll, isi card TIDAK diubah -->
            <div class="row g-4 flex-nowrap overflow-auto mx-0 px-2" id="coeTrack">
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

            <!-- Card 4 -->
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

            <!-- Card 5 -->
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

            <!-- Card 6 -->
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

            <!-- NAV PANAH (bawah kiri) -->
            <div class="coe-nav d-flex align-items-center gap-3 mt-3">
            <button class="coe-btn" id="coePrev" type="button" aria-label="Sebelumnya">
                <i class="bi bi-arrow-left"></i>
            </button>
            <button class="coe-btn" id="coeNext" type="button" aria-label="Berikutnya">
                <i class="bi bi-arrow-right"></i>
            </button>
            </div>
        </div>

        <!-- Styles khusus panah & track -->
        <style>
            /* Track horizontal: rapat, snap per kolom, sembunyikan scrollbar di iOS */
            #coeTrack{
            scroll-snap-type: x mandatory;
            -webkit-overflow-scrolling: touch;
            padding-bottom: 8px; /* beri ruang untuk nav */
            -ms-overflow-style: none;     /* IE/Edge */
            scrollbar-width: none;
            }

            #coeTrack::-webkit-scrollbar {  /* Chrome/Safari */
                display: none;
                height: 0;
            }
            /* Setiap kolom snap ke kiri saat berhenti scroll */
            #coeTrack > [class*="col-"]{ scroll-snap-align: start; flex: 0 0 auto; }

            /* Tombol panah: lingkaran outline seperti contoh */
            .coe-btn{
            width:56px; height:56px; border-radius:50%;
            border:2px solid #e8e8e8; background:#fff;
            display:inline-flex; align-items:center; justify-content:center;
            transition: box-shadow .2s ease, transform .1s ease, border-color .2s ease;
            }
            .coe-btn i{ font-size:22px; line-height:1; }
            .coe-btn:hover{ border-color:#dcdcdc; box-shadow:0 2px 8px rgba(0,0,0,.06); }
            .coe-btn:active{ transform: scale(.98); }
            .coe-btn:disabled{ opacity:.4; pointer-events:none; }
        </style>

        <!-- Script navigasi geser -->
        <script>
        (function(){
            const list = document.getElementById('coeTrack');
            const prev = document.getElementById('coePrev');
            const next = document.getElementById('coeNext');
            if(!list || !prev || !next) return;

            function stepSize(){
            // lebar satu kolom (sudah termasuk padding/gutter)
            const col = list.querySelector('[class*="col-"]');
            if (col) return Math.round(col.getBoundingClientRect().width);
            return Math.round(list.clientWidth * 0.8);
            }

            function updateBtns(){
            const max = list.scrollWidth - list.clientWidth - 1; // toleransi
            prev.disabled = list.scrollLeft <= 0;
            next.disabled = list.scrollLeft >= max;
            }

            prev.addEventListener('click', () => {
            list.scrollBy({left: -stepSize(), behavior:'smooth'});
            });
            next.addEventListener('click', () => {
            list.scrollBy({left:  stepSize(), behavior:'smooth'});
            });

            list.addEventListener('scroll', updateBtns, {passive:true});
            window.addEventListener('resize', updateBtns);
            updateBtns();
        })();
        </script>
        </section>
        {{-- End Center of Excellence --}}


        <!-- ======= Pricing Section ======= -->
        @include('public.pricing')
        <!-- End Pricing Section -->

        {{-- ============ FASILITAS & LAYANAN (Bootstrap, mobile: gambar → panah → card) ============ --}}
        @php
        $placeholder = asset('assets/img/placeholder-800x520.png');

        if (!function_exists('ph_boot')){
            function ph_boot($relOrUrl, $fallback){
            if (\Illuminate\Support\Str::startsWith($relOrUrl, ['http://','https://'])) return $relOrUrl;
            $full = public_path($relOrUrl);
            return file_exists($full) ? asset($relOrUrl) : $fallback;
            }
        }

        $fasilitas = [
            ['title'=>'Diagnostic Center','desc'=>'Layanan endoskopi, laboratorium, dan radiologi dengan peralatan modern.','img'=>ph_boot('images/diagnostic.jpg', $placeholder)],
            ['title'=>'Healthy Corner','desc'=>'Fitness zone, wellness studio, convention hall, coffee & bakery, snack corner, dan care mart.','img'=>ph_boot('images/intensive.jpg', $placeholder)],
            ['title'=>'Intensive Care','desc'=>'Perawatan intensif dengan monitoring 24 jam untuk pasien kritis.','img'=>ph_boot('images/intensive.jpg', $placeholder)],
            ['title'=>'Rehabilitasi Medik & Fisioterapi','desc'=>'Program pemulihan fisik pasca cedera/operasi oleh tenaga profesional.','img'=>ph_boot('images/rehab.jpg', $placeholder)],
            ['title'=>'Farmasi','desc'=>'Layanan obat, tebus resep, serta konsultasi farmasi.','img'=>ph_boot('images/farmasi.jpg', $placeholder)],
            ['title'=>'Emergency','desc'=>'Layanan gawat darurat 24 jam dengan respon cepat.','img'=>ph_boot('images/emergency.jpg', $placeholder)],
        ];
        @endphp

        <style>
        .cards-track{
            overflow-x:auto; overflow-y:visible; gap:1rem; padding:0;
            scroll-snap-type:x mandatory; -ms-overflow-style:none; scrollbar-width:none; overscroll-behavior-x:contain;
        }
        .cards-track::-webkit-scrollbar{display:none;height:0}

        .card-item{min-width:260px; scroll-snap-align:start; transition:background-color .2s,color .2s,border-color .2s; border:1px solid #e5e7eb; box-shadow:none}
        .card-item:hover{box-shadow:none}
        .card-item.card-active{background:#2563eb; color:#fff; border-color:#2563eb}
        .card-item.card-active h6{color:#fff!important}
        .card-item.card-active p{color:#eef2ff!important}

        .img-wrap{border-radius:1rem; overflow:hidden; background:#fff}
        .img-cover{object-fit:cover; width:100%; height:100%; max-height:420px}
        @media (max-width: 991.98px){ .img-cover{max-height:340px} }

        .line-2{-webkit-line-clamp:2; display:-webkit-box; -webkit-box-orient:vertical; overflow:hidden}
        .line-3{-webkit-line-clamp:3; display:-webkit-box; -webkit-box-orient:vertical; overflow:hidden}

        .btn-round{width:2.25rem; height:2.25rem; border-radius:999px}
        </style>

        <section class="py-5">
        <div class="container" data-aos="fade-up">
            <div class="row g-4 align-items-stretch">
            {{-- DESKTOP IMAGE (hidden on mobile) --}}
            <div class="col-lg-6 d-none d-lg-flex">
                <div class="img-wrap flex-fill position-relative">
                <img id="fac-img-d" src="{{ $fasilitas[0]['img'] }}" alt="{{ $fasilitas[0]['title'] }}" class="img-cover"
                    onerror="this.onerror=null;this.src='{{ $placeholder }}';">
                <div class="position-absolute bottom-0 start-0 p-3 d-flex gap-2">
                    <span class="badge text-bg-light fw-semibold">Fasilitas</span>
                    <span id="fac-chip-d" class="badge text-bg-light fw-semibold">{{ $fasilitas[0]['title'] }}</span>
                </div>
                </div>
            </div>

            {{-- RIGHT: Title + (MOBILE IMAGE) → Arrows → Cards --}}
            <div class="col-lg-6 d-flex flex-column">
                <div>
                <h2 class="fw-bold display-6 mb-2">Fasilitas dan Layanan</h2>
                <p class="text-body-secondary mb-0">
                    Menyediakan pelayanan kesehatan terdepan yang terintegrasi dengan dukungan tenaga medis profesional,
                    adopsi teknologi medis terkini, serta sistem informasi digital yang lebih efisien.
                </p>
                </div>

                {{-- MOBILE IMAGE (gambar dulu) --}}
                <div class="d-lg-none mt-3">
                <div class="img-wrap position-relative">
                    <img id="fac-img-m" src="{{ $fasilitas[0]['img'] }}" alt="{{ $fasilitas[0]['title'] }}" class="img-cover"
                        onerror="this.onerror=null;this.src='{{ $placeholder }}';">
                    <div class="position-absolute bottom-0 start-0 p-2 d-flex gap-2">
                    <span class="badge text-bg-light fw-semibold">Fasilitas</span>
                    <span id="fac-chip-m" class="badge text-bg-light fw-semibold">{{ $fasilitas[0]['title'] }}</span>
                    </div>
                </div>
                </div>

                {{-- Panah setelah gambar --}}
                <div class="d-flex justify-content-end mt-3 mb-2 gap-2">
                <button type="button" class="btn btn-light shadow-sm btn-round" id="facPrev" aria-label="Sebelumnya">
                    <i class="bi bi-chevron-left"></i>
                </button>
                <button type="button" class="btn btn-light shadow-sm btn-round" id="facNext" aria-label="Berikutnya">
                    <i class="bi bi-chevron-right"></i>
                </button>
                </div>

                {{-- Cards --}}
                <div class="position-relative">
                <div id="cardsTrack" class="d-flex cards-track">
                    @foreach($fasilitas as $i => $it)
                    <button
                        type="button"
                        class="card card-item rounded-4 p-3 text-start @if($i===0) card-active @endif"
                        data-img="{{ $it['img'] }}"
                        data-title="{{ $it['title'] }}"
                        data-desc="{{ $it['desc'] }}"
                    >
                        <h6 class="fw-semibold mb-1 line-2">{{ $it['title'] }}</h6>
                        <p class="small text-body-secondary mb-0 line-3">{{ $it['desc'] }}</p>
                    </button>
                    @endforeach
                </div>
                </div>
            </div>
            </div>
        </div>
        </section>

        <script>
        (function(){
        const track = document.getElementById('cardsTrack');
        const cards = Array.from(track.querySelectorAll('.card-item'));
        const imgD  = document.getElementById('fac-img-d');
        const chipD = document.getElementById('fac-chip-d');
        const imgM  = document.getElementById('fac-img-m');
        const chipM = document.getElementById('fac-chip-m');

        // Disable manual scrolling (arrows only)
        track.addEventListener('wheel', (e)=>{ e.preventDefault(); }, {passive:false});
        let touching=false;
        track.addEventListener('touchstart', ()=> touching=true, {passive:true});
        track.addEventListener('touchmove',  (e)=>{ if(touching){ e.preventDefault(); } }, {passive:false});
        track.addEventListener('touchend',   ()=> touching=false, {passive:true});

        function updateImages(title, src){
            if (imgD){ imgD.src = src; imgD.alt = title; }
            if (chipD){ chipD.textContent = title; }
            if (imgM){ imgM.src = src; imgM.alt = title; }
            if (chipM){ chipM.textContent = title; }
        }

        function setActive(card){
            cards.forEach(c => c.classList.remove('card-active'));
            card.classList.add('card-active');

            const title = card.dataset.title;
            const src   = card.dataset.img;

            updateImages(title, src);
            centerCard(card);
        }

        // Center selected card in the track viewport
        function centerCard(card){
            const style   = window.getComputedStyle(track);
            const padLeft = parseInt(style.paddingLeft || 0, 10);
            const padRight= parseInt(style.paddingRight || 0, 10);
            const viewport = track.clientWidth - padLeft - padRight;
            const target   = card.offsetLeft - padLeft - (viewport - card.offsetWidth)/2;

            const maxScroll = track.scrollWidth - track.clientWidth;
            track.scrollTo({ left: Math.max(0, Math.min(target, maxScroll)), behavior: 'smooth' });
        }

        cards.forEach(c => c.addEventListener('click', () => setActive(c)));

        // Arrows scroll by one card width
        const step = () => (cards[0]?.offsetWidth || 280) + 16;
        document.getElementById('facPrev').addEventListener('click', () => {
            track.scrollBy({ left: -step(), behavior: 'smooth' });
        });
        document.getElementById('facNext').addEventListener('click', () => {
            track.scrollBy({ left:  step(), behavior: 'smooth' });
        });
        })();
        </script>
        {{-- ========================= /FASILITAS & LAYANAN ========================= --}}


        <!-- START: Berita & Artikel (horizontal slider + panah) -->
        <section class="section-bg">
        <div class="container mt-5" data-aos="fade-up">
            <!-- Header -->
            <div class="d-flex justify-content-between align-items-center mb-4 flex-wrap">
            <div>
                <h2 class="fw-bold" style="color:#2A2536;">Berita dan Artikel Kesehatan</h2>
                <p class="text-muted mb-0">Informasi terkini dan tips kesehatan terpercaya untuk Anda dan keluarga.</p>
            </div>

            @php
            $articles = [
                ['title'=>'Waspadai Serangan Jantung!','date'=>'28 Juli 2025','excerpt'=>'Serangan jantung bisa datang tiba-tiba…','img'=>asset('assets/img/news/jantung.jpg'),'url'=>'#'],
                ['title'=>'Apakah Ambeien Bisa Sembuh?','date'=>'28 Juli 2025','excerpt'=>'Ambeien merupakan kondisi…','img'=>asset('assets/img/news/ambeien.jpg'),'url'=>'#'],
                ['title'=>'ISK pada Ibu Hamil Bisa Sembuh?','date'=>'8 Agustus 2025','excerpt'=>'ISK pada ibu hamil bisa diatasi…','img'=>asset('assets/img/news/isk.jpg'),'url'=>'#'],
                ['title'=>'Tips Pola Hidup Sehat Cegah Diabetes','date'=>'1 Agustus 2025','excerpt'=>'Diabetes dapat dicegah dengan…','img'=>asset('assets/img/news/diabetes.jpg'),'url'=>'#'],
            ];
            @endphp

            <!-- Track horizontal -->
            <div class="row g-4 flex-nowrap overflow-auto mx-0 px-2" id="newsTrack" role="region" aria-label="Daftar Berita & Artikel">
            @foreach($articles as $article)
                <div class="col-lg-4 col-md-6">
                <div class="card h-100 shadow-sm border-0">
                    <img src="{{ $article['img'] }}" class="card-img-top" alt="{{ $article['title'] }}">
                    <div class="card-body">
                    <h5 class="card-title fw-bold">{{ $article['title'] }}</h5>
                    <p class="card-text text-muted mb-1"><small>{{ $article['date'] }}</small></p>
                    <p class="card-text small text-muted">{{ $article['excerpt'] }}</p>
                    <a href="{{ $article['url'] }}" class="fw-semibold" style="color:#1E88E5; text-decoration:none;">Baca Selengkapnya</a>
                    </div>
                </div>
                </div>
            @endforeach
            {{-- tambahkan artikel lain bila perlu, otomatis ikut slider --}}
            </div>

            <!-- Panah navigasi -->
            <div class="news-nav d-flex align-items-center gap-3 mt-3">
            <button class="news-btn" id="newsPrev" type="button" aria-label="Sebelumnya">
                <i class="bi bi-arrow-left"></i>
            </button>
            <button class="news-btn" id="newsNext" type="button" aria-label="Berikutnya">
                <i class="bi bi-arrow-right"></i>
            </button>
            </div>
        </div>

        <!-- Styles khusus -->
        <style>
            /* Track horizontal + hide scrollbar */
            #newsTrack{
            scroll-snap-type: x mandatory;
            -webkit-overflow-scrolling: touch;
            padding-bottom: 8px;
            -ms-overflow-style: none;   /* IE/Edge */
            scrollbar-width: none;      /* Firefox  */
            }
            #newsTrack::-webkit-scrollbar{ display:none; height:0; } /* Chrome/Safari */
            #newsTrack > [class*="col-"]{ flex:0 0 auto; scroll-snap-align:start; }

            /* Samakan proporsi gambar agar rapi */
            #newsTrack .card-img-top{ aspect-ratio:16/9; object-fit:cover; }

            /* Tombol panah lingkaran */
            .news-btn{
            width:56px; height:56px; border-radius:50%;
            border:2px solid #e8e8e8; background:#fff;
            display:inline-flex; align-items:center; justify-content:center;
            transition: box-shadow .2s ease, transform .1s ease, border-color .2s ease;
            }
            .news-btn i{ font-size:22px; line-height:1; }
            .news-btn:hover{ border-color:#dcdcdc; box-shadow:0 2px 8px rgba(0,0,0,.06); }
            .news-btn:active{ transform:scale(.98); }
            .news-btn:disabled{ opacity:.4; pointer-events:none; }
        </style>

        <!-- Script panah -->
        <script>
            (function(){
            const track = document.getElementById('newsTrack');
            const prev  = document.getElementById('newsPrev');
            const next  = document.getElementById('newsNext');
            if(!track || !prev || !next) return;

            function stepSize(){
                const col = track.querySelector('[class*="col-"]');
                return col ? Math.round(col.getBoundingClientRect().width) : Math.round(track.clientWidth * 0.8);
            }
            function updateBtns(){
                const max = track.scrollWidth - track.clientWidth - 1;
                prev.disabled = track.scrollLeft <= 0;
                next.disabled = track.scrollLeft >= max;
            }

            prev.addEventListener('click', ()=> track.scrollBy({ left: -stepSize(), behavior:'smooth' }));
            next.addEventListener('click', ()=> track.scrollBy({ left:  stepSize(), behavior:'smooth' }));
            track.addEventListener('scroll', updateBtns, { passive:true });
            window.addEventListener('resize', updateBtns);
            updateBtns();
            })();
        </script>
        </section>
        <!-- END: Berita & Artikel -->


        <!-- ======= Counts Section ======= -->
        <section id="counts" class="counts" style="background-color: #ffffff;">
            <div class="container" data-aos="fade-up">

                <div class="section-title">
                    <h2>Profil</h2>
                    <p>Rumah Sakit Sarkies ‘Aisyiyah Kudus menghadirkan layanan kesehatan profesional dengan fasilitas modern dan terpercaya.</p>
                </div>
                <div class="row no-gutters">

                    <div class="col-lg-3 col-md-6 d-md-flex align-items-md-stretch">
                        <div class="count-box">
                            <i class="far fa-hospital"></i>
                            <span data-purecounter-start="0" data-purecounter-end="26" data-purecounter-duration="1"
                                class="purecounter"></span>
                            <p><strong>Fasilitas</strong> Menyediakan fasilitas pelayanan kesehatan yang lengkap dan terintegrasi untuk menunjang kebutuhan pasien dan keluarga.</p>
                            <a href="{{ route('fasilitas') }}">Lihat Detail &raquo;</a>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6 d-md-flex align-items-md-stretch">
                        <div class="count-box">
                            <i class="fas fa-bed"></i>
                            <span data-purecounter-start="0" data-purecounter-end="14" data-purecounter-duration="1"
                                class="purecounter"></span>
                            <p><strong>Kamar</strong> Pilihan kamar rawat inap yang nyaman dan representatif dengan berbagai kelas sesuai kebutuhan.</p>
                            <a href="{{ route('kamar') }}">Lihat Detail &raquo;</a>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6 d-md-flex align-items-md-stretch">
                        <div class="count-box">
                            <i class="fas fa-award"></i>
                            <span data-purecounter-start="0" data-purecounter-end="150" data-purecounter-duration="1"
                                class="purecounter"></span>
                            <p><strong>Penghargaan</strong> Berbagai penghargaan telah diraih sebagai bentuk pengakuan atas mutu pelayanan serta komitmen terhadap keselamatan pasien.</p>
                            <a href="{{ route('awards') }}">Lihat Detail &raquo;</a>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6 d-md-flex align-items-md-stretch">
                        <div class="count-box">
                            <i class="fas fa-award"></i>
                            <span data-purecounter-start="0" data-purecounter-end="85" data-purecounter-duration="1"
                                class="purecounter"></span>

                            <p><strong>Asuransi Mitra</strong> Bekerja sama dengan puluhan perusahaan asuransi rekanan demi mempermudah akses pelayanan kesehatan bagi masyarakat.</p>
                            <a href="{{ route('asuransi') }}">Lihat Detail &raquo;</a>
                        </div>
                    </div>

                </div>

            </div>
        </section><!-- End Counts Section -->



        <!-- ======= Doctors Section ======= -->
        <section id="doctors" class="doctors section-bg">
            <div class="container" data-aos="fade-up">

                <div class="section-title">
                    <h2>Dokter Favorit</h2>
                    <p>Tenaga medis profesional dan berpengalaman yang siap memberikan pelayanan kesehatan terbaik bagi pasien.</p>
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

        <!-- ======= Frequently Asked Questioins Section ======= -->
        @include('public.faq')
        <!-- End Frequently Asked Questioins Section -->

        <!--Contact Section-->
        @include('public.contact')
        <!--End Contact Section-->

        <!-- ======= App Promo: Reservasi Online ======= -->
        <section id="mobile-app" class="mobile-app section-bg">
        <div class="container position-relative">
            <div class="row align-items-center g-5">
            <!-- LEFT -->
            <div class="col-lg-7">
                <div class="eyebrow d-inline-flex align-items-center mb-3">
                <i class="bi bi-phone me-2"></i> RS Sarkies Mobile
                </div>

                <h2 class="display-5 fw-bold lh-1 mb-3">
                Akses Pelayanan Kami<br class="d-none d-xl-block"> Dari Ponsel Anda
                </h2>

                <!-- deskripsi normal (bukan feature-list) -->
                <p class="list-unstyled mb-4">
                <strong>RS Sarkies Mobile</strong> memudahkan <strong>reservasi dokter secara online</strong>—lebih cepat tanpa antre.
                Pilih rumah sakit/poli/dokter, tentukan jadwal, dapatkan <strong>e-ticket/QR</strong>, lalu datang sesuai waktu yang Anda pilih.
                </p>

                <ul class="feature-list list-unstyled mb-4">
                <li class="feature">
                    <span class="feature-icon"><i class="bi bi-calendar-check"></i></span>
                    <span>Reservasi kapan saja, dari mana saja</span>
                </li>
                <li class="feature">
                    <span class="feature-icon"><i class="bi bi-clipboard2-check"></i></span>
                    <span>Pilih RS, poli, dan dokter sesuai kebutuhan</span>
                </li>
                <li class="feature">
                    <span class="feature-icon"><i class="bi bi-qr-code"></i></span>
                    <span>E-ticket/QR untuk pendaftaran cepat di lokasi</span>
                </li>
                </ul>

                <div class="d-flex flex-wrap align-items-center gap-3">
                <a href="https://play.google.com/store/apps/details?id=com.er.rs_sarkieskudus" target="_blank" rel="noopener" aria-label="Unduh di Google Play">
                    <img src="{{ asset('assets/img/badges/google-play-badge.png') }}" alt="Get it on Google Play" class="store-badge" loading="lazy">
                </a>
                <a href="https://apps.apple.com/app/idYOUR_APP_ID" target="_blank" rel="noopener" aria-label="Unduh di App Store">
                    <img src="{{ asset('assets/img/badges/app-store-badge.png') }}" alt="Download on the App Store" class="store-badge" loading="lazy">
                </a>
                </div>

                <p class="text-muted small mt-3 mb-0">
                Gratis • Resmi RS Sarkies • Data Anda terlindungi
                </p>
            </div>

            <!-- RIGHT -->
            <div class="col-lg-5">
                <div class="card steps-card border-0 shadow-sm">
                <div class="card-body p-4 p-lg-5">
                    <h5 class="fw-semibold mb-3">Reservasi Online dalam 3 Langkah</h5>
                    <ol class="mb-4 ps-3">
                    <li>Pilih RS/Poli/Dokter</li>
                    <li>Tentukan tanggal & jam</li>
                    <li>Terima e-ticket/QR dan datang sesuai jadwal</li>
                    </ol>
                    <div class="d-flex align-items-start gap-2 text-primary">
                    <i class="bi bi-shield-check fs-5 lh-1"></i>
                    <span>Terintegrasi dengan sistem pendaftaran rumah sakit</span>
                    </div>
                </div>
                </div>
            </div>
            </div>
        </div>

        <!-- dekorasi halus -->
        <span class="blob blob-1"></span>
        <span class="blob blob-2 d-none d-md-block"></span>
        </section>

        <style>
        /* ====== THEME: BIRU ====== */
        :root{
            --brand:#0d6efd;              /* biru utama */
            --brand-ink:#0a58ca;          /* biru gelap */
            --ink:#1d2733;
            --muted:#6c7a86;
            --chip-bg:rgba(13,110,253,.06);
            --chip-br:rgba(13,110,253,.18);
        }

        .app-section{
            background:
            radial-gradient(900px 500px at 90% 10%, rgba(13,110,253,.07), transparent 60%),
            linear-gradient(180deg, #f5f8ff 0%, #ffffff 30%);
        }

        .eyebrow{
            font-weight:600; font-size:.95rem; color:var(--brand-ink);
            padding:.35rem .75rem; border-radius:999px; background:rgba(13,110,253,.12);
        }
        .app-section h2{ color:var(--ink); }

        /* ==== FEATURE CHIPS: diperkecil ==== */
        .feature-list .feature{
            display:flex; align-items:center; gap:.5rem;
            background:var(--chip-bg);
            border:1px solid var(--chip-br);
            padding:.5rem .75rem;              /* ↓ lebih kecil */
            border-radius:12px;                 /* ↓ sudut lebih kecil */
            margin-bottom:.5rem;
            font-size:.98rem;                   /* ↓ teks lebih kecil */
            line-height:1.35;
        }
        .feature-icon{
            width:32px; height:32px;           /* ↓ ikon lebih kecil */
            border-radius:8px;
            display:grid; place-items:center;
            background:#fff; border:1px solid var(--chip-br);
            color:var(--brand);
        }
        .feature-icon i{ font-size:1rem; }

        /* Steps card accent: biru */
        .steps-card{ border-radius:16px; position:relative; }
        .steps-card::before{
            content:""; position:absolute; left:0; top:0; bottom:0; width:6px;
            border-top-left-radius:16px; border-bottom-left-radius:16px;
            background:linear-gradient(180deg, var(--brand), #5fa8ff);
        }

        /* Store badges lebih compact */
        .store-badge{ height:44px; width:auto; }
        @media (max-width:576px){ .store-badge{ height:40px; } }

        /* Decorative blobs (biru lembut) */
        .blob{
            position:absolute; pointer-events:none; z-index:0; filter:blur(10px);
            opacity:.45; border-radius:50%;
            background:radial-gradient(circle at 30% 30%, rgba(13,110,253,.18), rgba(13,110,253,0));
        }
        .blob-1{ width:320px; height:320px; right:-80px; top:-60px; }
        .blob-2{ width:260px; height:260px; left:-80px; bottom:-60px; }

        .py-lg-6{ padding-top:4.5rem!important; padding-bottom:4.5rem!important; }
        </style>



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
