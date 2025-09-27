{{-- resources/views/fasilitas/diagnostic-center.blade.php --}}
@extends('components.layouts.public')
@section('title','Diagnostic Center')

@push('head')
<style>
  .page-crumb{font-size:.95rem;color:#6b7280}

  /* jarak vertikal halaman */
  .coe-shell{padding-top:14px;padding-bottom:24px;}

  .coe-title{
    font-weight:600; font-size:clamp(1.125rem,1.9vw,1.75rem);
    color:#000; letter-spacing:.2px; line-height:1.25; margin-bottom:.5rem;
  }
  /* Title mobile sedikit lebih besar */
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

  /* Samakan jarak antar "blok" (sidebar, konten, dll) */
  .coe-grid{ --bs-gutter-y: .75rem; }  /* lebih rapat dari default */

  /* Desktop: judul sejajar top sidebar; sidebar sticky */
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

  /* >>> KUNCI: pendekkan carousel di desktop supaya gap visual mengecil */
  @media (min-width: 992px){
    #dc-gallery .ratio-16x9{ aspect-ratio: 21/9; } /* lebih “landscape” dari 16:9 */
  }

  .media-frame img{width:100%;height:100%;object-fit:cover}

  /* Kartu penjelasan tiap layanan */
  .service-card{
    border-radius:16px;background:#fff;border:1px solid #eef2f7;
    box-shadow:0 8px 24px rgba(16,24,40,.06);padding:18px 18px;height:100%
  }
  .service-card h3{font-size:1rem;font-weight:700;margin-bottom:.35rem;color:#0f172a}
  .service-card p{margin:0;color:#475569;font-size:.95rem;line-height:1.55}
</style>
@endpush

@section('content')
<div class="container">
  {{-- Breadcrumb --}}
  <nav class="page-crumb my-3" aria-label="breadcrumb">
    <ol class="breadcrumb mb-0">
      <li class="breadcrumb-item"><a href="{{ url('/') }}">Beranda</a></li>
      <li class="breadcrumb-item"><a href="{{ url('/fasilitas') }}">Fasilitas dan Layanan</a></li>
      <li class="breadcrumb-item active" aria-current="page">Diagnostic Center</li>
    </ol>
  </nav>

  {{-- ====== LAYOUT FLEKSIBEL ====== --}}
  <div class="coe-shell row g-4 align-items-start coe-grid">

    {{-- A. TITLE + CAROUSEL (mobile: 1, desktop: kanan/atas) --}}
    <div class="col-12 col-lg-8 order-1 order-lg-2">
      <div class="align-top">
        <h1 class="coe-title">Diagnostic Center</h1>
      </div>

      {{-- Hilangkan margin bawah: andalkan gutter saja --}}
      <div id="dc-gallery" class="carousel slide media-frame mb-0" data-bs-ride="false">
        <div class="carousel-inner ratio-16x9">
          <div class="carousel-item active">
            <img src="{{ asset('assets/img/diagnostic/dc-1.jpg') }}" alt="Diagnostic Center - Radiologi Digital">
          </div>
          <div class="carousel-item">
            <img src="{{ asset('assets/img/diagnostic/dc-2.jpg') }}" alt="Diagnostic Center - Ultrasonography">
          </div>
          <div class="carousel-item">
            <img src="{{ asset('assets/img/diagnostic/dc-3.jpg') }}" alt="Diagnostic Center - Laboratorium & CT Scan">
          </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#dc-gallery" data-bs-slide="prev" aria-label="Sebelumnya">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#dc-gallery" data-bs-slide="next" aria-label="Berikutnya">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
        </button>
      </div>
    </div>

    {{-- B. SIDEBAR (mobile: 2, desktop: kiri sticky) --}}
    <div class="col-12 col-lg-4 order-2 order-lg-1">
      <div class="align-top">
        <div class="sticky-wrap">
          @include('fasilitas.sidebar')
        </div>
      </div>
    </div>

    {{-- C. KONTEN LAYANAN (mobile: 3, desktop: kanan/bawah) --}}
    <div class="col-12 col-lg-8 order-3 order-lg-2 offset-lg-4">
      {{-- Tidak ada mb- besar supaya tidak ada gap ke footer --}}
      <section class="mb-0">
        <div class="row row-cols-1 row-cols-md-2 g-3 g-md-4">
          <div class="col">
            <article class="service-card">
              <h3>Digital Radiography</h3>
              <p>Pemeriksaan foto rontgen berbasis digital dengan hasil gambar tajam dan proses cepat. Umum untuk thoraks, tulang &amp; sendi, evaluasi trauma. Dosis radiasi relatif rendah dan hasil tersimpan di sistem.</p>
            </article>
          </div>
          <div class="col">
            <article class="service-card">
              <h3>Ultrasonography (USG)</h3>
              <p>Pencitraan tanpa radiasi memakai gelombang suara. Untuk abdomen, kebidanan, payudara, tiroid, hingga <em>Doppler</em> pembuluh darah guna menilai aliran darah. Aman dan dapat diulang.</p>
            </article>
          </div>
          <div class="col">
            <article class="service-card">
              <h3>USG 3D</h3>
              <p>Rekonstruksi volumetrik dari data USG memberikan visual anatomi lebih jelas—terutama kebidanan (visualisasi janin &amp; deteksi kelainan bawaan)—sehingga memudahkan evaluasi klinis.</p>
            </article>
          </div>
          <div class="col">
            <article class="service-card">
              <h3>Laboratorium 24 jam</h3>
              <p>Layanan lab klinik 24/7 untuk IGD, rawat inap/jalan: hematologi, kimia darah, urinalisis, feses, serologi/infeksi, panel pra-tindakan. Tersedia mode cepat (<em>stat</em>) untuk kondisi gawat darurat.</p>
            </article>
          </div>
          <div class="col">
            <article class="service-card">
              <h3>CT Scan</h3>
              <p>Pencitraan irisan detail untuk kepala, dada, perut, tulang, stroke, trauma, batu saluran kemih. Dapat dengan/ tanpa kontras sesuai indikasi; sebagian pemeriksaan memerlukan persiapan.</p>
            </article>
          </div>
        </div>
      </section>
    </div>

  </div>
</div>
@endsection
