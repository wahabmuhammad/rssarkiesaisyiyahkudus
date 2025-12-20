{{-- resources/views/rawat-inap/vip-a.blade.php --}}
@extends('components.layouts.public')
@section('title','VIP A')

@push('head')
<style>
  .page-crumb{font-size:.95rem;color:#6b7280}
  .ri-shell{padding-top:14px;padding-bottom:60px}

  .ri-title{
    font-weight:600;
    font-size:clamp(1.125rem,1.9vw,1.75rem); /* desktop */
    color:#000; letter-spacing:.2px; line-height:1.25; margin-bottom:.5rem;
  }
  /* BESARKAN TITLE KHUSUS MOBILE */
  @media (max-width: 575.98px){
    .ri-title{ font-size:1.65rem; } /* silakan naikkan ke 1.75rem kalau mau lebih besar */
  }

  /* Sidebar (reuse gaya COE) */
  .coe-left{
    border:1px solid #e5e7eb;border-radius:16px;background:#fff;
    box-shadow:0 8px 24px rgba(16,24,40,.06);
  }
  .coe-left .list-group-item{border:0;border-bottom:1px solid #f1f5f9;padding:.75rem 1rem;color:#111827}
  .coe-left .list-group-item:last-child{border-bottom:0}
  .coe-left .list-group-item.active{
    background:#E9F2FF;color:#1E88E5;font-weight:700;
    border:0 !important;border-bottom:1px solid #f1f5f9 !important;
  }

  /* Desktop: sidebar sticky */
  @media (min-width: 992px){
    :root{ --align-gap: 12px; }
    .align-top{ margin-top: var(--align-gap); }
    .sticky-wrap{ position: sticky; top: 0; align-self: flex-start; }
  }

  /* Carousel image frame (rapat) */
  .media-frame{
    position:relative;border-radius:20px;overflow:hidden;background:#f8fafc;
    box-shadow:0 8px 24px rgba(16,24,40,.08);
  }
  .media-frame .ratio-16x9{width:100%;aspect-ratio:16/9;background:#fff}
  .media-frame img{width:100%;height:100%;object-fit:cover}
  .media-tight{ margin-bottom: 10px !important; }

  /* Card putih */
  .desc-card{
    border-radius:18px;background:#fff;border:1px solid #eef2f7;
    box-shadow:0 8px 24px rgba(16,24,40,.06);
  }
  .desc-card h3{font-size:1rem;font-weight:700;margin-bottom:.35rem;color:#0f172a}

  .amenities{margin:0;padding-left:1.2rem}
  .amenities li{margin:.35rem 0;color:#475569;line-height:1.55}
</style>
@endpush

@section('content')
<div class="container">
  {{-- Breadcrumb --}}
  <nav class="page-crumb my-3" aria-label="breadcrumb">
    <ol class="breadcrumb mb-0">
      <li class="breadcrumb-item"><a href="{{ url('/') }}">Beranda</a></li>
      <li class="breadcrumb-item"><a href="{{ url('/rawat-inap') }}">Fasilitas Rawat Inap</a></li>
      <li class="breadcrumb-item active" aria-current="page">VIP A</li>
    </ol>
  </nav>

  {{-- === ROW DENGAN URUTAN FLEKSIBEL === --}}
  <div class="ri-shell row g-4 align-items-start">

    {{-- A. TITLE + CAROUSEL  (mobile: pertama, desktop: kanan/atas) --}}
    <div class="col-12 col-lg-8 order-1 order-lg-2">
      <div class="align-top">
        <h1 class="ri-title">VIP A</h1>
      </div>

      <div id="vipA-gallery" class="carousel slide media-frame media-tight" data-bs-ride="false">
        <div class="carousel-inner ratio-16x9">
          <div class="carousel-item active">
            <img src="{{ asset('assets/img/rawat-inap/vip-a-1.jpg') }}" alt="Kamar VIP A - Tampak Ruang">
          </div>
          <div class="carousel-item">
            <img src="{{ asset('assets/img/rawat-inap/vip-a-2.jpg') }}" alt="Kamar VIP A - Kamar Mandi">
          </div>
          <div class="carousel-item">
            <img src="{{ asset('assets/img/rawat-inap/vip-a-3.jpg') }}" alt="Kamar VIP A - Area Penunggu">
          </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#vipA-gallery" data-bs-slide="prev" aria-label="Sebelumnya">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#vipA-gallery" data-bs-slide="next" aria-label="Berikutnya">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
        </button>
      </div>
    </div>

    {{-- B. SIDEBAR  (mobile: kedua, desktop: kiri) --}}
    <div class="col-12 col-lg-4 order-2 order-lg-1">
      <div class="align-top">
        <div class="sticky-wrap">
          @include('ranap.sidebar')
        </div>
      </div>
    </div>

    {{-- C. DESKRIPSI (mobile: ketiga, desktop: kanan/bawah) --}}
    <div class="col-12 col-lg-8 order-3 order-lg-2 offset-lg-4">
      <div class="desc-card p-4">
        <h3>Fasilitas Utama</h3>
        <ul class="amenities">
          <li>AC</li>
          <li>Breakfast</li>
          <li>Penunggu Pasien</li>
          <li>Kamar Mandi — Air Panas &amp; Air Dingin</li>
          <li>Ventilator</li>
          <li>Ruang Tunggu Pasien</li>
          <li>Bedside Cabinet</li>
          <li>Central monitor</li>
        </ul>
      </div>
    </div>

  </div>
</div>
@endsection
