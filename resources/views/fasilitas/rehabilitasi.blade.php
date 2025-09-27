{{-- resources/views/fasilitas/rehabilitasi.blade.php --}}
@extends('components.layouts.public')
@section('title','Rehabilitasi Medik & Fisioterapi')

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

  /* Sidebar fasilitas (kartu) */
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

  /* Kartu putih konten */
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
      <li class="breadcrumb-item active" aria-current="page">Rehabilitasi Medik & Fisioterapi</li>
    </ol>
  </nav>

  {{-- ====== LAYOUT FLEKSIBEL ====== --}}
  <div class="coe-shell row g-4 align-items-start">

    {{-- A. TITLE + CAROUSEL (mobile: 1, desktop: kanan/atas) --}}
    <div class="col-12 col-lg-8 order-1 order-lg-2">
      <div class="align-top">
        <h1 class="coe-title">Rehabilitasi Medik & Fisioterapi</h1>
      </div>

      <div id="rehab-gallery" class="carousel slide media-frame mb-lg-4" data-bs-ride="false">
        <div class="carousel-inner ratio-16x9">
          <div class="carousel-item active">
            <img src="{{ asset('assets/img/rehab/rehab-1.jpg') }}" alt="Area latihan & fisioterapi">
          </div>
          <div class="carousel-item">
            <img src="{{ asset('assets/img/rehab/rehab-2.jpg') }}" alt="Modalitas terapi (TENS/US)">
          </div>
          <div class="carousel-item">
            <img src="{{ asset('assets/img/rehab/rehab-3.jpg') }}" alt="Latihan fungsional & gait training">
          </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#rehab-gallery" data-bs-slide="prev" aria-label="Sebelumnya">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#rehab-gallery" data-bs-slide="next" aria-label="Berikutnya">
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

      {{-- Tentang layanan --}}
      <div class="desc-card p-4 mb-4">
        <h2 class="h5 mb-3">Tentang Rehabilitasi Medik &amp; Fisioterapi</h2>
        <p>
          Layanan rehabilitasi kami membantu pemulihan pasca cedera, operasi, stroke, dan gangguan gerak
          dengan pendekatan multidisiplin. Program disesuaikan kebutuhan pasien agar aman dan efektif.
        </p>
      </div>

      {{-- Program / Layanan Utama --}}
      <div class="desc-card p-4 mb-4">
        <h3 class="h6 mb-3">Program &amp; Layanan Utama</h3>
        <ul class="mb-0">
          <li>Fisioterapi muskuloskeletal (nyeri punggung/leher, bahu, lutut)</li>
          <li>Rehabilitasi neurologis (pasca stroke, cedera saraf)</li>
          <li>Latihan fungsional &amp; <em>gait training</em> (alat bantu jalan)</li>
          <li>Modalitas: TENS, ultrasound therapy, IR/heat/cold therapy</li>
          <li>Terapi manual &amp; <em>soft tissue release</em></li>
          <li>Kondisi olahraga: sprain/strain, pasca cedera ligamen/meniskus</li>
          <li>Program pasca operasi (arthroscopy, TKR/THR, ORIF, dll.)</li>
          <li>Edukasi ergonomi, pencegahan cedera, &amp; <em>home program</em></li>
        </ul>
      </div>

      {{-- Informasi Layanan --}}
      <div class="desc-card p-4 mb-4">
        <h3 class="h6 mb-3">Informasi Layanan</h3>
        <table class="table table-sm mb-0">
          <tbody>
            <tr><td class="text-muted" style="width:250px">Jadwal Layanan</td><td>Senin–Sabtu 08.00–20.00 (by appointment)</td></tr>
            <tr><td class="text-muted">Durasi Sesi</td><td>± 45–60 menit/sesi (tergantung program)</td></tr>
            <tr><td class="text-muted">Lokasi</td><td>Gedung B, Lantai 1 – Rehabilitasi Medik &amp; Fisioterapi</td></tr>
            <tr><td class="text-muted">Rujukan</td><td>Poli spesialis/IGD/MCU atau datang langsung*</td></tr>
            <tr><td class="text-muted">Catatan</td><td>*Evaluasi awal oleh fisioterapis/rehab medik menentukan rencana terapi</td></tr>
          </tbody>
        </table>
      </div>

      {{-- Dukungan --}}
      <div class="desc-card p-4">
        <h3 class="h6 mb-3">Dukungan</h3>
        <ul class="mb-0">
          <li>Penilaian awal komprehensif &amp; evaluasi berkala</li>
          <li>Rencana terapi individual &amp; edukasi keluarga</li>
          <li>Koordinasi dengan dokter penanggung jawab pasien</li>
        </ul>
      </div>

    </div>

  </div>
</div>
@endsection
