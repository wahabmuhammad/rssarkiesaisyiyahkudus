{{-- resources/views/fasilitas/healthy-corner.blade.php --}}
@extends('components.layouts.public')
@section('title','Healthy Corner')

@push('head')
<style>
  .page-crumb{font-size:.95rem;color:#6b7280}

  /* jarak vertikal halaman */
  .coe-shell{padding-top:14px;padding-bottom:24px;}

  .coe-title{
    font-weight:600; font-size:clamp(1.125rem,1.9vw,1.75rem);
    color:#000; letter-spacing:.2px; line-height:1.25; margin-bottom:.5rem;
  }
  @media (max-width:575.98px){
    .coe-title{ font-size:1.65rem; }
  }

  /* Sidebar kartu */
  .coe-left{
    border:1px solid #e5e7eb;border-radius:16px;background:#fff;
    box-shadow:0 8px 24px rgba(16,24,40,.06)
  }
  .coe-left .list-group-item{
    border:0;border-bottom:1px solid #f1f5f9;padding:.75rem 1rem;color:#111827
  }
  .coe-left .list-group-item:last-child{border-bottom:0}
  .coe-left .list-group-item.active{background:#E9F2FF;color:#1E88E5;font-weight:700}

  /* Samakan jarak antar blok */
  .coe-grid{ --bs-gutter-y: .75rem; }

  /* Desktop alignment & sticky */
  @media (min-width: 992px){
    :root{ --align-gap: 12px; }
    .align-top{ margin-top: var(--align-gap); }
    .sticky-wrap{ position: sticky; top: 0; align-self: flex-start; }
  }

  /* Frame gambar/carousel */
  .media-frame{
    position:relative;border-radius:20px;overflow:hidden;background:#f8fafc;
    box-shadow:0 12px 40px rgba(16,24,40,.08)
  }
  .media-frame .ratio-16x9{width:100%;aspect-ratio:16/9;background:#fff}

  /* Pendekkan carousel di desktop */
  @media (min-width: 992px){
    #hc-gallery .ratio-16x9{ aspect-ratio: 21/9; }
  }

  .media-frame img{width:100%;height:100%;object-fit:cover}

  /* Kartu layanan */
  .service-card{
    border-radius:16px;background:#fff;border:1px solid #eef2f7;
    box-shadow:0 8px 24px rgba(16,24,40,.06);
    padding:18px 18px;height:100%
  }
  .service-card h3{
    font-size:1rem;font-weight:700;margin-bottom:.35rem;color:#0f172a
  }
  .service-card p{
    margin:0;color:#475569;font-size:.95rem;line-height:1.55
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
      <li class="breadcrumb-item active" aria-current="page">Healthy Corner</li>
    </ol>
  </nav>

  <div class="coe-shell row g-4 align-items-start coe-grid">

    {{-- A. TITLE + CAROUSEL --}}
    <div class="col-12 col-lg-8 order-1 order-lg-2">
      <div class="align-top">
        <h1 class="coe-title">Healthy Corner</h1>
      </div>

      <div id="hc-gallery" class="carousel slide media-frame mb-0" data-bs-ride="false">
        <div class="carousel-inner ratio-16x9">
          <div class="carousel-item active">
            <img src="{{ asset('assets/img/healthy/healthy-1.jpg') }}" alt="Healthy Corner - Konsultasi Gizi">
          </div>
          <div class="carousel-item">
            <img src="{{ asset('assets/img/healthy/healthy-2.jpg') }}" alt="Healthy Corner - Edukasi Kesehatan">
          </div>
          <div class="carousel-item">
            <img src="{{ asset('assets/img/healthy/healthy-3.jpg') }}" alt="Healthy Corner - Pemeriksaan Kesehatan Dasar">
          </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#hc-gallery" data-bs-slide="prev">
          <span class="carousel-control-prev-icon"></span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#hc-gallery" data-bs-slide="next">
          <span class="carousel-control-next-icon"></span>
        </button>
      </div>
    </div>

    {{-- B. SIDEBAR --}}
    <div class="col-12 col-lg-4 order-2 order-lg-1">
      <div class="align-top">
        <div class="sticky-wrap">
          @include('fasilitas.sidebar')
        </div>
      </div>
    </div>

    {{-- C. KONTEN LAYANAN --}}
    <div class="col-12 col-lg-8 order-3 order-lg-2 offset-lg-4">
      <section class="mb-0">
        <div class="row row-cols-1 row-cols-md-2 g-3 g-md-4">

          <div class="col">
            <article class="service-card">
              <h3>Fitness Zone</h3>
              <p>
                Area kebugaran dengan peralatan olahraga modern untuk mendukung aktivitas fisik, meningkatkan stamina,
                serta menjaga kebugaran tubuh pasien, pengunjung, dan karyawan rumah sakit.
              </p>
            </article>
          </div>

          <div class="col">
            <article class="service-card">
              <h3>Wellness Studio</h3>
              <p>
                Ruang aktivitas kesehatan holistik seperti yoga, peregangan, dan relaksasi untuk mendukung keseimbangan
                fisik dan mental dalam suasana yang nyaman dan tenang.
              </p>
            </article>
          </div>

          <div class="col">
            <article class="service-card">
              <h3>Convention Hall</h3>
              <p>
                Aula multifungsi untuk kegiatan seminar kesehatan, edukasi, pertemuan komunitas, maupun acara perusahaan
                dengan fasilitas yang representatif dan modern.
              </p>
            </article>
          </div>

          <div class="col">
            <article class="service-card">
              <h3>Coffee &amp; Bakery</h3>
              <p>
                Area santai yang menyediakan aneka kopi, minuman, dan produk bakery berkualitas sebagai tempat
                istirahat bagi pasien dan pengunjung rumah sakit.
              </p>
            </article>
          </div>

          <div class="col">
            <article class="service-card">
              <h3>Snack Corner</h3>
              <p>
                Pojok makanan ringan dengan pilihan camilan praktis dan higienis untuk menemani waktu tunggu
                pengunjung di area rumah sakit.
              </p>
            </article>
          </div>

          <div class="col">
            <article class="service-card">
              <h3>Care Mart</h3>
              <p>
                Mini market yang menyediakan kebutuhan harian, produk kesehatan, dan perlengkapan pendukung perawatan
                pasien untuk kemudahan selama berada di lingkungan rumah sakit.
              </p>
            </article>
          </div>

        </div>
      </section>
    </div>


  </div>
</div>
@endsection
