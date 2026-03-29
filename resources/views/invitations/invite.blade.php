<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="google" content="notranslate">
    <title>Silaturahmi Syawalan RS Sarkies 'Aisyiyah Group Kudus</title>
    <meta property="og:image" content="https://akad.in/storage/images/gTCfsARsEaROpYq0qqLNGk4CM3o4hnP9QcSy6jt7.jpg">
    <!-- cdn jquery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <!-- boostrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="icon" href="{{ asset('assets/img/Logo_RSSA.png') }}">


    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin="">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Pacifico&amp;display=swap">
    <link
        href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&amp;family=Great+Vibes&amp;family=Lato:wght@400;700&amp;family=Dancing+Script&amp;=Caveat:wght@500&amp;display=swap"
        rel="stylesheet">
    <style>
        body {
            /* max-width: 375px; Lebar ponsel */
            margin: 0 auto;
            /* Tengah layar */
            font-family: 'Roboto', sans-serif;
            line-height: 1.6;
        }

        h1 {
            font-family: 'Great Vibes', cursive;
        }

        h2 {
            font-family: 'Dancing Script', cursive;
        }

        p {
            font-family: 'Caveat', cursive;
        }

        audio {
            display: none;
        }

        #container {
            height: 180px;
            width: 180px;
            background: rgba(255, 255, 255, 0.8);
            border-radius: 24px;
            position: relative;
            box-shadow: 0 0 20px 0 rgba(0, 0, 0, 0.15);
            transition: 0.5s linear;
        }

        #disc {
            margin-left: 60px;
            margin-right: 20px;
            margin-top: 8px;
            margin-bottom: 20px;
        }

        #card {
            margin-top: 25px;
            margin-left: 25px;
            height: 50px;
            width: 50px;
            opacity: 0.5;
        }

        .scroll-icon {
            position: fixed;
            bottom: 50px;
            left: 50%;
            transform: translateX(-50%);
            cursor: pointer;
            opacity: 1;
            transition: opacity 0.3s ease-in-out, bottom 0.3s ease-in-out;
        }

        .scroll-icon.hidden {
            opacity: 0;
        }

        .swipe-text {
            position: absolute;
            bottom: 15px;
            left: 60%;
            transform: translate(-50%, -50%);
            font-size: 14px;
            opacity: 0;
            animation: moveUpDown 2s infinite;
        }


        @keyframes moveUpDown {

            0%,
            100% {
                transform: translate(-50%, -50%) translateY(-10px);
                opacity: 0;
            }

            50% {
                transform: translate(-50%, -50%) translateY(10px);
                opacity: 1;
            }
        }


        /* The actual timeline (the vertical ruler) */
        .timeline {
            position: relative;
            /* max-width: 1200px; */
            margin: 0 auto;
        }

        /* The actual timeline (the vertical ruler) */
        .timeline::after {
            content: '';
            position: absolute;
            width: 6px;
            background-color: white;
            top: 0;
            bottom: 0;
            left: 50%;
            margin-left: -3px;
        }

        /* Container around content */
        .container-timeline {
            padding: 10px 40px;
            position: relative;
            background-color: inherit;
            width: 50%;
        }

        /* The circles on the timeline */
        .container-timeline::after {
            content: '';
            position: absolute;
            width: 25px;
            height: 25px;
            right: -17px;
            background-color: white;
            border: 4px solid #FF9F55;
            top: 15px;
            border-radius: 50%;
            z-index: 1;
        }

        /* Place the container to the left */
        .left {
            left: 0;
        }

        /* Place the container to the right */
        .right {
            left: 50%;
        }

        /* Add arrows to the left container (pointing right) */
        .left::before {
            content: " ";
            height: 0;
            position: absolute;
            top: 22px;
            width: 0;
            z-index: 1;
            right: 30px;
            border: medium solid white;
            border-width: 10px 0 10px 10px;
            border-color: transparent transparent transparent white;
        }

        /* Add arrows to the right container (pointing left) */
        .right::before {
            content: " ";
            height: 0;
            position: absolute;
            top: 22px;
            width: 0;
            z-index: 1;
            left: 30px;
            border: medium solid white;
            border-width: 10px 10px 10px 0;
            border-color: transparent white transparent transparent;
        }

        /* Fix the circle for containers on the right side */
        .right::after {
            left: -16px;
        }

        /* The actual content */
        .content {
            padding: 20px 30px;
            background-color: white;
            position: relative;
            border-radius: 6px;
        }

        /* Media queries - Responsive timeline on screens less than 600px wide */
        @media screen and (max-width: 600px) {

            /* Place the timelime to the left */
            .timeline::after {
                left: 31px;
            }

            /* Full-width containers */
            .container-timeline {
                width: 100%;
                padding-left: 70px;
                padding-right: 25px;
            }

            /* Make sure that all arrows are pointing leftwards */
            .container-timeline::before {
                left: 60px;
                border: medium solid white;
                border-width: 10px 10px 10px 0;
                border-color: transparent white transparent transparent;
            }

            /* Make sure all circles are at the same spot */
            .left::after,
            .right::after {
                left: 15px;
            }

            /* Make all right containers behave like the left ones */
            .right {
                left: 0%;
            }
        }
    </style>


    <style>
        .full-screen {
            /* background-color: lightblue; */
            height: 100vh;
        }

        .phone-screen {
            background-color: rgb(255, 255, 255);
            height: 100vh;
            /* overflow-y: auto; */
            /* position: relative; */
        }

        .custom-background {
            /* background-image: url('{{ asset('assets/img/rssarkies/Royal_building_UMKU.png') }}'); */
            /* Ganti dengan URL gambar */
            background-color: #44ACFF;
            background-size: cover;
            background-position: center;
            height: 900px;
            /* Menentukan tinggi elemen */
        }


        @media (max-width: 768px) {
            .full-screen {
                display: none;
            }
        }

        .icon-bar {
            display: flex;
            justify-content: space-around;
            /* Untuk meratakan ikon */
            padding: 10px;
            border-radius: 8px;
            /* Sudut membulat */
        }

        .icon {
            text-align: center;
            color: white;
            /* Warna teks */
            text-decoration: none;
            /* Menghilangkan garis bawah pada tautan */
        }

        .icon img {
            width: 20px;
            /* Ukuran ikon */
            height: 20px;
            /* Ukuran ikon */
        }

        .icon:hover {
            opacity: 0.8;
            /* Efek hover */
        }
    </style>

    <!-- google font -->
    <link
        href="https://fonts.googleapis.com/css2?family=Dancing+Script&amp;family=Euphoria+Script&amp;family=Marck+Script&amp;family=Princess+Sofia&amp;family=Rouge+Script&amp;family=Square+Peg&amp;display=swap"
        rel="stylesheet">
    <!-- font awesome -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- CSS -->
    <link rel="stylesheet" type="text/css"
        href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.css">

    <!-- JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">

    <link rel="stylesheet" href="{{ asset('assets/css/invitation.css') }}" type="text/css">
    {{-- <link rel="stylesheet" href="https://akad.in/theme/akadin/tradition/1/css/style.css" type="text/css"> --}}
</head>

<body oncontextmenu="return false">
    <div class="container-fluid">
        <div class="row">
            <!-- Sisi Kiri - Ukuran Penuh (Desktop Only) -->
            <div class="col-md-8 full-screen d-none d-md-block">
                <div class="fixed-top custom-background">
                    <!-- HEADER LOGO -->
                    <div class="text-center py-3">
                        <div class="d-flex justify-content-around align-items-center flex-wrap">

                            <!-- Logo RS Sarkies -->
                            <div class="text-center">
                                <img src="{{ asset('assets/img/Logo_RSSA 2.png') }}" alt="RS Sarkies"
                                    style="height:150px;">
                                {{-- <p class="m-0 fw-bold">RS Sarkies</p> --}}
                            </div>

                            <!-- Logo RS Aisyiyah Group -->
                            <div class="text-center">
                                <img src="{{ asset('assets/img/Logo_Holding_RSA_Group.png') }}" alt="RS Aisyiyah Group"
                                    style="height:70px;">
                                {{-- <p class="m-0 fw-bold">RS Aisyiyah Group</p> --}}
                            </div>

                            <!-- Logo RS Aisyiyah -->
                            <div class="text-center">
                                <img src="{{ asset('assets/img/Logo_RSA.png') }}" alt="RS Aisyiyah"
                                    style="height:150px;">
                                {{-- <p class="m-0 fw-bold">RS Aisyiyah</p> --}}
                            </div>

                        </div>
                    </div>
                    <h1></h1>
                </div>
            </div>

            <!-- Sisi Kanan - Ukuran Layar Smartphone -->
            <div class="col-md-4 phone-screen p-0 m-0">


                <div class="row fixed-bottom" style="display: none" id="icon-bar">

                    <div class="col-md-4 ms-auto px-5" style="margin-bottom: 10px;">
                        <div class="icon-bar text-center btn-color-2 border-color-1">
                            <a href="#intro" class="icon">
                                <i class="fa fa-envelope-open" aria-hidden="true"></i> <!-- Ikon buku terbuka -->
                            </a>
                            <a href="#ayat" class="icon">
                                <i class="fa fa-user-circle" aria-hidden="true"></i> <!-- Ikon album -->
                            </a>
                            <a href="#akad-resepsi" class="icon">
                                <i class="fa fa-calendar" aria-hidden="true"></i> <!-- Ikon waktu -->
                            </a>
                            <a href="#footer" class="icon">
                                <i class="fa fa-book" aria-hidden="true"></i> <!-- Ikon buku tertutup -->
                            </a>
                        </div>
                    </div>
                </div>


                <!-- start -->
                <div class="card fixed-top custom-background mb-4">
                    <!-- HEADER LOGO -->
                    <div class="text-center py-0">
                        <div class="d-flex justify-content-around align-items-center flex-wrap">

                            <!-- Logo RS Sarkies -->
                            <div class="text-center">
                                <img src="{{ asset('assets/img/Logo_RSSA 2.png') }}" alt="RS Sarkies"
                                    style="height:190px;">
                                {{-- <p class="m-0 fw-bold">RS Sarkies</p> --}}
                            </div>

                            <!-- Logo RS Aisyiyah Group -->
                            <div class="text-center">
                                <img src="{{ asset('assets/img/Logo_Holding_RSA_Group.png') }}" alt="RS Aisyiyah Group"
                                    style="height:70px;">
                                {{-- <p class="m-0 fw-bold">RS Aisyiyah Group</p> --}}
                            </div>

                            <!-- Logo RS Aisyiyah -->
                            <div class="text-center">
                                <img src="{{ asset('assets/img/logo_RSA.png') }}" alt="RS Aisyiyah"
                                    style="height:150px;">
                                {{-- <p class="m-0 fw-bold">RS Aisyiyah</p> --}}
                            </div>

                        </div>
                    </div>
                    {{-- <h1></h1> --}}
                </div>
                <div id="card" class="card fixed-top" style="display: none">
                    <audio id="sound" preload="auto">
                        {{-- <source src="https://akad.in/storage/song/urlBagyan Sadewok" type="audio/mp3" preload="auto"> --}}
                        <source src="{{ asset('assets/music/mars aisyiyah.mp3') }}" type="audio/mp3" preload="auto">
                    </audio>
                    <!-- <audio id="sound" src="thismoment.mp3" preload="auto" controls></audio> -->
                    <img id="disc"
                        src="https://i.pinimg.com/originals/76/33/63/763363a3be941b93610d58f8fb54e638.png"
                        alt="" height="35" width="35">
                </div>

                <div class="fixed-top">
                    <div class="output"></div>
                </div>

                <div class="fixed-top mt-5">
                    <div class="text-center">
                        <div class="" id="welcomeMessage" style="height:665px;">
                            <div class="photo-frame" style="text-align: center;">
                                <img class=""
                                    style="margin-top: 55px; height: 212px; width: 132px; border-radius: 60px 60px 0px 0px; overflow: hidden;"
                                    src="{{ asset('assets/img/Logo_Holding_RSA_Group.png') }}">
                            </div>
                            <h2 class="text-white" style="margin-top: 0px">
                                Silaturahmi Syawalan
                            </h2>
                            <h1 class="text-color-1" style="font-size:37px">
                                Keluarga Besar <br> RS 'Aisyiyah Group Kudus
                            </h1>
                            <h2 class="text-white" style="font-size:20px">
                                Kepada Yth, Bapak/Ibu/Saudara/i
                            </h2>
                            <h2 class="text-color-1" style="font-size:25px">
                                Muhammad Abdul Wahab
                            </h2>
                            <p class="text-white">Silakan klik tombol di bawah untuk membuka undangan Pernikahan.</p>
                            <button id="bukaUndangan" class="btn btn-color-2 text-color-1">Buka Undangan</button>
                            <script>
                                document.getElementById("bukaUndangan").onclick = function() {
                                    // Mendapatkan elemen dengan kelas 'fixed-top' dan 'custom-background'
                                    const elements = document.getElementsByClassName('fixed-top custom-background');
                                    const iconbar = document.getElementById('icon-bar');
                                    iconbar.style.display = 'block';
                                    // Menambahkan kelas 'col-md-8' pada setiap elemen yang ditemukan
                                    elements.length = 1;
                                    for (let i = 0; i < elements.length; i++) {
                                        elements[i].classList.add('col-md-8');
                                        elements[i].style.zIndex = '-1';
                                    }
                                };
                            </script>
                        </div>
                    </div>
                </div>

                <div id="intro" class="p-3 text-center m-0">
                    <div id="image-pernikahan" class="photo-frame" style="text-align: center;display:none">
                        <img class=""
                            style="margin-top: 55px; height: 212px; width: 132px; border-radius: 60px 60px 0px 0px; overflow: hidden;"
                            src="{{ asset('assets/img/Logo_Holding_RSA_Group.png') }}">
                    </div>
                    <h2 class="text-white" style="margin-top: 20px;display:none" id="title-pernikahan">
                        Silaturahmi Syawalan
                    </h2>
                    <h1 class="text-color-1" style="font-size:45px;display:none" id="loversname">
                        Keluarga Besar RS 'Aisyiyah Group Kudus
                    </h1>
                    <h2 class="text-white" style="font-size:30px;display:none" id="date-wedding-1">04 . 4 . 2026</h2>
                </div>

                <div style="display:none" id="content-of-main">
                    <link rel="stylesheet"
                        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
                    <div class="scroll-icon text-color-1" id="scrollIcon">
                        <pre class="m-0 p-0 swipe-text">Swipe Up </pre>
                        <i class="fa fa-chevron-down"></i>
                        <i class="fa fa-chevron-down"></i>
                        <i class="fa fa-chevron-down"></i>
                    </div>
                    <script>
                        const scrollIcon = document.getElementById('scrollIcon');

                        scrollIcon.addEventListener('click', () => {
                            // Scroll smoothly to the next section
                            window.scrollBy({
                                top: window.innerHeight,
                                behavior: 'smooth'
                            });

                            // Hide the scroll icon after clicking
                            scrollIcon.style.display = 'none';
                        });

                        // Show the scroll icon when scrolling starts
                        window.addEventListener('scroll', () => {
                            if (window.scrollY > 100) {
                                scrollIcon.style.display = 'none';
                            } else {
                                scrollIcon.style.display = 'block';
                            }
                        });
                    </script>

                    <div id="ayat" class="quote-1 p-3 text-center m-0" style="display:none;">

                        <div id="ayat-container">
                            <div class="">
                                <img class="img-fluid" height="100px" width="100px" style="display:none"
                                    id="dove" src="{{ asset('assets/img/Logo_Holding_RSA_Group.png') }}"
                                    alt="">
                            </div>
                            <h2 id="tanda-1" class="fs-2 my-0 p-0" style="font-size:45px;">
                                Sambutan
                            </h2>
                            <h1 id="tanda-2" class="my-0 p-0" style="font-size:30px;">
                                Direksi dan BOD RS 'Aisyiyah Group Kudus
                            </h1>
                            <p id="tanda-3" style="font-size: 18px;">

                                Alhamdulillah Bulan Suci Ramadhan telah berakhir. Dalam suasana yang damai ini , kami
                                ingin mengundang Bapak/Ibu/Saudara(i) untuk hadir pada acara Halal Bihalal.
                            </p>

                            <div class="mx-3" style="margin-top: 50px;">
                                <div class="row">
                                    <div class="col-md-4  m-0 p-0">
                                        <div class="card text-center shadow-lg bg-body-tertiary rounded"
                                            id="profil-1-photo">
                                            <a data-fancybox="gallery"
                                                href="{{ asset('assets/img/direksi_dan_bod.png') }}">
                                                <img id="foto-profil-1" class="card-img-top img-fluid p-3 pb-5"
                                                    src="{{ asset('assets/img/direksi_dan_bod.png') }}"
                                                    alt="...">
                                            </a>
                                        </div>
                                    </div>

                                    {{-- <div class="col-md-4">
                                        <div class="card-body text-center m-0 p-0">
                                            <h1 class="card-title text-color-1-dark" id="nickname-profil-1"
                                                style="font-size: 40px;margin-top: 125px">Nurul</h1>
                                            <h2 class="card-subtitle fw-bold text-color-2" id="fullname-profil-1"
                                                style="font-size: 30px;margin-left: 0px">Nurul Aulia dewi</h2>
                                            <div class="position-relative mb-3">
                                                <hr id="hr-1"
                                                    class="border border-secondary border-2 opacity-50 position-absolute top-0 start-50 translate-middle-x"
                                                    width="50%">
                                            </div>
                                            <div class="mb-5 mt-0 p-0" id="family-profil-1">

                                                <p class="m-0 p-0" style="font-size:14px;font-weight:bold">
                                                    Putri
                                                    Pertama</p>
                                                <p class="m-0 p-0" style="font-size:18px">Bapak Siswanto<br> &amp;
                                                    <br>Ibu Khalimah
                                                </p>
                                            </div>
                                        </div>
                                    </div> --}}

                                    <!--<div class="col-md-4">-->

                                    <!--</div>-->
                                </div>



                                <div class="row">
                                    {{-- <div class="col-md-4">
                                    </div>
                                    <div class="col-md-4">
                                        <div class="card-body text-center">
                                            <h1 class="card-title  text-color-1-dark" id="nickname-profil-2"
                                                style="font-size: 40px;margin-top: 40px">Munir</h1>
                                            <h2 class="card-subtitle fw-bold text-color-2" id="fullname-profil-2"
                                                style="font-size: 30px;margin-left: 0px">Muhamad As'ad Munir Dzikri
                                            </h2>
                                            <div class="position-relative mb-3">
                                                <hr id="hr-2"
                                                    class="border border-secondary border-2 opacity-50 position-absolute top-0 start-50 translate-middle-x"
                                                    width="50%">
                                            </div>
                                            <div class="mb-5 mt-0 p-0" id="family-profil-2">
                                                <p class="m-0 p-0" style="font-size:14px;font-weight:bold">
                                                    Putra Pertama</p>
                                                <p class="m-0 p-0" style="font-size:18px">Bapak Rofii<br> &amp;
                                                    <br>Ibu Sri Muayanah
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="card text-center mt-5 shadow-lg bg-body-tertiary rounded">
                                            <a data-fancybox="gallery"
                                                href="https://akad.in/storage/1absolut/male.jpg">
                                                <img id="foto-profil-2" class="card-img-top img-fluid p-3 pb-5"
                                                    src="https://akad.in/storage/1absolut/male.jpg" alt="... ">
                                            </a>
                                        </div>
                                    </div> --}}
                                </div>
                            </div>
                        </div>

                    </div>

                    <div id="date_time" class="text-center bg-light">
                        <img id="ring" height="100" width="100" class="img-fluid mt-5"
                            src="https://i.pinimg.com/originals/ea/0d/24/ea0d24db340d1ef7b6eeab58c2881984.png"
                            alt="wedding ring">
                        <h2 class="mb-4 text-color-1" id="waktu-tempat" style="font-size: 35px">Waktu &amp; Tempat
                        </h2>
                        <div id="card-time">
                            <div class="card d-inline-flex background-card" style="width: 5rem;">
                                <div class="card-body">
                                    <div class="m-0 p-0" id="days-card">
                                        <h5 id="days" class="card-title">0-43</h5>
                                        <p class="card-title">Hari</p>
                                    </div>
                                </div>
                            </div>
                            <div class="card d-inline-flex background-card" style="width: 5rem;">
                                <div class="card-body">
                                    <div class="m-0 p-0" id="hours-card">
                                        <h5 id="hours" class="card-title">0-12</h5>
                                        <p class="card-title">Jam</p>
                                    </div>
                                </div>
                            </div>
                            <div class="card d-inline-flex background-card" style="width: 5rem;">
                                <div class="card-body">
                                    <div class="m-0 p-0" id="minutes-card">
                                        <h5 id="minutes" class="card-title">0-19</h5>
                                        <p class="card-title">Menit</p>
                                    </div>
                                </div>
                            </div>
                            <div class="card d-inline-flex background-card" style="width: 5rem;">
                                <div class="card-body">
                                    <div class="m-0 p-0" id="seconds-card">
                                        <h5 id="seconds" class="card-title">0-24</h5>
                                        <p class="card-title">Detik</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{-- <div class="container pb-5" id="ayat-2">
                            <div class="card-body mt-4 card background-card" style="border-radius: 20px;">
                                <p style="font-size: 18px;" class="text-center">"Dan Di Antara Tanda-Tanda
                                    (Kebesaran)-Nya Ialah Dia Menciptakan Pasangan-Pasangan Untukmu Dari Jenismu
                                    Sendiri, Agar Kamu Cenderung Dan Merasa Tenteram Kepadanya, Dan Dia Menjadikan Di
                                    Antaramu Rasa Kasih Dan Sayang. Sesungguhnya Pada Yang Demikian Itu Benar-Benar
                                    Terdapat Tanda-Tanda (Kebesaran Allah) Bagi Kaum Yang Berpikir."</p>
                                <h1 style="font-size: 20px;font-weight: bold" id="ayat-pasangan-1">-
                                    Ar-Rum 21 -</h1>
                            </div>
                        </div> --}}
                    </div>

                    <link rel="preconnect" href="https://fonts.googleapis.com">
                    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin="">
                    <link
                        href="https://fonts.googleapis.com/css2?family=Caveat:wght@500&amp;family=Great+Vibes&amp;display=swap"
                        rel="stylesheet">
                    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Pacifico&amp;display=swap">


                    <div id="akad-resepsi" class="">
                        <div class="container text-center">
                            <img id="envelope" class="mt-5" height="100" width="100"
                                src="https://akad.in/storage/images/8920FR2ZQxEEcA4AYS7e1NBEHIrCRDimBBrkwDJq.png">
                            <p id="event-description" class="text-white">Dengan segala kerendahan hati kami berharap
                                kehadiran Bapak/Ibu/Saudara/i dalam acara Silaturahmi Syawalan yang kami selenggarakan
                                pada :
                            </p>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="lokasi pb-5" id="weddinglokasidetail1">
                                        <div class="card d-inline-flex mt-5 background-card" style="width: 100%;">
                                            <div class="card-body shadow-lg p-3 bg-body-tertiary rounded">
                                                <h1 class="card-title fw-bold text-color-2" style="font-size: 40px">
                                                    Lokasi Acara</h1>
                                                <hr>
                                                <div>
                                                    <p style="font-size: 17px" class="m-0 p-0" id="day-wedding-1">
                                                        Minggu</p>
                                                    <h2 style="font-size: 25px" class="m-0 p-0"
                                                        id="date-wedding-2-1"> 04 April 2026</h2>
                                                    <p style="font-size: 17px" class="m-0 p-0">
                                                        Pukul
                                                        07:30
                                                        WIB
                                                        -
                                                        11:00 WIB
                                                    </p>
                                                    <h2 class="text-color-2 fw-bold" style="font-size: 25px">
                                                        Lokasi</h2>
                                                    <h2 style="font-size: 25px" class="m-0 p-0">
                                                        Bertempat di,</h2>
                                                    <h2 style="font-size: 25px" class="m-0 p-0">
                                                        Crystal Building UMKU</h2>
                                                    <p style="font-size: 17px" class="m-0 p-0">
                                                        Jl. Ganesha I, Purwosari, Kec. Kota Kudus, Kabupaten Kudus, Jawa
                                                        Tengah 59316</p>
                                                </div>
                                                <a href="https://maps.app.goo.gl/GQEkZASEtM1XMyCv8" type="button"
                                                    class="btn btn-color-2 my-5 text-color-1">
                                                    <i class="fa fa-map" style="font-size:18px"></i>
                                                    Lihat Lokasi
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="lokasi pb-5 text-center" id="rundown-acara">
                                        <div class="card d-inline-flex mt-5 background-card" style="width: 100%;">
                                            <div class="card-body shadow-lg p-3 bg-body-tertiary rounded">
                                                <h1 class="card-title fw-bold text-color-2" style="font-size: 40px">
                                                    Rundown Acara
                                                </h1>
                                                <hr>
                                                <div class="container">
                                                    <div class="row">
                                                        <!-- Kolom Kiri -->
                                                        <div class="col-md-6 col-12">
                                                            <p><strong>07.30 - 08.00</strong> Registrasi Undangan</p>
                                                            <p><strong>08.00 - 08.30</strong> Pra-Acara</p>
                                                            <p><strong>08.30 - 08.40</strong> Pembukaan</p>
                                                            <p><strong>08.40 - 08.45</strong> Pembacaan Ayat Suci
                                                                Alqur’an</p>
                                                            <p><strong>08.45 - 09.00</strong> Menyanyikan lagu-lagu :
                                                            </p>
                                                            <ul class="list-unstyled">
                                                                <li>Indonesia Raya</li>
                                                                <li>Sang Surya</li>
                                                                <li>Mars ‘Aisyiyah</li>
                                                            </ul>
                                                            <p><strong>09.00 - 09.05</strong> Sambutan Direktur Holding
                                                                RSA Group Kudus</p>
                                                        </div>

                                                        <!-- Kolom Kanan -->
                                                        <div class="col-md-6 col-12">
                                                            <p><strong>09.05 - 09.10</strong> Sambutan Ketua PDA
                                                                Kabupaten Kudus</p>
                                                            <p><strong>09.10 - 09.15</strong> Sambutan PDM Kabupaten
                                                                Kudus</p>
                                                            <p><strong>09.15 - 10.20</strong> Tausiyah & Doa <br> Ketua
                                                                Umum Pimpinan Pusat ‘Aisyiyah <br> (Dr. apt. Salmah
                                                                Orbayinah, M.Kes)</p>
                                                            <p><strong>10.20 - 11.00</strong> Ramah Tamah & Penutup</p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <a href="https://maps.app.goo.gl/GQEkZASEtM1XMyCv8" type="button"
                                                    class="btn btn-color-2 my-5 text-color-1">
                                                    <i class="fa fa-map" style="font-size:18px"></i>
                                                    Lihat Lokasi
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                                <div class="col-md-6" style="display: none">
                                    <div class="lokasi pb-5 text-center" id="weddinglokasidetail3">
                                        <div class="card d-inline-flex mt-5 background-card"
                                            style="width: 100%;display: none;">
                                            <div class="card-body shadow-lg p-3 bg-body-tertiary rounded">
                                                <h1 class="card-title fw-bold text-color-2" style="font-size: 40px">
                                                    Ngunduh Mantu</h1>
                                                <hr>
                                                <div>
                                                    <p style="font-size: 17px" class="m-0 p-0" id="day-wedding-3">
                                                        Minggu</p>
                                                    <h2 style="font-size: 25px" class="m-0 p-0"
                                                        id="date-wedding-2-3"> 8 Oktober 2023</h2>
                                                    <p style="font-size: 17px" class="m-0 p-0">
                                                        Pukul
                                                        23:59
                                                        WIB
                                                        -
                                                        Selesai
                                                    </p>
                                                    <h2 class="text-color-2 fw-bold" style="font-size: 25px">
                                                        Lokasi</h2>
                                                    <h2 style="font-size: 25px" class="m-0 p-0">
                                                        Bertempat di,</h2>
                                                    <h2 style="font-size: 25px" class="m-0 p-0">
                                                        <p></p>
                                                        <p style="font-size: 17px" class="m-0 p-0">
                                                        </p>
                                                    </h2>
                                                </div>
                                                <a href="" type="button"
                                                    class="btn btn-color-2 my-5 text-color-1">
                                                    <i class="fa fa-map" style="font-size:18px"></i>
                                                    Lihat Lokasi
                                                </a>

                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>

                    {{-- <div id="prewed" class="quote-1 p-3 text-center m-0">
                        <div class="mb-5">
                            <div class="">
                                <img id="bucket" class="img-fluid" height="100px" width="100px"
                                    style="display:none"
                                    src="https://www.freepnglogos.com/uploads/flower-bouquet-png/bouquet-ywllow-flowers-png-transparent-images-download-5.png"
                                    alt="">
                            </div>
                            <h2 id="momen" class="fs-2 my-0 p-0 text-color-1" style="display:none;">
                                Momen
                            </h2>
                            <h1 id="bahagia-kami" class="my-0 p-0 text-color-1" style="display:none;font-size:45px;">
                                Bahagia Kami
                            </h1>
                            <p id="pernyataan-prewed" class="text-white" style="display:none;font-size: 18px;">
                                Kamu adalah sahabat dan kekasihku, dan<br>aku tidak tahu sisi mana darimu yang
                                paling<br>aku
                                kagumi. Aku menghargai setiap <br>perjalanan yg telah kita lalui dan aku
                                siap<br>mengarungi
                                cerita baru bersamamu
                            </p>
                        </div>
                    </div> --}}





                    {{-- <div class="m-0 p-0" id="ucapan-doa" style="display:none">
                        <div class="container py-5">
                            <div class="card background-card">
                                <div class="card-body">

                                    <div class="text-center">
                                        <h2 id="ucapan-sesuatu" class="fs-2 my-0 p-0 text-color-2" style="">
                                            Buku Tamu
                                        </h2>
                                        <h1 id="berikan-ucapan" class="my-2 p-0" style="font-size:30px;">
                                            Berikan Ucapan &amp; Do'a restu
                                        </h1>
                                        <p class="my-0 p-0 text-color-2">3 Comments</p>
                                    </div>

                                    <div class="d-flex justify-content-center">
                                        <div class="row text-center d-flex justify-content-center my-3">
                                            <div class="col text-center">
                                                <div class="opacity-100 bg-success text-light fw-bold rounded pt-2 m-0 p-0"
                                                    style="width:5rem;height:5rem">
                                                    <p class="m-0 p-0">0</p>
                                                    <p class="m-0 p-0">Hadir</p>
                                                </div>
                                            </div>
                                            <div class="col text-center">
                                                <div class="opacity-100 bg-danger text-light fw-bold rounded pt-2 m-0 p-0"
                                                    style="width:5rem;height:5rem">
                                                    <p class="m-0 p-0">3</p>
                                                    <p class="m-0 p-0">Tidak Hadir</p>
                                                </div>
                                            </div>
                                            <div class="col text-center">
                                                <div class="opacity-100 bg-warning text-light fw-bold rounded pt-2 m-0 p-0"
                                                    style="width:5rem;height:5rem">
                                                    <p class="m-0 p-0">0</p>
                                                    <p class="m-0 p-0">Masih Ragu</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <form enctype="multipart/form-data" class="mx-5 mb-5 pb-5"
                                        action="/confirmation-wedding" method="post">
                                        <input type="hidden" name="_token"
                                            value="peZFmutNRRIMdXItsZEKW7xZeZxAX6FPj8V6cESU">
                                        <div class="mb-3">
                                            <input type="text" class="form-control" id="id-couple"
                                                name="id-couple" value="222777" hidden="">
                                        </div>
                                        <div class="mb-3">
                                            <input type="text" class="form-control" id="guest" name="guest"
                                                value="Yunita Dwi Herlistiana" hidden="">
                                        </div>
                                        <div class="mb-3">
                                            <input type="text" class="form-control" id="guest-name"
                                                name="guest-name" placeholder="Nama">
                                        </div>
                                        <div class="mb-3">
                                            <div class="form-floating">
                                                <textarea class="form-control" placeholder="Tinggalkan ucapan disini" id="floatingTextarea" name="ucapan-wedding"></textarea>
                                                <label class="text-color-2" for="floatingTextarea">Ucapan</label>
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <select class="form-select" aria-label="Default select example"
                                                name="confirmation-attendance" id="confirmation-attendance">
                                                <option value="0" selected="">Hadir</option>
                                                <option value="1">Tidak Hadir</option>
                                                <option value="2">Masih Ragu</option>
                                            </select>
                                        </div>
                                        <button type="submit" class="btn btn-color-2 text-color-1">Kirim</button>
                                    </form>

                                    <h1>Ucapan</h1>
                                    <ol class="list-group list-group-numbered"
                                        style="height: 300px; overflow: scroll;margin-top:50px">
                                        <li class="list-group-item d-flex justify-content-between align-items-start"
                                            style="background-color: transparent">
                                            <div class="ms-2 me-auto">
                                                <div class="fw-bold">Ella smada</div>
                                                Sakinah mawadah wa rahmah yaa aull. Maap banget gabisa hadirrr
                                            </div>

                                        </li>
                                        <li class="list-group-item d-flex justify-content-between align-items-start"
                                            style="background-color: transparent">
                                            <div class="ms-2 me-auto">
                                                <div class="fw-bold">Fiqi</div>
                                                Samawa bolo,tak doakan langgeng trus,maaf e GK ISO Moro aku🙏🙏🏻
                                            </div>

                                        </li>
                                        <li class="list-group-item d-flex justify-content-between align-items-start"
                                            style="background-color: transparent">
                                            <div class="ms-2 me-auto">
                                                <div class="fw-bold">A'la Salatiga</div>
                                                Selamet bos Munir,wes dadi halal ,mugo2 dadi keluarga ingkang sakinah
                                                kelawan dasar roso mawaddah warohmah, langgeng dunyo akhirat e 🤲
                                                Sepurane bos gak iso hadir 🙏
                                            </div>

                                        </li>
                                    </ol>

                                </div>
                            </div>
                        </div>
                    </div> --}}

                    {{-- <div class="text-center m-0 p-0" id="gift">
                        <h2 id="wedding-gift" style="display:none;font-size: 40px" class="pt-5 text-color-1">Gift
                        </h2>

                        <div class="container">
                            <p class="text-color-1" id="thanks-you" style="font-size:14px;display:none">Terimakasih
                                atas doa dan restu dari anda
                                semua. Untuk kado cashless maupun fisik bisa dikirimkan di bawah ini</p>
                            <hr>
                            <div class="row">
                                <div id="transfer-rekening" class="col-sm-6 text-color-1" style="display:none">
                                    <h2 class="m-0 p-0" style="font-size: 30px">Transfer ke Rekening BRI
                                    </h2>

                                    <p class="m-0 p-0" style="font-size:20px">a.n Nurul Aulia Dewi</p>
                                    <p class="m-0 p-0" style="font-size:20px">1314 0103 1654 501</p>
                                    <button type="button" class="btn btn-color-2 mb-5 text-color-1"
                                        onclick="myFunction('1314 0103 1654 501')">Copy No. Rekening</button>

                                    <h2 class="m-0 p-0" style="font-size: 30px">Transfer ke Rekening
                                        BRI</h2>

                                    <p class="m-0 p-0" style="font-size:20px">a.n Muhamad As'ad Munir Dzikri</p>
                                    <p class="m-0 p-0" style="font-size:20px">3738 0101 5652 503</p>
                                    <button type="button" class="btn btn-color-2 mb-5 text-color-1"
                                        onclick="myFunction('3738 0101 5652 503')">Copy No. Rekening</button>

                                </div>
                                <div id="kirim-kado" class="col-sm-6" style="display:none">
                                    <h2 class="m-0 p-0 text-color-1" style="font-size: 30px">Kirim Kado Fisik Ke
                                        Alamat</h2>

                                    <p class="m-0 p-0 text-color-1" style="font-size:14px">Ds. Wonorejo (Kedung
                                        Banteng) Rt 07 Rw 03 Kec. Karanganyar Kab. Demak</p>
                                    <button type="button" class="btn btn-color-2 mb-5 text-color-1"
                                        onclick="myFunction('Ds. Wonorejo (Kedung Banteng) Rt 07 Rw 03 Kec. Karanganyar Kab. Demak')">Copy
                                        Alamat</button>
                                </div>
                            </div>
                        </div>
                        <script>
                            function myFunction(text) {

                                // Copy the text inside the text field
                                navigator.clipboard.writeText(text);

                                // Alert the copied text
                                alert("Copied the text: " + text);
                            }
                        </script>
                    </div> --}}

                    <div class="m-0 p-0">
                        <div class="text-center m-0 py-5" id="special-thanks">
                            <h2 class="m-0 p-0 text-white" style="font-size: 20px;">Terimakasih</h2>
                            <h1 class="text-color-1" style="font-size: 60px;">RS 'Aisyiyah Group Kudus</h1>
                            <h2 class="m-0 p-0 text-white" style="font-size: 20px;">Keluarga Besar</h2>
                            <p class="m-0 p-0 text-white" style="font-size: 15px;">RS 'Aisyiyah Kudus
                            </p>
                            <p class="m-0 p-0 text-white" style="font-size: 15px;">RS Sarkies 'Aisyiyah Kudus</p>
                            <p class="m-0 p-0 fw-bold" style="font-size: 24px;">Wassalamu’alaikum Wr. Wb.</p>
                        </div>
                        <div id="footer" class="text-center d-flex justify-content-center pt-3 m-0">
                            {{-- <div class="d-flex m-0 p-0 row">
                                <div class="col-md-12 m-0 p-0">

                                </div>
                                <div class="col-md-12">
                                    <a href="https://api.whatsapp.com/send?phone=6281232672016&amp;text=Saya%20mau%20pesan%20undangannya%20kak"
                                        class="fa fa-whatsapp mx-2 text-color-1" aria-hidden="true"
                                        style="text-decoration: none;"></a>
                                    <a href="https://www.instagram.com/akaddotin" class="fa fa-instagram text-color-1"
                                        aria-hidden="true" style="text-decoration: none;"></a>
                                    <style>
                                        .shopee-icon {
                                            width: 300px;
                                            height: 300px;
                                            border-radius: 50%;
                                            animation: blink 1s infinite;
                                        }

                                        @keyframes blink {

                                            0%,
                                            100% {
                                                opacity: 1;
                                            }

                                            50% {
                                                opacity: 0;
                                            }
                                        }
                                    </style>
                                    <a href="/our-shopee" class="shopee-icon" aria-hidden="true"
                                        style="color: inherit; text-decoration: none;">

                                        <img src="https://akad.in/storage/images/tLLnqpZshcVavozaB9MH136OTalLrPWAFNbJKSdN.png"
                                            style="width: 50px; height: 50px;padding-bottom: 0px;margin:0">
                                    </a>

                                </div>
                            </div> --}}
                            <div class="d-flex m-0 p-0" style="height: 50px;">
                                <div class="vr m-0 p-0"></div>
                            </div>
                            <div class="d-flex row m-0 p-0">
                                <div class="col-md-12 m-0 p-0">

                                </div>
                                <p class="col-md-12 m-0 p-0 text-white">Created By
                                    <br> <span class="text-color-1"> Marketing RS Sarkies 'Aisyiyah Kudus </span><br>
                                    All Rights Reserved
                                </p>
                            </div>
                            <div class="d-flex m-0 p-0 translate-middle-x" style="height: 50px;">
                                <div class="vr m-0 p-0"></div>
                            </div>
                            <div class="d-flex row m-0 p-0">
                                <div class="col-md-12 m-0 p-0">

                                </div>
                                <p class="col-md-12 m-0 p-0 text-white">Created By
                                    <br> <span class="text-color-1"> IT RS Sarkies 'Aisyiyah Kudus </span><br>
                                    All Rights Reserved
                                </p>
                            </div>
                        </div>
                    </div>

                </div>

                <script>
                    let list_feature_json = {
                        "intro": 1,
                        "profil-1": 1,
                        "profil-2": 1,
                        "timeline": 1,
                        "photo-prewed": 0,
                        "live-streaming": 0,
                        "our-story": 0,
                        "ucapan-doa": 1,
                        "wedding-gift": 1
                    };

                    let list_feature_sequence = Object.keys(list_feature_json).filter(key => list_feature_json[key] == 1);

                    // static file
                    var flag = 0;
                    const audio = $("#sound")[0];
                    // call functions firstly
                    // playAudioFirstly(0);

                    function getMyWeddingDate(datetext) {
                        let text = datetext;
                        const myArray = text.split("-");
                        var birthdateVal = myArray[1] + "/" + myArray[2] + "/" + myArray[0];
                        console.log(birthdateVal);
                        var mydate = new Date(birthdateVal);
                        const options = {
                            weekday: 'long',
                            year: 'numeric',
                            month: 'long',
                            day: 'numeric'
                        };
                        var indonesiadate = mydate.toLocaleDateString('id', options);
                        var arrDate = indonesiadate.split(',');
                        return [mydate, indonesiadate, arrDate];
                    }

                    var x = setInterval(function() {
                        var mydatestr = "Dec 12, 2022 00:00:00";
                        // let text = 2026-02-15;

                        const [solemnizationmydate, solemnizationindonesiadate, solemnizationarrDate] = getMyWeddingDate(
                            "2026-04-04");
                        $("#day-wedding-1").text(solemnizationarrDate[0]);
                        $("#date-wedding-2-1").text(solemnizationarrDate[1]);

                        const [mydate, indonesiadate, arrDate] = getMyWeddingDate("2026-04-04");
                        $("#day-wedding-2").text(arrDate[0]);
                        $("#date-wedding-2-2").text(arrDate[1]);

                        const [ngunduhmydate, ngunduhindonesiadate, ngunduharrDate] = getMyWeddingDate(
                            "2023-10-08");
                        $("#day-wedding-3").text(ngunduharrDate[0]);
                        $("#date-wedding-2-3").text(ngunduharrDate[1]);

                        var countDownDate = mydate.getTime();
                        var month = mydate.getMonth() + 1;
                        $("#date-wedding-1").text(mydate.getDate() + " . " + month + " . " + mydate.getFullYear());
                        var now = new Date().getTime();

                        // Find the distance between now and the count down date
                        var distance = countDownDate - now;

                        // Time calculations for days, hours, minutes and seconds
                        var days = Math.floor(distance / (1000 * 60 * 60 * 24));
                        if (days < 10) days = "0" + days;
                        var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                        if (hours < 10) hours = "0" + hours;
                        var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
                        if (minutes < 10) minutes = "0" + minutes;
                        var seconds = Math.floor((distance % (1000 * 60)) / 1000);
                        if (seconds < 10) seconds = "0" + seconds;
                        $("#days").text(days);
                        $("#hours").text(hours);
                        $("#minutes").text(minutes);
                        $("#seconds").text(seconds);

                    }, 6000);
                </script>

                <script src="https://akad.in/theme/akadin/tradition/main/js/script.js"></script>

                <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
                    integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous">
                </script>
                <script>
                    // Membuat fungsi untuk menyembunyikan dan menghapus elemen
                    function hideAndRemoveElement() {
                        var element = document.getElementById('contentend');
                        if (element) {
                            // Menghapus elemen dari DOM
                            element.parentNode.removeChild(element);
                        }
                    }

                    // Panggil fungsi untuk menyembunyikan dan menghapus elemen
                    window.onload = function() {
                        hideAndRemoveElement();
                    };
                </script>

                <div id="contentend">
                    <script>
                        var host = 'akad.in';
                        // Jika host bukan akad.in atau 127.0.0.1:8000 return akad.in
                        if (host !== 'akad.in' && host !== '127.0.0.1:8000') {
                            window.location.href = 'https://akad.in';
                        }
                    </script>
                </div>

                <script>
                    function translatePage() {
                        const elements = document.querySelectorAll(
                            '#content *'); // Memilih semua elemen di dalam div dengan id 'content'
                        const targetLanguage = 'en'; // Inggris

                        elements.forEach(element => {
                            const text = element.innerText;
                            // Request ke Google Translate API untuk menerjemahkan teks
                            fetch(
                                    `https://translate.googleapis.com/translate_a/single?client=gtx&sl=id&tl=${targetLanguage}&dt=t&q=${encodeURI(text)}`
                                )
                                .then(response => response.json())
                                .then(data => {
                                    const translatedText = data[0][0][0]; // Mendapatkan teks terjemahan
                                    element.innerText = translatedText;
                                })
                                .catch(error => {
                                    console.error('Error:', error);
                                });
                        });
                    }
                    translatePage();
                </script>
            </div>


        </div>
    </div>



</body>

</html>
