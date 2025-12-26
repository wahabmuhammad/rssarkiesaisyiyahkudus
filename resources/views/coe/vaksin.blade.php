{{-- resources/views/coe/vaksin.blade.php --}}
@extends('components.layouts.public')
@section('title','Layanan Vaksinasi')

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
      <li class="breadcrumb-item active" aria-current="page">Layanan Vaksinasi</li>
    </ol>
  </nav>

  <div class="coe-shell row g-4 align-items-start">

    {{-- A. TITLE + CAROUSEL --}}
    <div class="col-12 col-lg-8 order-1 order-lg-2">
      <div class="align-top">
        <h1 class="coe-title">Layanan Vaksinasi</h1>
      </div>

      <div id="vaksin-gallery" class="carousel slide media-frame mb-lg-4" data-bs-ride="false">
        <div class="carousel-inner ratio-16x9">
          <div class="carousel-item active">
            <img src="{{ asset('assets/img/vaksin/vaksin-1.jpg') }}" alt="Pelayanan Vaksinasi">
          </div>
          <div class="carousel-item">
            <img src="{{ asset('assets/img/vaksin/vaksin-anak.jpg') }}" alt="Vaksinasi Anak">
          </div>
          <div class="carousel-item">
            <img src="{{ asset('assets/img/vaksin/vaksin-dewasa.jpg') }}" alt="Vaksinasi Dewasa">
          </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#vaksin-gallery" data-bs-slide="prev">
          <span class="carousel-control-prev-icon"></span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#vaksin-gallery" data-bs-slide="next">
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
        <h2 class="h5 mb-3">Tentang Layanan Vaksinasi</h2>
        <p class="mb-3">
          Layanan Vaksinasi menyediakan imunisasi lengkap untuk bayi, anak,
          remaja, dewasa, hingga lansia. Vaksin diberikan sesuai standar nasional
          dengan pengawasan tenaga medis profesional demi keamanan dan efektivitas.
        </p>

        <div class="row g-3">
          <div class="col-md-7">
            <h3 class="h6">Jenis Vaksin</h3>
            <ul class="mb-0">
              <li>Vaksin imunisasi dasar anak</li>
              <li>Vaksin lanjutan &amp; booster</li>
              <li>Vaksin influenza</li>
              <li>Vaksin hepatitis A &amp; B</li>
              <li>Vaksin HPV</li>
              <li>Vaksin tetanus &amp; difteri</li>
              <li>Vaksin perjalanan (travel vaccine)</li>
              <li>Vaksinasi massal &amp; perusahaan</li>
            </ul>
          </div>
          <div class="col-md-5">
            <h3 class="h6">Informasi Layanan</h3>
            <table class="table table-sm mb-0">
              <tbody>
                <tr><td class="text-muted">Sasaran</td><td>Anak, remaja, dewasa, lansia</td></tr>
                <tr><td class="text-muted">Jam</td><td>Senin–Sabtu, sesuai jadwal</td></tr>
                <tr><td class="text-muted">Lokasi</td><td>Poliklinik Umum – Lantai 1</td></tr>
                <tr><td class="text-muted">Reservasi</td><td>WA 0858-1415-0000 / (0291) 4150501</td></tr>
                <tr><td class="text-muted">Keamanan</td><td>Skrining &amp; observasi pasca vaksin</td></tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>

      {{-- Dokter --}}
      <div class="mt-4">
        <h3 class="h5 fw-bold mb-3">Dokter &amp; Tenaga Medis Vaksinasi</h3>
        @php
          $dokterVaksin = [
            ['nama' => 'dr. Maya Kusuma', 'sip' => 'SIP-020/RS', 'foto' => 'assets/img/vaksin/dr-maya.jpg', 'ket'=>'Dokter Umum'],
            ['nama' => 'dr. Fajar Nugroho', 'sip' => 'SIP-021/RS', 'foto' => 'assets/img/vaksin/dr-fajar.jpg', 'ket'=>'Dokter Umum'],
            ['nama' => 'dr. Nabila Azzahra', 'sip' => 'SIP-022/RS', 'foto' => 'assets/img/vaksin/dr-nabila.jpg', 'ket'=>'Dokter Vaksinasi'],
          ];
        @endphp

        <div class="row row-cols-1 row-cols-sm-2 row-cols-lg-3 g-3 g-md-4">
          @foreach($dokterVaksin as $d)
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
