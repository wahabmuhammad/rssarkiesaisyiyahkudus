@extends('components.layouts.public')
@section('title','Pain Clinic')

@push('head')
<style>
  .page-crumb{font-size:.95rem;color:#6b7280}
  .coe-shell{padding-top:14px;padding-bottom:60px}

  .coe-title{
    font-weight:600; font-size:clamp(1.125rem,1.9vw,1.75rem);
    color:#000; letter-spacing:.2px; line-height:1.25; margin-bottom:.5rem;
  }
  /* BESARKAN TITLE DI MOBILE */
  @media (max-width:575.98px){
    .coe-title{ font-size:1.65rem; }
  }

  /* Kartu sidebar */
  .coe-left{
    border:1px solid #e5e7eb;border-radius:16px;background:#fff;
    box-shadow:0 8px 24px rgba(16,24,40,.06);
  }
  .coe-left .list-group-item{border:0;border-bottom:1px solid #f1f5f9;padding:.75rem 1rem;color:#111827}
  .coe-left .list-group-item:last-child{border-bottom:0}
  .coe-left .list-group-item.active{background:#E9F2FF;color:#1E88E5;font-weight:700}

  /* Desktop alignment ala RSPI */
  @media (min-width:992px){
    :root{ --align-gap: 12px; }
    .align-top{ margin-top: var(--align-gap); }
    .sticky-wrap{ position:sticky; top:0; align-self:flex-start; }
  }

  .media-frame{
    position:relative;border-radius:20px;overflow:hidden;background:#f8fafc;
    box-shadow:0 12px 40px rgba(16,24,40,.08)
  }
  .media-frame .ratio-16x9{width:100%;aspect-ratio:16/9;background:#fff}
  .media-frame img{width:100%;height:100%;object-fit:cover}

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
      <li class="breadcrumb-item"><a href="{{ url('/center-of-excellence') }}">Center of Excellence</a></li>
      <li class="breadcrumb-item active" aria-current="page">Pain Clinic</li>
    </ol>
  </nav>

  {{-- ====== LAYOUT FLEKSIBEL (mobile vs desktop) ====== --}}
  <div class="coe-shell row g-4 align-items-start">
    {{-- A. TITLE + CAROUSEL  (mobile: pertama, desktop: kanan/atas) --}}
    <div class="col-12 col-lg-8 order-1 order-lg-2">
      <div class="align-top">
        <h1 class="coe-title">Pain Clinic</h1>
      </div>

      <div id="pc-gallery" class="carousel slide media-frame mb-lg-4" data-bs-ride="false">
        <div class="carousel-inner ratio-16x9">
          <div class="carousel-item active">
            <img src="{{ asset('assets/img/pain/pain-1.jpg') }}" alt="Pain Clinic - Ruang Tindakan">
          </div>
          <div class="carousel-item">
            <img src="{{ asset('assets/img/pain/pain-2.jpg') }}" alt="Pain Clinic - Area Konsultasi">
          </div>
          <div class="carousel-item">
            <img src="{{ asset('assets/img/pain/pain-3.jpg') }}" alt="Pain Clinic - Fisioterapi/TENS">
          </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#pc-gallery" data-bs-slide="prev" aria-label="Sebelumnya">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#pc-gallery" data-bs-slide="next" aria-label="Berikutnya">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
        </button>
      </div>
    </div>

    {{-- B. SIDEBAR  (mobile: kedua, desktop: kiri sticky) --}}
    <div class="col-12 col-lg-4 order-2 order-lg-1">
      <div class="align-top">
        <div class="sticky-wrap">
          @include('coe.sidebar')
        </div>
      </div>
    </div>

    {{-- C. DESKRIPSI  (mobile: ketiga, desktop: kanan/bawah) --}}
    <div class="col-12 col-lg-8 order-3 order-lg-2 offset-lg-4">
      <div class="desc-card p-4">
        <h2 class="h5 mb-3">Tentang Pain Clinic</h2>
        <p class="mb-3">
          Pain Center berfokus pada diagnosis, pengobatan, dan manajemen nyeri secara menyeluruh—
          mulai dari nyeri akut hingga kronis—dengan pendekatan multidisiplin.
        </p>

        <div class="row g-3">
          <div class="col-md-7">
            <h3 class="h6">Layanan Utama</h3>
            <ul class="mb-0">
              <li>Konsultasi &amp; penilaian nyeri komprehensif</li>
              <li>Intervensi terpandu: nerve block, epidural, radiofrequency ablation (RFA)</li>
              <li>Terapi modalitas: TENS &amp; fisioterapi</li>
              <li>Farmakoterapi &amp; titrasi obat nyeri</li>
              <li>Edukasi manajemen nyeri &amp; <em>home program</em></li>
              <li>Klinik rujukan internal lintas poli</li>
            </ul>
          </div>
          <div class="col-md-5">
            <h3 class="h6">Informasi Layanan</h3>
            <table class="table table-sm mb-0">
              <tbody>
                <tr><td class="text-muted">Jam</td><td>Senin–Sabtu 08.00–20.00</td></tr>
                <tr><td class="text-muted">Lokasi</td><td>Gedung A, Lantai 2</td></tr>
                <tr><td class="text-muted">Reservasi</td><td>WA 0858-1415-0000 / (0291) 4150501</td></tr>
                <tr><td class="text-muted">Rujukan</td><td>Rawat jalan &amp; rujukan internal</td></tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>

  </div>
</div>
@endsection
