{{-- resources/views/fasilitas/emergency.blade.php --}}
@extends('components.layouts.public')
@section('title','Emergency')

@php
  // Ubah sesuai nomor IGD/Ambulans yang benar
  $ambulanceNumber = $ambulanceNumber ?? '0858-1415-0000';
@endphp

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

  /* Sidebar gaya fasilitas/COE */
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

  /* Carousel frame (rapi) */
  .media-frame{
    position:relative;border-radius:20px;overflow:hidden;background:#f8fafc;
    box-shadow:0 12px 40px rgba(16,24,40,.08)
  }
  .media-frame .ratio-16x9{width:100%;aspect-ratio:16/9;background:#fff}
  .media-frame img{width:100%;height:100%;object-fit:cover}

  /* Kartu konten putih */
  .desc-card{
    border-radius:18px;background:#fff;border:1px solid #eef2f7;
    box-shadow:0 8px 24px rgba(16,24,40,.06)
  }

  /* Bantu copy nomor cepat */
  .copyable { user-select: all; }
</style>
@endpush

@section('content')
<div class="container">
  {{-- Breadcrumb --}}
  <nav class="page-crumb my-3" aria-label="breadcrumb">
    <ol class="breadcrumb mb-0">
      <li class="breadcrumb-item"><a href="{{ url('/') }}">Beranda</a></li>
      <li class="breadcrumb-item"><a href="{{ url('/fasilitas') }}">Fasilitas dan Layanan</a></li>
      <li class="breadcrumb-item active" aria-current="page">Emergency</li>
    </ol>
  </nav>

  {{-- ====== LAYOUT FLEKSIBEL ====== --}}
  <div class="coe-shell row g-4 align-items-start">

    {{-- A. TITLE + CAROUSEL (mobile: 1, desktop: kanan/atas) --}}
    <div class="col-12 col-lg-8 order-1 order-lg-2">
      <div class="align-top">
        <h1 class="coe-title">Emergency</h1>
      </div>

      <div id="igd-gallery" class="carousel slide media-frame mb-lg-4" data-bs-ride="false">
        <div class="carousel-inner ratio-16x9">
          <div class="carousel-item active">
            <img src="{{ asset('assets/img/igd/kamar-1.jpg') }}" alt="Ruang Observasi/Kamar IGD">
          </div>
          <div class="carousel-item">
            <img src="{{ asset('assets/img/igd/triase.jpg') }}" alt="Area Triase IGD">
          </div>
          <div class="carousel-item">
            <img src="{{ asset('assets/img/igd/belakang.jpg') }}" alt="Area belakang/akses ambulans IGD">
          </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#igd-gallery" data-bs-slide="prev" aria-label="Sebelumnya">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#igd-gallery" data-bs-slide="next" aria-label="Berikutnya">
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

    {{-- C. KONTEN (mobile: 3, desktop: kanan/bawah) --}}
    <div class="col-12 col-lg-8 order-3 order-lg-2 offset-lg-4">
      {{-- Ringkasan IGD --}}
      <div class="desc-card p-4 mb-4">
        <h2 class="h5 mb-3">Pelayanan IGD 24 Jam</h2>
        <p class="text-muted">
          IGD melayani <strong>24 jam</strong> dengan tim dokter dan perawat terlatih untuk penanganan
          kegawatdaruratan: kecelakaan, serangan jantung &amp; stroke, trauma, dan kondisi kritis lainnya.
        </p>
        <ul class="mb-0">
          <li>Respon cepat &amp; sistem triase terstandar</li>
          <li>Ruang observasi &amp; tindakan lengkap</li>
          <li>Terhubung ke Radiologi, ICU, dan Laboratorium 24/7</li>
        </ul>
      </div>

      {{-- Nomor Ambulans (teks besar, bisa di-copy) --}}
      <div class="desc-card p-4">
        <div class="text-uppercase small fw-bold text-secondary mb-2">Nomor Ambulans / IGD 24 Jam</div>
        {{-- Teks biasa: sengaja tidak memakai <a href="tel:..."> --}}
        <div class="display-5 fw-bold text-dark copyable" aria-label="Nomor Ambulans">
          {{ $ambulanceNumber }}
        </div>
      </div>
    </div>

  </div>
</div>
@endsection
