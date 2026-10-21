{{-- resources/views/coe/medical-check-up.blade.php --}}
@extends('components.layouts.public')
@section('title','Medical Check Up (MCU)')

@push('head')
<style>
  .page-crumb{font-size:.95rem;color:#6b7280}
  .coe-shell{padding-top:14px;padding-bottom:60px}

  .coe-title{
    font-weight:600; font-size:clamp(1.125rem,1.9vw,1.75rem);
    color:#000; letter-spacing:.2px; line-height:1.25; margin-bottom:.5rem;
  }
  @media (max-width:575.98px){
    .coe-title{ font-size:1.65rem; }
  }

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
      <li class="breadcrumb-item active" aria-current="page">Medical Check Up (MCU)</li>
    </ol>
  </nav>

  <div class="coe-shell row g-4 align-items-start">

    {{-- A. TITLE + CAROUSEL --}}
    <div class="col-12 col-lg-8 order-1 order-lg-2">
      <div class="align-top">
        <h1 class="coe-title">Medical Check Up (MCU)</h1>
      </div>

      <div id="mcu-gallery" class="carousel slide media-frame mb-lg-4" data-bs-ride="false">
        <div class="carousel-inner ratio-16x9">
          <div class="carousel-item active">
            <img src="{{ asset('assets/img/mcu/mcu-1.jpg') }}" alt="Ruang Medical Check Up">
          </div>
          <div class="carousel-item">
            <img src="{{ asset('assets/img/mcu/laboratorium.jpg') }}" alt="Laboratorium MCU">
          </div>
          <div class="carousel-item">
            <img src="{{ asset('assets/img/mcu/radiologi.jpg') }}" alt="Pemeriksaan Radiologi MCU">
          </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#mcu-gallery" data-bs-slide="prev">
          <span class="carousel-control-prev-icon"></span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#mcu-gallery" data-bs-slide="next">
          <span class="carousel-control-next-icon"></span>
        </button>
      </div>
    </div>

    {{-- B. SIDEBAR --}}
    <div class="col-12 col-lg-4 order-2 order-lg-1">
      <div class="align-top">
        <div class="sticky-wrap">
          @include('coe.sidebar')
        </div>
      </div>
    </div>

    {{-- C. DESKRIPSI + DOKTER --}}
    <div class="col-12 col-lg-8 order-3 order-lg-2 offset-lg-4">

      <div class="desc-card p-4">
        <h2 class="h5 mb-3">Tentang Medical Check Up</h2>
        <p class="mb-3">
          Medical Check Up (MCU) merupakan layanan pemeriksaan kesehatan menyeluruh
          untuk mendeteksi kondisi medis sejak dini. Pemeriksaan dilakukan secara
          terintegrasi oleh tim profesional dengan dukungan fasilitas diagnostik modern.
        </p>

        <div class="row g-3">
          <div class="col-md-7">
            <h3 class="h6">Jenis Pemeriksaan</h3>
            <ul class="mb-0">
              <li>Pemeriksaan fisik oleh dokter</li>
              <li>Laboratorium (darah, urin, kimia klinik)</li>
              <li>Radiologi (Rontgen, USG)</li>
              <li>Elektrokardiografi (EKG)</li>
              <li>Audiometri &amp; spirometri</li>
              <li>Treadmill (sesuai indikasi)</li>
              <li>Pemeriksaan kesehatan kerja</li>
              <li>Paket MCU karyawan &amp; individu</li>
            </ul>
          </div>
          <div class="col-md-5">
            <h3 class="h6">Informasi Layanan</h3>
            <table class="table table-sm mb-0">
              <tbody>
                <tr><td class="text-muted">Jenis</td><td>MCU umum, MCU karyawan, MCU eksekutif</td></tr>
                <tr><td class="text-muted">Jam</td><td>Senin–Sabtu, sesuai jadwal</td></tr>
                <tr><td class="text-muted">Lokasi</td><td>Gedung B – Lantai 1</td></tr>
                <tr><td class="text-muted">Reservasi</td><td>WA 0858-1415-0000 / (0291) 4150501</td></tr>
                <tr><td class="text-muted">Hasil</td><td>Laporan lengkap &amp; konsultasi dokter</td></tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>

      {{-- Dokter MCU --}}
      <div class="mt-4">
        <h3 class="h5 fw-bold mb-3">Dokter Penanggung Jawab MCU</h3>
        @php
          $dokterMCU = [
            ['nama' => 'dr. Andi Prasetyo', 'sip' => 'SIP-010/RS', 'foto' => 'assets/img/mcu/dr-andi.jpg', 'ket'=>'Dokter Umum'],
            ['nama' => 'dr. Lestari Wibowo', 'sip' => 'SIP-011/RS', 'foto' => 'assets/img/mcu/dr-lestari.jpg', 'ket'=>'Dokter Okupasi'],
            ['nama' => 'dr. Rafi Mahendra', 'sip' => 'SIP-012/RS', 'foto' => 'assets/img/mcu/dr-rafi.jpg', 'ket'=>'Dokter MCU'],
          ];
        @endphp

        <div class="row row-cols-1 row-cols-sm-2 row-cols-lg-3 g-3 g-md-4">
          @foreach($dokterMCU as $d)
            <div class="col">
              <article class="h-100 text-center p-3 rounded-4 border bg-white shadow-sm">
                <img src="{{ asset($d['foto']) }}" alt="{{ $d['nama'] }}"
                     style="width:92px;height:92px;object-fit:cover;border-radius:999px;margin:0 auto;display:block;">
                <h6 class="mt-3 mb-1">{{ $d['nama'] }}</h6>
                <div class="small text-muted">{{ $d['ket'] }}</div>
                @if(!empty($d['sip']))
                  <div class="small text-muted">SIP: {{ $d['sip'] }}</div>
                @endif
              </article>
            </div>
          @endforeach
        </div>
      </div>

    </div>
  </div>
</div>
@endsection
