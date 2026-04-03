<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no" />
    <title>Daftar Hadir RS Sarkies 'Aisyiyah Kudus</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="icon" type="image/png" href="{{ asset('assets/img/Logo_RSSA.png') }}" sizes="32x32">
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('assets/img/Logo_RSSA.png') }}">
    <link
        href="https://fonts.googleapis.com/css2?family=DM+Sans:ital,opsz,wght@0,9..40,300;0,9..40,400;0,9..40,500;1,9..40,300&family=DM+Serif+Display:ital@0;1&display=swap"
        rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <style>
        /* ===== RESET & BASE ===== */
        *,
        *::before,
        *::after {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        :root {
            --green-dark: #085041;
            --green-mid: #0F6E56;
            --green-base: #1D9E75;
            --green-light: #5DCAA5;
            --green-pale: #E1F5EE;
            --biru-gelap: #3A78C9;
            --coral: #D85A30;
            --bg: #F4F6F5;
            --white: #ffffff;
            --border: rgba(0, 0, 0, 0.10);
            --border-hover: rgba(0, 0, 0, 0.20);
            --text-primary: #1A1A1A;
            --text-muted: #6B7280;
            --text-hint: #A0AAB4;
            --radius-sm: 8px;
            --radius-md: 12px;
            --radius-lg: 20px;
            --shadow-card: 0 2px 20px rgba(0, 0, 0, 0.07);
            --shadow-focus: 0 0 0 3px rgba(29, 158, 117, 0.15);
        }

        body {
            font-family: 'DM Sans', Arial, sans-serif;
            background: var(--bg);
            min-height: 100vh;
            color: var(--text-primary);
            -webkit-font-smoothing: antialiased;
        }

        /* ===== PAGE WRAPPER ===== */
        .page {
            padding: 2.5rem 1rem 4rem;
        }

        .card {
            max-width: 680px;
            margin: 0 auto;
            background: var(--white);
            border-radius: var(--radius-lg);
            box-shadow: var(--shadow-card);
            overflow: hidden;
        }

        /* ===== HEADER ===== */
        .card-header {
            background: var(--green-mid);
            padding: 2.25rem 2.5rem 2.5rem;
            position: relative;
        }

        .card-header::after {
            content: '';
            position: absolute;
            bottom: -1px;
            left: 0;
            right: 0;
            height: 22px;
            background: var(--white);
            border-radius: 22px 22px 0 0;
        }

        /* Decorative circles */
        .card-header::before {
            content: '';
            position: absolute;
            top: -40px;
            right: -40px;
            width: 180px;
            height: 180px;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.06);
            pointer-events: none;
        }

        .deco-circle {
            position: absolute;
            bottom: 20px;
            right: 60px;
            width: 90px;
            height: 90px;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.05);
            pointer-events: none;
        }

        .header-badge {
            display: inline-flex;
            align-items: center;
            gap: 7px;
            background: rgba(255, 255, 255, 0.15);
            color: var(--green-light);
            font-size: 11px;
            font-weight: 500;
            letter-spacing: 0.09em;
            text-transform: uppercase;
            padding: 5px 13px;
            border-radius: 100px;
            margin-bottom: 16px;
        }

        .badge-dot {
            width: 6px;
            height: 6px;
            border-radius: 50%;
            background: var(--green-light);
        }

        .header-title {
            font-family: 'DM Serif Display', Georgia, serif;
            font-size: 32px;
            color: #fff;
            font-weight: 400;
            line-height: 1.15;
            margin-bottom: 8px;
        }

        .header-sub {
            font-size: 13px;
            color: rgba(255, 255, 255, 0.55);
            font-weight: 300;
        }

        /* ===== BODY ===== */
        .card-body {
            padding: 2rem 2.5rem 2.5rem;
        }

        /* ===== SECTION LABEL ===== */
        .section-label {
            font-size: 10px;
            font-weight: 500;
            letter-spacing: 0.13em;
            text-transform: uppercase;
            color: var(--text-hint);
            margin-top: 2rem;
            margin-bottom: 1rem;
            padding-bottom: 0.6rem;
            border-bottom: 1px solid var(--border);
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .section-label:first-of-type {
            margin-top: 0;
        }

        .optional-pill {
            font-size: 10px;
            font-weight: 400;
            letter-spacing: 0.03em;
            text-transform: none;
            padding: 2px 8px;
            background: #F3F4F6;
            border-radius: 100px;
            color: var(--text-hint);
        }

        /* ===== FIELD GRID ===== */
        .field-group {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 14px;
            margin-bottom: 14px;
        }

        .field-group.solo {
            grid-template-columns: 1fr;
        }

        .field {
            display: flex;
            flex-direction: column;
            gap: 6px;
        }

        .field label {
            font-size: 12px;
            font-weight: 500;
            color: var(--text-muted);
        }

        .field label .req {
            color: var(--coral);
            margin-left: 2px;
        }

        /* ===== INPUTS ===== */
        .field input[type="text"],
        .field input[type="date"] {
            height: 44px;
            border-radius: var(--radius-sm);
            border: 1.5px solid var(--border);
            background: #F9FAFB;
            color: var(--text-primary);
            font-family: 'DM Sans', sans-serif;
            font-size: 14px;
            padding: 0 14px;
            width: 100%;
            transition: border-color 0.15s, box-shadow 0.15s, background 0.15s;
            outline: none;
            -webkit-appearance: none;
            appearance: none;
        }

        .field input:hover {
            border-color: var(--border-hover);
        }

        .field input:focus {
            border-color: var(--green-base);
            box-shadow: var(--shadow-focus);
            background: var(--white);
        }

        .field input::placeholder {
            color: var(--text-hint);
            font-weight: 300;
        }

        /* ===== MEETING DROPDOWN ===== */
        .meeting-wrap {
            position: relative;
        }

        .dropdown {
            position: absolute;
            top: calc(100% + 6px);
            left: 0;
            right: 0;
            background: var(--white);
            border: 1.5px solid var(--border);
            border-radius: var(--radius-md);
            overflow: hidden;
            display: none;
            z-index: 200;
            box-shadow: 0 8px 30px rgba(0, 0, 0, 0.10);
        }

        .dropdown.open {
            display: block;
        }

        .dropdown-item {
            padding: 12px 16px;
            font-size: 13px;
            color: var(--text-primary);
            cursor: pointer;
            border-bottom: 1px solid var(--border);
            transition: background 0.12s;
            display: flex;
            align-items: flex-start;
            gap: 12px;
        }

        .dropdown-item:last-child {
            border-bottom: none;
        }

        .dropdown-item:hover {
            background: var(--green-pale);
        }

        .dropdown-dot-wrap {
            margin-top: 4px;
            flex-shrink: 0;
        }

        .dropdown-dot {
            width: 7px;
            height: 7px;
            border-radius: 50%;
            background: var(--green-base);
        }

        .dropdown-item-title {
            font-weight: 500;
            color: var(--text-primary);
            font-size: 13px;
            line-height: 1.4;
        }

        .dropdown-item-meta {
            font-size: 11px;
            color: var(--text-hint);
            margin-top: 2px;
            font-weight: 300;
        }

        /* ===== SIGNATURE AREA ===== */
        .sig-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-top: 2rem;
            margin-bottom: 1rem;
            padding-bottom: 0.6rem;
            border-bottom: 1px solid var(--border);
        }

        .sig-header-left {
            display: flex;
            align-items: center;
            gap: 8px;
            font-size: 10px;
            font-weight: 500;
            letter-spacing: 0.13em;
            text-transform: uppercase;
            color: var(--text-hint);
        }

        .btn-clear-sig {
            font-size: 12px;
            font-weight: 400;
            color: var(--text-muted);
            cursor: pointer;
            padding: 5px 12px;
            border-radius: 6px;
            border: 1px solid var(--border);
            background: #F9FAFB;
            font-family: 'DM Sans', sans-serif;
            transition: all 0.15s;
            -webkit-tap-highlight-color: transparent;
            touch-action: manipulation;
        }

        .btn-clear-sig:hover {
            background: #F3F4F6;
            color: var(--text-primary);
        }

        .btn-clear-sig:active {
            transform: scale(0.97);
        }

        .sig-wrap {
            border: 2px dashed var(--border);
            border-radius: var(--radius-md);
            height: 160px;
            position: relative;
            overflow: hidden;
            background: #FAFAFA;
            touch-action: none;
            /* ← kunci agar scroll tidak mengganggu gambar */
            -webkit-user-select: none;
            user-select: none;
            cursor: crosshair;
            transition: border-color 0.15s, background 0.15s;
        }

        .sig-wrap.is-drawing {
            border-style: solid;
            border-color: var(--green-base);
            background: var(--white);
        }

        .sig-placeholder {
            position: absolute;
            inset: 0;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            gap: 8px;
            pointer-events: none;
            transition: opacity 0.2s;
        }

        .sig-placeholder svg {
            opacity: 0.22;
        }

        .sig-placeholder-text {
            font-size: 12px;
            color: var(--text-hint);
            font-weight: 300;
        }

        .sig-wrap canvas {
            position: absolute;
            inset: 0;
            width: 100%;
            height: 100%;
            display: block;
            touch-action: none;
            /* ← pastikan canvas juga none */
        }

        /* ===== SUBMIT BUTTON ===== */
        .btn-submit {
            width: 100%;
            height: 50px;
            border-radius: var(--radius-md);
            border: none;
            background: var(--green-mid);
            color: #fff;
            font-family: 'DM Sans', sans-serif;
            font-size: 15px;
            font-weight: 500;
            cursor: pointer;
            margin-top: 2rem;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
            transition: background 0.15s, transform 0.1s;
            letter-spacing: 0.01em;
            -webkit-tap-highlight-color: transparent;
            touch-action: manipulation;
        }

        .btn-submit:hover {
            background: var(--green-dark);
        }

        .btn-submit:active {
            transform: scale(0.985);
        }

        .btn-submit.state-error {
            background: var(--coral);
        }

        .btn-submit.state-success {
            background: var(--green-base);
        }

        .btn-arrow {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 22px;
            height: 22px;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.2);
            font-size: 13px;
            line-height: 1;
        }

        /* ===== FOOTER ===== */
        .footer-note {
            text-align: center;
            font-size: 12px;
            color: var(--text-hint);
            font-weight: 300;
            margin-top: 1.5rem;
        }

        .footer-note strong {
            color: var(--green-base);
            font-weight: 500;
        }

        /* ===== ALERT TOAST ===== */
        .toast {
            position: fixed;
            bottom: 2rem;
            left: 50%;
            transform: translateX(-50%) translateY(80px);
            background: #1A1A1A;
            color: #fff;
            font-size: 13px;
            font-weight: 400;
            padding: 12px 22px;
            border-radius: 100px;
            white-space: nowrap;
            z-index: 9999;
            opacity: 0;
            transition: transform 0.3s ease, opacity 0.3s ease;
            pointer-events: none;
        }

        .toast.show {
            transform: translateX(-50%) translateY(0);
            opacity: 1;
        }

        /* ===== RESPONSIVE ===== */
        @media (max-width: 600px) {
            .page {
                padding: 1rem 0.75rem 3rem;
            }

            .card {
                border-radius: 16px;
            }

            .card-header {
                padding: 1.75rem 1.5rem 2rem;
            }

            .header-title {
                font-size: 26px;
            }

            .card-body {
                padding: 1.5rem 1.25rem 2rem;
            }

            .field-group {
                grid-template-columns: 1fr;
                gap: 12px;
            }

            .sig-wrap {
                height: 180px;
            }

            /* lebih tinggi di mobile agar nyaman */
        }

        @media (max-width: 380px) {
            .header-title {
                font-size: 22px;
            }

            .card-body {
                padding: 1.25rem 1rem 1.75rem;
            }
        }
    </style>
</head>

<body>

    <div class="page">
        <div class="card">

            <!-- HEADER -->
            <div class="card-header">
                <div class="deco-circle"></div>
                <div class="header-badge">
                    <div class="badge-dot"></div>
                    Formulir Kehadiran
                </div>
                <div class="header-title">Silaturahmi Syawalan RS 'Aisyiyah Group Kudus</div>
                <div class="header-sub">Isilah data berikut dengan baik dan benar</div>
            </div>

            <!-- BODY -->
            <div class="card-body">

                <!-- SECTION: INFORMASI RAPAT -->
                <div class="section-label">Informasi Acara</div>

                <div class="field-group solo">
                    <div class="field">
                        <label>Tanggal Acara <span class="req">*</span></label>
                        <input type="date" id="tanggalrapat" name="tanggalrapat" />
                    </div>
                </div>

                <div class="field-group solo">
                    <div class="field">
                        <label>Nama Acara <span class="req">*</span></label>
                        <div class="meeting-wrap">
                            <input type="text" id="meeting_search" placeholder="ketik untuk mencari judul acara..."
                                autocomplete="off" />
                            <input type="hidden" id="meeting_fk" name="meeting_fk" />
                            <div class="dropdown" id="meeting_dropdown">
                                <!-- Item-item ini akan diisi dari AJAX -->
                                <!-- Contoh statis untuk demo: -->
                                {{-- <div class="dropdown-item" data-id="1" data-text="Rapat Koordinasi Bulanan">
                                    <div class="dropdown-dot-wrap">
                                        <div class="dropdown-dot"></div>
                                    </div>
                                    <div>
                                        <div class="dropdown-item-title">Rapat Koordinasi Bulanan</div>
                                        <div class="dropdown-item-meta">1 April 2025 &middot; Ruang Utama</div>
                                    </div>
                                </div>
                                <div class="dropdown-item" data-id="2" data-text="Evaluasi Kinerja Q1 2025">
                                    <div class="dropdown-dot-wrap">
                                        <div class="dropdown-dot"></div>
                                    </div>
                                    <div>
                                        <div class="dropdown-item-title">Evaluasi Kinerja Q1 2025</div>
                                        <div class="dropdown-item-meta">28 Maret 2025 &middot; Ruang Rapat A</div>
                                    </div>
                                </div>
                                <div class="dropdown-item" data-id="3" data-text="Pembahasan Anggaran Tahunan">
                                    <div class="dropdown-dot-wrap">
                                        <div class="dropdown-dot"></div>
                                    </div>
                                    <div>
                                        <div class="dropdown-item-title">Pembahasan Anggaran Tahunan</div>
                                        <div class="dropdown-item-meta">25 Maret 2025 &middot; Aula Lantai 2</div>
                                    </div>
                                </div> --}}
                            </div>
                        </div>
                    </div>
                </div>

                <!-- SECTION: DATA PESERTA -->
                <div class="section-label">Data Peserta</div>

                <div class="field-group solo">
                    <div class="field">
                        <label>Nama Lengkap <span class="req">*</span></label>
                        <input type="text" id="namalengkap" name="namalengkap"
                            placeholder="Masukkan nama lengkap Anda" />
                    </div>
                </div>

                <div class="field-group">
                    <div class="field">
                        <label>Instansi <span class="req">*</span></label>
                        <input type="text" id="instansi" name="instansi" placeholder="Nama instansi / unit" />
                    </div>
                    <div class="field">
                        <label>Jabatan <span class="req">*</span></label>
                        <input type="text" id="jabatan" name="jabatan" placeholder="Jabatan Anda" />
                    </div>
                </div>

                <div class="field-group solo" style="margin-top: 14px;">
                    <div class="field">
                        <label>NIP <span class="req">*</span></label>
                        <input type="text" id="nip" name="nip" placeholder="Nomor Induk Pegawai"
                            inputmode="numeric" />
                    </div>
                </div>

                <!-- SECTION: TANDA TANGAN -->
                <div class="sig-header">
                    <div class="sig-header-left">
                        Tanda Tangan
                        <span class="optional-pill">Opsional</span>
                    </div>
                    <button type="button" class="btn-clear-sig" id="clearSigBtn">Hapus</button>
                </div>

                <div class="sig-wrap" id="sigWrap">
                    <div class="sig-placeholder" id="sigPlaceholder">
                        <svg width="30" height="30" viewBox="0 0 24 24" fill="none" stroke="#1A1A1A"
                            stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                            <path
                                d="M15.232 5.232l3.536 3.536M16.768 3.768a2.5 2.5 0 013.536 3.536L6.5 21.036H3v-3.572L16.768 3.768z" />
                        </svg>
                        <div class="sig-placeholder-text">Tanda tangani di sini</div>
                    </div>
                    <canvas id="sigCanvas"></canvas>
                </div>

                <!-- SUBMIT -->
                <button type="button" class="btn-submit" id="btnSubmit">
                    <span id="btnLabel">Kirim Data Kehadiran</span>
                    <span class="btn-arrow" id="btnArrow">&#8594;</span>
                </button>

                <div class="footer-note">
                    Created with ❤️ by <strong>IT RS Sarkies 'Aisyiyah Kudus</strong>
                </div>

            </div><!-- /card-body -->
        </div><!-- /card -->
    </div><!-- /page -->

    <!-- TOAST -->
    <div class="toast" id="toast"></div>

    <script>
        /* =============================================
                   DROPDOWN MEETING
                   ============================================= */
        const $meetingSearch = $('#meeting_search');
        const $meetingDropdown = $('#meeting_dropdown');
        const $meetingFk = $('#meeting_fk');

        function loadMeetings(keyword) {
            //  Untuk integrasi Laravel, ganti blok ini dengan AJAX:
            $.ajax({
                url: '/meeting/search',
                type: 'GET',
                data: {
                    q: keyword
                },
                success: function(res) {
                    let html = '';
                    res.forEach(item => {
                        html += `
                <div class="dropdown-item" data-id="${item.id}" data-text="${item.nama_meeting}">
                  <div class="dropdown-dot-wrap"><div class="dropdown-dot"></div></div>
                  <div>
                    <div class="dropdown-item-title">${item.nama_meeting}</div>
                    <div class="dropdown-item-meta">${item.tanggal} &middot; ${item.tempat}</div>
                  </div>
                </div>`;
                    });
                    $meetingDropdown.html(html).addClass('open');
                }
            });


            // Demo statis — hapus saat integrasi dengan AJAX di atas
            $meetingDropdown.addClass('open');
        }

        $meetingSearch.on('focus click', function() {
            loadMeetings($(this).val());
        });

        $meetingSearch.on('input', function() {
            $meetingFk.val('');
            loadMeetings($(this).val());
        });

        $(document).on('click', '.dropdown-item', function() {
            $meetingFk.val($(this).data('id'));
            $meetingSearch.val($(this).data('text'));
            $meetingDropdown.removeClass('open');
        });

        $(document).on('click', function(e) {
            if (!$(e.target).closest('.meeting-wrap').length) {
                $meetingDropdown.removeClass('open');
            }
        });

        /* =============================================
           TANDA TANGAN — CANVAS (MOUSE + TOUCH)
           ============================================= */
        const sigWrap = document.getElementById('sigWrap');
        const canvas = document.getElementById('sigCanvas');
        const ctx = canvas.getContext('2d');
        const placeholder = document.getElementById('sigPlaceholder');
        let drawing = false;
        let hasSig = false;
        let lastX = 0;
        let lastY = 0;

        /* Ukuran canvas mengikuti ukuran elemen sigWrap */
        function resizeCanvas() {
            const rect = sigWrap.getBoundingClientRect();
            const dpr = window.devicePixelRatio || 1;

            /* Simpan gambar lama jika sudah ada */
            let imgData = null;
            if (hasSig) {
                imgData = ctx.getImageData(0, 0, canvas.width, canvas.height);
            }

            canvas.width = rect.width * dpr;
            canvas.height = rect.height * dpr;
            canvas.style.width = rect.width + 'px';
            canvas.style.height = rect.height + 'px';
            ctx.scale(dpr, dpr);

            /* Pulihkan gambar */
            if (imgData) ctx.putImageData(imgData, 0, 0);
        }

        /* Panggil setelah font & layout selesai */
        window.addEventListener('load', resizeCanvas);
        window.addEventListener('resize', resizeCanvas);
        setTimeout(resizeCanvas, 200);

        /* Ambil koordinat dari mouse atau sentuhan */
        function getPos(e) {
            const rect = canvas.getBoundingClientRect();
            if (e.touches && e.touches.length > 0) {
                return {
                    x: e.touches[0].clientX - rect.left,
                    y: e.touches[0].clientY - rect.top
                };
            }
            return {
                x: e.clientX - rect.left,
                y: e.clientY - rect.top
            };
        }

        function startDraw(e) {
            /* Cegah scroll halaman saat menggambar */
            e.preventDefault();
            drawing = true;
            const p = getPos(e);
            lastX = p.x;
            lastY = p.y;
            ctx.beginPath();
            ctx.moveTo(p.x, p.y);

            if (!hasSig) {
                hasSig = true;
                placeholder.style.opacity = '0';
                sigWrap.classList.add('is-drawing');
            }
        }

        function doDraw(e) {
            if (!drawing) return;
            e.preventDefault();
            const p = getPos(e);

            ctx.lineWidth = 2.2;
            ctx.lineCap = 'round';
            ctx.lineJoin = 'round';
            ctx.strokeStyle = '#111111';

            /* Quadratic curve agar garis halus */
            const midX = (lastX + p.x) / 2;
            const midY = (lastY + p.y) / 2;
            ctx.quadraticCurveTo(lastX, lastY, midX, midY);
            ctx.stroke();
            ctx.beginPath();
            ctx.moveTo(midX, midY);

            lastX = p.x;
            lastY = p.y;
        }

        function stopDraw(e) {
            if (!drawing) return;
            drawing = false;
            ctx.beginPath();
        }

        /* Mouse events */
        canvas.addEventListener('mousedown', startDraw);
        canvas.addEventListener('mousemove', doDraw);
        canvas.addEventListener('mouseup', stopDraw);
        canvas.addEventListener('mouseleave', stopDraw);

        /* Touch events — { passive: false } wajib agar preventDefault bekerja */
        canvas.addEventListener('touchstart', startDraw, {
            passive: false
        });
        canvas.addEventListener('touchmove', doDraw, {
            passive: false
        });
        canvas.addEventListener('touchend', stopDraw, {
            passive: false
        });
        canvas.addEventListener('touchcancel', stopDraw, {
            passive: false
        });

        /* Tombol hapus tanda tangan */
        document.getElementById('clearSigBtn').addEventListener('click', function() {
            ctx.clearRect(0, 0, canvas.width, canvas.height);
            ctx.beginPath();
            hasSig = false;
            placeholder.style.opacity = '1';
            sigWrap.classList.remove('is-drawing');
        });

        /* =============================================
           TOAST HELPER
           ============================================= */
        function showToast(msg, duration) {
            duration = duration || 2500;
            const toast = document.getElementById('toast');
            toast.textContent = msg;
            toast.classList.add('show');
            setTimeout(function() {
                toast.classList.remove('show');
            }, duration);
        }
        //add tanggal sekarang ke input tanggalrapat
        function setTodayDate() {
            const today = new Date();

            // Format ke YYYY-MM-DD (format input type="date")
            const yyyy = today.getFullYear();
            const mm = String(today.getMonth() + 1).padStart(2, '0');
            const dd = String(today.getDate()).padStart(2, '0');

            const formatted = `${yyyy}-${mm}-${dd}`;

            $('#tanggalrapat').val(formatted);
        }

        $(document).ready(function() {
            setTodayDate();
        });
        /* =============================================
           SUBMIT
           ============================================= */
        $('#btnSubmit').on('click', function() {
            const tanggal = $('#tanggalrapat').val();
            const meetingFk = $('#meeting_fk').val();
            const nama = $('#namalengkap').val().trim();
            const instansi = $('#instansi').val().trim();
            const jabatan = $('#jabatan').val().trim();
            const nip = $('#nip').val().trim();

            /* Validasi */
            if (!tanggal || !meetingFk || !nama || !instansi || !jabatan || !nip) {
                showToast('⚠ Harap lengkapi semua kolom yang wajib diisi');
                $(this).addClass('state-error');
                const self = this;
                setTimeout(function() {
                    $(self).removeClass('state-error');
                }, 2000);
                return;
            }

            const signatureData = canvas.toDataURL('image/png');

            const data = {
                tanggal: tanggal,
                meeting_fk: meetingFk,
                nama_lengkap: nama,
                jabatan: jabatan,
                instansi: instansi,
                nip: nip,
                tanda_tangan: signatureData,
                _token: $('meta[name="csrf-token"]').attr('content') || ''
            };

            /* === AJAX ke Laravel === */
            $.ajax({
                url: 'presensi-meeting/submit',
                method: 'POST',
                data: data,
                success: function(res) {
                    showToast('✓ Data berhasil disimpan!');
                    $('#btnSubmit').addClass('state-success');
                    setTimeout(function() {
                        $('#btnSubmit').removeClass('state-success');
                    }, 2500);

                    /* Reset form */
                    $('#tanggalrapat, #namalengkap, #instansi, #jabatan, #nip').val('');
                    $('#meeting_search, #meeting_fk').val('');
                    ctx.clearRect(0, 0, canvas.width, canvas.height);
                    ctx.beginPath();
                    hasSig = false;
                    placeholder.style.opacity = '1';
                    sigWrap.classList.remove('is-drawing');
                },
                error: function(err) {
                    showToast('Gagal menyimpan data. Coba lagi.');
                    console.error(err);
                }
            });
        });
    </script>
</body>

</html>
