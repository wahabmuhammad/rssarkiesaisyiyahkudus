@php
  // helper kecil: kalau route belum ada, pakai fallback URL '#' biar tidak error
  $r = fn($name, $fallback = '#') => \Illuminate\Support\Facades\Route::has($name) ? route($name) : $fallback;

  // state grup aktif
  $isClinical = request()->routeIs('admin.doctors.*') || request()->routeIs('admin.departments.*') || request()->routeIs('admin.schedules.*');
  $isContent  = request()->routeIs('admin.content.*')  || request()->routeIs('admin.articles.*') || request()->routeIs('admin.banners.*') || request()->routeIs('admin.centers.*');
  $isMedia    = request()->routeIs('admin.media.*');
  $isMenus    = request()->routeIs('admin.menus.*');
  $isReports  = request()->routeIs('admin.reports.*') || request()->routeIs('admin.logs.*');
@endphp

<div class="brand d-flex align-items-center gap-2 mb-2">
  <i class="bi bi-hexagon-fill fs-4 text-primary"></i>
  <strong>RS Sarkies 'Aisyiyah Kudus</strong>
</div>

<nav class="nav flex-column">

  {{-- Dashboard --}}
  <a class="nav-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}"
     href="{{ $r('admin.dashboard', url('/admin/dashboard')) }}">
    <i class="bi bi-house-fill"></i> Dashboard
  </a>

  <hr class="my-2">

  {{-- JADWAL & KLINIS --}}
  <a class="nav-link {{ $isClinical ? 'active' : '' }}" data-bs-toggle="collapse" href="#navClinical"
     aria-expanded="{{ $isClinical ? 'true' : 'false' }}">
    <i class="bi bi-clipboard2-pulse"></i> Jadwal & Klinis
    <i class="bi bi-chevron-down ms-auto"></i>
  </a>
  <div class="collapse {{ $isClinical ? 'show' : '' }}" id="navClinical">
    <a class="nav-link ps-4 {{ request()->routeIs('admin.doctors.*') ? 'active' : '' }}"
       href="{{ $r('admin.doctors.index', url('/admin/doctors')) }}">
      <i class="bi bi-person-badge"></i> Dokter
    </a>
    <a class="nav-link ps-4 {{ request()->routeIs('admin.departments.*') ? 'active' : '' }}"
       href="{{ $r('admin.departments.index', url('/admin/departments')) }}">
      <i class="bi bi-diagram-3"></i> Poli / Departemen
    </a>
    <a class="nav-link ps-4 {{ request()->routeIs('admin.schedules.*') ? 'active' : '' }}"
       href="{{ $r('admin.schedules.index', url('/admin/schedules')) }}">
      <i class="bi bi-calendar-event"></i> Jadwal Dokter
    </a>
  </div>

  <hr class="my-2">

  {{-- KONTEN WEBSITE --}}
  <a class="nav-link {{ $isContent ? 'active' : '' }}" data-bs-toggle="collapse" href="#navContent"
     aria-expanded="{{ $isContent ? 'true' : 'false' }}">
    <i class="bi bi-window-stack"></i> Konten Website
    <i class="bi bi-chevron-down ms-auto"></i>
  </a>
  <div class="collapse {{ $isContent ? 'show' : '' }}" id="navContent">
    {{-- a. Hero/Banner & Popup Dokter --}}
    <a class="nav-link ps-4 {{ request()->routeIs('admin.hero.*') || request()->routeIs('admin.hero.*') ? 'active' : '' }}"
       href="{{ $r('admin.hero.index', $r('admin.hero.index', url('/admin/hero'))) }}">
      <i class="bi bi-aspect-ratio"></i> Hero/Banner & Popup Dokter
    </a>

    {{-- b. Halaman Statis --}}
    <a class="nav-link ps-4 {{ request()->routeIs('admin.carier.*') ? 'active' : '' }}"
       href="{{ $r('admin.carier.index') }}">
      <i class="bi bi-file-earmark-text"></i> Karier
    </a>

    {{-- c. Berita & Artikel --}}
    <a class="nav-link ps-4 {{ request()->routeIs('admin.articles.*') ? 'active' : '' }}"
       href="{{ $r('admin.articles.index', url('/admin/articles')) }}">
      <i class="bi bi-newspaper"></i> Berita & Artikel
    </a>

    {{-- d. Center of Excellence / Layanan --}}
    <a class="nav-link ps-4 {{ request()->routeIs('admin.centers.*') || request()->routeIs('admin.centers.*') ? 'active' : '' }}"
       href="{{ $r('admin.centers.index') }}">
      <i class="bi bi-stars"></i> Center of Excellence / Layanan
    </a>

    {{-- e. Penghargaan & Akreditasi --}}
    <a class="nav-link ps-4 {{ request()->routeIs('admin.awards.*') ? 'active' : '' }}"
       href="{{ $r('admin.awards.index') }}">
      <i class="bi bi-award"></i> Penghargaan & Akreditasi
    </a>

    {{-- f. Mitra Asuransi --}}
    <a class="nav-link ps-4 {{ request()->routeIs('admin.insurers.*') ? 'active' : '' }}"
       href="{{ $r('admin.insurers.index') }}">
      <i class="bi bi-building"></i> Mitra Asuransi (BPJS/Swasta)
    </a>

    {{-- g. FAQ & Testimoni --}}
    <a class="nav-link ps-4 {{ request()->routeIs('admin.faq.*') ? 'active' : '' }}"
       href="{{ $r('admin.faq.index') }}">
      <i class="bi bi-question-circle"></i> FAQ & Testimoni
    </a>
  </div>

  <hr class="my-2">

  {{-- MEDIA LIBRARY --}}
  <a class="nav-link {{ $isMedia ? 'active' : '' }}" data-bs-toggle="collapse" href="#navMedia"
     aria-expanded="{{ $isMedia ? 'true' : 'false' }}">
    <i class="bi bi-images"></i> Media Library
    <i class="bi bi-chevron-down ms-auto"></i>
  </a>
  <div class="collapse {{ $isMedia ? 'show' : '' }}" id="navMedia">
    <a class="nav-link ps-4 {{ request()->routeIs('admin.media.index') ? 'active' : '' }}"
       href="{{ $r('admin.media.index') }}">
      <i class="bi bi-folder2-open"></i> Semua Media
    </a>
  </div>

  <hr class="my-2">

  {{-- MENU & NAVIGASI --}}
  <a class="nav-link {{ $isMenus ? 'active' : '' }}" data-bs-toggle="collapse" href="#navMenus"
     aria-expanded="{{ $isMenus ? 'true' : 'false' }}">
    <i class="bi bi-menu-button-wide"></i> Menu & Navigasi
    <i class="bi bi-chevron-down ms-auto"></i>
  </a>
  <div class="collapse {{ $isMenus ? 'show' : '' }}" id="navMenus">
    <a class="nav-link ps-4 {{ request()->routeIs('admin.menus.header') ? 'active' : '' }}"
       href="{{ $r('admin.menus.header') }}">
      <i class="bi bi-layout-text-window-reverse"></i> Header
    </a>
    <a class="nav-link ps-4 {{ request()->routeIs('admin.menus.footer') ? 'active' : '' }}"
       href="{{ $r('admin.menus.footer') }}">
      <i class="bi bi-layout-sidebar-inset-reverse"></i> Footer
    </a>
    <a class="nav-link ps-4 {{ request()->routeIs('admin.menus.offcanvas') ? 'active' : '' }}"
       href="{{ $r('admin.menus.offcanvas') }}">
      <i class="bi bi-layout-sidebar"></i> Offcanvas
    </a>
  </div>

  <hr class="my-2">

  {{-- LAPORAN & LOG --}}
  <a class="nav-link {{ $isReports ? 'active' : '' }}" data-bs-toggle="collapse" href="#navReports"
     aria-expanded="{{ $isReports ? 'true' : 'false' }}">
    <i class="bi bi-graph-up"></i> Laporan & Log
    <i class="bi bi-chevron-down ms-auto"></i>
  </a>
  <div class="collapse {{ $isReports ? 'show' : '' }}" id="navReports">
    <a class="nav-link ps-4 {{ request()->routeIs('admin.reports.schedules') ? 'active' : '' }}"
       href="{{ $r('admin.reports.schedules') }}">
      <i class="bi bi-calendar3"></i> Laporan Jadwal
    </a>
    <a class="nav-link ps-4 {{ request()->routeIs('admin.reports.content') ? 'active' : '' }}"
       href="{{ $r('admin.reports.content') }}">
      <i class="bi bi-bar-chart"></i> Laporan Konten
    </a>
    <a class="nav-link ps-4 {{ request()->routeIs('admin.logs.activity') ? 'active' : '' }}"
       href="{{ $r('admin.logs.activity') }}">
      <i class="bi bi-clipboard-check"></i> Activity Log
    </a>
  </div>

  <hr class="my-2">

  {{-- PENGATURAN --}}
  <a class="nav-link {{ request()->routeIs('admin.settings*') || request()->routeIs('admin.settings') ? 'active' : '' }}"
    href="{{ route(\Illuminate\Support\Facades\Route::has('admin.settings.index') ? 'admin.settings.index' : 'admin.settings') }}">
    <i class="bi bi-gear"></i> Pengaturan
  </a>


  {{-- Keluar --}}
  <form action="{{ $r('logout', url('/logout')) }}" method="POST" class="mt-auto">
    @csrf
    <button class="nav-link w-100 text-start"><i class="bi bi-box-arrow-right"></i> Keluar</button>
  </form>
</nav>
