{{-- resources/views/fasilitas/intensive-care.blade.php --}}
@extends('components.layouts.public')
@section('title','Intensive Care')

@push('head')
<style>
  .page-crumb{font-size:.95rem;color:#6b7280}
  .coe-shell{padding-top:14px;padding-bottom:60px}

  .coe-title{
    font-weight:600; font-size:clamp(1.125rem,1.9vw,1.75rem);
    color:#000; letter-spacing:.2px; line-height:1.25; margin-bottom:.5rem;
  }
  /* Besarkan title di mobile */
  @media (max-width:575.98px){
    .coe-title{ font-size:1.65rem; }
  }

  /* Sidebar fasilitas */
  .coe-left{
    border:1px solid #e5e7eb;border-radius:16px;background:#fff;
    box-shadow:0 8px 24px rgba(16,24,40,.06)
  }
  .coe-left .list-group-item{border:0;border-bottom:1px solid #f1f5f9;padding:.75rem 1rem;color:#111827}
  .coe-left .list-group-item:last-child{border-bottom:0}
  .coe-left .list-group-item.active{background:#E9F2FF;color:#1E88E5;font-weight:700}

  /* Desktop: sejajarkan judul & sticky sidebar */
  @media (min-width: 992px){
    :root{ --align-gap: 12px; }
    .align-top{ margin-top: var(--align-gap); }
    .sticky-wrap{ position: sticky; top: 0; align-self: flex-start; }
  }

  /* Frame carousel */
  .media-frame{
    position:relative;border-radius:20px;overflow:hidden;background:#f8fafc;
    box-shadow:0 12px 40px rgba(16,24,40,.08)
  }
  .media-frame .ratio-16x9{width:100%;aspect-ratio:16/9;background:#fff}
  .media-frame img{width:100%;height:100%;object-fit:cover}

  /* Kartu putih */
  .desc-card{
    border-radius:18px;background:#fff;border:1px solid #eef2f7;
    box-shadow:0 8px 24px rgba(16,24,40,.06)
  }
</style>
@endpush

@section('content')
<div class="container">
  {{-- Breadcrumb --}}
  <nav class="page-crumb my-3" aria-label="breadcrumb">
    <ol class="breadcrumb mb-0">
      <li class="breadcrumb-item"><a href="{{ url('/') }}">Beranda</a></li>
      <li class="breadcrumb-item"><a href="{{ url('/fasilitas') }}">Fasilitas dan Layanan</a></li>
      <li class="breadcrumb-item active" aria-current="page">Intensive Care</li>
    </ol>
  </nav>

  {{-- ====== LAYOUT FLEKSIBEL ====== --}}
  <div class="coe-shell row g-4 align-items-start">

    {{-- A. TITLE + CAROUSEL (mobile: 1, desktop: kanan/atas) --}}
    <div class="col-12 col-lg-8 order-1 order-lg-2">
      <div class="align-top">
        <h1 class="coe-title">Intensive Care</h1>
      </div>

      <div id="icu-gallery" class="carousel slide media-frame mb-lg-4" data-bs-ride="false">
        <div class="carousel-inner ratio-16x9">
          <div class="carousel-item active">
            <img src="{{ asset('assets/img/icu/icu-1.jpg') }}" alt="Bed ICU & monitor multiparameter">
          </div>
          <div class="carousel-item">
            <img src="{{ asset('assets/img/icu/icu-2.jpg') }}" alt="Ventilator & perangkat dukungan napas">
          </div>
          <div class="carousel-item">
            <img src="{{ asset('assets/img/icu/icu-3.jpg') }}" alt="Area perawatan intensif">
          </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#icu-gallery" data-bs-slide="prev" aria-label="Sebelumnya">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#icu-gallery" data-bs-slide="next" aria-label="Berikutnya">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
        </button>
      </div>
    </div>

    {{-- B. SIDEBAR FASILITAS (mobile: 2, desktop: kiri sticky) --}}
    <div class="col-12 col-lg-4 order-2 order-lg-1">
      <div class="align-top">
        <div class="sticky-wrap">
          @include('fasilitas.sidebar')
        </div>
      </div>
    </div>

    {{-- C. KONTEN ICU (mobile: 3, desktop: kanan/bawah) --}}
    <div class="col-12 col-lg-8 order-3 order-lg-2 offset-lg-4">

      {{-- Tentang ICU + Fasilitas Utama --}}
      <div class="desc-card p-4 mb-4">
        <h2 class="h5 mb-3">Tentang Intensive Care (ICU)</h2>
        <p>
          Unit Perawatan Intensif (ICU) kami memberikan penanganan pasien kondisi kritis
          dengan pemantauan ketat, dukungan alat lengkap, dan kolaborasi tim multidisiplin.
        </p>
        <h3 class="h6 mt-3">Fasilitas Utama</h3>
        <ul class="mb-0">
          <li>Ventilator canggih &amp; dukungan oksigen sentral</li>
          <li>Monitor multiparameter bedside &amp; sentral</li>
          <li>Infusion pump &amp; syringe pump pada setiap bed</li>
          <li>Fasilitas isolasi &amp; pengendalian infeksi</li>
          <li>CRRT/hemodialisis* bekerja sama dengan nefrologi</li>
          <li>Pemeriksaan penunjang bedside* (X-ray portabel, USG point-of-care)</li>
          <li>Akses cepat ke lab &amp; radiologi 24 jam</li>
          <li>Ruang tunggu keluarga &amp; edukasi pendamping</li>
        </ul>
      </div>

      {{-- Informasi Layanan --}}
      <div class="desc-card p-4 mb-4">
        <h3 class="h6 mb-3">Informasi Layanan</h3>
        <table class="table table-sm mb-0">
          <tbody>
            <tr><td class="text-muted" style="width:230px">Kapasitas</td><td>Beberapa tempat tidur dengan pemantauan individual</td></tr>
            <tr><td class="text-muted">Rasio Keperawatan</td><td>Penugasan perawat khusus per pasien (sesuai kondisi klinis)</td></tr>
            <tr><td class="text-muted">Jam Kunjungan</td><td>Sesuai kebijakan unit &amp; kondisi pasien</td></tr>
            <tr><td class="text-muted">Lokasi</td><td>Gedung C, Lantai 2 (ICU)</td></tr>
            <tr><td class="text-muted">Koordinasi</td><td>Kolaborasi dokter penanggung jawab pasien &amp; tim ICU</td></tr>
            <tr><td class="text-muted">Catatan</td><td>*Tergantung indikasi klinis &amp; ketersediaan</td></tr>
          </tbody>
        </table>
      </div>

      {{-- Dukungan tambahan --}}
      <div class="desc-card p-4">
        <h3 class="h6 mb-3">Dukungan</h3>
        <ul class="mb-0">
          <li>Pemantauan 24/7 oleh tim perawat terlatih</li>
          <li>Tata laksana berbasis protokol keselamatan pasien</li>
          <li>Edukasi keluarga &amp; perencanaan perawatan lanjutan</li>
        </ul>
      </div>

    </div>
  </div>
</div>
@endsection
