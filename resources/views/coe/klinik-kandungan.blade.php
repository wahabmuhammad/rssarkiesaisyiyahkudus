{{-- resources/views/coe/klinik-kandungan.blade.php --}}
@extends('components.layouts.public')
@section('title','Klinik Kandungan & Kebidanan (VK)')

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
  .coe-left .list-group-item{
    border:0;border-bottom:1px solid #f1f5f9;padding:.75rem 1rem;color:#111827
  }
  .coe-left .list-group-item:last-child{border-bottom:0}
  .coe-left .list-group-item.active{
    background:#E9F2FF;color:#1E88E5;font-weight:700
  }

  /* Desktop alignment & sticky */
  @media (min-width: 992px){
    :root{ --align-gap: 12px; }
    .align-top{ margin-top: var(--align-gap); }
    .sticky-wrap{ position: sticky; top: 0; align-self: flex-start; }
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
      <li class="breadcrumb-item active" aria-current="page">Klinik Kandungan & Kebidanan (VK)</li>
    </ol>
  </nav>

  {{-- ====== LAYOUT FLEKSIBEL (mobile vs desktop) ====== --}}
  <div class="coe-shell row g-4 align-items-start">

    {{-- A. TITLE + CAROUSEL  (mobile: pertama, desktop: kanan/atas) --}}
    <div class="col-12 col-lg-8 order-1 order-lg-2">
      <div class="align-top">
        <h1 class="coe-title">Klinik Kandungan & Kebidanan (VK)</h1>
      </div>

      <div id="obgyn-gallery" class="carousel slide media-frame mb-lg-4" data-bs-ride="false">
        <div class="carousel-inner ratio-16x9">
          <div class="carousel-item active">
            <img src="{{ asset('assets/img/obgyn/vk-1.jpg') }}" alt="Ruang bersalin (VK)">
          </div>
          <div class="carousel-item">
            <img src="{{ asset('assets/img/obgyn/triase.jpg') }}" alt="Area triase kebidanan">
          </div>
          <div class="carousel-item">
            <img src="{{ asset('assets/img/obgyn/observasi.jpg') }}" alt="Ruang observasi ibu & bayi">
          </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#obgyn-gallery" data-bs-slide="prev" aria-label="Sebelumnya">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#obgyn-gallery" data-bs-slide="next" aria-label="Berikutnya">
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

    {{-- C. DESKRIPSI + DOKTER + BIDAN  (mobile: ketiga, desktop: kanan/bawah) --}}
    <div class="col-12 col-lg-8 order-3 order-lg-2 offset-lg-4">
      {{-- Deskripsi utama --}}
      <div class="desc-card p-4">
        <h2 class="h5 mb-3">Tentang Klinik Kandungan &amp; Kebidanan</h2>
        <p class="mb-3">
          Pelayanan obstetri &amp; ginekologi terpadu, mulai pemeriksaan kehamilan, persalinan,
          perawatan ibu–bayi, hingga konseling laktasi. Tim kami bekerja kolaboratif untuk
          keamanan ibu dan bayi.
        </p>

        <div class="row g-3">
          <div class="col-md-7">
            <h3 class="h6">Layanan Utama</h3>
            <ul class="mb-0">
              <li>Ruang bersalin (VK) individual &amp; ruang observasi kala I</li>
              <li>Area triase kebidanan 24 jam</li>
              <li>Bed bersalin elektrik &amp; peralatan tindakan</li>
              <li>Fetal monitor/CTG &amp; USG point-of-care</li>
              <li>Inkubator/infant warmer &amp; perlengkapan resusitasi neonatal</li>
              <li>Infus pump, syringe pump, dan oksigen sentral</li>
              <li>Ruang laktasi &amp; edukasi nifas</li>
              <li>Akses cepat ke kamar operasi, ICU/NICU, radiologi &amp; laboratorium</li>
            </ul>
          </div>
          <div class="col-md-5">
            <h3 class="h6">Informasi Layanan</h3>
            <table class="table table-sm mb-0">
              <tbody>
                <tr><td class="text-muted">Jenis</td><td>Antenatal care, persalinan normal/tindakan, pemantauan ibu &amp; bayi, konseling laktasi</td></tr>
                <tr><td class="text-muted">Jam</td><td>24 jam untuk gawat darurat VK; poliklinik sesuai jadwal dokter</td></tr>
                <tr><td class="text-muted">Lokasi</td><td>Gedung A (VK) &amp; Poli Kebidanan</td></tr>
                <tr><td class="text-muted">Reservasi</td><td>WA 0858-1415-0000 / (0291) 4150501</td></tr>
                <tr><td class="text-muted">Pendampingan</td><td>Bidan pendamping, edukasi nifas &amp; IMD</td></tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>

      {{-- Dokter & Bidan --}}
      <div class="mt-4">
        <h3 class="h5 fw-bold mb-3">Dokter Spesialis Obstetri &amp; Ginekologi</h3>
        @php
          $dokterObgyn = [
            ['nama' => 'dr. Aisyah Putri, Sp.OG', 'sip' => 'SIP-001/RS', 'foto' => 'assets/img/obgyn/dr-aisyah.jpg', 'ket'=>'Spesialis Obstetri & Ginekologi'],
            ['nama' => 'dr. Bima Aditya, Sp.OG',  'sip' => 'SIP-002/RS', 'foto' => 'assets/img/obgyn/dr-bima.jpg',  'ket'=>'Spesialis Obstetri & Ginekologi'],
            ['nama' => 'dr. Citra N., Sp.OG(K)',  'sip' => 'SIP-003/RS', 'foto' => 'assets/img/obgyn/dr-citra.jpg', 'ket'=>'Konsultan'],
          ];
        @endphp
        <div class="row row-cols-1 row-cols-sm-2 row-cols-lg-3 g-3 g-md-4 mb-4">
          @foreach($dokterObgyn as $d)
            <div class="col">
              <article class="h-100 text-center p-3 rounded-4 border bg-white shadow-sm">
                <img src="{{ asset($d['foto']) }}" alt="{{ $d['nama'] }}"
                     style="width:92px;height:92px;object-fit:cover;border-radius:999px;display:block;margin:0 auto;box-shadow:0 8px 20px rgba(31,93,215,.15);">
                <h6 class="mt-3 mb-1">{{ $d['nama'] }}</h6>
                <div class="small text-muted">{{ $d['ket'] ?? 'Spesialis Obstetri & Ginekologi' }}</div>
                @if(!empty($d['sip'])) <div class="small text-muted">SIP: {{ $d['sip'] }}</div> @endif
              </article>
            </div>
          @endforeach
        </div>

        <h3 class="h5 fw-bold mb-3">Tim Bidan</h3>
        @php
          $bidan = [
            ['nama' => 'Sari Wulandari, A.Md.Keb', 'foto' => 'assets/img/obgyn/bidan-sari.jpg', 'ket'=>'Bidan Koordinator'],
            ['nama' => 'Dewi Puspita, A.Md.Keb',   'foto' => 'assets/img/obgyn/bidan-dewi.jpg', 'ket'=> 'Bidan'],
            ['nama' => 'Intan Maryam, A.Md.Keb',   'foto' => 'assets/img/obgyn/bidan-intan.jpg','ket'=> 'Bidan'],
            ['nama' => 'Rina Kurnia, A.Md.Keb',    'foto' => 'assets/img/obgyn/bidan-rina.jpg', 'ket'=> 'Bidan'],
          ];
        @endphp
        <div class="row row-cols-2 row-cols-md-3 row-cols-lg-4 g-3 g-md-4">
          @foreach($bidan as $b)
            <div class="col">
              <article class="h-100 text-center p-3 rounded-4 border bg-white shadow-sm">
                <img src="{{ asset($b['foto']) }}" alt="{{ $b['nama'] }}"
                     style="width:84px;height:84px;object-fit:cover;border-radius:999px;display:block;margin:0 auto;box-shadow:0 8px 20px rgba(31,93,215,.12);">
                <div class="mt-3 fw-semibold">{{ $b['nama'] }}</div>
                <div class="small text-muted">{{ $b['ket'] ?? 'Bidan' }}</div>
              </article>
            </div>
          @endforeach
        </div>
      </div>
    </div>

  </div>
</div>
@endsection
