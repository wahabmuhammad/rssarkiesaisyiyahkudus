<!doctype html>
<html lang="id">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>@yield('title','Admin')</title>

  {{-- VENDOR CSS --}}
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">

  <style>
    :root{
      --blue-100:#e6f0ff; --blue-600:#2563eb; --bg:linear-gradient(135deg,#eef6ff,#f7fbff);
      --card-radius:18px;
    }
    html,body{height:100%}
    body{ background:var(--bg); overflow-x:hidden; } /* cegah geser samping */
    .admin-shell{ min-height:100dvh; }

    /* ===== Sidebar (desktop) ===== */
    .sidebar-skin .nav-link{ border-radius:12px; padding:.7rem .9rem; display:flex; gap:.6rem; font-weight:500; color:#334155; }
    .sidebar-skin .nav-link.active{ background:var(--blue-600); color:#fff; box-shadow:0 6px 14px rgba(37,99,235,.25); }
    .sidebar-skin .nav-link:hover{ background:var(--blue-100); }

    @media (min-width: 992px){ /* ≥ lg */
      .sidebar-wrap{
        position:sticky; top:0; height:100dvh; padding:18px 14px;
        background:rgba(255,255,255,.7); backdrop-filter:blur(8px);
        border-right:1px solid rgba(0,0,0,.06);
      }
    }

    /* ===== Topbar & komponen umum ===== */
    .topbar{ padding:10px 0; }
    .searchbox{ background:#fff; border-radius:999px; padding:8px 14px; border:1px solid rgba(0,0,0,.06); max-width:480px; }
    .card-soft{ border:0; border-radius:var(--card-radius); box-shadow:0 8px 24px rgba(20,44,90,.06); background:#fff; }

    /* Hindari konten nabrak tepi di mobile */
    .content{ padding-top: .5rem; }

    /* Topbar transparan, dengan backdrop biru menempel, TANPA shadow/border */
    .navbar.topbar{
      position: sticky; top: 0; z-index: 1040;
      background: transparent !important;
      border: 0 !important;                 /* kalau mau tetap ada garis tipis, hapus baris ini */
    }
    .navbar.topbar::before{
      content:"";
      position:absolute; inset:0;
      background: var(--bg);                 /* gradient biru yang sama */
      pointer-events:none;
      z-index:-1;
      box-shadow: none !important;           /* no shadow */
    }

    /* (opsional) ruang aman iPhone notch */
    .navbar.topbar .container-fluid{ min-height:56px; padding-block:.375rem; }

    /* Untuk offcanvas sidebar di mobile (lebar penuh) */
    .offcanvas-start {
      width: 100% !important;
      max-width: 100%;
    }

    .offcanvas .offcanvas-body {
      font-size: 16px !important; /* Ukuran font minimal untuk readability */
    }

    /* Perbesar teks di dalam sidebar offcanvas */
    .offcanvas .nav-link {
      font-size: 18px;
      padding: 12px 16px;
    }

    /* Perbesar icon */
    .offcanvas .bi {
      font-size: 1.2rem;
    }

    /* Pastikan konten tidak melebihi lebar viewport */
    .offcanvas .container-fluid,
    .offcanvas .row,
    .offcanvas [class*="col-"] {
      max-width: 100% !important;
    }

    /* Hindari elemen konten yang terlalu lebar */
    .offcanvas * {
      max-width: 100%;
    }

    /* Contoh: jika ada tabel lebar, berikan overflow scroll */
    .table-responsive {
      overflow-x: auto;
    }
  </style>

  @stack('head')
</head>
<body>

  {{-- ===== Sidebar (MOBILE) sebagai Offcanvas ===== --}}
  <div class="offcanvas offcanvas-start d-lg-none" tabindex="-1" id="sidebarOffcanvas" aria-labelledby="sidebarOffcanvasLabel">
    <div class="offcanvas-header">
      <h5 class="offcanvas-title" id="sidebarOffcanvasLabel">Menu</h5>
      <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Tutup"></button>
    </div>
    <div class="offcanvas-body p-0 sidebar-skin">
      {{-- HATI2: kalau di partial ada elemen dg id yang sama, bisa bentrok (karena partial dipakai 2x). Usahakan gunakan class, bukan id. --}}
      @include('admin.partials.sidebar')
    </div>
  </div>

  <div class="container-fluid admin-shell px-0">
    <div class="row g-0 g-lg-3 align-items-stretch">
      {{-- ===== Sidebar (DESKTOP) ===== --}}
      <aside class="col-12 col-lg-2 d-none d-lg-block">
        <div class="sidebar-wrap sidebar-skin">
          @include('admin.partials.sidebar')
        </div>
      </aside>

      {{-- ===== Konten ===== --}}
      <main class="col-12 col-lg-10 py-3 px-3 px-lg-4">
        {{-- Topbar dengan tombol buka sidebar saat mobile --}}
        <nav class="topbar navbar sticky-top">
          <div class="container-fluid px-2 d-flex align-items-center gap-2 flex-nowrap">
            {{-- Burger: tetap di layout --}}
            <button class="btn p-2 d-lg-none flex-shrink-0" type="button"
                    data-bs-toggle="offcanvas" data-bs-target="#sidebarOffcanvas"
                    aria-controls="sidebarOffcanvas" aria-label="Buka menu">
              <i class="bi bi-list fs-3"></i>
            </button>

            {{-- Search + Avatar dari partial (tanpa burger) --}}
            @include('admin.partials.topbar')
          </div>
        </nav>


        <div class="content">
          @yield('content')
        </div>
      </main>
    </div>
  </div>

  {{-- VENDOR JS --}}
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  @stack('scripts')
</body>
</html>
