{{-- resources/views/public/header.blade.php --}}

@once
  {{-- SISIPKAN TAG PENTING KE <head> (sekali saja) --}}
  <script>
  (function(){
    function add(tag, attrs){
      if (attrs.id && document.head.querySelector('#'+attrs.id)) return;
      var el=document.createElement(tag);
      for (var k in attrs){ el.setAttribute(k, attrs[k]); }
      document.head.appendChild(el);
    }
    // meta viewport
    if (!document.head.querySelector('meta[name="viewport"]')){
      add('meta', {name:'viewport', content:'width=device-width, initial-scale=1'});
    }
    // CSS vendor & main
    add('link', {id:'css-bootstrap', rel:'stylesheet', href:'{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css') }}'});
    add('link', {id:'css-bicons',   rel:'stylesheet', href:'{{ asset('assets/vendor/bootstrap-icons/bootstrap-icons.css') }}'});
    add('link', {id:'css-main',     rel:'stylesheet', href:'{{ asset('assets/css/style.css') }}'});
  })();
  </script>
  {{-- Fallback jika JS mati --}}
  <noscript>
    <link id="css-bootstrap" rel="stylesheet" href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css') }}">
    <link id="css-bicons" rel="stylesheet" href="{{ asset('assets/vendor/bootstrap-icons/bootstrap-icons.css') }}">
    <link id="css-main" rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
  </noscript>

  <style>
    /* ===== Variabel & offset default (aman sebelum JS jalan) ===== */
    :root{
      --topbar-h: 40px;
      --hdr-h-m: 60px;   /* tinggi header mobile */
      --hdr-h-d: 68px;   /* tinggi header desktop */
      --header-offset: var(--hdr-h-m); /* default: minimal agar konten tidak ketutup */
    }
    @media (min-width: 992px){
      :root{ --header-offset: calc(var(--hdr-h-d) + var(--topbar-h)); }
    }

    /* Body diberi padding-top sesuai tinggi header (+topbar desktop) */
    body { padding-top: var(--header-offset); }
    :where([id], section) { scroll-margin-top: calc(var(--header-offset) + 16px); }

    /* ===== Guard responsif: jangan biarkan container ngunci lebar di HP ===== */
    @media (max-width:575.98px){
      .container, .container-sm, .container-md, .container-lg, .container-xl, .container-xxl{
        max-width:100% !important; padding-left:16px; padding-right:16px;
      }
      .table th,.table td{ white-space:normal; }
    }

    /* ===== Z-index & ukuran agar header PASTI terlihat ===== */
    /* urutan: dropdown(1000) < header(1044) < offcanvas(1045) < modal(1050) */
    #topbar{ z-index:1045; } /* topbar sedikit di atas header saat terlihat */
    #header{ z-index:1044; } /* header di atas konten apapun */

    /* Logo sizing */
    #siteLogo { height: calc(var(--hdr-h-m) - 18px); width:auto; }
    @media (min-width: 992px) { #siteLogo { height: calc(var(--hdr-h-d) - 20px); } }

    /* Desktop: menu & topbar behavior */
    @media (min-width: 992px){
      #header .navbar > .container-fluid > ul.navbar-nav{
        display:flex !important; visibility:visible !important; opacity:1 !important;
      }
      #header .navbar .dropdown-menu{ z-index:1051; } /* di atas header */
      #header{ top: var(--topbar-h); transition: top .25s ease; }
      #topbar{ transition: transform .25s ease, opacity .2s ease, height .25s ease, padding .25s ease; }
      #topbar.topbar-hidden{
        transform: translateY(-100%); opacity:0; height:0 !important; padding-top:0 !important; padding-bottom:0 !important; overflow:hidden;
      }
      #topbar.topbar-hidden + #header{ top: 0; }
    }

    /* Mobile/tablet: topbar disembunyikan, header menempel ke atas */
    @media (max-width: 991.98px){ #header { top: 0 !important; } }

    /* === Sinkronkan tinggi header dengan blok biru === */
    #header{ padding:0 !important; height: var(--hdr-h-m) !important; }
    #header .navbar{ padding:0 !important; height:100%; }
    #header .navbar .navbar-brand,
    #header .navbar .nav-link{ display:flex; align-items:center; height:100%; }
    @media (min-width: 992px){
      #header{ height: var(--hdr-h-d) !important; }
    }

    /* Tipiskan jarak antar link */
    #header .nav-link{ padding-top:0; padding-bottom:0; }

    /* ===== Offcanvas DRILL-DOWN ===== */
    #offcanvasNav .menu-panel{ display:none; }
    #offcanvasNav .menu-panel.active{ display:block; }
    #offcanvasNav .list-group-item{ border:0; border-bottom:1px solid rgba(0,0,0,.06); }
    #offcanvasNav .menu-header{ display:flex; align-items:center; padding:.5rem 0; border-bottom:1px solid rgba(0,0,0,.1); margin-bottom:.5rem; }
    #offcanvasNav .btn-back{ width:44px; height:44px; display:inline-flex; align-items:center; justify-content:center; padding:0; }
  </style>
@endonce

<!-- ======= Top Bar (desktop only) ======= -->
<div id="topbar" class="d-none d-lg-flex align-items-center position-fixed top-0 start-0 end-0"
     style="background-color:#2d8b84; color:#fff; height:40px;">
  <div class="container-fluid d-flex align-items-center justify-content-between">
    <div class="d-flex align-items-center">
      <a class="nav-link scrollto text-white fw-bold me-3 p-0" href="{{ url('/') }}#contact">Hubungi Kami</a>
    </div>
    <div class="d-flex align-items-center">
      <i class="bi bi-whatsapp p-1 ms-3"></i> <span>0858-1415-0000</span>
      <i class="bi bi-telephone p-1 ms-3"></i> <span>(0291) 4150501</span>
    </div>
  </div>
</div>

<!-- ======= Header / Navbar ======= -->
<header id="header" class="fixed-top bg-white border-bottom">
  <nav class="navbar navbar-expand-lg navbar-light bg-white" role="navigation" aria-label="Main navigation">
    <div class="container-fluid ps-0">
      <!-- Logo -->
      <a href="{{ url('/') }}" class="navbar-brand me-auto">
        <img src="{{ asset('/assets/img/logo_sarkies.png') }}" alt="Rumah Sakit Sarkies 'Aisyiyah Kudus" id="siteLogo">
      </a>

      <!-- Burger -->
      <button class="navbar-toggler border-0" type="button"
              data-bs-toggle="offcanvas" data-bs-target="#offcanvasNav" aria-controls="offcanvasNav" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <!-- MENU DESKTOP -->
      <ul class="navbar-nav d-none d-lg-flex ms-auto align-items-center mb-0">
        <li class="nav-item"><a class="nav-link text-dark fw-bold" href="{{ url('/') }}#hero">Beranda</a></li>
        <li class="nav-item"><a class="nav-link text-dark fw-bold" href="{{ url('/') }}#about">Rumah Sakit Kami</a></li>

        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle text-dark fw-bold" href="#" id="ddCoE" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Center Of Excellence
          </a>
          <ul class="dropdown-menu" aria-labelledby="ddCoE">
            <li><a class="dropdown-item" href="{{ route('pain-center') }}">Pain Clinic</a></li>
            <li><a class="dropdown-item" href="{{ route('pain-center') }}">MCU</a></li>
            <li><a class="dropdown-item" href="{{ route('pain-center') }}">Vaksin</a></li>
            <li><a class="dropdown-item" href="{{ route('klinik-kandungan') }}">Klinik Kandungan dan Kebidanan</a></li>
          </ul>
        </li>

        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle text-dark fw-bold" href="#" id="ddFasilitas" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Fasilitas dan Layanan
          </a>
          <ul class="dropdown-menu" aria-labelledby="ddFasilitas">
            <li><a class="dropdown-item" href="{{ route('diagnostic-center') }}">Diagnostic Center</a></li>
            <li><a class="dropdown-item" href="{{ route('intensive-care') }}">Intensive Care</a></li>
            <li><a class="dropdown-item" href="{{ route('rehabilitasi') }}">Rehabilitasi Medik & Fisioterapi</a></li>
            <li><a class="dropdown-item" href="{{ route('farmasi') }}">Farmasi</a></li>
            <li><a class="dropdown-item" href="{{ route('emergency') }}">Emergency</a></li>
            <li><a class="dropdown-item" href="{{ route('asuransi') }}">Perusahaan Asuransi Mitra</a></li>
          </ul>
        </li>

        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle text-dark fw-bold" href="#" id="ddRawatInap" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Fasilitas Rawat Inap
          </a>
          <ul class="dropdown-menu" aria-labelledby="ddRawatInap">
            <li><a class="dropdown-item" href="{{ route('vip-a') }}">VIP A</a></li>
            <li><a class="dropdown-item" href="{{ route('vip-a') }}">VIP B</a></li>
            <li><a class="dropdown-item" href="{{ route('vip-a') }}">Kelas 1</a></li>
            <li><a class="dropdown-item" href="{{ route('vip-a') }}">Kelas 2</a></li>
            <li><a class="dropdown-item" href="{{ route('vip-a') }}">Kelas 3</a></li>
            <li><a class="dropdown-item" href="{{ route('vip-a') }}">ICU</a></li>
          </ul>
        </li>

        <li class="nav-item"><a class="nav-link text-dark fw-bold" href="{{ route('karir') }}">Karir</a></li>

        <li class="nav-item ms-2">
          <a href="{{ route('auth-modal') }}" class="btn fw-bold"
             style="background-color:#1E88E5; color:#fff; border-radius:5px; padding:8px 16px; white-space:nowrap;">
            Masuk
          </a>
        </li>
      </ul>
    </div>
  </nav>
</header>

<!-- ======= Offcanvas (mobile) ======= -->
<div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNav" aria-labelledby="offcanvasNavLabel">
  <div class="offcanvas-header border-bottom">
    <div class="d-flex align-items-center">
      <img src="{{ asset('/assets/img/logo_sarkies.png') }}" alt="" style="height:36px" class="me-2">
    </div>
    <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Tutup"></button>
  </div>

  <div class="offcanvas-body" id="offcanvasNavBody">
    <!-- ROOT -->
    <div class="menu-panel active" id="menu-root">
      <ul class="list-group list-group-flush">
        <li class="list-group-item px-0"><a class="d-block py-2" href="{{ url('/') }}#hero">Beranda</a></li>
        <li class="list-group-item px-0"><a class="d-block py-2" href="{{ url('/') }}#about">Rumah Sakit Kami</a></li>
        <li class="list-group-item px-0">
          <button type="button" class="btn w-100 d-flex justify-content-between align-items-center py-2 px-0" data-menu-target="menu-coe">
            <span class="fw-semibold text-start">Center Of Excellence</span><i class="bi bi-chevron-right"></i>
          </button>
        </li>
        <li class="list-group-item px-0">
          <button type="button" class="btn w-100 d-flex justify-content-between align-items-center py-2 px-0" data-menu-target="menu-fasilitas">
            <span class="fw-semibold text-start">Fasilitas dan Layanan</span><i class="bi bi-chevron-right"></i>
          </button>
        </li>
        <li class="list-group-item px-0">
          <button type="button" class="btn w-100 d-flex justify-content-between align-items-center py-2 px-0" data-menu-target="menu-rawat">
            <span class="fw-semibold text-start">Fasilitas Rawat Inap</span><i class="bi bi-chevron-right"></i>
          </button>
        </li>
        <li class="list-group-item px-0"><a class="d-block py-2" href="{{ route('karir') }}">Karir</a></li>
      </ul>
      <div class="mt-3">
        <a href="{{ route('auth-modal') }}" class="btn w-100 fw-bold" style="background-color:#1E88E5; color:#fff; border-radius:5px; padding:10px 16px;">
          Masuk
        </a>
      </div>
    </div>

    <!-- COE -->
    <div class="menu-panel" id="menu-coe">
      <div class="menu-header">
        <button class="btn btn-back me-2" type="button" aria-label="Kembali" data-menu-back="menu-root"><i class="bi bi-arrow-left"></i></button>
        <h6 class="mb-0">Center Of Excellence</h6>
      </div>
      <ul class="list-group list-group-flush">
        <li class="list-group-item px-0"><a class="d-block py-2" href="{{ route('pain-center') }}">Pain Clinic</a></li>
        <li class="list-group-item px-0"><a class="d-block py-2" href="{{ route('pain-center') }}">MCU</a></li>
        <li class="list-group-item px-0"><a class="d-block py-2" href="{{ route('pain-center') }}">Vaksin</a></li>
        <li class="list-group-item px-0"><a class="d-block py-2" href="{{ route('klinik-kandungan') }}">Klinik Kandungan & Kebidanan</a></li>
      </ul>
    </div>

    <!-- Fasilitas -->
    <div class="menu-panel" id="menu-fasilitas">
      <div class="menu-header">
        <button class="btn btn-back me-2" type="button" aria-label="Kembali" data-menu-back="menu-root"><i class="bi bi-arrow-left"></i></button>
        <h6 class="mb-0">Fasilitas dan Layanan</h6>
      </div>
      <ul class="list-group list-group-flush">
        <li class="list-group-item px-0"><a class="d-block py-2" href="{{ route('diagnostic-center') }}">Diagnostic Center</a></li>
        <li class="list-group-item px-0"><a class="d-block py-2" href="{{ route('intensive-care') }}">Intensive Care</a></li>
        <li class="list-group-item px-0"><a class="d-block py-2" href="{{ route('rehabilitasi') }}">Rehabilitasi Medik & Fisioterapi</a></li>
        <li class="list-group-item px-0"><a class="d-block py-2" href="{{ route('farmasi') }}">Farmasi</a></li>
        <li class="list-group-item px-0"><a class="d-block py-2" href="{{ route('emergency') }}">Emergency</a></li>
        <li class="list-group-item px-0"><a class="d-block py-2" href="{{ route('asuransi') }}">Perusahaan Asuransi Mitra</a></li>
      </ul>
    </div>

    <!-- Rawat Inap -->
    <div class="menu-panel" id="menu-rawat">
      <div class="menu-header">
        <button class="btn btn-back me-2" type="button" aria-label="Kembali" data-menu-back="menu-root"><i class="bi bi-arrow-left"></i></button>
        <h6 class="mb-0">Fasilitas Rawat Inap</h6>
      </div>
      <ul class="list-group list-group-flush">
        <li class="list-group-item px-0"><a class="d-block py-2" href="{{ route('vip-a') }}">VIP A</a></li>
        <li class="list-group-item px-0"><a class="d-block py-2" href="{{ route('vip-a') }}">VIP B</a></li>
        <li class="list-group-item px-0"><a class="d-block py-2" href="{{ route('vip-a') }}">Kelas 1</a></li>
        <li class="list-group-item px-0"><a class="d-block py-2" href="{{ route('vip-a') }}">Kelas 2</a></li>
        <li class="list-group-item px-0"><a class="d-block py-2" href="{{ route('vip-a') }}">Kelas 3</a></li>
        <li class="list-group-item px-0"><a class="d-block py-2" href="{{ route('vip-a') }}">ICU</a></li>
      </ul>
    </div>
  </div>
</div>

<script>
/* Hitung offset header/topbar supaya body tidak ketutup */
(function () {
  const TOPBAR_H = 40, mq = window.matchMedia('(min-width:992px)');
  const topbar = document.getElementById('topbar');
  const header = document.getElementById('header');

  function update() {
    if (!header) return;
    const isDesktop = mq.matches;
    const topbarVisibleDesktop = isDesktop && topbar && getComputedStyle(topbar).display !== 'none';
    const y = window.pageYOffset || document.documentElement.scrollTop;

    if (topbarVisibleDesktop) {
      const hide = y > 40;
      topbar.classList.toggle('topbar-hidden', hide);
      header.style.top = hide ? '0px' : TOPBAR_H + 'px';
      const total = header.offsetHeight + (hide ? 0 : TOPBAR_H);
      document.documentElement.style.setProperty('--header-offset', total + 'px');
    } else {
      topbar && topbar.classList.add('topbar-hidden');
      header.style.top = '0px';
      document.documentElement.style.setProperty('--header-offset', header.offsetHeight + 'px');
    }
  }
  const rafUpdate = () => requestAnimationFrame(update);
  document.addEventListener('DOMContentLoaded', update);
  window.addEventListener('load', update);
  window.addEventListener('resize', rafUpdate);
  window.addEventListener('scroll', rafUpdate, { passive: true });
})();
</script>

<script>
/* Drill-down offcanvas */
(function () {
  const oc = document.getElementById('offcanvasNav');
  if (!oc) return;
  const showPanel = (id) => oc.querySelectorAll('.menu-panel').forEach(p => p.classList.toggle('active', p.id === id));
  oc.addEventListener('click', (e) => {
    const to = e.target.closest('[data-menu-target]'); if (to){ e.preventDefault(); showPanel(to.dataset.menuTarget); }
    const back = e.target.closest('[data-menu-back]'); if (back){ e.preventDefault(); showPanel(back.dataset.menuBack || 'menu-root'); }
  });
  oc.addEventListener('hidden.bs.offcanvas', () => showPanel('menu-root'));
})();
</script>

@once
  <script src="{{ asset('/assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
@endonce


